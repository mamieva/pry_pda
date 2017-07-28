<?php
 
 	include "database.php";

	class usuarios{

		private $id ;
		private $usuario;
		private $contraseña;
		private $usuarios_tipos_id;
		private $fecha_creado;
		private $fecha_modificado;
		private $db;




		function __construct(){

			$this->db = new database();

		}


		public function insert($usuario,$contraseña,$usuarios_tipos_id){


			$res = $this->db->query("insert into usuarios (usuario,contraseña,usuarios_tipos_id) values ('".$usuario."',password('".$contraseña."'),".$usuarios_tipos_id.");");

			return $res;

		}

		public function update($id,$usuario,$contraseña){


			$res = $this->db->query(" update usuarios set usuario = '".$usuario."',contraseña = password('".$contraseña."'),usuarios_tipos_id = ".$usuarios_tipos_id.",fecha_modificado = now() where id = ".$id."; ");

			return $res;
		}

		public function habilitar($id){

			$res = $this->db->query(" update usuarios set situacion = 'HAB',fecha_modificado = now() where id = ".$id."; ");

			return $res;

		} 

		public function suspender($id){

			$res = $this->db->query(" update usuarios set situacion = 'SUS',fecha_modificado = now() where id = ".$id."; ");

			return $res;

		}

		public function select_all(){


			$res = $this->db->query(" select * from usuarios_v; ");

			return $res;
		}


		public function select_limit($inicio,$cantidad){


			$res = $this->db->query(" select * from usuarios_v limit ".$inicio.",".$cantidad."; ");

			return $res;

		}

		public function select_fila($id){


			$res = $this->db->query(" select * from usuarios_v where id =".$id."; ");

			return $res;

		}

		public function delete($id){

			$res = $this->db->query(" delete from usuarios where id = ".$id."; ");

			return $res;
		}





	}

?>