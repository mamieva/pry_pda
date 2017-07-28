<?php
 
 	include "database.php";

	class locales{

		private $id ;
		private $nombre;
		private $direccion;
		private $ciudad;
		private $provincia;
		private $pais;
		private $fecha_creado;
		private $fecha_modificado;
		private $db;




		function __construct(){

			$this->db = new database();

		}


		public function insert($nombre,$ciudad,$provincia,$pais){


			$res = $this->db->query("insert into locales (nombre,direccion,ciudad,provincia,pais) values ('".$nombre."','".$direccion."','".$ciudad."','".$provincia."','".$pais."');");

			return $res;

		}

		public function update($id,$nombre,$ciudad,$provincia,$pais){


			$res = $this->db->query(" update locales set nombre = '".$nombre."',direccion = '".$direccion."',ciudad ='".$ciudad."', provincia = '".$provincia."','".$pais."',fecha_modificado = now() where id = ".$id."; ");

			return $res;
		}

		public function delete($id){

			$res = $this->db->query(" delete from locales where id = ".$id."; ");

			return $res;
		}

		public function select_all(){


			$res = $this->db->query(" select * from locales; ");

			return $res;
		}


		public function select_limit($inicio,$cantidad){


			$res = $this->db->query(" select * from locales limit ".$inicio.",".$cantidad."; ");

			return $res;

		}

		public function select_fila($id){


			$res = $this->db->query(" select * from locales where id =".$id."; ");

			return $res;

		}



	}

?>