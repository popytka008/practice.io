<?php
class Creator {
  const COMBOBOX = "COMBOBOX";    // {select }->item        1
  const LISTBOX = "LISTBOX";      // {select#multi}->item   2
  const ORDERLIST = "ORDERLIST";  // {ol/ul}                3
  const LINK = "LINK";            // {a}
  const TABLE = "TABLE";          // table->tr->{th/td}
  const TEXTAREA = "TEXTAREA";    // textarea
  const TEXTNODE = "TEXTNODE";    // textnode               8

  const IMAGE = "IMAGE";          // input #image           9
  const BUTTON = "BUTTON";        // input #button
  const TEXT = "TEXT";            // input #text
  const FLAG = "FLAG";            // input #checkbox        12

  protected $name;

  public function __construct($name){
    $this->name = $name;
  }

  public function createObject() {
    switch($this->name) {
      case self::COMBOBOX:
        return new Combobox();
      case self::LISTBOX:
        return new Listbox();
      case self::ORDERLIST:
        return new OrderList();
      case self::LINK:
        return new Link();
      case self::TABLE:
        return new Table();
      case self::TEXTAREA:
        return new Textarea();
      case self::TEXTNODE:
        return new TextNode();
      case self::IMAGE:
        return new InputImage();
      case self::BUTTON:
        return new Button();
      case self::TEXT:
        return new TextField();
      case self::FLAG:
        return new Checkbox();
      default: return null;
    }
  }

  /**
   * @param $name string константа класса Creator
   * @return Button|Checkbox|Combobox|InputImage|Link|Listbox|null|OrderList|Table|Textarea|TextField|TextNode возвращает элемента управления
   */
  static public function getObject($name){
    $obj = new Creator($name);
    return $obj->createObject();
  }
}

