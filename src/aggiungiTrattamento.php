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
    <link rel="stylesheet" href="CSS/modificaArnia.css">
    <meta charset="utf-8">
    <meta name="description" content="Pagina aggiungi arnia gestione apiario">
    <meta name="author" content="Aris Previtali">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php if(isset($_SESSION["loggedUser"])): ?>
<body>
<header class="head">
        <div class=" inline-right">
            <form action="<?php echo 'PHP/logoutPHP.php' ?>" method="POST">
                <label for="logout-btn">Nome: <?php if(isset($_SESSION["nameUser"])): echo $_SESSION["nameUser"]; endif ?></label>
                <input class=" logout-btn" type="submit" name="logout" value="LOGOUT" id="logout-btn">
            </form>
        </div>
    </header>
    <div class="body">
        <h1 class="title center">Gestione Apiario - Aggiungi Trattamento</h1>
        <div class="table-wrapper">
            <table class="table">
            <?php $id = $_SESSION['id_arnia_trattamento']; ?>
                <form action="<?php if($_SESSION['loggedUser']): echo 'PHP/addTrattamento.php?id='.$id; endif ?>" method="POST" class="float-left center">
                    <p>Data inizio:</p>
                    <input type="date" name="data_inizio">
                    </select>
                    <p>Data fine:</p>
                    <input type="date" name="data_fine">
                    <p>Testo</p>
                    <input type="text" name="testo">
                    <br>
                    <br>
                    <input type="submit" class="buttonCenter" name="submit" value="Aggiungi">
                </form>
            </table>
        </div>
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