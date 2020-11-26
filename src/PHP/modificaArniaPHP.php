<?php 
session_start();
$arrayTable = array();
$datiArnia = array();
$_SESSION['datiArnia'] = $datiArnia;
include "connectionMYSQL.php";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$sqlGetIdUser = "SELECT id FROM utente
        WHERE nome_utente = ?";
$stmt = $conn->prepare($sqlGetIdUser);
$stmt->bind_param("s", $_SESSION["nameUser"]);
$stmt->execute();
$stmt->bind_result($id);
$stmt->fetch();
$stmt->close();


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
        header('location: ./../modificaArnia.php');
    }
}
$arrayresult = array();
$sql = "SELECT * FROM arnia
        WHERE id_utente = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()){
    //print_r($row);
    $arrayresult[] = $row;    
}
$_SESSION['datiArnia'] = $arrayresult;
$stmt->close();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
}
?>