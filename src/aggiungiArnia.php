<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title> Gestione Apiario | Previtali Aris </title>
    <link rel="icon" href="img/favicon.ico" type="image/gif">
    <link rel="stylesheet" href="CSS/general.css">
    <link rel="stylesheet" href="CSS/home.css">
    <meta charset="utf-8">
    <meta name="description" content="Pagina aggiungi arnia gestione apiario">
    <meta name="author" content="Aris Previtali">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php if(isset($_SESSION["loggedUser"])): ?>
<body>
    <header>
        <p class="rightTop">Nome: <?php if(isset($_SESSION["nameUser"])): echo $_SESSION["nameUser"]; endif ?></p>
        <form action="<?php echo 'PHP/logoutPHP.php' ?>" method="POST" class="">
            <input type="submit" name="logout" value="LOGOUT" class="button rightTop">
        </form>
    </header>
    <div class="body">
        <h1 class="title center">Gestione Apiario - Aggiungi Arnia</h1>
        <form action="<?php if($_SESSION['loggedUser']): echo 'PHP/arniaPHP.php'; endif ?>" method="POST" class="float-left center">
            <p>Luogo:</p>
            <input type="text" class="textbox" name="luogo">
            <p>Colore (opzionale):</p>
            <select class="textbox" name="color">
                <option>Bianco</option>
                <option>Grigio</option>
                <option>Rosso</option>
                <option>Verde</option>
                <option>Giallo</option>
                <option>Azzurro</option>
                <option>Blu</option>
                <option>Rosa</option>
                <option>Viola</option>
                <option>Marrone</option>
                <option>Arancione</option>
                <option selected="selected">Non colorata</option>
            </select>
            <p>Note (opzionale):</p>
            <input type="text" class="textbox" name="note">
            <p>Abitata?:</p>
            <input type="checkbox" class="textbox" name="abitata">
            <p>Anno regina:</p>
            <input type="date" class="textbox" name="annoRegina">
            <input type="submit" class="button" name="submit" value="INVIO">
        </form>
    </div>
    <?php include "footer.html"?>
</body>
<?php else: ?>
<div class="body">
    <h1 class="title center">Utente non loggato!</h1>
    <input type="button" class="buttonCenter" name="login" value="Login" onclick="location.href = 'login.php'">
    <input type="button" class="buttonCenter" name="registrazione" value="Registrazione" onclick="location.href = 'registrazione.php'">
</div>
<?php endif; ?>
</html>