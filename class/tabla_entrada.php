<?php 
include "entrada.php";
$entrada = new entrada();

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


echo $return;


	

?>


