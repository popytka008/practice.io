<?php  require_once("classBase.php"); ?>
<?php
/* <!--  класс кнопки {BUTTON} --> */
class RealButton extends Element {
  protected $items = null;
//  protected $tag = "button";
    
  public function __construct 
          ($name = null, $owner = null, $items = null) {
      parent::__construct($name, $owner);
      $this->items = $items;
      $this->tag = "button";      
  }

  // get | set
  public function getItems() { return $this->items; }

  public function setItems($items) { $this->items = $items; }  
  
  public function addItem($item) { $this->items[] = $item; }
  
    public function addText($text) { 
    $this->items[] = new TextNode(null, null, $text);
  }

  public function itemsOut() { 
    return (($this->items !== null) ?(writeControls($this->items)) :"");
  }

  static public function createRealButton
          ($name = null, $owner = null, $items = null) {
    $tmp = new RealButton($name, $owner, $items);
    return $tmp;
  }
}
?>