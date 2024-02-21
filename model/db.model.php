<?php

include 'config.model.php';


class DB{
    // proprietà
    private $connessione;

    function __construct() {
        $this->connessione = null;
    }
    // metodi 
    private function connect(){
        try{
            $this->connessione = new PDO("mysql:host=localhost:3306;dbname=test","root","");
        }catch(Exception $e){ // Exception ?? da vedere
            echo "Si è verificato un'eccezione durante la connessione: ". $e->getMessage();
        }
        return $this->connessione;
    }
    private function users(){
        try{
            $sql = $this->connessione->query("SELECT * FROM your_table");
            $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Si è verificato un'eccezione durante la connessione: ". $e->getMessage();
        };
        var_dump($rows);
    }
    function getUsers(){
        $this->users();
    }
    function getConnection(){
        $this->connect();
    }    

}