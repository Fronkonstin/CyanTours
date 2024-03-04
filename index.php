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
        <div class="col-md-10 col-lg-8 m-auto">
            <h6 class="title mb-4">Explora el mundo</h6>
            <p class="mb-5">Te proponemos un viaje por los países mas bonitos de toda Europa.</p>
        </div>  

        <!-- row -->
        <div class="row1 mb-4" id="paises">
            
            <?php
            foreach (obtenerPaises() as $datosPaises) {
            ?>
            
                <div class="col-md-4" id="<?php echo $datosPaises['id_pais'] ?>">
                    <a href="ciudad.php?id_pais=<?php echo $datosPaises['id_pais'] ?>" class="overlay-img">
                        <img alt="<?php echo $datosPaises['nombre_pais'] ?>" src="<?php echo $datosPaises['ruta_img_pais'] ?>">   
                        <div class="overlay"></div> 
                        <div class="des">
                            <h1 class="title"><?php echo $datosPaises['nombre_pais'] ?></h1>
                            <p><?php echo $datosPaises['descripcion_pais'] ?></p>
                        </div>          
                    </a>
                </div> 
            
            <?php
            }
            ?> 

            <div class="col-md-4">
                <a href="contactar.php" class="overlay-img">
                    <img alt="mapita" src="./imgs/mapita.jpg">   
                    <div class="overlay"></div> 
                    <div class="des">
                        <h1 class="title">¿Te gustaría visitar</h1>
                        <h1 class="title">otro sitio?</h1>
                        <p>Dinos donde te gustaría ir</p>
                    </div>          
                </a>
            </div> 

        </div><!-- end of row -->

    </div> <!-- end of page container -->

    <!--footer & pre footer -->
    <div class="contact-section">

    <!-- LOGO -->
            <a href="index.php"><img class="mi-clase" style="width: 12%; height: auto; position: relative; z-index: 1000;" alt="logo" src="./imgs/IMG_S.png"></a>
            
        <div class="overlay"></div>
        <!-- container -->
        <div class="container">
            
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
