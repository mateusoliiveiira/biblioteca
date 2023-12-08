<?php
session_start();

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);
    $email = $_POST["email"];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=final", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro na conexão com o Banco de Dados: " . $e->getMessage());
    }

    // Verifica se o usuário já está cadastrado no banco de dados
    $stmt_check = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt_check->execute([$usuario]);

    if ($stmt_check->rowCount() > 0) {
        $mensagem = "Usuário já cadastrado. Escolha um nome de usuário diferente.";
    } else {
        // Insere os dados na tabela 'usuarios'
        $stmt_insert = $pdo->prepare("INSERT INTO usuarios (usuario, senha, email) VALUES (?, ?, ?)");
        $stmt_insert->execute([$usuario, $senha, $email]);

        if ($stmt_insert->rowCount() > 0) {
            $_SESSION["usuario"] = $usuario;
            $mensagem = "Usuário cadastrado com sucesso!";
            header("Location: index.php");
        } else {
            $mensagem = "Erro ao cadastrar o usuário. Tente novamente.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/register.css">
<link rel="shortcut icon" href="img/favicon-32x32.png" type="image/x-icon">

<head>
    <title>Cadastro de login</title>
</head>
<body style="background: url('img/Tela-fundo-login.png') no-repeat center center fixed; background-size: cover;">




<img class="logo" src="img/Logo_Horizontal_white.png" width="300px">
<h1>Cadastrar</h1>
    <h2><?php echo $mensagem; ?></h2>

    <form method="post">
        <table>
            <tr>
                <td><input type="text" name="usuario" placeholder="Nome de Usuário" required></td>
            </tr>
            <tr>
                <td><input type="password" name="senha" placeholder="Senha" required></td>
            </tr>
            <tr>
                <td><input type="email" name="email" placeholder="Email" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="Cadastrar"></td>
            </tr>
        </table>
    </form>

      <h3>Já Tem Login? </h3>
      <a href="Login.php">Logar   </a>


</body>

</html>
