<?php  require_once("Base.php"); ?>
<!--
id, css, cls
type, name
-->
<?php
class Textarea extends Element {
  // личные свойства текстового поля
    protected $cols;
    protected $rows;
    protected $wrap;

  public function __construct 
    ($name = null, $owner = null, $cols = "35", $rows = "5" , 
     $wrap = Cons::VIRT, $text = null) 
  {
    parent::__construct($name, $owner);
    
    $this->text = $text;
    $this->cols = $cols;
    $this->rows = $rows;
    $this->wrap = $wrap;
    
    $this->tag = "textarea";
  }

  // get | set
  public function getCols() { return $this->cols; }
  public function getRows() { return $this->rows; }

  public function setCols($cols) { $this->cols = $cols; }
  public function setRows($rows) { $this->rows = $rows; }
  public function setWrap($wrap = Cons::OFF) { $this->wrap = $wrap; }

  // добавленные свойства
  public function getProps() {
    $props  = (($this->cols == "") ?"" : " cols='{$this->cols}'");
    $props .= (($this->rows == "") ?"" : " rows='{$this->rows}'");
    $props .= (($this->wrap == "") ?"" : " wrap='{$this->wrap}'");

    return $props;
  }

  static public function createTextarea
    ($name = null, $owner = null, $cols = "35", $rows = "5" , 
     $wrap = Cons::VIRT, $text = null) 
  {
    $tmp = new InputImage($name, $owner, $cols, $rows, $wrap, $text);
    return $tmp;
  }
}
