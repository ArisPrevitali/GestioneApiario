<?php
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
        $sql = "SELECT nome_utente FROM utente
                WHERE nome_utente = '$nome'";
        include "connectionMYSQL.php";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $sql = "SELECT password_utente FROM utente
                        WHERE password_utente = '$pass'";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                        header("location: /home.php?name=$nome");
                    }
                }
            }
        }else{
            echo "0 results";
        }
        $conn->close();
    }else{
        echo "Error";
    }
}
?>