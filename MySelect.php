<?php

/**
 * Class MySelect пользвательский элемент,
 * переопределен для игры с источниками данных
 *
 */
class MySelect extends Combobox {
  public function __construct($name = null, $owner = null,
                              $options = null, $filename = null)
  {
    parent::__construct($name, $owner, $options);
    $this->setIstok($filename);
  }


  /**
   * Переопределенный метод
   * для развертывания пользовательсткого элемента управления
   *
   */
  public function razvertka()
  {
    $this->options = null;

    // массив с строками таблицы "Little"
    $rows = $this->istok["rows"];

    // распишем эти данные так как нам хочется
    // ведь этот элемент наш личный,
    // можем его уродовать как хотим. ВИВАТ ООП!!..

    // пусть value => value, caption => text
    while($row = mysql_fetch_array($rows, MYSQL_NUM)){
      $value = $row[1];
      $text = $row[2];
      $option = new Option(null, null, $text, $value);
      $this->addOption($option);
    }
  }
}