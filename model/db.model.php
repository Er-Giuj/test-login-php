<?php

include 'config.model.php';

class DB{
    // proprietà
    private $connessione;
    function __construct() {
    }
    // metodi 
    private function connect(){
        // se session_start() è = 1 --> vuol dire che la sessione già esiste

            try{
                $this->connessione = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
                if ($this->connessione->connect_error) {
                    die("Errore durante la connessione ". $this->connessione->connect_error);
                }
                return $this->connessione;
            }catch(Exception $e){ // Exception ?? da vedere
                echo "Si è verificato un'eccezione durante la connessione: ". $e->getMessage();
                
            }
        }
    
    // private function getUser(){
    //     $sql = "SELECT * FROM user";
    //     $this->connectPublic();
    //     $result = mysqli_query($this->connessione,$sql);
    //     print_r($result);
    // }
    function connectPublic(){
        return $this->connect();
    }
      

}