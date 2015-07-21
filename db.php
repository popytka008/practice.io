<?php require_once("include.php") ?>
<?php require_once("classConnection.php") ?>
<?php
$all_page = "";
//----- создание соединения --------
$c = Connection::getConnection();
$c->connect();
//---- Имя таблицы назначается -----
//---- необходимо опросить БД ------
//---- и задать селект->опшинс -----
$q = "show tables";
$r = mysql_query($q);
// селект
$select = new Select("tables", null);
$select->onChange = "document.forma.submit();";
// опшинс
while($row = mysql_fetch_array($r, MYSQL_NUM)){  
  $option = new Option("table", null, $row[0], $row[0]);
  $select->addOption($option);
}
$form = new Form("forma");
$form->addItem($select);
echo $form->toString().np();

/* поведение */
//print_r($form);
/* */
if(!isset($_GET["tables"]))
  return;


$table_name = $_GET["tables"][0];
//print_r($_GET["tables"]);
//print_r($table_name);
//----------------------------------

// запросы в БД
$q = "describe {$table_name};";
$r = mysql_query($q);
// количество строк в ответе
$length = mysql_num_rows($r);

// вывод заголовка
$table = new Table(null, null, "Таблица №1. Результат запроса: \"describe {$table_name}\"");
$tr = new TableRow();
//print_r($table);

while($row = mysql_fetch_array($r, MYSQL_NUM)){
  $th = new TableDataHeader(null,null,$row[0]);
  $tr->addCol($th);
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

// закрытие соединения
$c->close();

$all_page .= $table->toString();
echo $all_page;
?>