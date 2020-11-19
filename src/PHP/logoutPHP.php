<?php  
session_start();
if(isset($_POST["logout"])){
    unset($_SESSION["nameUser"]);
    unset($_SESSION["loggedUser"]);
    header("location: /home.php");
}
?>