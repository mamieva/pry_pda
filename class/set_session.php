<?php
 session_start();
 if (!(isset($_SESSION)) or !(isset($_SESSION["usuarios_id"])) ){

        include("class/destruir.php");
        }

  else{

            //echo $_SESSION["usuarios_id"];
        }
 ?>