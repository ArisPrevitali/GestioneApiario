<?php
session_start();
include "connectionMYSQL.php";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $passErr = "";
    $passVal = false;
    $nameVal = false;
    $emailVal = false;
    $passSame = false;
    $name = strval($_POST['nome']);
    $name = test_input($name);
    if(!preg_match('/^[a-zA-Z0-9]+$/i', $name)){
        echo $name;
        $nameErr = "Nome non valido, non deve contenere caratteri speciali";
    }else{
        $nameVal = true;
    }

    $email = strval($_POST["email"]);
    $email = test_input($email);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Formato email non valido";
    }else{
        $emailVal = true;
    }
    $pattern = "/\W|_/";
    $pass = test_input($_POST["password"]);
    $confPass = test_input($_POST["confPass"]);
    if(!empty($pass)){
        if($pass === $confPass){
            $passSame = true;
            if(strlen($pass) >= 6){
                if(preg_match($pattern, $pass)){
                    if(preg_match('/[a-z]+/', $pass)){
                        if(preg_match('/[A-Z]+/', $pass)){
                            $passVal = true;
                        }else{
                            $passErr .= ", deve contenere almeno una lettera maiuscola.";
                        }
                    }else{
                        $passErr .= ", deve contenere almeno una lettera minuscolo";
                    }
                }else{
                    $passErr .= ", deve contenere almeno un carattere speciale";
                }
            }else{
                $passErr .= "Deve avere più di 6 caratteri";
            }
        }else{
            $passErr = "Le due password non corrispondono";
        }
    }else{
        $passErr = "Scrivere la pass";
    }
    echo $passErr;
    if($passVal && $nameVal && $emailVal){
        $pass = md5($pass);
        //SQL
        include "connectionMYSQL.php";
    
        $sql = "INSERT INTO utente (nome_utente, password_utente, email_utente)
            VALUES ('$name', '$pass', '$email')";
    
        if ($conn->query($sql) === TRUE) {
            header("location: /login.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }else{
        header('location: /../errorRegister.php?pass='.$passVal.'&name='.$nameVal.'&email='.$emailVal.'&passSame='.$passSame);
    }
}
?>