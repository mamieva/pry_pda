<?php
 
 	include "database.php";

	class productos_tipos{

		private $id ;
		private $locales_id;
		private $productos_id;
		private $cantidad_cajas;
		private $cantidad_kg;
		private $cantidad_unidades;
		private $fecha_creado;
		private $fecha_modificado;
		private $db;




		function __construct(){

			$this->db = new database();

		}


		public function insert($productos_id,$cantidad_cajas,$cantidad_kg,$cantidad_unidades){


			$res = $this->db->query("insert into productos_stock (productos_id,cantidad_cajas,cantidad_kg,cantidad_unidades) values (".$productos_id.",".$cantidad_cajas.",".$cantidad_kg.",".$cantidad_unidades.");");

			return $res;

		}

		public function update($productos_id,$cantidad_cajas,$cantidad_kg,$cantidad_unidades){


			$res = $this->db->query(" update productos_stock set cantidad_cajas = ".$cantidad_cajas.",cantidad_kg = ".$cantidad_kg.", cantidad_unidades = ".$cantidad_unidades." ,fecha_modificado = now() where productos_id = ".$productos_id."; ");

			return $res;
		}

		public function delete($productos_id){

			$res = $this->db->query(" delete from productos_stock where productos_id = ".$productos_id."; ");

			return $res;
		}

		public function select_all(){


			$res = $this->db->query(" select * from productos_stock; ");

			return $res;
		}


		public function select_producto_limit($productos_id,$inicio,$cantidad){


			$res = $this->db->query(" select * from productos_stock where productos_id = .".$productos_id." limit ".$inicio.",".$cantidad."; ");

			return $res;

		}

		public function select_stock_producto($productos_id){


			$res = $this->db->query(" select * from productos_stock where productos_id =".$productos_id."; ");

			return $res;

		}



	}

?>