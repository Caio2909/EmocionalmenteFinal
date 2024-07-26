<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sentimento = $_POST['sentimento'];
    $crianca_id = $_POST['crianca_id'];
    $login_medico = $_POST['login_medico'];
    $data_consulta = $_POST['data_consulta']; 
    echo $crianca_id;
    $sql = "INSERT INTO consulta (criancaId, sentimento, login_medico, dataConsulta) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $crianca_id, $sentimento, $login_medico, $data_consulta);

    if ($stmt->execute()) {
        echo "Nova consulta criada com sucesso!";
        header("Location: telainicial.html");
    } else {
        echo "Erro ao criar a consulta: " . $stmt->error;
    }
}

$conn->close();
?>
