<?php  require_once("Input.php"); ?>
<?php
/* <!--  кнопка INPUT->IMAGE           --> */
class InputImage extends Input {
  // личные свойства текстового поля
  protected $src;
  protected $alt;

  public function __construct 
    ($name = null, $owner = null, 
     $src = "здесь будет адрес рисунка", 
     $alt = "текст вместо рисунка" , 
     $title = "комментарий о рисунке") 
  {
    parent::__construct($name, $owner);
    $this->type = "image";
    
    $this->title = $title;
    $this->alt   = $alt;
    $this->src   = $src;
  }

  // get | set
  public function getAlt() { return $this->alt; }
  public function getSrc() { return $this->src; }

  public function setSrc($src) { $this->src = $src; }
  public function setAlt($alt) { $this->alt = $alt; }

  // добавленные свойства
  public function getProps() {
    $props = parent::getProps();
    $props .= (($this->src == "") ?"" : " src='{$this->src}'");
    $props .= (($this->alt == "") ?"" : " alt='{$this->alt}'");

    return $props;
  }

  static public function createInputImage
    ($name = null, $owner = null, 
     $src = "здесь будет адрес рисунка", 
     $alt = "здесь будет текст вместо рисунка" , 
     $title = "здесь всплывающее комментарий о рисунке") 
  {
    $tmp = new InputImage($name, $owner, $src, $alt, $title);
    return $tmp;
  }
}

