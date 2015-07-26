<?php  require_once("Base.php"); ?>
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
class Combobox extends Element {
  // личные свойства элемента combobox
  protected $options; // массив-элементы выбора

  public function __construct ($name = null, $owner = null,
                  $options = null)
  {
    parent::__construct($name, $owner);
    $this->tag = "select";
    $this->options = $options;
  }

  // get | set
  public function getOptions() { return $this->options; } // массив объектов Option

  public function setOptions( $options) { $this->options = $options; }

  public function addOption( $option) { $this->options[] = $option; }

  public function itemsOut() {
    return (($this->options !== null) ?(writeControls($this->options)) :"");
  }

  static function createCombobox($name = null, $owner = null,
                  $options = null)
  {
    $tmp = new Combobox($name, $owner, $options);
    return $tmp;
  }
}
?>
<?php
class Listbox extends Combobox {
  // личные свойства элемента Listbox
  protected $multiple;// множественность выбора
  protected $size;    // количество отображаемые элементы

  public function __construct ($name = null, $owner = null,
                  $options = null, $size = "3")
  {
    parent::__construct($name, $owner, $options);
    $this->name .= "[]";

    $this->size = $size;
  }

  // get | set
  public function getSize() { return $this->size; } // значение поля size

  public function setSize($size = "") { $this->size = $size; }

  // добавленные свойства
  public function getProps() {
    $props  = (($this->size == "") ?"" : " size='{$this->size}'");
    $props .= " multiple='true'";

    return $props;
  }

  static function createListbox($name = null, $owner = null,
                  $options = null, $size = "3")
  {
    $tmp = new Listbox($name, $owner, $options, $size);
    return $tmp;
  }
}
