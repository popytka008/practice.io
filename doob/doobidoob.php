<?php  require_once("Privyazka.php"); ?>
<?php
class Doob {
  
}
?> 
<?php// создать класс привязки данных к элементу
abstract class Privyazka {
  private $item; // элемент управления на странице HTML
  private $data; // данные, которые привязываются к {item}
  
  abstract public function vozmiItem();  // получить {item}
  abstract public function vozmiData();  // получить {data}
    
  abstract public function zadaiItem($item);  // задать {item}
  abstract public function zadaiData($data);  // задать {data}
  
  
  abstract public function Privyazal();// привязать {item} и {data}
  abstract public function kakStroka(); // вывод результата привязки
  
  abstract public function __construct($item = null, $data = null){
    $this->item = $item;
    $this->data = $data;
  }
}
?>
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
  
  
  abstract public function Privyazal();// привязать {item} и {data}
  abstract public function kakStroka(); // вывод результата привязки
  
  abstract public function __construct($item = null, $data = null){
    parent::__construct($item, $data)
  }
}
?>
