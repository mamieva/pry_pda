<?php
 
 	include "database.php";

	class marcas{

		private $id ;
		private $proveedores_id;
		private $nombre;
		private $descripcion;
		private $fecha_creado;
		private $fecha_modificado;
		private $db;




		function __construct(){

			$this->db = new database();

		}


		public function insert($nombre,$descripcion,$proveedores_id){


			$res = $this->db->query("insert into marcas (nombre,descripcion,proveedores_id) values ('".$nombre."','".$descripcion."',".$proveedores_id.");");

			return $res;

		}

		public function update($id,$nombre,$descripcion,$proveedores_id){


			$res = $this->db->query(" update marcas set proveedores_id =".$proveedores_id.", nombre = '".$nombre."',contraseña ='".$descripcion."',fecha_modificado = now() where id = ".$id."; ");

			return $res;
		}

		public function delete($id){

			$res = $this->db->query(" delete from marcas where id = ".$id."; ");

			return $res;
		}

		public function select_all(){


			$res = $this->db->query(" select * from marcas; ");

			return $res;
		}


		public function select_limit($inicio,$cantidad){


			$res = $this->db->query(" select * from marcas limit ".$inicio.",".$cantidad."; ");

			return $res;

		}

		public function select_fila($id){


			$res = $this->db->query(" select * from marcas where id =".$id."; ");

			return $res;

		}

		public function select_por_proveedor($id){


			$res = $this->db->query(" select * from marcas where proveedores_id =".$id."; ");

			return $res;

		}



	}

?>