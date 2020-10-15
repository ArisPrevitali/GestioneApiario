<?php
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

    $pass = test_input($_POST["password"]);
    $confPass = test_input($_POST["confPass"]);
    if(!empty($pass)){
        if(strlen($pass) <= 6){
            $passErr .= "Deve avere più di 6 caratteri"; 
        }else if(preg_match('[@_!#$%^&*()?/|}{~:]', $pass)){
            $passErr .= ", deve contenere almeno un carattere speciale";
        }else if(preg_match('[a-z]', $pass)){
            $passErr .= ", deve contenere almeno una lettera minuscolo";
        }else if(preg_match('[A-Z]', $pass)){
            $passErr .= ", deve contenere almeno una lettera maiuscola";
        }else{
            if($pass === $confPass){
                $passVal = true;
            }else{
                $passErr .= ", le due password non corrispondono";
            }
        }
    }else{
        $passErr = "Scrivere la password.";
    }
    if($passVal && $nameVal && $emailVal){
        echo "Valori validi";
    }else{
        if(!empty($passErr)){
            echo alert($passErr);
        }
        if(!empty($nameErr)){
            echo alert($nameErr);
        }
        if(!empty($emailErr)){
            echo alert($emailErr);
        }
    }
}
?>