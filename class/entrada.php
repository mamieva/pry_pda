<?php
 
 	include "database.php";

	class entrada{

		private $id ;
		private $usuario_id;
		private $productos_id;
		private $fecha_entrada;
		private $cantidad_kg;
		private $cantidad_unidades;
		private $cantidad_cajas;
		private $precio_total;
		private $situacion;
		private $fecha_creado;
		private $fecha_modificado;
		private $db;




		function __construct(){

			$this->db = new database();

		}


		public function insert($usuario_id,$productos_id,$fecha_entrada,$cantidad_kg,$cantidad_unidades,$cantidad_cajas,$precio_total){


			$res = $this->db->query("insert into entrada (usuarios_id,productos_id,fecha_entrada,cantidad_kg,cantidad_unidades,cantidad_cajas,precio_total) values (".$usuario_id.",".$productos_id.",'".$fecha_entrada."',".$cantidad_kg.",".$cantidad_unidades.",".$cantidad_cajas.",".$precio_total.");");

			return $res;

		}

		public function update($id,$usuario_id,$productos_id,$fecha_entrada,$cantidad_kg,$cantidad_unidades,$cantidad_cajas,$precio_total){


			$res = $this->db->query(" update entrada set usuario = '".$usuario."',contraseña = password('".$contraseña."'),entrada_tipos_id = ".$entrada_tipos_id.",fecha_modificado = now() where id = ".$id."; ");

			return $res;
		}

		public function habilitar($id){

			$res = $this->db->query(" update entrada set situacion = 'HAB',fecha_modificado = now() where id = ".$id."; ");

			return $res;

		} 

		public function suspender($id){

			$res = $this->db->query(" update entrada set situacion = 'SUS',fecha_modificado = now() where id = ".$id."; ");

			return $res;

		}

		public function select_all(){


			$res = $this->db->query(" select * from entrada; ");

			return $res;
		}


		public function select_limit($inicio,$cantidad){


			$res = $this->db->query(" select * from entrada limit ".$inicio.",".$cantidad."; ");

			return $res;

		}
		public function select_fila($id){


			$res = $this->db->query(" select * from entrada where id =".$id."; ");

			return $res;

		}
		public function delete($id){

			$res = $this->db->query(" delete from entrada where id = ".$id."; ");

			return $res;
		}





	}

?>