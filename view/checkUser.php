<?php 
/**
 * Pagina che serve per dare un feedback all'utente se l'utente esiste o meno,
 * se esiste ti porta alla pagina da loggato senno ti dice che c'è stato un problema e ti riporta alla login page.
 */
session_start();
include "../controller/InitialCheck.php";
    // $controller->checkIfLoggedInPublic();
    $controller->checkInfoUserPublic();
    // print_r($_SESSION);
    ($controller->checkInfoUserPublic() == false)? $controller->setErrorPublic(): $controller->redirectToHomePublic();
    
    



