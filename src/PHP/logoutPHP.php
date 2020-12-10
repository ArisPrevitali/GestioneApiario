<?php  
session_start();
if(isset($_POST["logout"])){
    //unset($_SESSION["nameUser"]);
    //unset($_SESSION["loggedUser"]);
    session_destroy();
    header("location: /../home.php");
}
?>