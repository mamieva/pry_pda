<?php
 
 	include "database.php";

	class repartidores{

		private $id ;
		private $nombre;
		private $apellido;
		private $domicilio;
		private $num_documento;
		private $fecha_creado;
		private $fecha_modificado;
		private $db;




		function __construct(){

			$this->db = new database();

		}


		public function insert($nombre,$apellido,$domicilio,$num_documento){


			$res = $this->db->query("insert into repartidores (nombre,apellido,domicilio,num_documento) values ('".$nombre."','".$apellido."','".$domicilio."',".$num_documento.");");

			return $res;

		}

		public function update($id,$nombre,$apellido,$domicilio,$num_documento){


			$res = $this->db->query(" update repartidores set nombre = '".$nombre."',apellido ='".$apellido."', domicilio = '".$domicilio."',".$num_documento.",fecha_modificado = now() where id = ".$id."; ");

			return $res;
		}

		public function delete($id){

			$res = $this->db->query(" delete from repartidores where id = ".$id."; ");

			return $res;
		}

		public function select_all(){


			$res = $this->db->query(" select * from repartidores; ");

			return $res;
		}


		public function select_limit($inicio,$cantidad){


			$res = $this->db->query(" select * from repartidores limit ".$inicio.",".$cantidad."; ");

			return $res;

		}

		public function select_fila($id){


			$res = $this->db->query(" select * from repartidores where id =".$id."; ");

			return $res;

		}



	}

?>