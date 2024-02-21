<?php

// inizio della sessione
session_start();

// richiesto il file per la connessione al database
include_once("..\model\db.model.php");
// ..\model\db.model.php

if(isset($_SESSION["user"])){
    echo "\n"."La sessione user esiste!";
}else{
    echo "\n"."La sessione user non esiste!";
}

class Login {};