<?php
include "connectionMYSQL.php";
$sqlGetIdUser = "SELECT id FROM utente
        WHERE nome_utente = ?";
$stmt = $conn->prepare($sqlGetIdUser);
$stmt->bind_param("s", $_SESSION["nameUser"]);
$stmt->execute();
$stmt->bind_result($id_utente);
$stmt->fetch();
$stmt->close();
?>