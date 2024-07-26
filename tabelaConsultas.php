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

$login = $_SESSION['login'];

$sqlConsultas = "
    SELECT c.consultaId, c.consultaTxt, c.criancaId, c.dataConsulta, cri.nome, c.sentimento
    FROM consulta c
    JOIN crianca cri ON c.criancaId = cri.criancaId
    WHERE c.login_medico = ?
";
$stmtConsultas = $conn->prepare($sqlConsultas);
$stmtConsultas->bind_param("s", $login);
$stmtConsultas->execute();
$resultConsultas = $stmtConsultas->get_result();

$consultas = [];
if ($resultConsultas->num_rows > 0) {
    while ($row = $resultConsultas->fetch_assoc()) {
        $consultas[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Pacientes</title>
    <link rel="stylesheet" href="stylesTable.css">
</head>
<body>
<div class="header">
    <img src="imgs/image.png" alt="Logo">
    <h1>EMOCIONALMENTE</h1>
</div>
<div class="container">
    <table id="patientsTable">
        <thead>
        <tr>
            <th>Nome da Criança</th>
            <th>Descrição da Consulta</th>
            <th>Data da Consulta</th>
            <th>Sentimento </th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($consultas as $consulta): ?>
            <tr>
                <td><?php echo htmlspecialchars($consulta['nome']); ?></td>
                <td><?php echo htmlspecialchars($consulta['consultaTxt']); ?></td>
                <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($consulta['dataConsulta']))); ?></td>
                <td> <?php
                    switch ($consulta['sentimento']) {
                        case 0:
                            echo 'Triste 🙁';
                            break;
                        case 1:
                            echo 'Feliz 😊';
                            break;
                        case 2:
                            echo 'Raiva 😡';
                            break;
                        default:
                            echo 'Desconhecido';
                    }
                    ?></td>
                <td>
                    <a href="editarConsulta.php?id=<?php echo $consulta['consultaId']; ?>" class="button">Editar Consulta</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>        
    </table>
    <a href="novaCrianca.php" class="buttonNova">Nova Criança</a>
</div>
<script src="escolhaConsulta.js"></script>
</body>
</html>
