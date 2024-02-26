<?php 
// inizializzazione sessione
session_start();
include "../controller/login.controller.php";
// instanza oggetto user 
$user = new User();
// fa il logout dell'account + reindirizzameto alla homepage
$user->logoutPublic();

// unset($_SESSION);
// // $_SESSION['logged_in']; 
// setcookie("PHPSESSID","", time() -3600,"/");
// // echo "\n Logout effettuato,<a href=\"homepage.php\">Homepage</a>";
// header("Location: ./homepage.php");



