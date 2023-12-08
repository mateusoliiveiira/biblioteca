<?php
// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter dados do formulário
    $imageURL = $_POST['imageURL'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Armazenar os dados (poderia ser em um banco de dados, mas para este exemplo, usaremos um arquivo)
    $booksFile = 'livros.json';

    // Carregar dados existentes, se houver
    $books = [];
    if (file_exists($booksFile)) {
        $books = json_decode(file_get_contents($booksFile), true);
    }

    // Adicionar novo livro
    $newBook = ['imageURL' => $imageURL, 'title' => $title, 'description' => $description];
    $books[] = $newBook;

    // Salvar os dados atualizados
    file_put_contents($booksFile, json_encode($books));

    // Redirecionar de volta para a página de cadastro
    header('Location: cadastrar-livros.php');
    exit;
}
?>
