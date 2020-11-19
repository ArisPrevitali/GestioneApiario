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
        <h1 class="title center">Gestione Apiario - Modifica Arnia</h1>
        <input type="button" name="modifica" value="MODIFICA" class="buttonCenter" onclick="location.href = 'PHP/modificaArniaPHP.php'">
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