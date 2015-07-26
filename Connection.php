<?php
class Connection {
  public $server;
  public $username;
  public $password;
  public $db;
  static public $connection = null;
  
  public function __construct() 
  {
    $this->init();
  }
  
  public function init(){
    
    $h = fopen('data/server.data', 'r');
    while(!feof($h)) 
    {
      $content = fgets($h);      
      // определить установки в строке
      $data = explode (" ", $content, 2);
      
      switch ($data[0]) 
      {
        case "server"  : $this->server = trim((string)$data[1]);
                  break;
        case "username": $this->username = trim((string)$data[1]);
                  break;
        case "password": $this->password = trim((string)$data[1]);
                  break;
        case "db": $this->db = trim((string)$data[1]);
                  break;
      } //end switch
    }   //end while 
    
    if($h) fclose($h);
  }
  
  public function connect(){
    if(!self::$connection)
      self::$connection = mysql_connect($this->server, $this->username, $this->password);
    mysql_select_db($this->db);
  }

  public function open(){
    $this->connect();
  }
  
  static public function getConnection () { 
    $c = new Connection();
    $c->connect();
    return $c;
  }
  
  public function close(){
    if(self::$connection)
      mysql_close(self::$connection);
  } 
}
