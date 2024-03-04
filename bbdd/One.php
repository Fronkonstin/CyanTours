<?php


define("BBDD_PWD", //contraseña); 
define("BBDD_USER", //user);
define("BBDD_HOST", //host);
define("BBDD_NAME", //database); 


function conexion() {
    $conn = new PDO("mysql:host=".BBDD_HOST.";dbname=".BBDD_NAME, BBDD_USER, BBDD_PWD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $conn->exec("SET NAMES utf8");
    return $conn;
}

/*

//comprobacion de conexion con la base de datos
try {
    $conexion = conexion();
    echo "Conexión exitosa a la base de datos";
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}

*/

//obtener los datos de los paises
function obtenerPaises(){
    
    $sql="SELECT * 
        FROM pais
        ORDER BY nombre_pais";

    try {

        $conexion = conexion();
        $query = $conexion->prepare($sql);
        $query->execute();
    }

    catch (Exception $e) {
        echo 'Error en la conexion a la base de datos: ',  $e->getMessage(), "\n";
        return false;
    }

    $datosPaises = $query->fetchAll();

    return $datosPaises;
}

//obtener los datos de las ciudades
function obtenerCiudades($id_pais) {

    $sql = "SELECT *
        FROM ciudad
        WHERE id_pais = :id_pais
        ORDER BY nombre_ciudad";

    try {

        $conexion = conexion();
        $query = $conexion->prepare($sql);
        $query->bindParam(':id_pais', $id_pais);
        $query->execute();

    } catch (Exception $e) {
        echo 'Error en la conexión a la base de datos: ' . $e->getMessage();
        return false;
    }

    $datosCiudades = $query->fetchAll();

    return $datosCiudades;
}

//obtener los datos de los tours
function obtenerTours($id_ciudad){
    
    $sql="SELECT * 
        FROM tour
        WHERE id_ciudad = :id_ciudad
        ORDER BY nombre_tour";

    try {

        $conexion = conexion();
        $query = $conexion->prepare($sql);
        $query->bindParam(':id_ciudad', $id_ciudad);
        $query->execute();
    }

    catch (Exception $e) {
        echo 'Error en la conexion a la base de datos: ',  $e->getMessage(), "\n";
        return false;
    }

    $datosTours = $query->fetchAll();

    return $datosTours;
}

//obtener los datos del tour
function obtenerDatosTours($id_tour){
    
    $sql="SELECT * 
        FROM tour
        WHERE id_tour = :id_tour
        ORDER BY nombre_tour";

    try {

        $conexion = conexion();
        $query = $conexion->prepare($sql);
        $query->bindParam(':id_tour', $id_tour);
        $query->execute();
    }

    catch (Exception $e) {
        echo 'Error en la conexion a la base de datos: ',  $e->getMessage(), "\n";
        return false;
    }

    $descripcionTours = $query->fetchAll();

    return $descripcionTours;
}

//comprobar el cupo de personas
function comprobarCupo($id_tour, $num_personas, $fecha_reserva) {

    $sql = "SELECT 30-SUM(num_personas) AS total_personas
            FROM reserva
            WHERE id_tour = :id_tour AND fecha_reserva = :fecha_reserva AND estado_reserva = 1";

    try {

        $conexion = conexion();
        $query = $conexion->prepare($sql);
        $query->bindParam(':id_tour', $id_tour);
        $query->bindParam(':fecha_reserva', $fecha_reserva);
        $query->execute();
        
        $num_disponibles = $query->fetchColumn();

        if ($num_disponibles == null) {
            $num_disponibles = 30;
        }
        
        return $num_disponibles;

    } catch (Exception $e) {
        echo 'Error en la conexión a la base de datos: ', $e->getMessage(), "\n";
        return false;
    }

}

//comprobar el email
function comprobarEmail($email) {

    $sql = "SELECT * 
            FROM usuario
            WHERE email = :email ";

    try {
        $conexion = conexion();
        $query = $conexion->prepare($sql);
        $query->execute([':email' => $email]);

        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
        
    } catch (Exception $e) {
        echo 'Error en la conexión a la base de datos comprobar email: ', $e->getMessage(), "\n";
        return false;
    }
}

//comprobar el nombre en funcion del email
function comprobarNombre($email) {
    $sql = "SELECT nombre, apellidos
            FROM usuario
            WHERE email = :email ";

    try {
        $conexion = conexion();
        $query = $conexion->prepare($sql);
        $query->execute([':email' => $email]);

        if ($query->rowCount() > 0) {
            $nombreApellidos = $query->fetchAll();
            return $nombreApellidos;
        } else {
            return false;
        }
        
    } catch (Exception $e) {
        echo 'Error en la conexión a la base de datos comprobar email: ', $e->getMessage(), "\n";
        return false;
    }
}

//comprobar el nombre y apellidos
function compararNombreEmail($email, $nombre, $apellidos) {
    $nombreApellidos = comprobarNombre($email);

    if ($nombreApellidos !== false) {
        foreach ($nombreApellidos as $row) {
            if ($row['nombre'] === $nombre && $row['apellidos'] === $apellidos) {
                return true;
            }
        }
    }

    return false;
}

//comprobar la reserva
function comprobarReserva($id_reserva) {

    $sql = "SELECT * 
            FROM reserva 
            WHERE id_reserva = :id_reserva ";

    try {
        $conexion = conexion();
        $query = $conexion->prepare($sql);
        $query->execute([':id_reserva' => $id_reserva]);

        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
        
    } catch (Exception $e) {
        echo 'Error en la conexión a la base de datos comprobar reserva: ', $e->getMessage(), "\n";
        return false;
    }
}

//comprobar el estado
function comprobarEstado($email, $id_reserva) {

    $sql = "SELECT * 
            FROM reserva r
            INNER JOIN usuario u ON u.id_usuario = r.id_usuario  
            WHERE r.id_reserva = :id_reserva AND u.email = :email AND r.estado_reserva = 1 ";

    try {
        $conexion = conexion();
        $query = $conexion->prepare($sql);
        $query->bindParam(':id_reserva', $id_reserva);
        $query->bindParam(':email', $email);
        $query->execute();

        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
        
    } catch (Exception $e) {
        echo 'Error en la conexión a la base de datos comprobar estado: ', $e->getMessage(), "\n";
        return false;
    }
}

//insertar reserva y enviar correo confirmacion
function inserto($email, $nombre, $apellidos, $num_personas, $fecha_reserva, $id_tour) {

    try {
        $conexion = conexion();
        
        // Verificar si el número de personas ingresado es mayor que el número de personas disponibles
        $num_disponibles = comprobarCupo($id_tour, $num_personas, $fecha_reserva);

        if ($num_personas > $num_disponibles || $num_personas <= 0 ) {
            echo "<hr><h5 style='color: #d2d2d2; position: relative; z-index: 1000;'>El número de personas que has ingresado es mayor que el número de plazas disponibles.<br><br>Quedan $num_disponibles plazas disponibles.</h5><br>";
            return false;
        } elseif (strtotime($fecha_reserva) - strtotime(date("Y-m-d")) < 2 * 24 * 60 * 60) {
            echo "<hr><h5 style='color: #d2d2d2; position: relative; z-index: 1000;'>No se permiten hacer reservas con menos de 2 días de antelación.</h5><br>";
            return false;
        } else {
            // Verificar si el usuario ya existe en la base de datos
            $sql_verificar = "SELECT id_usuario FROM usuario WHERE email = :email";
            $query_verificar = $conexion->prepare($sql_verificar);
            $query_verificar->bindParam(':email', $email);
            $query_verificar->execute();

            if ($query_verificar->rowCount() > 0) {
                // El usuario ya existe, insertar solo en la tabla reserva
                $id_usuario = $query_verificar->fetch(PDO::FETCH_ASSOC)['id_usuario'];

                $sql_reserva = "INSERT INTO reserva (id_reserva,num_personas, fecha_reserva, fecha_actual, estado_reserva, id_tour, id_usuario) 
                                VALUES (UUID(), :num_personas, :fecha_reserva, NOW(), 1, :id_tour, :id_usuario)";
                $query_reserva = $conexion->prepare($sql_reserva);
                $query_reserva->bindParam(':num_personas', $num_personas);
                $query_reserva->bindParam(':fecha_reserva', $fecha_reserva);
                $query_reserva->bindParam(':id_tour', $id_tour);
                $query_reserva->bindParam(':id_usuario', $id_usuario);
                $query_reserva->execute();
            } else {
                // El usuario no existe, insertar en la tabla usuario y luego en la tabla reserva
                $sql_usuario = "INSERT INTO usuario (nombre, apellidos, email) VALUES (:nombre, :apellidos, :email)";
                $query_usuario = $conexion->prepare($sql_usuario);
                $query_usuario->bindParam(':nombre', $nombre);
                $query_usuario->bindParam(':apellidos', $apellidos);
                $query_usuario->bindParam(':email', $email);
                $query_usuario->execute();

                $id_usuario = $conexion->lastInsertId();

                $sql_reserva = "INSERT INTO reserva (id_reserva,num_personas, fecha_reserva, fecha_actual, estado_reserva, id_tour, id_usuario) 
                                VALUES (UUID(), :num_personas, :fecha_reserva, NOW(), 1, :id_tour, :id_usuario)";
                $query_reserva = $conexion->prepare($sql_reserva);
                $query_reserva->bindParam(':num_personas', $num_personas);
                $query_reserva->bindParam(':fecha_reserva', $fecha_reserva);
                $query_reserva->bindParam(':id_tour', $id_tour);
                $query_reserva->bindParam(':id_usuario', $id_usuario);
                $query_reserva->execute();
            }

            // Preparar la consulta
            $sql_consulta = "SELECT u.email, u.nombre, u.apellidos, r.num_personas, r.fecha_reserva, t.nombre_tour, r.id_reserva 
                             FROM reserva r
                             INNER JOIN usuario u ON u.id_usuario = r.id_usuario
                             INNER JOIN tour t ON t.id_tour = r.id_tour
                             WHERE u.email = :email AND u.nombre = :nombre AND u.apellidos = :apellidos AND r.num_personas = :num_personas AND r.fecha_reserva = :fecha_reserva AND r.id_tour = :id_tour AND r.estado_reserva = 1";
            
            $query_consulta = $conexion->prepare($sql_consulta);
            $query_consulta->bindParam(':email', $email);
            $query_consulta->bindParam(':nombre', $nombre);
            $query_consulta->bindParam(':apellidos', $apellidos);
            $query_consulta->bindParam(':num_personas', $num_personas);
            $query_consulta->bindParam(':fecha_reserva', $fecha_reserva);
            $query_consulta->bindParam(':id_tour', $id_tour);
            $query_consulta->execute();
            
            // Obtener el resultado de la consulta
            //$resultado = $query_consulta->fetch(PDO::FETCH_ASSOC);
            $resultado = $query_consulta->fetch();
            
            // Obtener el valor de id_reserva
            $nombre_tour = $resultado['nombre_tour'];
            $id_reserva = $resultado['id_reserva'];
            

            // Utiliza el valor de $id_reserva como necesites
            correoConfirmacion ($email, $nombre, $apellidos, $num_personas, $fecha_reserva, $nombre_tour, $id_reserva);
            return true;
        }

    } catch (Exception $e) {
        // Revertir la transacción si ocurre un error
        echo 'Error en la conexión a la base de datos inserto: ', $e->getMessage(), "\n";
        return false;
    }

}

//cancelar reserva y enviar correo cancelacion
function cancelar($email, $id_reserva) {
    try {
        $conexion = conexion();
        $conexion->beginTransaction();

        $update = "UPDATE reserva 
                   SET estado_reserva = 0, fecha_actual = NOW() 
                   WHERE id_reserva = :id_reserva ";

        $sql = "SELECT u.email, u.nombre, u.apellidos, r.fecha_actual
                FROM reserva r
                INNER JOIN usuario u ON u.id_usuario = r.id_usuario  
                WHERE r.id_reserva = :id_reserva AND u.email = :email AND r.estado_reserva = 0 ";

        $query = $conexion->prepare($update);
        $query->bindParam(':id_reserva', $id_reserva);
        $query->execute();

        $query_select = $conexion->prepare($sql);
        $query_select->bindParam(':id_reserva', $id_reserva);
        $query_select->bindParam(':email', $email);
        $query_select->execute();

        $data = $query_select->fetch();
        $email = $data['email'];
        $nombre = $data['nombre'];
        $apellidos = $data['apellidos'];
        $fecha_actual = $data['fecha_actual'];

        correoCancelacion ($email, $nombre, $apellidos, $fecha_actual);
        $conexion->commit();
        
    } catch (Exception $e) {
        $conexion->rollback();
        echo 'Error en la conexión a la base de datos cancelar: ', $e->getMessage(), "\n";
        return false;
    }
}




