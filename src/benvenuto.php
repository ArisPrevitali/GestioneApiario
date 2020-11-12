<!DOCTYPE html>
<html>
<head>
    <title> Gestione Apiario | Previtali Aris </title>
    <link rel="icon" href="img/favicon.ico" type="image/gif">
    <link rel="stylesheet" href="CSS/general.css">
    <link rel="stylesheet" href="CSS/benvenuto.css">
    <meta charset="utf-8">
    <meta name="description" content="Pagina benvenuto gestione apiario">
    <meta name="author" content="Aris Previtali">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
    </header>
    <div class="body center">
        <h1 class="title">Gestione Apiario - Benvenuto</h1>
        <h3 class="text">Come desideri continuare?</h3>
        <form action="#" method="post" class="center">
            <input type="button" class="buttonCenter" name="login" value="Ho già un account" onclick="location.href = 'login.php'">
            <input type="button" class="buttonCenter" name="registrazione" value="Non ho già un account" onclick="location.href = 'registrazione.php'">
            <!-- Aggiungere foto api/apiario -->
        </form>
        <!--<img src="img/apiario.jpg" width="40%" height="10%">-->
    </div>
    <?php include "footer.html"?>
</body>
</html>