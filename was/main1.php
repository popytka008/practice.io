<?php
require_once("include.php");
?>
<?php
$select = new MySelect('MySelect', null, null, 'data/element.data');
$list = new MyList("MyList",null,Cons::YES, 'data/element.data');

//print_r($select);
$str =str_replace("{MySelect}", $select->toString(), $main);
$str =str_replace("{MyList}", $list->toString(), $str);
echo $str;

