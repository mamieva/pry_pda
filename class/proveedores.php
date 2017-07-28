<?php
 
 	include "database.php";

	class proveedores{

		private $id ;
		private $nombre;
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


			$res = $this->db->query("insert into proveedores (nombre,ciudad,provincia,pais) values ('".$nombre."','".$ciudad."','".$provincia."','".$pais."');");

			return $res;

		}

		public function update($id,$nombre,$ciudad,$provincia,$pais){


			$res = $this->db->query(" update proveedores set nombre = '".$nombre."',ciudad ='".$ciudad."', provincia = '".$provincia."','".$pais."',fecha_modificado = now() where id = ".$id."; ");

			return $res;
		}

		public function delete($id){

			$res = $this->db->query(" delete from proveedores where id = ".$id."; ");

			return $res;
		}

		public function select_all(){


			$res = $this->db->query(" select * from proveedores; ");

			return $res;
		}


		public function select_limit($inicio,$cantidad){


			$res = $this->db->query(" select * from proveedores limit ".$inicio.",".$cantidad."; ");

			return $res;

		}

		public function select_fila($id){


			$res = $this->db->query(" select * from proveedores where id =".$id."; ");

			return $res;

		}



	}

?>