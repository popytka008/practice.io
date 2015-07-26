<?php  require_once("Input.php"); ?>
<?php
/* <!--  кнопка BUTTON  --> */
class Button extends Input {
  // личные свойства текстового поля
  
  public function __construct ($name = null, $owner = null, $value = "Нажми меня") {
    parent::__construct($name, $owner, $value);
    $this->type = "button";
  }

  // get | set
  
  // статическое создание элемента
  static public function createButton($name = null, $owner = null, $value = "Нажми меня"){
    $btn = new Button($name, $owner , $value);
    return $btn;
  }
}
