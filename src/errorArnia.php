<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
    <title> Gestione Apiario | Previtali Aris </title>
    <link rel="icon" href="img/favicon.ico" type="image/gif">
    <link rel="stylesheet" href="CSS/general.css">
    <link rel="stylesheet" href="CSS/error.css"> 
    <meta charset="utf-8">
    <meta name="description" content="Pagina error gestione apiario">
    <meta name="author" content="Aris Previtali">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php 
    if(isset($_GET["luogoErr"])){
        if($_GET["luogoErr"]){
            echo "Luogo mancante!" . "<br>";
        }
    }
    if(isset($_GET['annoReginaErr'])){
        if($_GET['annoReginaErr']){
            echo "Anno regina mancante!";
        }
    }
    ?>
    <input type="button" class="button" name="arnia" 
        value="Torna alla pagina di aggiunta" onclick="location.href = 'aggiungiArnia.php'"
</body>
</html>