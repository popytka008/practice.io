<?php  require_once("Privyazka.php"); ?>
<?php// создать класс привязки данных к элементу
class Svyazka extends Privyazka {
  protected $item;
  protected $data;
  
  // получить {item}
  public function vozmiTag(){
    return $this->tag;
  }
  // получить {query}
  public function vozmiData(){
      return $this->query;
  }
  // задать {tag}
  public function zadaiTag($tag){
    $this->tag = $tag;
  }
  // задать {query}
  public function zadaiData($query){
    $this->query = $query;
  }

  // привязать {tag} и {query}
  // создать соединение и изъять данные
  // подготовить объединение {data} в {tag}.
  public function Privyazal(){
    if($this->tag) {
      $this->item = Pomosnik::getItem($this->tag);
    }
    if($this->query) {
      $this->data = Doob::getData($this->query);
    }    
  }
  
  abstract public function kakStroka(); // вывод результата привязки
  
  public function __construct($item = null, $query = null){
    parent::__construct($item, $query);
  }
}
?>
