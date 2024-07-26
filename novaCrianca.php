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
$senha = $_SESSION['senha'];
$conn->close();
?>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template</title>
    <link rel="stylesheet" href="novaCrianca.css">
</head>
<body>
<div class="header">
    <img src="imgs/image.png" alt="Logo">
    <h1>EMOCIONALMENTE</h1>
</div>

<div id="avatarContainer">
    <img height="200px" id="avatar" alt="Avatar">
</div>

<div id="colorButtons"> <!-- Pele -->
    <label for="skinColorSelect">Escolha sua cor de pele:</label><br>
    <button type="button" class="skinCorButton colorButton" value="ffdbac" style="background-color:#ffdbac;"></button>
    <button type="button" class="skinCorButton colorButton" value="d8b294" style="background-color:#d8b294;"></button>
    <button type="button" class="skinCorButton colorButton" value="f1c27d" style="background-color:#f1c27d;"></button>
    <button type="button" class="skinCorButton colorButton" value="8d5524" style="background-color:#8d5524;"></button>
    <button type="button" class="skinCorButton colorButton" value="614335" style="background-color:#614335;"></button>
</div>

<div id="colorButtons"> <!-- Cabelo -->
    <label for="hairTypeSelect">Como é seu cabelo?</label><br>
    <select id="hairType" class="hairType">
        <option value="shortRound">Baixo</option>
        <option value="dreads01">Dreads</option>
        <option value="curvy">Curvo</option>
        <option value="curly">Cacheado</option>
        <option value="longButNotTooLong">Médio</option>
        <option value="straight02">Liso</option>
    </select>
</div>

<div id="colorButtons"> <!-- Cor cabelo -->
    <label for="hairColorSelect">E qual a cor do seu cabelo?</label><br>
    <button type="button" class="hairCorButton colorButton" value="D19F7E" style="background-color:#D19F7E;"></button>
    <button type="button" class="hairCorButton colorButton" value="a2826D" style="background-color:#a2826D;"></button>
    <button type="button" class="hairCorButton colorButton" value="785C4E" style="background-color:#785C4E;"></button>
    <button type="button" class="hairCorButton colorButton" value="b38b67" style="background-color:#b38b67;"></button>
    <button type="button" class="hairCorButton colorButton" value="2D221C" style="background-color:#2D221C;"></button>
</div>

<div id="colorButtons"> <!-- Óculos -->
    <label for="oculos">Você usa óculos?</label><br>
    <input type="radio" id="oculos" value="prescription01" name="oculos" class="oculosInput">Sim
    <input type="radio" id="oculos" value="" name="oculos" class="oculosInput">Não
</div>

<div id="colorButtons"> <!-- Sentimento -->
    <label for="sentimentos">Como você está se sentindo?</label><br>
    <input type="radio" value="0" name="sentimento" class="sentimentoInput">Triste🙁
    <input type="radio" value="1" name="sentimento" class="sentimentoInput">Feliz 😊
    <input type="radio" value="2" name="sentimento" class="sentimentoInput">Raiva 😡
</div>

<form>
    <input type="hidden" id="login_medico" name="login_medico" value="<?php echo $login; ?>">
    Nome: <input type="text" class="text" id="name"><br>
    Gênero:
    <select id="gender">
        <option value="male">H</option>
        <option value="female">M</option>
    </select><br>
    Senha: <input type="password" class="text" id="password"><br>
</form>
<button class="button" type="button" id="submitBtn">Enviar</button>
<script src="criarAvatar.js"></script>
</body>
</html>
