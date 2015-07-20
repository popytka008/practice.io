<?php  require_once("classRadio.php"); ?>
<?php
/* <!--  кнопка Checkbox  --> */
class Checkbox extends Radio {
    // личные свойства текстового поля
	
  public function __construct ($name = null, $owner = null, $value = null, $checked = Cons::NO) {
    parent::__construct($name, $owner, $value);
    $this->type = "checkbox";
    $this->checked = $checked;
  }

    // get | set

}
?>