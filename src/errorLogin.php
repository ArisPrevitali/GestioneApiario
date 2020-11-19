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
    if(isset($_GET['passErr'])){
        if($_GET['passErr']){
            echo "La password non è corretta!";
        }
    }
    if(isset($_GET["nameErr"])){
        if($_GET["nameErr"]){
            echo "Il nome utente non è coretto!";
        }
    }
    if(isset($_GET["isset"])){
        if($_GET["isset"]){
            echo "Nome utente o password mancanti!";
        }
    }
    ?>
    <input type="button" class="button" name="login" 
        value="Torna al login" onclick="location.href = 'login.php'"
</body>
</html>