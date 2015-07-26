<?php
//require_once("/class/Creator.php");
class Little {
  // имя таблицы
  static public $table = "little";
  // имёна полей для связывания
  //static $cols = array ("value"=>"value", "caption"=>"caption");
  static public $cols = array ("id"=>"id","value"=>"value", "caption"=>"caption");

  static public $name = Creator::ORDERLIST;
}
