<?php  require_once("classBase.php"); ?>
<?php
/* <!--  элемент ФОРМА             --> */
class Form extends Element {
  // личные свойства поля загрузки файлов    
  protected $action;
  protected $target;
  protected $items;

  public function __construct ($name = null, $owner = null, $action = null, 
                               $target = null, $items = null) 
  {
    parent::__construct($name, $owner);
    $this->action = $action;
    $this->target = $target;
    $this->items  = $items;
    
    $this->tag = "form";
  }
  // get | set
  public function getAction() { return $this->action; }
  public function getTarget() { return $this->target; }
  public function getItems()  { return $this->items;  }
  
  public function setAction($action) { $this->action = $action; }
  public function setTarget($target) { $this->target = $target; }
  public function setItems($items){ $this->items = $items;   }
  public function addItem($item)  { $this->items[] = $item;  }
  
  // добавленные свойства
  public function getProps() {
    $props  = (($this->action == "") ?"" : " action='{$this->action}'");
    $props .= (($this->target == "") ?"" : " target='{$this->target}'");

    return $props;
  }
  
  public function itemsOut() { 
    return (($this->items !== null) ?(writeControls($this->items)) :"");
  }
  
  static public function createForm ($name = null, $owner = null, 
                   $action = null, $target = null, $items = null)  
  {  
    $tmp = new Form($name, $owner, $action, $target, $items);
    return $tmp;
  }
}
?>