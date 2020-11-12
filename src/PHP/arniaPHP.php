<?php 
session_start();
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['luogo'])){
        $luogo = test_input($_POST['luogo']);
    } 
    if(isset($_POST['color'])){
        $color = test_input($_POST['color']);
    }
    if(isset($_POST['annoRegina'])){
        $annoRegina = test_input($_POST['annoRegina']);
        echo $annoRegina . "SUS" . "<br>";
    }
    if(isset($_POST['note'])){
        $note = test_input($_POST['note']);
    }
    if(isset($_POST['abitata'])){
        $abitata = test_input($_POST['abitata']);
    }
    include "connectionMYSQL.php";
    
    //ricavo l'id
    $sqlGetIdUser = "SELECT id FROM utente
    WHERE nome_utente = ?";
    $stmt = $conn->prepare($sqlGetIdUser);
    $stmt->bind_param("s", $_SESSION["nameUser"]);
    $stmt->execute();
    $stmt->bind_result($id);
    $stmt->fetch();
    $stmt->close();

    //aggiungere regina per l'utente
    if($annoRegina != "" && isset($_SESSION['nameUser'])){
        include "reginaPHP.php";
    }

    //aggiunta luogo
    if($luogo != "" && isset($_SESSION['nameUser'])){
        include "luogoPHP.php";
    }
    if($abitata != ""){
        if($luogo != "" && $color != "" && $annoRegina != "" && $note != ""){
            $sql = "INSERT INTO arnia(colore, testo, abitata, id_regina, id_utente, id_luogo)
                    VALUES (?, ?, ?, ?,)";
        }
    }
}
?>