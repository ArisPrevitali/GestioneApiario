<?php
include "connectionMYSQL.php";
include "getUtenteLog.php";
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
?>