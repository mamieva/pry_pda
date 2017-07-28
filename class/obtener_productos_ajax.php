<?php
include "set_session.php";

include "productos.php";

$producto = new productos();
$return = '<option value="-1"> - SELECCIONE UN VALOR - </option>';

if (isset($_POST["marca_id"]) and ($_POST["marca_id"]!= '-1' or $_POST["marca_id"]!= '')){

    $res = $producto->select_por_marca($_POST["marca_id"]);


    while($resultado = $res->fetch_assoc()){

    	$return = $return.'<option value="'.$resultado["id"].'">'.$resultado["nombre"].'</option>';
    }
    


}


echo $return; ?>