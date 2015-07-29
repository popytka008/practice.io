<?php
require_once("include.php");
?>
<?php

$razvertka = Configurator::obraz();
$one = '{razvertka}';
$two = str_replace($one, $razvertka, $main);
//print_r($two);
echo $two;



