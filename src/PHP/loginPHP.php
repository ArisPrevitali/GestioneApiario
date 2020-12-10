<?php
session_start();
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['name'] != "" && $_POST['password'] != ""){
        $nome = $_POST['name'];
        $pass = $_POST['password'];
        $nome = test_input($nome);
        $pass = test_input($pass);
        $pass = md5($pass);
        $sql = "SELECT nome_utente FROM utente
                WHERE BINARY nome_utente = ?";
        include "connectionMYSQL.php";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nome);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $sql = "SELECT password_utente FROM utente
                        WHERE BINARY password_utente = ?";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $pass);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                        $_SESSION["loggedUser"] = true;
                        $_SESSION["nameUser"] = $nome;
                        header("location: /../home.php");
                        exit;
                    }
                }else{
                    $passErr = true;
                    header("location: /errorLogin.php?passErr='.$passErr");
                }
            }
        }else{
            $nameErr = true;
            header("location: /errorLogin.php?nameErr='.$nameErr");
        }
        $conn->close();
    }else{
        $isset = true;
        header("location: /errorLogin.php?isset='.$isset");
    }
}
?>