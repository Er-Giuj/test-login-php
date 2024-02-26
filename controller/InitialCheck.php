<?php
// inizio della sessione
  session_start();
  include "../controller/login.controller.php";
  $controller = new User();
  // controlla se la sessione corrisponde ad un utente loggato sul browser
  $controller->checkIfLoggedInPublic();
  