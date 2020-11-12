<?php 
//aggiungo la regina tramite l'id dell'utente
if(isset($id)){
    $sql = "INSERT INTO regina(anno_nascita, id_utente)
            VALUES ($annoRegina, $id)";
    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully" . "<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>