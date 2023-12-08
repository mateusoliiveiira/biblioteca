<?php
session_start();

if (isset($_POST['livro'])) {
    // Obtém o valor do livro da solicitação POST
    $livro = $_POST['livro'];

    // Define a variável de sessão
    $_SESSION['usuario'] = $livro;

    // Responda para indicar o sucesso ou qualquer outra informação necessária
    echo 'Variável de sessão definida com sucesso para o livro: ' . $livro;
} else {
    // Se o parâmetro não for fornecido, envie uma resposta de erro
    header('HTTP/1.1 400 Bad Request');
    echo 'Erro: Parâmetro "livro" não fornecido na solicitação.';
}
?>
