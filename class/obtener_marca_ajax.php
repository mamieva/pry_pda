<?php
include "set_session.php";

include "marcas.php";

$marca = new Marcas();
$return = '<option value="-1"> - SELECCIONE UN VALOR - </option>';

if (isset($_POST["proveedores_id"]) and ($_POST["proveedores_id"]!= '-1' or $_POST["proveedores_id"]!= '')){

    $res = $marca->select_por_proveedor($_POST["proveedores_id"]);


    while($resultado = $res->fetch_assoc()){

    	$return = $return.'<option value="'.$resultado["id"].'">'.$resultado["nombre"].'</option>';
    }

}
echo $return; ?>