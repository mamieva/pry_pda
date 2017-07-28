<?php
include "set_session.php";
include "usuarios.php";

$usuario = new usuarios();

$return ="";

$res = json_decode($_POST["resultado"],true);


foreach ($res as $user) {


	$id = $user["id"];

	if($usuario->delete($id)){

		$return = "SI";
	}
	else{

	$return = "NO";
	}
}

echo $return;
 ?>