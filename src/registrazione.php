<!DOCTYPE html>
<html>
<head>
    <title> Gestione Apiario | Previtali Aris </title>
    <link rel="icon" href="img/favicon.ico" type="image/gif">
    <link rel="stylesheet" href="CSS/general.css">
    <meta charset="utf-8">
    <meta name="description" content="Pagina login gestione apiario">
    <meta name="author" content="Aris Previtali">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
    </header>
    <div class="body center">
        <h1 class="title">Gestione Apiario - Registrazione</h1>
        <form action="/PHP/registrazionePHP.php" method="post" class="center">
            <p>Nome: </p>
            <input type="text" class="textbox" name="nome">
            <p class="block">Email: </p>
            <input type="text" class="textbox" name="email">
            <p class="block">Password: </p>
            <input type="password" class="textbox" name="password">
            <p class="block">Conferma password: </p>
            <input type="password" class="textbox" name="confPass">
            <p>Captcha:</p>
            <!--Aggiungere captcha-->
            <input type="submit" class="textbox buttonCenter" name="submit" value="INVIO">
        </form>
    </div>
    <?php include "footer.html"?>
</body>
</html>