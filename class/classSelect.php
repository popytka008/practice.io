<?php  require_once("classBase.php"); ?>
<?php
/* <!--  класс элементов выбора select->OPTION --> */
class Option extends Element {
  protected $value;
  protected $disabled;
  protected $defaultSelected;
  
  public function __construct 
                ($name = null, $owner = null, 
                $text="some text", $value = "some value", 
                $disabled = Cons::NO, $defaultSelected = Cons::NO) 
  {
      parent::__construct($name, $owner);
      $this->text = $text;
      $this->value = $value;
      $this->disabled = $disabled;
      $this->defaultSelected = $defaultSelected;
      
      $this->tag = "option";
  }

  public function getValue() { return $this->value; }
  public function getDisabled() { return $this->disabled; }
  public function getDefaultSelected()  { return $this->defaultSelected;  }
  
  public function setValue($value) { $this->value = $value; }
  public function setDisabled($disabled) { $this->disabled = $disabled; }
  public function setDefaultSelected($defaultSelected){ $this->defaultSelected = $defaultSelected;   }

  
  public function getProps() {
    $props  = (($this->value == "") ?"" : " value='{$this->value}'");
    $props .= (($this->disabled === Cons::NO) ?"" : " disabled='{$this->disabled}'");
    $props .= (($this->defaultSelected === Cons::NO) ?"" : " defaultSelected='{$this->defaultSelected}'");

    return $props;
  }

  static public function createOption
                ($name = null, $owner = null, 
                $text="some text", $value = "some value", 
                $disabled = Cons::NO, $defaultSelected = Cons::NO) 
  {
    $tmp = new Option($name, $owner, $text, $value, $disabled, $defaultSelected);
    return $tmp;
  }
}
?>
 <?php
/* <!--  кнопка Select  --> */
class Select extends Element {
  // личные свойства текстового поля
  protected $multiple;// множественность выбора
  protected $options; // массив-элементы выбора
  protected $size;    // количество отображаемые элементы

  public function __construct ($name = null, $owner = null, 
                  $options = null, $size = "3", $multiple = Cons::NO) 
  {
    parent::__construct($name, $owner);
    $this->name .= "[]";
    $this->tag = "select";
    
    $this->multiple = $multiple;
    $this->size = $size;
    $this->options = $options;
  }

  // get | set
  public function getOptions() { return $this->options; } // массив объектов Option
  public function getSize() { return $this->size; } // значение поля size

  public function setOptions( $options) { $this->options = $options; }
  public function setSize($size = "") { $this->size = $size; }
  
  public function doMultiple($value = Cons::YES){ $this->multiple = $value; }
  public function addOption( $option) { $this->options[] = $option; }
  
  public function itemsOut() { 
    return (($this->options !== null) ?(writeControls($this->options)) :"");
  }

  // добавленные свойства
  public function getProps() {
    $props  = (($this->size == "") ?"" : " size='{$this->size}'");
    $props .= (($this->multiple === Cons::NO) ?"" : " multiple='true'");

    return $props;
  }

  static function createSelect($name = null, $owner = null, 
                  $options = null, $size = "3", $multiple = Cons::NO) 
  {
    $tmp = new Select($name, $owner, $options, $size, $multiple);    
    return $tmp;
  }
}
?>