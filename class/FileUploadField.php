<?php  require_once("Input.php"); ?>
<?php
/* <!--  базовый класс элементов формы  --> */
class FileUploadField extends Input {
  // личные свойства поля загрузки файлов
  protected $size;
  protected $multiple;

  public function __construct ($name = "MyName", $owner = null, $m = Cons::NO) {
    parent::__construct($name, $owner, null);
    $this->type = "file";
    $this->multiple = $m;
  }

  // get | set
  public function getSize() { return $this->size; }
  public function getMultiple() { return $this->multiple; }

  public function setSize($size) { $this->size = $size; }
  public function setMultiple($m = Cons::YES) { $this->multiple = $m; }

  public function getProps() {
    $props = parent::getProps();
    
    $props .=  ($this->size == "") ?"" : " size='{$this->size}'"; 
    $props .=  ($this->multiple === Cons::NO)? "" :" multiple='true'";
    return $props;    
  }
}
?>

