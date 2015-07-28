<?php /* сервисные функции */  ?>
<?php function nl() { return "<br />\n"; }                   ?>
<?php function np() { return "<p />\n"; }                    ?>
<?php 
function writeControls($controls, $wrap = Cons::WRAP){
  $strout = "";
    foreach($controls as $item) {
      $strout .= $item->toString($wrap);
    }
  return $strout;
}
?>
<?php // константы пакета класс Cons
final class Cons {
  const YES = true;
  const NO = false;
  const WRAP = "nl";
  const PLAIN = "plain";
  //const LEFT = "l";
	//const RIGHT = "r";
  const OFF = "off";
  const VIRT = "virtual";
  const PHYS = "physical";
}
?>
<?php
/* <!--  базовый класс элементов  --> */
/*
_допускаются_только_следующие_элементы_
строковые:
  span (textnode) img a
блочные:
  un/ol li p div 
управления:
  form input textarea button select (option)
табличные:
  (table caption) tr th td
общее:
имя ID стиль класс;
общие события.

Архитектура 
1. Примитив объектов
  1.1 Блочные 
  1.2 Строковые
  1.3. Элементы управления
  1.4. Табличные
замечания:
разделение на строковые и блоковые бессмысленно при использовании стилей
значит->
архитектура 
1. Примитив объектов
  1.1 Блочные + Строковые
  1.2. Элементы управления
  1.3. Табличные
замечания:
отделение табличных от прочих не имеет смысла так как табличные элементы не гомогенные
caption, td, th - строковые, table, tr - блоковые 
значит->
архитектура 
1. Примитив объектов
  1.1  Строковые: {Табличные} {Элементы управления} + элементы HTML
  1.2. Блочные: {Табличные} {Элементы управления} + элементы HTML

Разделение имеет смысл для операций вывода элементов исключительно.
в общем можно делать заодно, уточняя отдельные свойства в конкретном классе

но первый (Primitive) по ходу - исключительно абстрактный
уже второй - с наполнением: class ЭЛЕМЕНТ РАЗМЕТКИ
class ЭЛЕМЕНТ УПРАВЛЕНИЯ - думаю это более правильно, теперь каждый элемент
по возможностям - он и элемент разметки и элемент управления.
И форма здесь ничего не решает. Хотя её наличие очень удобно.
*/
abstract class Primitive {
  // значение типовых событий
  public $onBlur = "";
  public $onChange = "";
  public $onFocus = "";
  public $onSelect = "";
  public $onClick = "";
  // атрибуты для всех тэгов
  protected $id = "";  // id
  protected $css = ""; // style
  protected $cls = ""; // class
  protected $name = "";   // name (= id )
  protected $tag = "";   // tag
  // id родительского элемента
  protected $owner;
  // тип тага (парный / единичный)
  public $doubleTag = Cons::YES;
  // Привязка источника данных к элементу
  protected $istok; // datasource

  // методы работы с источником данных
  public function razvertka() { }

  // get || set
  public function getIstok() { return $this->istok; }
  public function getID() { return $this->id; }
  public function getStyle() { return $this->css; }
  public function getClass() { return $this->cls; }
  public function getName() { return $this->name; }
  public function getTag() { return $this->tag; }

  public function setIstok($filename = null) {
    $this->istok = Istocnik::verniIstok($filename);
  }
  public function setID($id) { $this->id = $id; }
  public function setStyle($css) { $this->css = $css; }
  public function setClass($cls) { $this->cls = $cls; }
  public function setName($name) { $this->id = $this->name = $name; }
  public function setTag($tag) { $this->tag = $tag; }

  // конструктор
  public function __construct ($name = null, $owner = null) {
    $this->owner = $owner;
    $this->id = $this->name = $name;
    }
    
  // вывести непересекающиеся свойства объекта
  // ввиде пар {пробел}{свойство="значение_свойства"}
  abstract public function getProps();
  // вывести дочерние узлы объекта
  // ввиде списка: {таг (свойства)}{дочерние узлы}{/таг}
  abstract public function itemsOut();
  // метод вывода всего объекта
  // определяется в каждом классе (?)
  // нужно избежать повторений
  abstract public function write();  
  abstract public function writeln();
  // Cons::PLAIN - write() иначе Cons::WRAP - writeln()
  abstract public function toString($key = Cons::PLAIN) ;
  
  // функция класса для вывода (ВОЗМОЖНО ОШИБКА)
  static public function out($item) {
    return $item->toString(Cons::WRAP);
  }
}
?>
<?php /* ***** начальный (и абстрагированный) класс элементов HTML ****** */
class Element extends Primitive {
  // значение типовых событий
  
  // атрибуты для всех тэгов
  protected $text = "";   // некое текстовое содержимое
  protected $title = "";   // всплывающее текстовое содержимое

  // get || set
  public function getText() { return $this->text; }
  public function getTitle() { return $this->title; }
  
  // абстрактные методы определены
  public function getProps() { return ""; }
  public function itemsOut() {
    return (($this->text == "") ?"": $this->text."\n"); 
  }
  
    
  //public function setType($type) { $this->type = $type; }
  public function setText($text) { $this->text = $text; }
  public function setTitle($title) { $this->title = $title; }

  // конструктор
  public function __construct ($name = null, $owner = null) {
    parent::__construct ($name, $owner);
  }
    
  // Cons::PLAIN - write() иначе Cons::WRAP - writeln()
  public function toString($key = Cons::PLAIN) {
    return ($key === Cons::WRAP) ?$this->writeln() :$this->write() ;
  }
  
  public function write() {
    if($this->tag == "") return $this->text;
    if($this->istok) $this->razvertka();
    
    $atr = "";
    $atr .= ($this->getID() == "") ?"" : " id='{$this->getID()}'";
    $atr .= ($this->getName() == "") ?"" : " name='{$this->getName()}'";
    $atr .= ($this->getStyle() == "") ?"" : " style='{$this->getStyle()}'";
    $atr .= ($this->getClass() == "") ?"" : " style='{$this->getClass()}'";
    $atr .= ($this->getTitle() == "") ?"" : " title='{$this->getTitle()}'";
    $atr .= $this->getProps();

    $atr .= ($this->onBlur == "") ?"" : " onBlur='{$this->onBlur}'";
    $atr .= ($this->onChange == "") ?"" : " onChange='{$this->onChange}'";
    $atr .= ($this->onFocus == "") ?"" : " onFocus='{$this->onFocus}'";
    $atr .= ($this->onSelect == "") ?"" : " onSelect='{$this->onSelect}'";
    $atr .= ($this->onClick == "") ?"" : " onClick='{$this->onClick}'";
    
    if($this->doubleTag === Cons::YES)
      return "<{$this->tag}{$atr}>\n" . $this->itemsOut() . "</{$this->tag}>";
    else
      return ("<{$this->tag}{$atr}" . "/>");
  }
  
  public function writeln() { return $this->write() . "\n"; }
}
?>