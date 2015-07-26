<?php
require_once("Little.php");
require_once("Creator.php");
?>
<?php
/*********************
 *  Создаю класс помощник
 *  для изъятия источника
 *  данных по подключению
 *********************/
class DBHelper {
  // Соединение
  protected $connection;
  protected $istokTab;
  protected $istokBody;

  protected $table;
  protected $cols;
  protected $name;

  /**
   * @param $connection Connection подключение к БД
   */
  public function __construct($connection){
    $this->connection = $connection;
    $this->table = Little::$table;
    $this->cols = Little::$cols;
    $this->name = Little::$name;

    //$this->test();
  }

  function test() {
    print_r($this->table); echo PHP_EOL;
    print_r($this->cols);  echo PHP_EOL;
    print_r($this->name);  echo PHP_EOL;
  }

    /**
   * @return array 1-й: имена колонок, 2-й: свойтва истока
   */
  public function istok() {
    $queryTab = "describe ". $this->table . ";";

    $queryCols = "select ";
    $i= 0;
    foreach($this->cols as $name){
      $queryCols .= $name;
      $queryCols .= ($i++ != count($this->cols)-1) ? ", " :"";
    }
    $queryCols .= " from " . $this->table . ";";
/*
    {
      print_r($queryTab); echo PHP_EOL;
      print_r($queryCols);echo PHP_EOL;
    }
*/
    $this->istokTab = mysql_query($queryTab);
    $this->istokBody= mysql_query($queryCols);

    return array("name" => $this->name, "colnames" => $this->istokTab, "colvalues" => $this->istokBody);
  }

  static public function getIstok($connection){
    $h = new DBHelper($connection);
    $istok = $h->istok();
    return $istok;
  }
}