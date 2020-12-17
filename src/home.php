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
    <meta name="description" content="Pagina home gestione apiario">
    <meta name="author" content="Aris Previtali">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php if(isset($_SESSION["loggedUser"])): ?>
<body>
    <?php 
        include "PHP/datiPHP.php";
        include "footer.html"; 
    ?>
    <header class="head">
        <div class=" inline-right">
            <form action="<?php echo 'PHP/logoutPHP.php' ?>" method="POST">
                <label for="logout-btn">Nome: <?php if(isset($_SESSION["nameUser"])): echo $_SESSION["nameUser"]; endif ?></label>
                <input class=" logout-btn" type="submit" name="logout" value="LOGOUT" id="logout-btn">
            </form>
        </div>
    </header>
    <div class="body">
        <h1 class="title center">Gestione Apiario - Home</h1>
        <div class="div-center">
            <input type="button" class="buttonCenter" name="addArnia" value="Aggiungi un'arnia" onclick="location.href = 'aggiungiArnia.php'">
            <form action='PHP/modificaArniaPHP.php' method='POST'>
                <input type="submit" class="buttonCenter" name="modifyArnia" value="Modifica un'arnia o elimina">
            </form>
        </div>
        <h3>Le tue arnia:</h3>
        <table>
            <tr>
                <th>Luogo</th>
                <th>Colore</th>
                <th>Note</th>
                <th>Aggiungi nota</th>
                <th>Aggiungi trattamento</th>
            </tr>
            <tr>
                <?php 
                if(!empty($_SESSION['datiLogHome'])){
                    foreach($_SESSION['datiLogHome'] as $value){
                        echo "<tr>";
                        $count = 0;
                        foreach($value as $assoc => $val){
                            if(stripos($assoc, "id") === false){
                                
                                echo "<td>";
                                echo $val;
                                echo "</td>";
                            }else{
                                if($count == 0){
                                    $_SESSION['id_arnia_trattamento'] = $val;
                                    $id = $_SESSION['id_arnia_trattamento'];
                                    $count++;
                                }
                            }
                        }
                        echo "<td>";
                        echo "<a href='./aggiungiNota.php?id=" . "$id'>Aggiungi</a>";
                        echo "</td>";
                        echo "<td>";
                        echo "<a href='./aggiungiTrattamento.php'>Aggiungi</a>";
                        echo "</td>";
                    }
                }
                ?>
            </tr>
        </table>
    </div>
</body>
<?php else: ?>
<div class="body">
    <h1 class="title center">Utente non loggato!</h1>
    <input type="button" class="buttonCenter" name="login" value="Login" onclick="location.href = 'login.php'">
    <input type="button" class="buttonCenter" name="registrazione" value="Registrazione" onclick="location.href = 'registrazione.php'">
</div>
<?php endif; ?>
</html>