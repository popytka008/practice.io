<?php require_once("../include.php") ?>
<?php
class Pomosnik {
  const VYPAD = "VYPAD";      // {select }->item
  const VYBOR = "VYBOR";      // {select#multi}->item
  const TEXT = "TEXT";        // input #text
  const PAROL = "PAROL";      // input #password
  const FLAG = "FLAG";        // input #checkbox
  const RADIO = "RADIO";      // input #radio
  const NEVID = "NEVID";      // input #hidden

  const TAREA = "TAREA";      // textarea
  
  const SPISOK = "SPISOK";    // {ol/ul}->li
  const TAB = "TAB";          // table->tr->{th/td}
  
  
  static public function getItem($tag) {
    switch($tag) {
      case VYPAD:   return new Select();
                    break;
      case VYBOR:   return new Select();
                    break;
      case TEXT:    return new TextField();
                    break;
      case PAROL:   return new PwdField();
                    break;
      case FLAG:    return new Checkbox();
                    break;
      case RADIO:   return new Radio();
                    break;
      case NEVID:   return new Hidden();
                    break;
      case TAREA:   return new Textarea();
                    break;
      case SPISOK:  return new OrderList();
                    break;
      case TAB:     return new Table();
                    break;
    }
  }

}
?>