
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon-32x32.png" type="image/x-icon">
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
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        table img {
            max-width: 40%;
            height: auto;
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
        }

        p {
            margin-top: 10px;
        }

        p.no-books {
            font-style: italic;
            color: #888;
        }

        .success-message {
            color: green;
        }

        .error-message {
            color: red;
        }

    </style>
</head>

<body>
    <div class="container">
        <?php
        if (isset($_GET['id'])) {
            $livroId = $_GET['id'];

            // Obtenha as informações do livro
            $stmt = $pdo->prepare("SELECT * FROM cadastrarlivros WHERE id = :livroId");
            $stmt->bindParam(':livroId', $livroId);
            $stmt->execute();
            $livro = $stmt->fetch();

            if ($livro) {
                echo "<h2>Informações do Livro</h2>";
                echo "<form method='post' action='processa_emprestimo.php'>";
                echo "<table>";
                echo "<tr><td><img src='" . $livro['imagem'] . "' alt='Capa do Livro'></td></tr>";
                echo "<tr><td><strong>Título:</strong> " . $livro['titulo'] . "</td></tr>";
                echo "<tr><td><strong>Autor:</strong> " . $livro['autor'] . "</td></tr>";
                echo "<tr><td><strong>Gênero:</strong> " . $livro['genero'] . "</td></tr>";
                echo "<tr><td><strong>Ano de Publicação:</strong> " . $livro['ano_publicacao'] . "</td></tr>";
                echo "<tr><td><strong>Descrição:</strong> " . $livro['descricao'] . "</td></tr>";
                echo "</table>";
            
                // Adicione um campo hidden para enviar o ID do livro
                echo "<input type='hidden' name='livroId' value='" . $livro['id'] . "'>";
            
                // Botão para emprestar o livro
                echo "<style>
    /* Adicione estilos CSS aqui */
    .botao-emprestar {
        background-color: #4CAF50; /* Cor de fundo verde */
        color: white; /* Cor do texto branco */
        padding: 10px 15px; /* Espaçamento interno */
        border: none; /* Sem borda */
        border-radius: 4px; /* Borda arredondada */
        cursor: pointer; /* Cursor de apontar */
    }

    /* Adicione mais estilos conforme necessário */
</style>";
echo "<input type='submit' class='botao-emprestar' name='emprestarLivro' value='Emprestar Livro'>";
                echo "</form>";
            
                // Exibição de mensagens de sucesso ou erro
                if (isset($_SESSION['emprestimo_mensagem'])) {
                    echo "<p class='success-message'>" . $_SESSION['emprestimo_mensagem'] . "</p>";
                    unset($_SESSION['emprestimo_mensagem']);
                }
            } else {
                echo "<p class='error-message'>Livro não encontrado.</p>";
            }
        }
        ?>
    </div>
    
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background: url('img/Tela-fundo-login.png') no-repeat center center fixed; background-size: cover;">
<style>
.logo{
    position:absolute;
    top:30px;
    left:70px;
}

</style>
<img class="logo" src="img/Logo_Horizontal_white.png" width="170px">   
    <style>
a{
    position:absolute;
    top:40px;
    left:91%;
    text-decoration:none;
    font-size:23px;
    color:black;
 
            padding: 10px; /* Adiciona um preenchimento ao redor do texto para melhor aparência */
            transition: color 0.3s ease, border-color 0.3s ease; /* Adiciona uma transição suave para a mudança de cor */
            animation: colorChange 2s infinite;
            width:100px
}

a:hover {
            color: rgb(0, 86, 179); /* Cor quando o mouse passa sobre o link em RGB */
            border-color: rgb(0, 86, 179); /* Borda quando o mouse passa sobre o link em RGB */
        }

        @keyframes colorChange {
            0% {
                color: rgb(0, 123, 255);
                border-color: rgb(0, 123, 255);
            }
            50% {
                color: rgb(255, 0, 0); /* Cor desejada no meio da animação em RGB */
                border-color: rgb(255, 0, 0); /* Borda desejada no meio da animação em RGB */
            }
            100% {
                color: rgb(0, 123, 255);
                border-color: rgb(0, 123, 255);
            }
        }
       </style>
    <a href="listarlivros.php">Voltar </a>
</body>
</html>