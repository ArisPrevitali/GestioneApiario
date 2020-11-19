//inutilizzato

<?php 
include "connectionMYSQL.php";
//aggiungo il luogo tramite id dell'utente
if(isset($id)){
    $sql = "INSERT INTO luogo(luogo)
            VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $luogo);
    $stmt->execute();
    $stmt->close();
    $_SESSION['idLuogo'] = $conn->insert_id;
    echo $lastIdLuogo;
    if($lastIdLuogo===false){
        header("location: /errorLogin.php");
    }else{
        header("location: /PHP/arniaPHP.php");
    }
    /**if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully" . "<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }*/
}
?>