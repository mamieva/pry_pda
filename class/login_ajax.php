<?php

	include_once("database.php");

	$db = new database();


  	function login($usuario,$password,$db){

  		$resultado = $db->query("select usuarios.ID ID,usuarios.USUARIO,usutip.NOMBRE from USUARIOS usuarios,USUARIOS_TIPOS usutip where usuarios.usuario ='".$usuario ."' and usuarios.contraseña = password('".$password."') and situacion = 'HAB' and usuarios.Usuarios_tipos_id = usutip.ID; ");
 		$resultado = $resultado->fetch_assoc();
      
      return $resultado; 

  	}

  	if( isset($_POST["usuario"]) and isset($_POST["password"]) ){

  		$res = login($_POST["usuario"],$_POST["password"],$db);

  		if($res["ID"] != ""){

        session_start();
        $_SESSION["usuarios_id"] = $res["ID"];
        $_SESSION["usuarios_nombre"] = $res["USUARIO"];
        $_SESSION["usuarios_tipo"] = $res["NOMBRE"];

  			echo "SI";
  		}

  		else{

  			echo "NO";
  		}
  	}

    else{
    echo "NO";}
?>