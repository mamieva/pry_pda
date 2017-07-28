<?php
 
 	include "database.php";

	class usuarios_tipos{

		private $id ;
		private $nombre;
		private $codigo;
		private $descripcion;
		private $db;




		function __construct(){

			$this->db = new database();

		}


		public function insert($nombre,$codigo,$descripcion){


			$res = $this->db->query("insert into usuarios_tipos (nombre,codigo,descripcion) values ('".$nombre."','".$codigo."','".$descripcion."');");

			return $res;

		}

		public function update($id,$usuario,$contraseña){


			$res = $this->db->query(" update usuarios_tipos set nombre = '".$nombre."',contraseña = '".$codigo."',descripcion = '".$descripcion."' where id = ".$id."; ");

			return $res;
		}

		public function select_all(){


			$res = $this->db->query(" select * from usuarios_tipos; ");

			return $res;
		}


		public function select_limit($inicio,$cantidad){


			$res = $this->db->query(" select * from usuarios_tipos limit ".$inicio.",".$cantidad."; ");

			return $res;

		}

		public function select_fila($id){


			$res = $this->db->query(" select * from usuarios_tipos where id =".$id."; ");

			return $res;

		}





	}

?>