<?php
include "set_session.php";

include "entrada.php";

$usuario_id = $_SESSION["usuarios_id"];
$productos_id = $_POST["producto_id"];
$fecha_entrada = $_POST["fecha_entrada"];
$cantidad_kg = $_POST["peso"];
$cantidad_unidades = $_POST["unidades"];
$cantidad_cajas = $_POST["cajas"];
$precio_total = $_POST["precio_total"];

$entrada = new entrada();

if (isset($_POST["producto_id"]) and isset($_POST["fecha_entrada"]) and isset($_POST["unidades"])){


    $res = $entrada->insert($usuario_id,$productos_id,$fecha_entrada,$cantidad_kg,$cantidad_unidades,$cantidad_cajas,$precio_total);

    if($res == false){

    	$return="ERROR";

    	echo $return;
    } 

    $resultado = $entrada->select_all();

	$return = '<table class="table table-hover"><thead>
			<tr>
				<th>id</th>
				<th>fecha_entrada</th>
			</tr>
		</thead>
		<tbody>';

	while ($res = $resultado->fetch_assoc()){

		$return = $return.'<tr>
				<td>'.$res["id"].'</td>

				<td>'.$res["fecha_entrada"].'</td>
			</tr>';

	}
	$return = $return.'</tbody>
	</table>';

	}





echo $return; ?>