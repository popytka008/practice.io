<?php  require_once("Base.php"); ?>
<?php
/* <!--  картинка IMAGE --> */
class Image extends Element {
  // личные свойства текстового поля  
  protected $src;
  protected $alt;

  public function __construct 
                          ($name = null, $owner = null, 
                          $src = "здесь будет адрес рисунка", 
                          $alt = "текст вместо рисунка", 
                          $title = "комментарий о рисунке") 
  {
    parent::__construct($name, $owner);
    $this->tag = "img";
    $this->doubleTag = Cons::NO;
    
    $this->title = $title;
    $this->alt   = $alt;
    $this->src   = $src;
  }

  // get | set
  public function getAlt() { return $this->alt; }
  public function getSrc() { return $this->src; }

  public function setSrc($src) { $this->src = $src; }
  public function setAlt($alt) { $this->alt = $alt; }

  public function getProps() {
    $props = parent::getProps();
    $props .= (($this->src == "") ?"" : " src='{$this->src}'");
    $props .= (($this->alt == "") ?"" : " alt='{$this->alt}'");

    return $props;
  }

    
  static public function createImage
  ($name = null, $owner = null, 
                          $src = "здесь будет адрес рисунка", 
                          $alt = "текст вместо рисунка", 
                          $title = "комментарий о рисунке") 
  {
    $tmp = new Image($name, $owner, $src, $alt, $title);
    return $tmp;
  }
}
?>
