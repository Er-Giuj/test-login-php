<?php



// richiesto il file per la connessione al database
// include_once "../model/config.model.php";
// include 'db.model.php';
// include 'model/db.model.php';
// ..\model\db.model.php
// print_r($_SESSION['connessione']);
include '../model/db.model.php';

class User{
    private $db;

    function __construct(){
        $this->db = new DB();
        // var_dump($connessione);
    }
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
    private function checkInfoUser():bool{
        
        $users = $this->getAllUser();
   
        if ($users->num_rows > 0) {

            $rows = $users->fetch_all(MYSQLI_ASSOC); // ???

            // Itera attraverso ogni riga dell'array
            foreach ($rows as $row) {
                (isset($row['email'])) ? "\n Email esiste dentro alla riga di risposta del server" : "La email non esiste come campo";
                (isset($row['pwd'])) ? "\n Password esiste dentro alla riga di risposta del server" : "La password non esiste come campo";
                print_r($_POST);
                // Visualizza i dati di ogni riga
                if($row['pwd'] === $_POST['password'] && $row['email'] === $_POST['email']  && $row['active'] == 1){
                    echo "\n"."Account Trovato";
                    echo "\n"."Trasferimento Logged Page";
                    $this->saveInfoInSession($row);
                    // include '../index.php';
                    // header('../view/homepage.php');
                    return true;
                }else{
                    echo "\n"."Account non trovato.";
                    // header("Location: ./login.php");
                    // include '../view/login.php';
                    return false;
                }
                // var_dump($row);
            }

        } else {
            echo "Nessun risultato trovato.";
            return false;
        };
    }
    private function saveInfoInSession($row){
        $_SESSION['id'] =  $row['id'];
        // $_SESSION['active'] =  $row['active']; commentata perchè non importa come informazione e quindi puoi anche non salvarla
        $_SESSION['name'] =  $row['name'];
        $_SESSION['surname'] =  $row['surname'];
        $_SESSION['username'] =  $row['username'];
        $_SESSION['pwd'] =  $row['pwd'];
        $_SESSION['date'] =  $row['date'];
        $_SESSION['email'] =  $row['email'];
        // print_r($_SESSION);
    }

}   

