<?php
session_start(); // Inicia a sessão

// Verifica se a sessão está definida
if (isset($_SESSION["usuario"])) {
    $nome_usuario = $_SESSION["usuario"];
} else {
    $nome_usuario = "Visitante";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Contato - Sucesso</title>
</head>
<body style="background: url('img/Tela-fundo-login.png') no-repeat center center fixed; background-size: cover;">
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #000;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    text-align: center;
    left: -60px;
    position:relative;
}

h2 {
    color: #333;
}

.mensagem-confirmacao {
    color: #008000;
    font-weight: bold;
    margin-top: 10px;
}

/* Adicione isso ao seu arquivo styles.css */
.botao-voltar {
    display: block;
    margin-top: 20px;
    text-decoration: none;
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    border-radius: 4px;
    cursor: pointer;
}

.botao-voltar:hover {
    background-color: #45a049;
}

.logo{
    position: relative;
    top: -170px;
    left: 240px;
}

</style>


<img class="logo" src="img/Logo_Horizontal_white.png" width="170px">
    <div class="container">
        <h2>Mensagem Enviada com Sucesso, <?php echo $nome_usuario; ?>!</h2>
        <p class="mensagem-confirmacao">Entraremos em contato em breve.</p>

         <!-- Botão de Voltar -->
         <a href="index.php" class="botao-voltar">Voltar</a>
    </div>
</body>
</html>
