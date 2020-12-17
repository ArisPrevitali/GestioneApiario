<?php
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
        $data = (string)test_input($_POST['data']);
        $testo = test_input($_POST['testo']);
        $sql = "INSERT INTO annotazione(data_ann, testo, id_arnia)
                VALUES (?,?,?)";
        echo $data. $testo. $id;
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssi', $data, $testo, $id);
        $stmt->execute();
        //header('location: ../home.php');
    }
}