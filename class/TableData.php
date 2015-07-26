<?php  require_once("Base.php"); ?>
<?php
/* <!--  под-элемент table->tr->TD --> */
class TableData extends Element {
  // личные свойства поля загрузки файлов
  
  // в массиве - дерево любых элементов HTML
  protected $items;

  public function __construct ($name = null, $owner = null, $items = null) 
  {
    parent::__construct($name, $owner);
    $this->tag = "td";
    $this->items = $items;
  }

  // get | set
  public function getItems()  { return $this->items;  }

  public function setItems($items){ $this->items = $items;   }
  public function addItem($item)  { $this->items[] = $item;  }
  
  public function itemsOut() { 
    return (($this->items !== null) ?(writeControls($this->items)) :"");
  }
  
    public function addText($text) { 
    $this->items[] = new TextNode(null, null, $text);
  }
    
  static public function createTableData
                        ($name = null, $owner = null, $items = null) 
  {
    $tmp = new TableData($name, $owner, $items);
    return $tmp;
  }
}
