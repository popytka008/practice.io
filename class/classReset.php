<?php  require_once("classInput.php"); ?>
<?php
/* <!--  кнопка RESET  --> */
class Reset extends Input {
  // личные свойства текстового поля
  
  public function __construct ($name = null, $owner = null, $value = "Восстановить данные") {
    parent::__construct($name, $owner, $value);
    $this->type = "reset";
  }

  // get | set
  
  // добавленные свойства
}
?>
