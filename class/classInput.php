<?php  require_once("classBase.php"); ?>
<?php
/* <!--  кнопка BUTTON  --> */
abstract class Input extends Element {
  // личные свойства текстового поля
  protected $value = "";
  protected $type;
  

  public function __construct ($name = null, $owner = null, $value = null) {
    parent::__construct($name, $owner);
    $this->tag = "input";
    $this->doubleTag = Cons::NO;
    
    $this->value = $value;
  }

  // get | set
  public function getValue() { return $this->value; }
  public function getType() { return $this->type; }

  public function setValue($value) { $this->value = $value; }
  public function setType($type) { $this->type = $type; }
  
  // добавленные свойства
  public function getProps() {
/*    $props = " type='" . $this->type . "'";
    return $props . ($this->value == "") ?"" : " value='" . $this->value . "'";    */
    return " type='{$this->type}'" . (($this->value == "") ?"" : " value='{$this->value}'");
  }
}
?>
