<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 27.07.15
 * Time: 21:18
 */

class Istocnik {

  protected $all;
  protected $c;
  protected $filename;

  public function __construct($filename = 'data/element.data'){
    $this->all = array("table"=>"", "columns"=>array());
    $this->c = Connection::getConnection();
    $this->filename = $filename;
  }
  /**
   *Создание источников данных из файла с настройкой изъятия данных
   */
  public function init(){
    // открыть файл с установками для элемента.
    $h = fopen($this->filename, 'r');
    $all = &$this->all;

    // выбрать данные
    while(!feof($h))
    {
      $str = fgets($h);
      // определить установки в строке
      $data = explode (" ", $str);

      switch ($data[0])
      {
        case "table"  :
        {
          $all["table"] = trim((string)$data[1]);
        }
          break;
        case "columns":
          for($i = 1; $i<count($data); $i++) {
            $all["columns"][] = trim((string)$data[$i]);
          }
      } //end switch
    }   //end while

    if($h) fclose($h);
  }

  /**
   * используя подключение, определяет пару источников данных
   * @return array возвращает ["columns"] - содержит имена столбцов,
   * ["rows"] => строки таблицы
   */
  public function istok() {
    $all = &$this->all;

    $queryCols = "describe ". $all["table"] . ";";

    $queryRows= "select ";
    $i= 0;
    foreach($all["columns"] as $col){
      $queryRows .= $col;
      $queryRows .= ($i++ != count($all["columns"])-1) ? ", " :"";
    }
    $queryRows .= " from " . $all["table"] . ";";
    /*
      {
        print_r($queryTab); echo PHP_EOL;
        print_r($queryCols);echo PHP_EOL;
      }
    */
    $columns = mysql_query($queryCols);
    $rows = mysql_query($queryRows);

    return array("columns" => $columns, "rows" => $rows);
  }

  static public function verniIstok($filename = null){
    if($filename === null) return null;

    $sv = new Istocnik($filename);
    $sv->init();
    return $sv->istok();
  }
}