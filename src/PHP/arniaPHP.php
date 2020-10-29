<?php 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $luogo = isset($_POST['luogo']);
    $color = isset($_POST['color']);
    $annoRegina = isset($_POST['annoRegina']);
    $note = isset($_POST['note']);
    $abitata = isset($_POST['abitata']);
    $luogo = test_input($luogo);
    $color = test_input($color);
    $annoRegina = test_input($annoRegina);
    $note = test_input($note);
    $abitata = test_input($abitata);
    include "connectionMYSQL.php";
    if($abitata != ""){
        if($luogo != "" && $color != "" && $annoRegina != "" && $note != ""){
            $sql = "INSERT INTO arnia(colore, testo, abitata, id_regina, id_utente, id_luogo)
                    VALUES ()";
        }
    }else if($luogo != "" && $color != "" && $note != ""){

    }
}
?>