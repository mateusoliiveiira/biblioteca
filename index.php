<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="img/favicon-32x32.png" type="image/x-icon">
    <title>Bvirtual</title>
</head>
<body>

    
</body>




<!---------------------------------------------------------------------------------------------------------------------------->
<div class="rolt" id="initial-rolt">
        <!-- Seu rolt e links aqui -->
        
     
        <a href="listarlivros.php">Ir para Ebooks</a>
        <a href="contato.php">Ir para Contato</a>
        
    </div>




    <div id="banner-container">
    <?php
    // Lista de URLs das imagens
    $imageURLs = array(
        'img/banner1index.png',
        'img/banner2index.png'
       
    );

    // Gera elementos de imagem dinamicamente
    foreach ($imageURLs as $index => $url) {
        echo "<img class='image' src='$url' alt='Imagem " . ($index + 1) . "'>";
    }
    ?>
</div>

<div class="button-container">
    <div class="button" onclick="changeImage(0)"></div>
    <div class="button" onclick="changeImage(1)"></div>
    
</div>










    

</div>




<!---------------------------------------------------------------------------------------------------------------------------->

 <!-------Cabecalho--------> 
 <header>
<nav class="link">
        <a href="#">Pagina Inicial</a>
        <a href="listarlivros.php">eBooks</a>
        <a href="contato.php">Contato</a>
  
       
     
</nav>
<!---------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------Usuario-login---------------->
<a href="#" class="confirm-link" onclick="confirmLogout()">   
<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
    exit;
}

echo "<h1 class='welcome-message'>Olá, " . $_SESSION["usuario"] . "</h1>";
?>
</a>
    







<!-----------------LOGO----------------->

<img class="logo" src="img/Logo_Horizontal_white.png" width="170px">






   <!-- Rodapé -->
   <footer>
        

      
        <div class="footer-text">
            <p>&copy; 2023 Bvirtual. Todos os direitos reservados.</p>
            <p>Desenvolvido por <a href="https://mateusoliiveiira.github.io/" target="_blank">Mateus Oliveira</a></p>
        </div>
    </footer>




  
</head>
<body>
   







    

</body>
</html>

<script>
        document.addEventListener("DOMContentLoaded", function() {
            var video = document.getElementById("background-video");

            video.addEventListener("ended", function() {
                // Aguarda 10 segundos antes de reiniciar o vídeo
                setTimeout(function() {
                    video.currentTime = 0;
                    video.play();
                }, 90000); // 10000 milissegundos = 10 segundos
            });
        });
    </script>
        <script>
        window.addEventListener("scroll", function() {
            var rolt = document.getElementById("initial-rolt");
            if (window.scrollY > 0) {
                rolt.id = "fixed-rolt";
            } else {
                rolt.id = "initial-rolt";
            }
        });
    </script>



<script>
function confirmLogout() {
    var confirmLogout = confirm("Você realmente deseja sair da sua conta?");
    if (confirmLogout) {
        window.location.href = 'logout.php';
    }
}
</script>





<script>
    let currentIndex = 0;
    const images = document.querySelectorAll('.image');
    const buttons = document.querySelectorAll('.button');

    images[currentIndex].style.display = 'block';
    buttons[currentIndex].classList.add('active');

    function changeImage(index) {
        images[currentIndex].style.transform = 'translateX(-100%)';
        buttons[currentIndex].classList.remove('active');

        setTimeout(() => {
            images[currentIndex].style.display = 'none';
            images[currentIndex].style.transform = 'translateX(0)';
            currentIndex = index;
            images[currentIndex].style.display = 'block';
            buttons[currentIndex].classList.add('active');
        }, 500);
    }

    function autoAdvance() {
        images[currentIndex].style.transform = 'translateX(-100%)';
        buttons[currentIndex].classList.remove('active');

        setTimeout(() => {
            images[currentIndex].style.display = 'none';
            images[currentIndex].style.transform = 'translateX(0)';
            currentIndex = (currentIndex + 1) % images.length;
            images[currentIndex].style.display = 'block';
            buttons[currentIndex].classList.add('active');
        }, 500);
    }

    const intervalId = setInterval(autoAdvance, 9000);

    buttons.forEach((button, index) => {
        button.addEventListener('click', () => {
            clearInterval(intervalId);
            changeImage(index);
        });
    });
</script>

