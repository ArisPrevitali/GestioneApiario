<?php 
//aggiungo il luogo tramite id dell'utente
if(isset($id)){
    $sql = "INSERT INTO luogo(luogo)
            VALUES ($luogo";
    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully" . "<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>