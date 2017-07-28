<?php 
	include 'set_session.php';
	include "usuarios.php";

	$usuario = new usuarios();
	$return = array();

	$resultado= $usuario->select_all();

	$i=0;

	while ( $res = $resultado->fetch_assoc()) {
		
		$return[$i] = $res;
		$i++;
	}

	echo json_encode($return);

?>