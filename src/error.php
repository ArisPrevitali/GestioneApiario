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
    if(!$_GET['pass']){
        echo "_La password deve avere più di 6 caratteri, ";
        echo "deve contenere almeno un carattere speciale, ";
        echo "deve contenere almeno una lettera minuscolo, ";
        echo "deve contenere almeno una lettera maiuscola." . "<br>";
    }
    if(!$_GET['passSame']){
        echo "_Le due password non corrispondono." . "<br>";
    }
    if(!$_GET['name']){
        echo "_Nome non valido, non deve contenere caratteri speciali" . "<br>";
    }
    if(!$_GET['email']){
        echo "_Formato email non valido" . "<br>";
    }
    ?>
    <input type="button" class="button" name="registrazione" 
        value="Torna alla registrazione" onclick="location.href = 'registrazione.php'"
</body>
</html>