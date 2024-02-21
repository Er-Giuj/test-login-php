<?php


// define('HOST','localhost:3306');
// define('USER','root');
// define('PASSWORD','');
// define('DB_NAME','test');
$host="127.0.0.1";
$user="root";
$password="";
$db="test";

$connessione = new mysqli($host,$user,$password,$db);

if ($connessione->connect_error) {
    die("Errore durante la connessione ". $connessione->connect_error);
}

