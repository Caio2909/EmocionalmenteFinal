<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Médico</title>
    <link rel="stylesheet" href="AcessoMedico.css">
</head>
<body>

    <div class="header">
            <img src="./imgs/image.png" >
            <h1>EMOCIONALMENTE</h1>
        </div>
        <form class="formulario" action="connect_medico.php" method="POST">
            <div class="camponome">
                <label for="login">Login:</label>
                <input class="login" type="text" name="flogin" placeholder="Seu nome de usuario" size="15">
            </div>
            
            <div class="camposenha">
                <label for="login">Senha:</label>
                <input class="senha" type="password" name="password"  placeholder="Sua senha" >

            </div>
               
            <button type="submit" class="button">Acesso Médico</button>
        </form>
        <a href="AcessoMedicocadastro.php" class="button">Registrar Médico</a>
</head> 
</body>
</html>
    
