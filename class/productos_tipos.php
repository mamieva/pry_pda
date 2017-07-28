<?php
 
 	include "database.php";

	class productos_tipos{

		private $id ;
		private $nombre;
		private $descripcion;
		private $fecha_creado;
		private $fecha_modificado;
		private $db;




		function __construct(){

			$this->db = new database();

		}


		public function insert($nombre,$descripcion){


			$res = $this->db->query("insert into productos_tipos (nombre,descripcion) values ('".$nombre."','".$descripcion."');");

			return $res;

		}

		public function update($id,$nombre,$descripcion){


			$res = $this->db->query(" update productos_tipos set nombre = '".$nombre."',contraseña ='".$descripcion."',fecha_modificado = now() where id = ".$id."; ");

			return $res;
		}

		public function delete($id){

			$res = $this->db->query(" delete from usuarios_tipos where id = ".$id."; ");

			return $res;
		}

		public function select_all(){


			$res = $this->db->query(" select * from productos_tipos; ");

			return $res;
		}


		public function select_limit($inicio,$cantidad){


			$res = $this->db->query(" select * from productos_tipos limit ".$inicio.",".$cantidad."; ");

			return $res;

		}

		public function select_fila($id){


			$res = $this->db->query(" select * from productos_tipos where id =".$id."; ");

			return $res;

		}



	}

?>