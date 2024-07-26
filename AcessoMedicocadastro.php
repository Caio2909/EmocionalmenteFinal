<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link rel="stylesheet" href="AcessoMedicocadastro.css">
</head>
<body>

    <div class="header">
            <img src="./imgs/image.png" >
            <h1>EMOCIONALMENTE</h1>
        </div>
       
        <div class="header">
            <img src="./imgs/image.png" >
            <h1>EMOCIONALMENTE</h1>
        </div>
        <form class="formulario" action="connect_cadastro_medico.php" method="POST">

            <div class="camponome">
                <label for="nome">Nome:</label>
                <input class="nome" type="text" name="fnome" placeholder="Seu nome completo" size="15">
            </div>

         
            <div class="campoCRO">
                <label for="CRO">CRO:</label>
                <input class="cro" type="text" name="fCRO" placeholder="Seu CRO" size="15">
            </div>

            <div class="campologin">
                <label for="login">Login:</label>
                <input class="login" type="text" name="flogin" placeholder="Seu nome de usuario" size="15">
            </div>
            
            <div class="camposenha">
                <label for="senha">Senha:</label>
                <input class="senha" type="password" name="password"  placeholder="Sua senha" >

            </div>
               
            <button type="submit" class="button">Cadastro Médico</button>
      
        </form>
      
</head>
  
</body>
</html>
