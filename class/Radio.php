<?php  require_once("Input.php"); ?>
<?php
/* <!--  кнопка RADIO  --> */
class Radio extends Input {
  // личные свойства текстового поля
  protected $checked;

  public function __construct ($name = null, $owner = null, $value = null, $checked = Cons::NO) {
    parent::__construct($name, $owner, $value);
    $this->type = "radio";
    $this->checked = $checked;
  }

  // get | set
  public function getChecked() { return $this->checked; }

  public function setChecked($checked) { $this->checked = $checked; }
    
  // добавленные свойства
  public function getProps() {
    $props = parent::getProps();
    return $props . (($this->checked === Cons::NO) ?"" : " checked='true'");  
  }

  // статическое создание элемента
  static public function createRadio($name = null, $owner = null, $value = null, $checked = Cons::NO) {
    $obj = new Radio($name, $owner , $value, $checked);
    return $obj;
  }
}