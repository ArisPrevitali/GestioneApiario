<?php
    //connessione al DB
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gestione_apiario";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>