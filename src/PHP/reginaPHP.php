<?php 
//inutilizzato


include "connectionMYSQL.php";
//aggiungo la regina tramite l'id dell'utente
if(isset($id)){
    $annoRegina = date_create()->format('Y-m-d');
    $sql = "INSERT INTO regina(anno_nascita, id_utente)
            VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $annoRegina, $id);
    $stmt->execute();
    $stmt->close();
    $_SESSION['idRegina'] = $conn->insert_id;
    if($lastIdRegina===false){
        header("location: /errorLogin.php");
    }else{
        header("location: /PHP/arniaPHP.php");
    }
    /**if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully" . "<br>";
    } else {
        echo $conn->error;
    }*/
}
?>