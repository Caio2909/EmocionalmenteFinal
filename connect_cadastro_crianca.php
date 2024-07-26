<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["message" => "Conexão falhou: " . $conn->connect_error]));
}
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $name = $conn->real_escape_string($data['name']);
    $password = $conn->real_escape_string($data['password']);
    $login = $conn->real_escape_string($data['login']);
    $gender = $conn->real_escape_string($data['gender']);
    $oculos = $conn->real_escape_string($data['oculos']);
    $cor_cabelo = $conn->real_escape_string($data['cor_cabelo']);
    $tipo_cabelo = $conn->real_escape_string($data['tipo_cabelo']);
    $cor_pele = $conn->real_escape_string($data['cor_pele']);
    $sentimento = $conn->real_escape_string($data['sentimento']);
    $sql = "INSERT INTO crianca (nome, senha, login_medico, genero, oculos, cor_cabelo, tipo_cabelo, cor_pele, sentimento) 
            VALUES ('$name', '$password', '$login', '$gender', '$oculos', '$cor_cabelo', '$tipo_cabelo', '$cor_pele', '$sentimento')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Cadastro realizado com sucesso!"]);

    } else {
        echo json_encode(["message" => "Erro ao inserir dados: " . $conn->error]);
    }
} else {
    echo json_encode(["message" => "Nenhum dado recebido"]);
}

$conn->close();



?>

