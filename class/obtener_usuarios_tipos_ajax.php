<?php include "set_session.php";

include "usuarios_tipos.php";

$usuario_tipo = new usuarios_tipos();

$res =$usuario_tipo->select_all();
$return="";

while ($resultado = $res->fetch_assoc()){

	$return = $return."<option value='".$resultado["id"]."''>".$resultado["nombre"]."</option>";
}

echo $return;


?>