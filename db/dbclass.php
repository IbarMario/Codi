<?php
class db extends PDO {
   
    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;
   
    public function __construct(){
        $this->engine = 'mysql';
        $this->host = 'localhost';
        $this->database = 'codice';
        $this->user = 'codice';
        $this->pass = 'C0d1c3#2017#';
        $dns = $this->engine.':dbname='.$this->database.";host=".$this->host;
        parent::__construct( $dns, $this->user, $this->pass );
    }
}
?>
