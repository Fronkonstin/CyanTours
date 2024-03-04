<?php
session_start();
include "./bbdd/One.php";
include "./email/confirmacion.php";

// Obtener los valores de id_ciudad y nombre_pais de la URL
if (isset($_GET['id_tour'])) {
    $id_tour = $_GET['id_tour'];

    // Almacenar los valores en la sesión
    $_SESSION['id_tour'] = $id_tour;
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

        <!-- row -->
        <div class="row2 mb-5" style="padding-top: 10%; text-align: justify;">

        <?php
        $id_tour = $_SESSION['id_tour'];

        // Obtener los valores de id_ciudad y nombre_pais de la URL
        foreach (obtenerDatosTours($id_tour) as $descripcionTours) {
        ?>

            <div class="col-md-6" id="<?php echo $descripcionTours['id_tour'] ?>"> 
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $descripcionTours['nombre_tour'] ?></h2>
                        <p><?php echo $descripcionTours['descripcion_2'] ?></p>
                        <p><?php echo $descripcionTours['descripcion_3'] ?></p>
                        <p><?php echo $descripcionTours['descripcion_4'] ?></p>
                        <br>
                        <img style="width: 50%; height: auto; padding-bottom: 5%;" alt="<?php echo $descripcionTours['nombre_tour'] ?>" src="<?php echo $descripcionTours['ruta_img_tour'] ?>" class="card-img"> 
                        <br>                       
                        <h3>Datos del tour</h3>
                        <p>Punto de inicio: <?php echo $descripcionTours['punto_inicio'] ?></p>
                        <p>Punto final: <?php echo $descripcionTours['punto_final'] ?></p>
                        <p>Cupo mínimo: 5</p>
                        <p>Cupo máximo: 30</p>
                        <p>Comienzo del tour: 10:00 AM</p>
                        <p>Duración aproximada del tour: 3 horas</p>
                    </div>          
            </div> 

        <?php
        $id_tour=$descripcionTours['id_tour'];
        }
        ?>

        </div><!-- end of row -->


    <!--footer & pre footer -->
    <div class="contact-section">
        <div class="overlay"></div>
        <!-- container -->
        <div class="container">
            <div class="col-md-10 col-lg-8 m-auto">
                <h6 class="title mb-2">Tus datos</h6>
                <p class="mb-5">Las reservas deben hacerse con 2 días de antelación.</p>
                <form action="formulario.php" method="POST" class="form-group">
                    <input type="text" name="nombre" id="nombre" size="50" class="form-control" placeholder="Nombre" required>
                    <input type="text" name="apellidos" id="apellidos" size="50" class="form-control" placeholder="Apellidos" required>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" requried>

                    <!-- En el numero de reservas se podria hacer la consulta sql para saber cuantas reservas se pueden hacer -->
                    <input type="number" name="num_personas" size="50" class="form-control" placeholder="Número de personas" required min="1" max="30">

                    <input type="date" name="fecha_reserva" size="50" class="form-control" placeholder="Fecha" required>
                    <input type="submit" name="enviar" value="Confirmar reserva" class="form-control">
                </form>
            </div>
            
            <?php
            
            // enviar los datos
            if(isset($_POST["enviar"])){
                $nombre=$_POST["nombre"];
                $apellidos=$_POST["apellidos"];
                $email=$_POST["email"];
                $num_personas=$_POST["num_personas"];
                $fecha_reserva=$_POST["fecha_reserva"];
                $id_tour = $_SESSION['id_tour'];
                
                $resultado = inserto($email, $nombre, $apellidos, $num_personas, $fecha_reserva, $id_tour);
                $nombreApellidos = comprobarNombre($email);
                if ($nombreApellidos !== false && !compararNombreEmail($email, $nombre, $apellidos)) {
                    echo '<h5 style="color: #d2d2d2; position: relative; z-index: 1000;">El nombre y los apellidos asociados a ese email son:</h5>';
            
                    foreach ($nombreApellidos as $row) {
                        echo "<h5 style='color: #d2d2d2; position: relative; z-index: 1000;'>Nombre: </h5><h5 style='color: #49adba; position: relative; z-index: 1000;'>" . $row['nombre'] . "</h5><h5 style='color: #d2d2d2; position: relative; z-index: 1000;'><br> Apellidos: </h5><h5 style='color: #49adba; position: relative; z-index: 1000;'>" . $row['apellidos'] . "</h5><br>";
                    }

                } elseif ($resultado == false) {
                    echo $resultado;
                } else {
                    inserto($email,$nombre,$apellidos,$num_personas,$fecha_reserva,$id_tour);
                    echo '<script>';
                    echo 'alert("Se ha enviado un correo con los datos de tu reserva");';
                    echo 'window.location.href = "index.php";';
                    echo '</script>';
                }

            }
           
            
            ?>

            <!-- LOGO -->
            <a href="index.php"><img class="mi-clase" style="padding-top: 10%; width: 20%; height: auto; position: relative; z-index: 1000;" alt="logo" src="./imgs/IMG_S.png"></a>

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
