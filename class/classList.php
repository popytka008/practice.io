<?php  require_once("classBase.php"); ?>
<?php
/* <!--  класс элементов списка {ol/ul}->LI --> */
class ListItem extends Element {
  protected $items;
    
  public function __construct 
                  ($name = null, $owner = null, $items = null) 
  {
      parent::__construct($name, $owner);
      $this->tag = "li";
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

  static public function createListItem
                    ($name = null, $owner = null, $items = null) 
  {
    $tmp = new ListItem($name, $owner, $items);
    return $tmp;
  }
}
?>
 
<?php
/* <!--  класс элементов списка {OL/UL}  --> */
class OrderList extends Element {
  // личные свойства текстового поля
  protected $order;     // тип списка (упорядоченый/неупорядоченый)
  protected $listItems; // массив - элементы списка
//  protected $tag = "";
  
  public function __construct 
                ($name = null, $owner = null, 
                $order = Cons::YES, 
                $listItems = null) 
  {
    parent::__construct($name, $owner);    
    
    $this->order = $order;
    $this->listItems = $listItems;
    $this->tag = (($order === Cons::YES) ?"ol" :"ul");
  }

  // get | set
  public function getOrder() { return $this->order; } 
  public function getListItems() { return $this->listItems; } 

  public function setOrder($order = Cons::YES) { 
    $this->order = $order; 
    $this->tag = (($order === Cons::YES) ?"ol" :"ul");
  }
  public function setListItems( $listItems) { $this->listItems = $listItems; }
  
  public function addListItem($listItem) { $this->listItems[] = $listItem; }
  
  public function itemsOut() { 
    return (($this->listItems !== null) ?(writeControls($this->listItems)) :"");
  }

  static public function createOrderList
                ($name = null, $owner = null, 
                $order = Cons::YES, 
                $listItems = null) 
  {
    $tmp = new OrderList($name, $owner, $order, $listItems);
    return $tmp;
  }
}
?>