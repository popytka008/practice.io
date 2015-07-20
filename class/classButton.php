<?php  require_once("classInput.php"); ?>
<?php
/* <!--  кнопка BUTTON  --> */
class Button extends Input {
  // личные свойства текстового поля
  
  public function __construct ($name = null, $owner = null, $value = "Нажми меня") {
    parent::__construct($name, $owner, $value);
    $this->type = "button";
  }

  // get | set
  
  // добавленные свойства
}
?>
