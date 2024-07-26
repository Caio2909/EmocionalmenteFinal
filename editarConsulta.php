<?php
session_start();

if (!isset($_SESSION['login'])) {
 
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$consultaId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $detalhesConsulta = $_POST['detalhesConsulta'];
    $sql = "UPDATE consulta SET consultaTxt = ? WHERE consultaId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $detalhesConsulta, $consultaId);

    if ($stmt->execute()) {
        header("Location: tabelaConsultas.php");
        exit();
    } else {
        echo "Erro ao atualizar consulta: " . $conn->error;

    }
    $stmt->close();
} else {
    $sql = "SELECT consultaTxt FROM consulta WHERE consultaId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $consultaId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $consulta = $result->fetch_assoc();
    } else {
        echo "Consulta não encontrada!";
        $consulta = ['consultaTxt' => ''];
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Consulta</title>
    <link rel="stylesheet" href="enviaConsulta.css">
    <div class="header">
        <img src="imgs/image.png">
        <h1>EMOCIONALMENTE</h1>
    </div>
</head>
<body>
    <form action="" method="POST">
        <div class="detalheConsulta">
            <label for="detalhesConsulta">Detalhes da Consulta</label><br>
            <textarea name="detalhesConsulta" required><?php echo htmlspecialchars($consulta['consultaTxt']); ?></textarea><br>
            <button class="button" type="submit">Registrar <br> Consulta</button>
        </div>      
    </form>
</body>
</html>
