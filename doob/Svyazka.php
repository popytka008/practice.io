<?php  require_once("Privyazka.php"); ?>
<?php// создать класс привязки данных к элементу
class Svyazka extends Privyazka {
  // получить {item}
  public function vozmiItem(){
    return $this->item;
  }
  // получить {data}
  public function vozmiData(){
      return $this->data;
  }
  // задать {item}
  public function zadaiItem($item){
    $this->item = $item;
  }
  // задать {data}
  public function zadaiData($data){
    $this->data = $data;
  }

  // привязать {item} и {data}
  // создать соединение и изъять данные
  // подготовить объединение {data} в {item}.
  public function Privyazal(){
    $doob = new Doob($this->item, $this->data);
    return $doob->Doobodoob();
  }
  
  abstract public function kakStroka(); // вывод результата привязки
  
  public function __construct($item = null, $data = null){
    parent::__construct($item, $data)
  }
}
?>
