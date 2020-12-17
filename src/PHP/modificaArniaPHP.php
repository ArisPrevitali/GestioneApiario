<?php 
session_start();
//Funzione per ripulire i dati in input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$arrayTable = array();
$datiArnia = array();
$datiModifica = array();
$_SESSION['datiArnia'] = $datiArnia;
$_SESSION['datiModifica'] = $datiModifica;
include "connectionMYSQL.php";

//ricavo id utente
include "getUtenteLog.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM arnia
            WHERE id = (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
        $datiModifica[] = $row;
    }
    print_r($datiModifica);
    $stmt->close();
    $_SESSION['datiModifica'] = $datiModifica;
    header("location: ../modificaArnia.php?modifica=ON");
}

//Ricavo le i nomi delle colonne della tabella 'arnia'
if(!isset($_SESSION['tableArnia'])){
    $sqlGetTable = "SELECT COLUMN_NAME
        FROM INFORMATION_SCHEMA.COLUMNS
        WHERE TABLE_SCHEMA='gestione_apiario' 
        AND TABLE_NAME='arnia'";
    $result = $conn->query($sqlGetTable);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $arrayTable[] = $row['COLUMN_NAME'];
        }
        $_SESSION['tableArnia'] = $arrayTable;
        header('location: /../modificaArnia.php');
    }
}
include "getDati.php";
?>