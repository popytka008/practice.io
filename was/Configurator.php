<?php
require_once("DBHelper.php");
require_once("Connection.php"); ?>
<?php

class Configurator {
  protected $istok;
  protected $obj;
  protected $columneNames;
  protected $data;

  public function __construct(){
    $this->istok = DBHelper::getIstok(Connection::getConnection());
    $this->obj = Creator::getObject($this->istok["name"]);
    $this->columneNames = $this->istok["colnames"];
    $this->data = $this->istok["colvalues"];

    //print_r($this->istok);
    //$this->test();
    //print_r($this->obj); echo PHP_EOL;
    //print_r($this->columneNames);echo PHP_EOL;
    //print_r($this->data);echo PHP_EOL;
  }

  function test() {
    //print_r($this->istok);
    print_r($this->obj);
    print_r($this->columneNames);
    print_r($this->data);
  }

  public function Razvernuti(){
    // 1. Мы используем сейчас вполне опредленный элемент
    //    управления Orderlist.
    //    Для него не нужен $this->columneNames
    // 2. Развертываем элемент уже имея в ввиду его будущее
    //    Значит свойства имена и прочее продумываем заранее.

    /* Например шаблоны
    <ol name="name" id='id'>
      <li name="name1" id='id1'>
        TextNode(null, null, text.value)
      </li>
    </ol>

    <select name='name' id='id'>
      <option value='value'>
        TextNode(null, null, text.value)
      </option>
    </select>

    $start = "<select name='name' id='id'>";
    где name, id - заранее выверенные переменные (значения)
    $end = "</select>";
    или
    $start = new Combobox("name"); // $end не нужен

    Тогда получим: return $start . {middle} . $end;

    Остаётся расчитать {middle}.

    Здесь будет:

    while ($row = mysql_fetch_array($this->data, MYSQL_NUM)) {
      $value = $row[0];
      $text = $row[2];
      $option = new Option(null, null, $text, $value);
      $start->addItem($option);
    }
    $start->toString();

    то же для списка:
    $start = "<ol name='name' id='id'>";
    где name, id - заранее выверенные переменные (значения)
    $end = "</ol>";
    или
    $start = new OrderList("name"); // $end не нужен

    while ($row = mysql_fetch_array($this->data, MYSQL_NUM)) {
      $text = $row[2];
      $li = new ListItem();
      $li->addText($text);
      $start->addListItem($li);
    }
    $start->toString();
     */
    // Элемент заполняем
    $start = $this->obj;
    $start->setName("MyOrderList");

    // Добавим внутренние члены
    while ($row = mysql_fetch_array($this->data, MYSQL_NUM)) {
      $text = $row[2];
      $li = new ListItem();
      $li->addText($text);
      $start->addListItem($li);

      //print_r($li); echo PHP_EOL;
    }
    $start->toString();
  }

  static public function obraz(){
    $tmp = new Configurator();
    $tmp->Razvernuti();
    return $tmp->obj->toString();
  }
} 