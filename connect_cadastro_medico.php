<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$login = $_POST['flogin'];
$senha = $_POST['password'];
$nome = $_POST['fnome'];
$cro = $_POST['fCRO'];

$sql = "INSERT INTO medico (nome, cro, login, senha) VALUES ('$nome', '$cro', '$login', '$senha')";
if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
    header("Location: telainicial.html");
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

