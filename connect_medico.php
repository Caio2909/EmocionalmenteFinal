<?php
session_start(); // Inicie a sessão

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


if (isset($_POST['flogin']) && isset($_POST['password'])) {
    $login = $_POST['flogin'];
    $senha = $_POST['password'];

    $sql = "SELECT * FROM medico WHERE login = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['senha'] = $senha;
        $_SESSION['login'] = $login;

       
        header("Location: tabelaConsultas.php");
        exit();
    } else {
        echo "Login ou senha incorretos!";
    }
    $stmt->close();
}

$conn->close();
?>
