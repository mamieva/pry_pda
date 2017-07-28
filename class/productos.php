<?php
 
 	include "database.php";

	class productos{

		private $id ;
		private $nombre;
		private $descripcion;
		private $cantidad_unidades_caja;
		private $precio_costo;
		private $precio_venta;
		private $tipo_precio;
		private $peso_unidad;
		private $marcas_id;
		private $productos_tipos_id;
		private $fecha_creado;
		private $fecha_modificado;
		private $db;




		function __construct(){

			$this->db = new database();

		}


		public function insert($nombre,$descripcion){


			$res = $this->db->query("insert into productos (nombre,descripcion,cantidad_unidades_caja,precio_costo,precio_venta,tipo_precio,peso_unidad,marcas_id,productos_tipos_id) values ('".$nombre."','".$descripcion."',".$cantidad_unidades_caja.",".$precio_costo.",".$precio_venta.",'".$tipo_precio."',".$peso_unidad.",".$marcas_id.",".$productos_tipos_id.");");

			return $res;

		}

		public function update($id,$nombre,$descripcion){


			$res = $this->db->query(" update productos set nombre = '".$nombre."',contraseña ='".$descripcion."', cantidad_unidades_caja = ".$cantidad_unidades_caja.", precio_costo = ".$precio_costo." , precio_venta = ".$precio_venta." , tipo_precio = '".$tipo_precio."', peso_unidad =". $peso_unidad.", marcas_id = ".$marcas_id." , productos_tipos_id = ".$productos_tipos_id." ,fecha_modificado = now() where id = ".$id."; ");

			return $res;
		}

		public function delete($id){

			$res = $this->db->query(" delete from productos where id = ".$id."; ");

			return $res;
		}

		public function select_all(){


			$res = $this->db->query(" select * from productos; ");

			return $res;
		}


		public function select_limit($inicio,$cantidad){


			$res = $this->db->query(" select * from productos limit ".$inicio.",".$cantidad."; ");

			return $res;

		}

		public function select_fila($id){


			$res = $this->db->query(" select * from productos where id =".$id."; ");

			return $res;

		}
		public function select_por_marca($id){


			$res = $this->db->query(" select * from productos where marcas_id =".$id."; ");

			return $res;

		}



	}

?>