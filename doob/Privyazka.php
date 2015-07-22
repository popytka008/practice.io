<?php// создать класс привязки данных к элементу
abstract class Privyazka {
  private $item; // элемент управления на странице HTML
  private $data; // данные, которые привязываются к {item}
  
  abstract public function vozmiItem();  // получить {item}
  abstract public function vozmiData();  // получить {data}
    
  abstract public function zadaiItem();  // задать {item}
  abstract public function zadaiData();  // задать {data}
  
  
  abstract public function Privyazal();// привязать {item} и {data}
  abstract public function kakStroka(); // вывод результата привязки
  
  public function __construct($item = null, $data = null){
    $this->item = $item;
    $this->data = $data;
  }
}
?>
