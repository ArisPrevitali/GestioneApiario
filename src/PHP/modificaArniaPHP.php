<?php 
session_start();
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

$sql = "SELECT * FROM arnia
        WHERE id_utente = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($id, $colore, $testo, $abitata, $id_regina, $id_utente, $id_luogo);
$stmt->fetch();
$stmt->close();
echo $id . "-" . $id_luogo . "-" . $colore . "-" . $testo . "<br>";
?>