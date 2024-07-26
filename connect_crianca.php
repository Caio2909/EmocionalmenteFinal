<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['flogin'];
    $senha = $_POST['password'];

    $sql = "SELECT * FROM crianca WHERE nome = '$login' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['crianca_id'] = $row['criancaId']; 
        $_SESSION['login_medico'] = $row['login_medico'];
        $_SESSION['cor_pele'] = $row['cor_pele'];
        $_SESSION['cor_cabelo'] = $row['cor_cabelo'];
        $_SESSION['oculos'] = $row['oculos'];
        $_SESSION['sentimento'] = $row['sentimento'];
        $_SESSION['tipo_cabelo'] = $row['tipo_cabelo'];
        header('Location: novoAcesso.php');
        exit();
    } else {
        echo "Login ou senha incorretos!";
    }
}

$conn->close();
?>