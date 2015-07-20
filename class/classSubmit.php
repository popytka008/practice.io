<?php  require_once("classInput.php"); ?>
<?php
/* <!--  кнопка SUBMIT  --> */
class Submit extends Input {
  // личные свойства текстового поля

  public function __construct ($name = null, $owner = null, $value = "Отправить данные") {
    parent::__construct($name, $owner, $value);

    $this->type = "submit";
  }
}
?>
