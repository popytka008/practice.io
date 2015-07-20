<?php require_once("include.php") ?>
<?php require_once("classConnection.php") ?>
<?php
$table_name = "books.t3";

$c = Connection::getConnection();
$c->connect();

// запросы в БД
$q = "describe {$table_name};";
$r = mysql_query($q);
// количество строк в ответе
$length = mysql_num_rows($r);

// вывод заголовка
$table = new Table(null, null, "Таблица №1. Результат запроса: \"describe {$table_name}\"");
$tr = new TableRow();
//print_r($table);
for($i = 0; $i < $length; $i++) {
  if($row = mysql_fetch_array($r, MYSQL_NUM)) {
    //echo $row[0] ."<br />\n";
    $th = new TableDataHeader(null,null,$row[0]);
    $tr->addCol($th);
  }
}
$table->addRow($tr);

// вывод данных
$q = "select * from {$table_name};";
$r = mysql_query($q);
$r_length = mysql_num_rows($r);
for($i = 0; $i < $r_length; $i++) {  
  if($row = mysql_fetch_array($r, MYSQL_NUM)) {
    $tr = new TableRow();
    for($j = 0; $j < $length; $j++) {
      $td = new TableData();
      $td->addText($row[$j]);
      $tr->addCol($td);
    }
    $table->addRow($tr);
  }
}
echo $table->toString();

// закрытие соединения
$c->close();

?>