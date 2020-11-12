<!DOCTYPE html>
<html>
<head>
    <title> Gestione Apiario | Previtali Aris </title>
    <link rel="icon" href="img/favicon.ico" type="image/gif">
    <link rel="stylesheet" href="CSS/general.css">
    <link rel="stylesheet" href="CSS/home.css">
    <meta charset="utf-8">
    <meta name="description" content="Pagina home gestione apiario">
    <meta name="author" content="Aris Previtali">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
        <p class="rightTop"><?php echo $_GET['name']; ?></p>
    </header>
    <div class="body">
        <h1 class="title center">Gestione Apiario - Home</h1>
        <input type="button" class="buttonCenter" name="addArnie" value="Aggiungi un'arnia" onclick="location.href = 'aggiungiArnia.php?name=<?php echo $_GET['name'] ?>'">
        <!--Aggiungi arnia.file-->
        <table>
            <tr>
                <th>Luogo</th>
                <th>Colore</th>
                <th>Note</th>
            </tr>
            <tr>
                <!--Inserire dati dal DB max 5-->
            </tr>
        </table>
        
    </div>
    <?php include "footer.html"?>
</body>
</html>