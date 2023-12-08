

<?php
session_start();
if($_SESSION ['permissao'] == 1){
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

// Consulta para obter os livros emprestados
$stmt = $pdo->query("SELECT * FROM cadastrarlivros WHERE emprestado = 1");
$livrosEmprestados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Contador para o total de livros emprestados
$totalLivrosEmprestados = count($livrosEmprestados);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon-32x32.png" type="image/x-icon">
    <title>Livros Emprestados</title>
    <style>

body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        a:hover {
            color: #207cca;
        }

        p {
            color: #888;
        }

</style>
</head>

<body>
    <style>
        /* Seu estilo CSS permanece inalterado */
    </style>
    <h2>Livros Emprestados</h2>

    <?php
    if ($totalLivrosEmprestados > 0) {
        echo "<p>Total de livros emprestados: " . $totalLivrosEmprestados . "</p>";
        echo "<table>";
        echo "<tr><th>Título</th><th>Autor</th><th>Gênero</th><th>Ano de Publicação</th><th>Descrição</th><th>Ação</th></tr>";

        foreach ($livrosEmprestados as $livro) {
            echo "<tr>";
            echo "<td>" . $livro['titulo'] . "</td>";
            echo "<td>" . $livro['autor'] . "</td>";
            echo "<td>" . $livro['genero'] . "</td>";
            echo "<td>" . $livro['ano_publicacao'] . "</td>";
            echo "<td>" . $livro['descricao'] . "</td>";
            echo "<td><a href='processa_devolucao.php?id=" . $livro['id'] . "'>Devolver Livro</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Nenhum livro emprestado no momento.</p>";
    }
    ?>
<?php
} else {
    header('Location: index.php');
}
?>



</body>

</html>
