<?php 

	include_once("database.php");

	$db = new database();


  	function login($usuario,$password,$db){

  		$resultado = $db->query("select * from USUARIOS where usuario ='".$usuario ."' and contraseña = password('".$password."'); ");
 		$resultado = $resultado->fetch_assoc();
      
      return $resultado; 

  	}


  	if (isset($_POST["usuario"]) and $_POST["password"]){

	  	$res = login($_POST["usuario"],$_POST["password"],$db);

	  	if (  $res["id"] != "") {

	  		print_r($res);

	  		session_start();
	  		$_SESSION["usuarios_id"] = $res["id"];
	  		$_SESSION["usuarios_nombre"] = $res["usuario"];
	  		$_SESSION["usuarios_tipos_id"] = $res["Usuarios_Tipos_id"];

	  		header("Location:../inicio.html");
	  	}
	  	else{

	  		header("Location:destruir.php");
		}
	}

	else{

	  		header("Location:destruir.php");
	}


 ?>