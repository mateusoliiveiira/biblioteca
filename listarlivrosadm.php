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

$stmt = $pdo->query("SELECT * FROM cadastrarlivros ");
$stmt->execute();
$livros = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon-32x32.png" type="image/x-icon">
    <title>Listar Livros</title>
    <link rel="stylesheet" href="listarlivros.css">
</head>

<body>
    <style>
body, h1, h2, p, table {
    margin: 0;
    padding: 0;
}

/* Apply a background color and some basic styling to the body */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

/* Style the container holding your content */
.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style the heading */
h2 {
    color: #333;
}

/* Style the table */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

/* Style table header */
thead {
    background-color: #eee;
}

th, td {
    padding: 10px;
    text-align: left;
}

/* Style alternating rows */
tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* Style the link for updating a book */
a {
    text-decoration: none;
    color: #3498db;
}

a:hover {
    text-decoration: underline;
}

/* Style the "Cadastrar Novo Livro" link */
p a {
    display: inline-block;
    margin-top: 20px;
    padding: 10px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
}

p a:hover {
    background-color: #2980b9;
}


</style>
    <div class="container">
        <h2>Listar Livros</h2>

        <?php if (!empty($livros)) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Capa</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Gênero</th>
                        <th>Ano de Publicação</th>
                        <th>Descrição</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($livros as $livro) : ?>
                        <tr>
                            <td><img style="max-width: 50px;" src="<?= $livro['imagem'] ?>"></td>
                            <td><?= $livro['titulo'] ?></td>
                            <td><?= $livro['autor'] ?></td>
                            <td><?= $livro['genero'] ?></td>
                            <td><?= $livro['ano_publicacao'] ?></td>
                            <td><?= $livro['descricao'] ?></td>
                            <td><a href="atualizarlivros.php?id=<?php echo $livro['id']; ?>">Atualizar Livro</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>Nenhum livro encontrado.</p>
        <?php endif; ?>

        <p><a href="cadastrarlivros.php">Cadastrar Novo Livro</a></p>
        <a class="pdf" href="pdf.php">Imprimir</a>
    </div>
    
<?php
} else {
    header('Location: index.php');
}




?>
</body>

</html>