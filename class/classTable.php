<?php  require_once("classBase.php"); ?>
<?php
/* <!--  супер-элемент TABLE --> */
class Table extends Element {
  // личные свойства 
  protected $caption;
  protected $summary;
  
  protected $rows;  

  public function __construct ($name = null, $owner = null,
                              $caption = null, $rows = null) 
  {
    parent::__construct($name, $owner);
    
    $this->tag = "table";
    $this->summary = $this->caption = $caption;    
    $this->rows = $rows;
  }

  // get | set
  public function getCaption() { return $this->caption; }
  public function getRows() { return $this->rows; }

  public function setCaption($caption) { $this->summary = $this->caption = $caption; }
  public function setRows($rows) { $this->rows = $rows; }  
  public function addRow($item) { $this->rows[] = $item; }
  
  public function getProps() {
    $props  = (($this->summary == "") ?"" : " summary='{$this->summary}'");

    return $props;
  }
  
  public function itemsOut() { 
    return (($this->rows !== null) ?(writeControls($this->rows)) :"");
  }

  public function write() {
//  echo "IN WRITE() ATR";
    $atr = "";
    $atr .= ($this->getID() == "") ?"" : " id='{$this->getID()}'";
    $atr .= ($this->getName() == "") ?"" : " name='{$this->getName()}'";
    $atr .= ($this->getStyle() == "") ?"" : " style='{$this->getStyle()}'";
    $atr .= ($this->getClass() == "") ?"" : " style='{$this->getClass()}'";
    $atr .= ($this->getTitle() == "") ?"" : " title='{$this->getTitle()}'";
    $atr .= $this->getProps();

    $atr .= ($this->onBlur == "") ?"" : " onBlur='{$this->onBlur}'";
    $atr .= ($this->onChange == "") ?"" : " onChange='{$this->onChange}'";
    $atr .= ($this->onFocus == "") ?"" : " onFocus='{$this->onFocus}'";
    $atr .= ($this->onSelect == "") ?"" : " onSelect='{$this->onSelect}'";
    $atr .= ($this->onClick == "") ?"" : " onClick='{$this->onClick}'";
    
    $caption = "";
    $caption .= ($this->caption == "") ?"" : "<caption>{$this->caption}</caption>\n";
    
    $rows = $this->itemsOut();
    
    return ("<{$this->tag}{$atr}>\n{$caption}{$rows}</{$this->tag}>");
  }
  
  static public function createTable($name = null, $owner = null,
                                    $caption = null, $rows = null) 
  {
    $tmp = new Table($name, $owner, $caption, $rows);
    return $tmp;
  }
}
?>
