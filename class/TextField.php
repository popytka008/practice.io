<?php  require_once("Input.php"); ?>
<?php
/* <!--  класс ТЕКСТОВОЕ ПОЛЕ <input type="text"> формы  --> */
class TextField extends Input {
  // личные свойства текстового поля
  protected $size = "";
  protected $length = "";
  
  public function __construct ($name = null, $owner = null, $value = null) {
    parent::__construct($name, $owner, $value);
    $this->type = "text";
    if ($value == "") $this->value = "Писать сюда и сидя";
  }

  // get | set
  public function getSize() { return $this->size; }
  public function getLength() { return $this->length; }

  public function setSize($size) { $this->size = $size; }
  public function setLength($length) { $this->length = $length; }
  
  // добавленные свойства
  public function getProps() {
    $props = parent::getProps();
    
    $props .=  ($this->size == "") ?"" : " size='{$this->size}'"; 
    $props .=  ($this->length == "") ?"" : " maxlength='{$this->length}'"; 
    return $props;    
  }
}
