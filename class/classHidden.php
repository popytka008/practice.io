<?php  require_once("classInput.php"); ?>
<?php
/* <!--  элемент формы input->HIDDEN  --> */
class Hidden extends Input {
    // личные свойства поля загрузки файлов

    public function __construct ($name = "MyName", $owner = null, $value = "Какое-то скрытое значение для работы") {
        parent::__construct($name, $owner, $value);
        $this->type = "hidden";
    }

    // get | set

    public function addValue($value) { $this->value .= $value; }

    static public function createHidden($name, $value = "Какое-то скрытое значение для работы"){
        $tmp = new Hidden($name, null, $value);
        return $tmp;
    }
}
?>
