<?php
session_start();
include "./bbdd/One.php";
include "./email/contacto.php";

header('Content-Type: text/html; charset=UTF-8');

// Obtener los valores de id_ciudad y nombre_pais de la URL
if (isset($_GET['id_ciudad'])) {
    $id_ciudad = $_GET['id_ciudad'];

    // Almacenar los valores en la sesión
    $_SESSION['id_ciudad'] = $id_ciudad;
}



        // Verifica si se ha enviado el formulario
    if(isset($_POST["enviar"])){
        // Obtiene los valores del formulario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $mensaje = $_POST['mensaje'];

        // Envía el correo electrónico
        recibirCorreo($nombre, $email, $mensaje);
        echo '<script>';
        echo 'alert("Gracias por escribirnos");';
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }

        
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Dorang landing page.">
    <meta name="author" content="Devcrud">
    <title>Cyan</title>
    <!-- font icons -->
    <link rel="stylesheet" href="./vendors/themify-icons/css/themify-icons.css">

    <!-- Bootstrap + Dorang main styles -->
	<link rel="stylesheet" href="./css/dorang.css">
    <!-- fevicon -->
    <link rel="icon" href="./imgs/bbrujula.png" type="image/gif" />

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home" class="dark-theme">
    
    <!-- page navbar -->
    <nav class="page-navbar" data-spy="affix" data-offset-top="10">
        <ul class="nav-navbar container">
            <li class="nav-item"><a href="index.php" class="nav-link">Inicio</a></li>
            <li class="nav-item"><a href="tuReserva.php" class="nav-link">Cancelación</a></li>
            <li class="nav-item"><a href="index.php" class="nav-link"><img src="./imgs/brujula.png" alt="page"></a></li>
            <li class="nav-item"><a href="contactar.php" class="nav-link">Contacto</a></li>
            <li class="nav-item"><a href="faq.php" class="nav-link">FAQ</a></li>
        </ul>
    </nav><!-- end of page navbar -->


    <!-- page container -->
    <div class="container page-container" style="padding-top: 10%;">

        <div class="col-md-10 col-lg-8 m-auto" id="contacto">
            <h6 class="title mb-2">Contacta con nosotros</h6>
            <p class="mb-5">No te quedes con la duda, estamos aquí para ayudarte</p>
            <form action="contactar.php" method="POST" class="form-group">
                <input type="text" name="nombre" size="50" class="form-control" placeholder="Nombre" required>
                <input type="email" name="email" class="form-control" placeholder="Email" requried>
                <textarea name="mensaje" id="comment" rows="6" class="form-control" placeholder="Me gustaría decirles..."></textarea>
                <input type="submit" name="enviar" value="Enviar mensaje" class="form-control">
            </form>
        </div>

        
    </div><!-- end of page container -->

        <!--footer & pre footer -->
        <div class="contact-section">
        <div class="overlay"></div>
        <!-- container -->
        <div class="container">
            
            <!-- LOGO -->
            <a href="index.php"><img class="mi-clase" style="width: 20%; height: auto; position: relative; z-index: 1000;" alt="logo" src="./imgs/IMG_S.png"></a>

            <!-- footer -->
            <footer class="footer">
                <p class="infos">&copy; <script>document.write(new Date().getFullYear())</script>, Made with <i class="ti-heart text-danger"></i> by <a href="http://www.devcrud.com">DevCRUD</a></p>       
                <span>|</span>  
                <div class="links">
                    <a href="#">Acerca de...</a>
                    <a href="#">Explora</a>
                    <a href="#">Viaje</a>
                </div>
            </footer><!-- end of footer -->

        </div><!-- end of container -->
    </div><!-- end of pre footer -->

    <!-- core  -->
    <script src="./vendors/jquery/jquery-3.4.1.js"></script>
    <script src="./vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap affix -->
    <script src="./vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Dorang js -->
    <script src="./js/dorang.js"></script>

</body>
</html>
