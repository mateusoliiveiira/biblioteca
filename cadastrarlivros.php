<?php
session_start();
if($_SESSION ['permissao'] == 1){

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $genre = $_POST["genre"];
    $published_year = $_POST["published_year"];
    $description = $_POST["description"];

    // Verifica se um arquivo de imagem foi enviado
    if (isset($_FILES["cover_image"]) && $_FILES["cover_image"]["error"] == 0) {
        $target_dir = "uploads/"; // Pasta onde as imagens serão armazenadas
        $target_file = $target_dir . basename($_FILES["cover_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verifica se o arquivo é uma imagem
        $valid_extensions = array("jpg", "jpeg", "png", "gif");
        if (in_array($imageFileType, $valid_extensions)) {
            // Move o arquivo para a pasta de uploads
            move_uploaded_file($_FILES["cover_image"]["tmp_name"], $target_file);

            // Insere os dados (incluindo o caminho da imagem) na tabela 'livros'
            $stmt = $pdo->prepare("INSERT INTO cadastrarlivros (titulo, autor, genero, ano_publicacao, descricao, imagem) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$title, $author, $genre, $published_year, $description, $target_file]);

            // Redireciona para listarlivros.php após cadastrar o livro
            header("Location: #");
            exit();
        } else {
            echo "Formato de arquivo inválido. Por favor, envie uma imagem nos formatos JPG, JPEG, PNG ou GIF.";
        }
    } else {
        echo "Erro no envio do arquivo de imagem.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="cadastrarlivros.css">
</head>
<style>
/* Reset de estilos para garantir uma base consistente em diferentes navegadores */
body, h1, h2, p, form, label, input, textarea {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.container {
    max-width: 600px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #333;
    margin-bottom: 20px;
}

form {
    display: grid;
    gap: 10px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="number"],
textarea,
input[type="file"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    margin-bottom: 10px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}


</style>
<body>
    <div class="container">
        <h2>Cadastrar Livro</h2>
        <form method="post" enctype="multipart/form-data">
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" required>

            <label for="author">Autor:</label>
            <input type="text" id="author" name="author" required>

            <label for="genre">Gênero:</label>
            <input type="text" id="genre" name="genre" required>

            <label for="published_year">Ano de Publicação:</label>
            <input type="number" id="published_year" name="published_year" required>

            <label for="description">Descrição:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="cover_image">Capa do Livro:</label>
            <input type="file" id="cover_image" name="cover_image" accept="image/*" required>

            <input type="submit" value="Cadastrar Livro">
        </form>
    </div>
    <?php
} else {
    header('Location: index.php');
}
?>
</body>

</html>