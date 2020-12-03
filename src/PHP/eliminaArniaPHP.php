<?php 
session_start();
include "connectionMYSQL.php";
if(isset($_GET['id'])){
    $sql = "DELETE FROM arnia
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_GET['id']);   
    $stmt->execute();
    $result = $stmt->get_result();
    include "getDati.php";
}
header("location: /../modificaArnia.php");
?>