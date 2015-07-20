<?php  require_once("classTextField.php"); ?>
<?php
/* <!--  класс ПОЛЕ ЗАДАНИЯ ПАРОЛЯ <input type="password"> формы  --> */
class PwdField extends TextField {
  // личные свойства поля пароля
  public function __construct ($name = null, $owner = null, $value = null) {
    parent::__construct($name, $owner, $value);
    $this->type = "password";
    $this->value = "";
  }
}
?>