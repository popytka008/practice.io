<?php  require_once("Radio.php"); ?>
<?php
/* <!--  кнопка Checkbox  --> */
class Checkbox extends Radio {
    // личные свойства текстового поля
	
  public function __construct ($name = null, $owner = null, $value = null, $checked = Cons::NO) {
    parent::__construct($name, $owner, $value);
    $this->type = "checkbox";
    $this->checked = $checked;
  }

  // статическое создание элемента
  static public function createCheckbox($name = null, $owner = null, $value = null, $checked = Cons::NO) {
    $obj = new Radio($name, $owner , $value, $checked);
    return $obj;
  }

}
?>