<?php
session_start(); // Inicia a sessão

$mensagem_enviada = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];

    // Aqui você pode adicionar código para processar os dados do formulário (enviar e-mail, salvar no banco de dados, etc.).

    // Por exemplo, exibindo os dados na página por enquanto:
    echo "<h2>Dados Recebidos:</h2>";
    echo "<p><strong>Nome:</strong> $nome</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Mensagem:</strong> $mensagem</p>";

    // Adicionando uma mensagem de confirmação
    $mensagem_enviada = true;

    // Armazenando o nome do usuário na sessão
    $_SESSION["usuario"] = $nome;

    // Redireciona para a página de sucesso
    header("Location: contato-sucesso.php");
    exit(); // Certifique-se de sair após o redirecionamento
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contato.css">
    <link rel="shortcut icon" href="img/favicon-32x32.png" type="image/x-icon">
    <title>Formulário de Contato</title>
</head>
<body style="background-image: url('img/Design sem nome (16).png'); background-size: cover; background-position: center; height:700px;">


    <div class="rolt" id="initial-rolt">
        <!-- Seu rolt e links aqui -->
        <a href="index.php">Ir para a Pagina Inicial</a>
        <a href="listarlivros.php">Ir para Ebooks</a>
        <a href="#">Ir para Contato</a>
        
    </div>

    <div class="container">
        <h2>Entre em Contato</h2>
        <?php if ($mensagem_enviada): ?>
            <!-- Não é necessário exibir nada aqui, pois você está redirecionando -->
        <?php else: ?>
    
              <form action="https://api.web3forms.com/submit" method="POST">
                <input type="hidden" name="access_key" value="96a5621b-f657-41a6-91da-4e4887c838c1">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem" name="mensagem" rows="4" required></textarea>
                <div class="h-captcha" data-captcha="true"></div>
                <button type="submit">Enviar Mensagem</button>
            </form>
        <?php endif; ?>
    </div>




    <img class="logo" src="img/Logo_Horizontal_white.png" width="170px">
</body>
</html>
<script>
        function mostrarMensagem() {
            // Exibe a mensagem de confirmação
            document.querySelector(".mensagem-confirmacao").style.display = "block";
        }
    </script>

    <!-----------SCRIPT FORMULARIO --------------->
    <script src="https://web3forms.com/client/script.js" async defer></script>