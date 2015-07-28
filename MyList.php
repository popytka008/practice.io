<?php

/**
 * Class MySelect пользвательский элемент,
 * переопределен для игры с источниками данных
 *
 */
class MyList extends OrderList {

  public function __construct ($name = null, $owner = null,
                               $order = Cons::YES, $filename)
  {
    parent::__construct($name, $owner, $order);
    $this->setIstok($filename);
  }


  /**
   * Переопределенный метод
   * для развертывания пользовательсткого элемента управления
   *
   */
  public function razvertka()
  {
    $this->listItems = null;

    // массив с строками таблицы "Little"
    $rows = $this->istok["rows"];

    // распишем эти данные так как нам хочется
    // ведь этот элемент наш личный,
    // можем его уродовать как хотим. ВИВАТ ООП!!..

    // пусть value => value, caption => text
    while($row = mysql_fetch_array($rows, MYSQL_NUM)){
      $text = $row[2];
      $li = new ListItem();
      $li->addText($text);
      $this->addListItem($li);
    }
  }
}