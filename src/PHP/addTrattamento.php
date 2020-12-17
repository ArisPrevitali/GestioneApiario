<?php
//Funzione per ripulire i dati in input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

include "connectionMYSQL.php";

//ricavo l'id dell'utente
include "getUtenteLog.php";

if(isset($_GET['id'])){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = (int)$_GET['id'];
        $data_inizio = (string)test_input($_POST['data_inizio']);
        $data_fine = (string)test_input($_POST['data_fine']);
        $testo = test_input($_POST['testo']);
        $sql = "INSERT INTO trattamento(data_inizio, data_fine, testo, id_arnia)
                VALUES (?,?,?,?)";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssi', $data_inizio, $data_fine, $testo, $id);
        $stmt->execute();
        header('location: ../home.php');
    }
}