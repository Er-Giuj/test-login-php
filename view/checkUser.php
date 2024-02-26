<?php 
/**
 * Pagina che serve per dare un feedback all'utente se l'utente esiste o meno,
 * se esiste ti porta alla pagina da loggato senno ti dice che c'è stato un problema e ti riporta alla login page.
 */
include '../controller/login.controller.php';
    // instanza dell'oggeto User
    $controller = new User();
    
    ($controller->checkInfoUserPublic() == false)?"\nQualcosa è andato storto":"\nT'apposto bro";
    if($controller->checkInfoUserPublic() == false){
        echo "<a href='./login.php'>Clicca qui per andare al login</a>";
    }else{
        echo "<a href='./homepage.php'>Clicca qui per andare alla homepage</a>";
    }
    



