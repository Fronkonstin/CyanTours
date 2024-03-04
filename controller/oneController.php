<?php

require('../bbdd/One.php');

$datosTours = obtenerDatosTour();  

if (count($datosTours) > 0){

    $datosTours = mb_convert_encoding($datosTours, 'UTF-8', 'ISO-8859-1');

    echo json_encode($datosTours);   

}

else{

    echo json_encode(false);

}













