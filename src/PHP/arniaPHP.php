<?php 
session_start();
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $luogo = "";
    $luogoErr = false;
    $color = "";
    $annoRegina = date("Y-m-d");
    $annoReginaErr = false;
    $abitata = 0;
    $abitataErr = false;
    $note = "";
    $errorURL = "/errorArnia.php?";
    if($_POST['luogo'] !== ""){
        $luogo = test_input($_POST['luogo']);
    }else{
        $luogoErr = true;
        $errorURL .= "luogoErr=" . $luogoErr . "&";
    }
    if($_POST['color'] !== ""){
        $color = test_input($_POST['color']);
    }
    if($_POST['annoRegina'] !== ""){
        $annoRegina = test_input($_POST['annoRegina']);
    }else{
        $annoReginaErr = true;
        $errorURL .= "annoReginaErr=" . $annoReginaErr;
    }
    if($_POST['note'] !== ""){
        $note = test_input($_POST['note']);
    }
    if(isset($_POST['abitata'])){
        $abitata = test_input($_POST['abitata']);
        $abitata = 1;
    }else{
        $abitata = 0;
    }
    include "connectionMYSQL.php";
    
    //ricavo l'id dell'utente
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
        $annoRegina = date_create($annoRegina)->format('Y-m-d');
        $sql = "INSERT INTO regina(anno_nascita, id_utente)
                VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $annoRegina, $id);
        $stmt->execute();
        $stmt->close();
        $idRegina = $conn->insert_id;
    }

    //aggiunta luogo
    if($luogo != "" && isset($_SESSION['nameUser'])){
        //controllare se esiste già
        $sql = "REPLACE INTO luogo(luogo)
                VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $luogo);
        $stmt->execute();
        $stmt->close();
        echo $luogo . " ";
    }

    //aggiunta arnia
    if(isset($_SESSION['nameUser'])){
        if($luogo != "" && $annoRegina != "" && null !== $idRegina && null !== $luogo){
            $sql = "INSERT INTO arnia(colore, testo, abitata, id_regina, id_utente, nome_luogo)
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            echo $color . " " . $note . " " . $abitata . " " . $idRegina . " " . $id . " " . $luogo;
            $stmt->bind_param("ssiiis", $color, $note, $abitata, $idRegina, $id, $luogo);
            $stmt->execute();
            $stmt->close();
            if($conn->insert_id === false){
                echo $conn->error;
            }else{
                //header('location: ./../home.php');
                //aggiungere nella home la nuova arnia aggiunta
            }
        }
    }

    if($luogoErr || $annoReginaErr){
        header("location: $errorURL");
    }
}
?>