<?php
include "set_session.php";

include "productos.php";

$producto = new productos();
$return = array();

if (isset($_POST["productos_id"]) and ($_POST["productos_id"]!= '-1' or $_POST["productos_id"]!= '')){

    $res = $producto->select_fila($_POST["productos_id"]);

    $i=0;

    while($resultado = $res->fetch_assoc()) {

    	$return[$i] = $resultado;
    	$i++;
    }    


}


echo json_encode($return); ?>