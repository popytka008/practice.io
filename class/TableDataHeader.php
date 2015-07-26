<?php  require_once("Base.php"); ?>
<?php
/* <!--  под-элемент table->tr->TD --> */
class TableDataHeader extends Element {
  // личные свойства поля загрузки файлов

  public function __construct ($name = null, $owner = null, $text = null) 
  {
    parent::__construct($name, $owner);	
    
    $this->tag = "th";
    $this->text = $text;
  }

  // get | set
  
  public function write() {
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
    
    return ("<{$this->tag}{$atr}>{$this->text}</{$this->tag}>");

  }
  
  static public function createTableDataHeader
                      ($name = null, $owner = null, $text = null)   
  {
    $tmp = new TableDataHeader($name, $owner, $text);
    return $tmp;
  }
}

