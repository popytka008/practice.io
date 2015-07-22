<?php  require_once("Pomosnik.php"); ?>
<?php  require_once("classConnection.php"); ?>
<?php// создать класс привязки данных к элементу
abstract class Doob {
  private $item; // элемент управления на странице HTML
  private $data; // данные, которые привязываются к {item}
  
  abstract public function doobidoob();  // реализовать {item}
  
  public function __construct($item = null, $data = null){
    $this->item = $item;
    $this->data = $data;
  }
}
?>
