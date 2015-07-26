<?php  require_once("Base.php"); ?>
<?php
/* <!--  под-элемент table->TR --> */
class TableRow extends Element {
  // личные свойства поля загрузки файлов
  //protected $tag = "tr";
  
  // только td/th - элементы таблицы исключительно
  protected $cols = null;

  public function __construct ($name = null, $owner = null, $cols = null) 
  {
    parent::__construct($name, $owner);
    $this->tag = "tr";
  }

  // get | set
  public function getCols() { return $this->cols; }

  public function setCols($items) { $this->cols = $items; }  
  public function addCol($item) { $this->cols[] = $item; }
  
  public function itemsOut() { 
    return (($this->cols !== null) ?(writeControls($this->cols)) :"");
  }
  
  static public function createTableRow
                        ($name = null, $owner = null, $cols = null) 
  {
    $tmp = new TableRow($name, $owner, $cols);
    return $tmp;
  }
}
