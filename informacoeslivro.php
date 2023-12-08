<?php
session_start();

// Conexão com o banco de dados (substitua com suas próprias credenciais)
$host = 'localhost';
$dbname = 'final';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o Banco de Dados: " . $e->getMessage());
}

// Verifica se o parâmetro 'id' foi passado na URL
if (isset($_GET['id'])) {
    $livroId = $_GET['id'];

    // Obtém as informações do livro
    $stmt = $pdo->prepare("SELECT * FROM cadastrarlivros WHERE id = :livroId");
    $stmt->bindParam(':livroId', $livroId);
    $stmt->execute();
    $livro = $stmt->fetch();

    // Exibe as informações do livro
    if ($livro) {
        echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Informações do Livro</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 0;
                    }

                    .container {
                        max-width: 800px;
                        margin: 20px auto;
                        padding: 20px;
                        background-color: #fff;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }

                    h2 {
                        color: #333;
                        margin-bottom: 20px;
                    }

                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 20px;
                    }

                    td {
                        padding: 10px;
                    }

                    img {
                        max-width: 10%;
                        height: auto;
                        border-radius: 8px;
                    }

                    .success-message {
                        color: green;
                        font-weight: bold;
                    }

                    .error-message {
                        color: red;
                        font-weight: bold;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h2>Informações do Livro</h2>
                    <table>
                        <tr><td>Capa</td><td><img src='" . $livro['imagem'] . "' alt='Capa do Livro'></td></tr>
                        <tr><td>Título</td><td>" . $livro['titulo'] . "</td></tr>
                        <tr><td>Autor</td><td>" . $livro['autor'] . "</td></tr>
                        <tr><td>Gênero</td><td>" . $livro['genero'] . "</td></tr>
                        <tr><td>Ano de Publicação</td><td>" . $livro['ano_publicacao'] . "</td></tr>
                        <tr><td>Descrição</td><td>" . $livro['descricao'] . "</td></tr>
                    </table>";

        // Exibição de mensagens de sucesso ou erro
        if (isset($_SESSION['emprestimo_mensagem'])) {
            echo "<p class='success-message'>" . $_SESSION['emprestimo_mensagem'] . "</p>";
            unset($_SESSION['emprestimo_mensagem']);
        }

        echo "</div></body></html>";
    } else {
        echo "<p class='error-message'>Livro não encontrado.</p>";
    }
} else {
    echo "<p class='error-message'>ID do livro não fornecido.</p>";
}
?>
<!-- Adicione aqui o seu código HTML adicional, como links de navegação, rodapé, etc. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon-32x32.png" type="image/x-icon">
    <title>Document</title>
</head>
<body>
    <style>
 .voltar{
    position:absolute;
    top:80px;
    left:68%;
    text-decoration:none;
    color:black;
    font-size:17px;
 }

</style>
   <a class="voltar" href="listarlivros.php">Voltar</a> 
   
  
</body>
</html>