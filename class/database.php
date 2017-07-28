<?php

  class database {


  	public $mysql_server = "localhost";
  	public $mysql_user = "root";
  	public $mysql_password = "";
  	public $mysql_db = "Punta del Agua";
  	public $mysql_connect;




  	function database() {
	  	
  			
  	}


  	function conectar(){

  		$this->mysql_connect = new mysqli($this->mysql_server, $this->mysql_user, $this->mysql_password,$this->mysql_db);
	  	if ($this->mysql_connect->connect_errno) {
	  		printf("La Conexion ha Fallado : %s \n", $this->mysql_connect->connect_error);
	  		exit();
	  	}
	  	$this->mysql_connect->set_charset("utf8");
  	}

  	function cerrar(){

  		if (! $this->mysql_connect->close()){

  		   echo "Se Produjo un Error de Base de Datos,contactese con el administrador";

  		};

  	}

  	function query($query){


  		$this->conectar();
  		if (!$resultado = $this->mysql_connect->query($query) ){

        $this->cerrar();

  			return false;
  		}
  		
  		$this->cerrar();
  		return $resultado;

  	}

  }




 ?>