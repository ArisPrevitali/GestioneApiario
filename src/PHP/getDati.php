<?php
include "connectionMYSQL.php";
$arrayresult = array();
$sql = "SELECT * FROM arnia
        WHERE id_utente = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_utente);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()){
    //print_r($row);
    $arrayresult[] = $row;        
}
$_SESSION['datiArnia'] = $arrayresult;
$stmt->close();
?>