<?php
session_start();
include "./bbdd/One.php";

// Obtener los valores de id_ciudad y nombre_pais de la URL
if (isset($_GET['id_pais'])) {
    $id_pais = $_GET['id_pais'];

    // Almacenar los valores en la sesión
    $_SESSION['id_pais'] = $id_pais;
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
        <div class="col-md-10 col-lg-8 m-auto">
            <h6 class="title mb-4 mt-5 pt-5">El viaje</h6>
            <p class="mb-5">Comienza justo aquí.</p>
        </div>

        <!-- row -->
        <div class="row2 mb-5">

            <?php
            $id_pais = $_SESSION['id_pais'];
            
            foreach (obtenerCiudades($id_pais) as $datosCiudades) {
            ?>
            
                <div class="col-md-6" id="<?php echo $datosCiudades['id_pais'] ?>">
                    <a href="tour.php?id_ciudad=<?php echo $datosCiudades['id_ciudad'] ?>" class="card">
                        <img alt="<?php echo $datosCiudades['nombre_ciudad'] ?>" src="<?php echo $datosCiudades['ruta_img_ciudad'] ?>" class="card-img">  
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $datosCiudades['nombre_ciudad'] ?></h3>
                            <p><?php echo $datosCiudades['descripcion_ciudad'] ?></p>
                        </div>          
                    </a>
                </div> 
            
            <?php
            }
            ?>

        </div><!-- end of row -->

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
