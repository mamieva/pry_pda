<?php
 
 	include "database.php";

	class salida{

		private $id ;
		private $usuarios_id;
		private $locales_emisor_id;
		private $locales_receptor_id;
		private $repartidores_id;
		private $productos_id;
		private $fecha_salida;		
		private $tipo_salida;
		private $cantidad_cajas;
		private $cantidad_unidades;
		private $cantidad_kg;
		private $precio_total;
		private $situacion;
		private $fecha_creado;
		private $fecha_modificado;
		private $db;




		function __construct(){

			$this->db = new database();

		}


		public function insert($usuarios_id,$locales_emisor_id,$locales_receptor_id,$repartidores_id,$productos_id,$fecha_salida,$tipo_salida,$cantidad_cajas,$cantidad_unidades,$cantidad_kg,$precio_total,$situacion,$fecha_creado,$fecha_modificado){


			$res = $this->db->query("INSERT INTO `punta del agua`.`salida`
										(`cantidad_cajas`,
										`cantidad_kg`,
										`cantidad_unidades`,
										`fecha_creado`,
										`fecha_modificado`,
										`fecha_salida`,
										`Locales_emisor_id`,
										`Locales_receptor_id`,
										`precio_total`,
										`Productos_id`,
										`Repartidores_id`,
										`situacion`,
										`tipo_salida`,
										`Usuarios_id`)
										VALUES
										(
										".$cantidad_cajas.",
										".$cantidad_kg.",
										".$cantidad_unidades.",
										".$fecha_creado.",
										".$fecha_modificado.",
										".$fecha_salida.",
										".$locales_emisor_id.",
										".$locales_receptor_id.",
										".$precio_total.",
										".$productos_id.",
										".$repartidores_id.",
										".$situacion.",
										".$tipo_salida.",
										".$usuarios_id."
										);");

			return $res;

		}

		public function update($id,$usuario,$contraseña){


			$res = $this->db->query(" UPDATE `punta del agua`.`salida`
										SET
										`cantidad_cajas` = {cantidad_cajas: },
										`cantidad_kg` = {cantidad_kg: },
										`cantidad_unidades` = {cantidad_unidades: },
										`fecha_creado` = {fecha_creado: CURRENT_TIMESTAMP},
										`fecha_modificado` = {fecha_modificado: },
										`fecha_salida` = {fecha_salida: },
										`Locales_emisor_id` = {Locales_emisor_id: },
										`Locales_receptor_id` = {Locales_receptor_id: 0},
										`precio_total` = {precio_total: },
										`Productos_id` = {Productos_id: },
										`Repartidores_id` = {Repartidores_id: 0},
										`situacion` = {situacion: },
										`tipo_salida` = {tipo_salida: },
										`Usuarios_id` = {Usuarios_id: }
										WHERE <{where_condition}>;");

			return $res;
		}

		public function habilitar($id){

			$res = $this->db->query(" update salida set situacion = 'HAB',fecha_modificado = now() where id = ".$id."; ");

			return $res;

		} 

		public function suspender($id){

			$res = $this->db->query(" update salida set situacion = 'SUS',fecha_modificado = now() where id = ".$id."; ");

			return $res;

		}

		public function select_all(){


			$res = $this->db->query(" select * from salida; ");

			return $res;
		}


		public function select_limit($inicio,$cantidad){


			$res = $this->db->query(" select * from salida limit ".$inicio.",".$cantidad."; ");

			return $res;

		}
		public function select_fila($id){


			$res = $this->db->query(" select * from salida where id =".$id."; ");

			return $res;

		}
		public function delete($id){

			$res = $this->db->query(" delete from salida where id = ".$id."; ");

			return $res;
		}





	}

?>