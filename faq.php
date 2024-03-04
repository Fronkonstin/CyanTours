<?php

session_start();
include "./bbdd/One.php";
include "./email/enviar_email.php";

header('Content-Type: text/html; charset=UTF-8');

?>
<!-- TODO recuerda quitar la opcion del cambio de color en el resto de paginas -->
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
        <div class="col-md-10 col-lg-8 m-auto" style="text-align: justify;">
            <h2 class="title mb-4" style="padding-bottom: 5%;">Preguntas frecuentes</h2>
            <h3 class="card-title">¿Qué es un free tour?</h3>
            <p>Un free tour es una visita guiada en la que tú decides cuánto quieres pagar al guía.</p> 
            <p style="padding-bottom: 5%;">La reserva de cualquiera de nuestros tours es completamente gratuita. Una vez finalices el tour, podrás pagar al guía en función de su trabajo.</p>

            <h3>¿Cómo puedo reservar un tour?</h3> 
            <p style="padding-bottom: 5%;">Para reservar un tour en nuestra web tan sólo tienes que encontrar el tour que deseas realizar y rellenar los datos solicitados.
                 Una vez realizada la reserva recibirás un correo con la confirmación.</p>

            <h3>¿Cómo recibiré la confirmación de mi reserva?</h3> 
            <p style="padding-bottom: 5%;">Una vez que hayas completado el proceso de reserva, recibirás un correo electrónico de confirmación con todos los detalles 
                de tu reserva. Te recomendamos revisar tu carpeta de correo no deseado si no encuentras el correo de confirmación en tu bandeja 
                de entrada.</p>

            <h3>¿Cómo puedo cancelar la reserva?</h3>
            <p style="padding-bottom: 5%;">Puedes acceder desde la web a tu reserva proporcionando la información solicitada y encontrarás un botón para cancelar la misma.</p>

            <h3>¿Dónde encontraré al guía?</h3>
            <p style="padding-bottom: 5%;">En la confirmación de la reserva te indicaremos todos los detalles del tour entre ellos, el punto de encuentro. 
                Podrás ver al guía fácilmente ya que usará un distintivo de Cyan Tours.</p>

            <h3>¿A qué hora comienza el tour?</h3>
            <p style="padding-bottom: 5%;">Todos nuestros tours comienzan a las 10:00. Recomendamos llegar al punto de encuentro al menos 10 minutos antes de 
                la hora de salida.</p>

            <h3>¿Qué debo llevar en el tour?</h3> 
            <p style="padding-bottom: 5%;">En algunos de nuestros tours andaremos bastante, por lo que te recomendamos llevar ropa y calzado cómodo y adecuado 
                para la temporada, una botella de agua y algún snack. Además, asegúrate de leer la descripción del tour para conocer cualquier requisito adicional.</p>

            <p style="padding-bottom: 5%;">Si tienes alguna pregunta que no se encuentre en este apartado, no dudes en escribirnos a través de nuestro formulario 
                de contacto.</p>

        </div>  

    </div> <!-- end of page container -->

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
