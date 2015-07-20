<?php  require_once("classBase.php"); ?>
<?php
/* <!--  блочный элемент DIV P --> */
class Container extends Element {
  // личные свойства поля загрузки файлов
  protected $items;  

  public function __construct 
              ($name = null, $owner = null, $tag = "div", $items = null) 
  {
    parent::__construct($name, $owner);
    
    $this->tag = $tag;
    $this->items = $items;
  }

  // get | set
  public function getItems() { return $this->items; }

  public function setItem($item) { $this->items = $item; }  
  
  public function addItem($item) { $this->items[] = $item; }
  
  public function addText($text) { 
    $this->items[] = new TextNode(null, null, $text);
  }
  
  public function itemsOut() { 
    return (($this->items !== null) ?(writeControls($this->items)) :"");
  }
    
  static public function createElement
              ($name = null, $owner = null, $tag = "div", $items = null) 
  {
    $tmp = new Element($name? $owner, $tag, $items);
    return $tmp;
  }
}
?>
