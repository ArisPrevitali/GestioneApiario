<?php
include "connectionMYSQL.php";
$arrayDatiLog = array();
//Cerco l'utente loggato
include "getUtenteLog.php";

//Dati delle sue arnie
$sql = "SELECT id, nome_luogo, colore, testo FROM arnia
        WHERE id_utente = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_utente);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()){
    $arrayDatiLog[] = $row;
}
$_SESSION['datiLogHome'] = $arrayDatiLog;
$stmt->close();
?>