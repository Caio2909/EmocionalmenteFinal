<?php
session_start();

if (!isset($_SESSION['crianca_id'])) {
    header('Location: connect_crianca.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Como você se sente hoje?</title>
    <link rel="stylesheet" href="novoAcesso.css">
</head>
<body>
    <div class="header">
        <img src="imgs/image.png">
        <h1>EMOCIONALMENTE</h1>
    </div>
    <div id="avatarContainer">
        <img height="200px" id="avatar" />
    </div>
    <form action="nova_consulta.php" method="POST">
        <input type="hidden" name="crianca_id" value="<?php echo $_SESSION['crianca_id']; ?>">
        <input type="hidden" name="login_medico" value="<?php echo $_SESSION['login_medico']; ?>">
        <input type="hidden" name="data_consulta" value="<?php echo date('Y-m-d'); ?>">
        <div id="colorButtons"><!-- Sentimento-->
            <label for="sentimentos">Como você está se sentindo?</label><br>
            <input type="radio" value="0" name="sentimento" class="sentimentoInput">Triste🙁
            <input type="radio" value="1" name="sentimento" class="sentimentoInput" checked>Feliz 😊
            <input type="radio" value="2" name="sentimento" class="sentimentoInput">Raiva 😡
        </div>
        <button type="submit" id="submitBtn" >Enviar</button>
    </form>
    <script>
        const selectedSkinColor = '<?php echo $_SESSION['cor_pele']  ?>';
        const selectedHairColor = '<?php echo $_SESSION['cor_cabelo'] ?>';
        const Oculos = '<?php echo $_SESSION['oculos'] ?>';
        let selectedSentimento = 1;
        const booleanOculos = '<?php echo $_SESSION['oculos']?>';
        const selectedHairType = '<?php echo $_SESSION['tipo_cabelo'] ?>';
        const boca = ["screamOpen", "default", "grimace"];
        const olhos = ["cry", "default", "squint"];
        const sombrancelhas = ["sadConcerned", "default", "angry"];
        function updateAvatar() {
            if (Oculos == 0){
                selectedOculos = ""
            }
            else (
                selectedOculos= "prescription01"
            )
            const link = `https://api.dicebear.com/9.x/avataaars/svg?accessories=${selectedOculos}&hairColor=${selectedHairColor}&skinColor=${selectedSkinColor}&mouth=${boca[selectedSentimento]}&eyes=${olhos[selectedSentimento]}&accessoriesProbability=${booleanOculos}&accessoriesColor=262e33&eyebrows=${sombrancelhas[selectedSentimento]}&top=${selectedHairType}`;
            document.getElementById('avatar').src = link;
        }
        const sentimento = document.querySelectorAll(".sentimentoInput");
        sentimento.forEach(input => {
            input.addEventListener('click', (event) => {
                selectedSentimento = event.target.value;
                updateAvatar();
            });
        });
        updateAvatar()
    </script>
</body>
</html>
