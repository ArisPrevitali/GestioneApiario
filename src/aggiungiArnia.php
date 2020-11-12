<!DOCTYPE html>
<html>
<head>
    <title> Gestione Apiario | Previtali Aris </title>
    <link rel="icon" href="img/favicon.ico" type="image/gif">
    <link rel="stylesheet" href="CSS/general.css">
    <meta charset="utf-8">
    <meta name="description" content="Pagina aggiungi arnia gestione apiario">
    <meta name="author" content="Aris Previtali">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
    </header>
    <div class="body">
        <h1 class="title center">Gestione Apiario - Aggiungi Arnia</h1>
        <form action="PHP/arniaPHP.php?name=<?php echo $_GET['name']?>" method="POST" class="float-left">
            <p>Luogo</p>
            <input type="text" class="textbox" name="luogo">
            <p>Colore</p>
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
            </select>
            <p>Note</p>
            <input type="text" class="textbox" name="note">
            <p>Abitata?</p>
            <input type="checkbox" class="textbox" name="abitata">
            <p>Anno regina</p>
            <input type="number" class="textbox" name="annoRegina">
            <input type="submit" class="button" name="submit" value="INVIO">
        </form>
    </div>
    <?php include "footer.html"?>
</body>
</html>