<?php



// richiesto il file per la connessione al database
// include_once "../model/config.model.php";
// include 'db.model.php';
// include 'model/db.model.php';
// ..\model\db.model.php
// print_r($_SESSION['connessione']);
require '../model/db.model.php';

class User{
    private $db;

    function __construct(){
        $this->db = new DB();
        // var_dump($connessione);
    }
    // prende tutte le info dei utenti dal db
    private function getAllUser():mysqli_result{
        // connessione al db
        $conn = $this->db->connectPublic();
        // instanza della sql statment 
        $sql ="SELECT * FROM user";
        // fetch della sql che viene inviata al db tramite la connessione creata prima
        $result = $conn->query($sql);
        // print_r($result);
        return $result;
    }
    function getAllUserPublic():mysqli_result{
        return $this->getAllUser();
    }
    function checkInfoUserPublic():bool{
        return $this->checkInfoUser();
    }
    private function setError(){
        header("Location: ../view/login.php?error");
        exit();
    }
    function setErrorPublic(){
        $this->setError();
    }
    // controlla se le informazioni passate dalla pagina login.php(=action) esistono sul db e ritorna true o false 
    private function checkInfoUser():bool{
        
        $users = $this->getAllUser();
   
        if ($users->num_rows > 0) {

            $rows = $users->fetch_all(MYSQLI_ASSOC); // ???

            // Itera attraverso ogni riga dell'array
            foreach ($rows as $row) {
                (isset($row['email'])) ? "\n Email esiste dentro alla riga di risposta del server" : "La email non esiste come campo";
                (isset($row['pwd'])) ? "\n Password esiste dentro alla riga di risposta del server" : "La password non esiste come campo";
                // print_r($_POST);
                // Visualizza i dati di ogni riga
                if($row['pwd'] === $_POST['password'] && $row['email'] === $_POST['email']  && $row['active'] == 1){
                    echo "\n"."Account Trovato";
                    echo "\n"."Trasferimento Logged Page";
                    $_SESSION['email']="email a cazzo";
                    $this->saveInfoInSession($row);
                    // include '../index.php';
                    // header('../view/homepage.php');
                    // print_r($rows);
                    return true || false;
                }else{
                    echo "\n"."Account non trovato.";
                    // header("Location: ./login.php");
                    // include '../view/login.php';
                    return false;
                }
                
            }
            return true;
        } else {
            echo "Nessun risultato trovato.";
            return false;
        };
    }
    // reiderizza in base a dove si è alla homepage
    private function redirectToHome(){
        header("Location: ../view/homepage.php");
    }    
    function redirectToHomePublic(){
        $this->redirectToHome();
    }
    // funzione per il Logout dell'utente
    private function logout(){
        unset($_SESSION);
        // $_SESSION['logged_in']; 
        setcookie("PHPSESSID","", time() -3600,"/");
        // echo "\n Logout effettuato,<a href=\"homepage.php\">Homepage</a>";
        $this->redirectToHome();
    }
    function logoutPublic(){
        $this->logout();
    }
    // controlla se l'utente è loggato o meno
    private function checkIfLoggedIn():bool{
        if(!isset($_COOKIE['PHPSESSID'])){
            // $lifetime=600;
            // session_set_cookie_params($lifetime);
            if(!isset($_SESSION['logged_in'])){
              $_SESSION['logged_in'] = false;
            };
            // echo "\n Sessione avviata,instanziata variabie logge_in fatta";
            return true;
            
        }else{
            return false;
        }
    }
    function checkIfLoggedInPublic():bool{
        return $this->checkIfLoggedIn();
    }
    // salva le info dell'user loggato dentro alla variabile $_SESSION
    private function saveInfoInSession($row){
        
        $_SESSION['id_user'] =  $row['id'];
        // $_SESSION['active'] =  $row['active']; commentata perchè non importa come informazione e quindi puoi anche non salvarla
        $_SESSION['name'] =  $row['name'];
        $_SESSION['surname'] =  $row['surname'];
        $_SESSION['username'] =  $row['username'];
        $_SESSION['pwd'] =  $row['pwd'];
        $_SESSION['date'] =  $row['date'];
        $_SESSION['email'] =  $row['email'];
        $_SESSION['logged_in'] = true;
        // print_r($_SESSION);
        echo "\n"."Info salvate nella session";
        // print_r($_SESSION);
    }

}   

