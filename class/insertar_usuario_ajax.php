<?php

	include "set_session.php";
	include "usuarios.php";

	$nuevo =new usuarios();

	$usuario = $_POST["usuario"];
	$contraseña = $_POST["contraseña"];
	$usuarios_tipos_id = $_POST["usuarios_tipos_id"];

	$return = $nuevo->insert($usuario,$contraseña,$usuarios_tipos_id);

	echo $return;

 ?>

