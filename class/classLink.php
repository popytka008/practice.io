<?php  require_once("classBase.php"); ?>
<?php
/* <!--   элемент A ссылка --> */
class Link extends Element {
  // личные свойства поля загрузки файлов
  protected $href;
  protected $target;
  
  protected $items;

  public function __construct 
                              ($name = null, $owner = null, 
                              $href = "сюда ведет ссылка", 
                              $title = "пояснение к ссылке", 
                              $items = null) 
  {
    parent::__construct($name, $owner);
    $this->tag = "a";
    
    $this->href = $href;
    $this->title = $title;
    $this->items = $items;
    $this->target = "new";
  }

  // get | set
  public function getHref() { return $this->href; }
  public function getItems() { return $this->items; }

  public function addHref($href) { $this->href = $href; }
  public function setItems($items) { $this->items = $items; }  
  
  public function addItem($item) { $this->items[] = $item; }
  
  public function addText($text) { 
    $this->items[] = new TextNode(null, null, $text);
  }
  
  public function getProps() {
    $props .= (($this->href == "") ?"" : " href='{$this->href}'");
    $props .= (($this->target == "") ?"" : " target='{$this->target}'");

    return $props;
  }

  public function itemsOut() { 
    return (($this->items !== null) ?(writeControls($this->items)) :"");
  }

    
  static public function createLink
                                ($name = null, $owner = null, 
                              $href = "сюда ведет ссылка", 
                              $title = "пояснение к ссылке", 
                              $items = null) 
  {
    $tmp = new Link($name, $owner, $href, $title, $items);
    return $tmp;
  }
}
?>