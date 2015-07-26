<?php  require_once("Base.php"); ?>

<?php
/* <!--  текстовый элемент InnerText в блочном и любом другом блоке --> */
class TextNode extends Element {
  // личные свойства поля загрузки файлов
  protected $span;
  
  public function __construct ($name = null, $owner = null, 
                  $text = "Text node content", $span =  Cons::NO) 
  {
    parent::__construct($name, $owner);
    $this->text = $text;
    $this->span = $span;
  }

  // get | set
  public function setSpan($span = Cons::YES) { 
      $this->span = $span;
    
    if($this->span === Cons::YES) {
      $this->tag = "span";
    }
    else
    {
      $this->tag = "";
    }
  }

  static public function createTextNode($name = null, $owner = null, 
                  $text = "Text node content", $span =  Cons::NO) 
  {
    $tmp = new TextNode($name, $owner, $text, $span);
    return $tmp;
  }
}
