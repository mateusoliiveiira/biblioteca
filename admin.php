<?php
session_start();
if($_SESSION ['permissao'] == 1){

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=, initial-scale=1.0">
        <link rel="shortcut icon" href="img/favicon-32x32.png" type="image/x-icon">
        <link rel="stylesheet" href="css/admin.css">
        <title>Admin</title>
    </head>
    <body>
    
    <body style="background: url('img/Background-admin.png') no-repeat center center fixed; background-size: cover;">
        <!-----------------LOGO----------------->
    
    <img class="logo" src="img/Logo_Horizontal_white.png" width="300px">
    <?php
    
    if (!isset($_SESSION["usuario"])) {
        header("location: login.php");
        exit;
    }
    
    echo "<h1 class='welcome-message'>Sejá Bem Vindo a Sua Pagina, " . $_SESSION["usuario"] . "</h1>";
    ?>
    </a>
    
    <div class="menu">
            <a href="#" class="toggle-link" onclick="toggleTable()">MENU</a>
            <table id="myTable" class="table-show">
                <tr>
                    <th>Menu</th>
                </tr>
                <tr>
                    <td><a href="index.php">Ir para a Página Inicial</a></td>
                </tr>
                <tr>
                    <td><a href="listarlivrosadm.php">Cadastrar Livros</a></td>
                </tr>
                <tr>
                    <td><a href="usuarioscadastrador.php">Cadastro de Pessoas</a></td>
                </tr>

                <!-- Adicione isso onde deseja exibir os livros reservados -->
                <td><a href="livros_emprestados.php">Ver Livros Reservados</a></td>
                </tr>

            </table>
        </div>
    </body>
    </html>
    
    
    <!-----------Script de Menu--------------->
    <script>
            function toggleTable() {
                var table = document.getElementById("myTable");
                if (table.style.display === "none") {
                    table.style.display = "table";
                } else {
                    table.style.display = "none";
                }
            }
        </script>
            <script>
            function toggleTable() {
                var table = document.getElementById("myTable");
                table.classList.toggle("table-show");
            }
        </script>
   <script>
        function toggleTable() {
            var table = document.getElementById("myTable");
            table.classList.toggle("table-show");
        }
    </script>
<?php
} else {
    header('Location: index.php');
}
?>


