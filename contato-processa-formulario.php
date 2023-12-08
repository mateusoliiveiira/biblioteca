




<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];

    $destinatario = "mateusoliiveira000@gmail.com"; // Substitua pelo seu endereço de e-mail

    $assunto = "Nova mensagem do formulário de contato";
    $corpo = "Nome: $nome\nEmail: $email\nMensagem:\n$mensagem";

    // Enviar e-mail
    mail($destinatario, $assunto, $corpo);

    // Redirecionar para uma página de confirmação
    header("Location: contato-sucesso.php");
    exit();
}
?>

