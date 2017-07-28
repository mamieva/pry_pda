<!DOCTYPE html>
<?php include "class/set_session.php"; ?>
<html lang="">
    <head>
        <title>Title Page</title>
        <meta charset="UTF-8">
        <meta name=description content="">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="font-awesome-4.1.0/css/font-awesome.css">
        <link href="css/styles.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="css/simple-sidebar.css" media="screen">

        
    </head>
    <body class="fondo_inicio">
    <div id="wrapper" class="col-xs-12">

        <!--<nav class="navbar navbar-fixed-top navbar-inverse">
            <a class="navbar-brand" href="#"><?php echo ucfirst(strtolower($_SESSION["usuarios_nombre"]))."-".ucfirst(strtolower($_SESSION["usuarios_tipo"])); ?></a>
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Link</a>
                </li>
            </ul>
        </nav>-->

        
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand menu-title ">
                    <a href="#">
                        Punta del Agua
                    </a>
                </li>
                <li >
                    <a id="menu-title-user" href="#">
                        <?php echo ucfirst(strtolower($_SESSION["usuarios_nombre"]))." (".ucfirst(strtolower($_SESSION["usuarios_tipo"])).")"; ?>
                    </a>
                </li>
                <li>
                    <a id="entrada" href="#"><i class="fa fa-arrow-down"></i>  Entrada</a>
                </li>
                <li>
                    <a id="salida" href="#"><i class="fa fa-arrow-up"></i>  Salida</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> Estadisticas</a>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-cogs"></i> Administracion <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a id="usuarios" href="#">Usuarios</a></li>
                        <li><a href="#">Locales/Repartidores</a></li>
                        <li><a href="#">Productos</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Proveedores</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="class/destruir.php"><i class="fa fa-times"></i> Cerrar Sesión</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <a href="#" class="btn btn-default" id="menu-toggle"><i id="icon-toogle" class="fa fa-angle-double-left"></i></a>
        <div id="contenedor" class=" container">
                <div class="col-sm-8 col-md-8 col-md-offset-2">
                    <div class="row">
                            <div class="col-xs-12">
                                
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-xs-12">
                                
                            </div>
                    </div>

                    <div class="row">
                        <div id="contenedor-interno" class="col-xs-12">

                            <!--<div class="content-box ">

                            <div class="content-box-header">Cargar Datos de Entrada</div>

                            <div class="row ">
                                
                                <div class="col-xs-10 col-xs-offset-1">
                                
                                <form action="#" method="POST" class="form" role="form">
                                           
                                    <div class="form-group">
                                        <label for="dia_entrada">Fecha de Entrada</label>
                                        <input type="date" class="form-control" id="dia_entrada" >
                                    </div>
                                
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="proveedor_id">Proveedor</label>
                                            <select class="form-control" name="proveedor" id="proveedor_id">
                                                <option value="-1" selected>-SELECCIONE UN VALOR-</option>
                                                <option value="12">La Serenisima SA - Cordoba</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="marca_id">Marca del Producto</label>
                                            <select class="form-control" name="marca" id="marca_id">
                                                <option value="-1" selected>-SELECCIONE UN VALOR-</option>
                                                <option value="12">Los Robledos</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                    <div class="form-group">
                                        <label for="producto_id">Producto</label>
                                        <select class="form-control" name="marca" id="producto_id">
                                            <option value="-1" selected>-SELECCIONE UN VALOR-</option>
                                            <option value="12">Salame Milan (Picado Grueso)</option>
                                        </select>
                                    </div>

                                <div class="row">

                                    <div class="col-xs-4">
                                        <div class="form-group">
                                              <label for="peso">Peso Kg.</label>
                                                <input class="form-control number" type="number" step="any" id="peso" />
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="unidades">Cantidad de Unidades</label>
                                                <input class="form-control number" type="number" step="any" id="unidades" />
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                                <label for="cajas">Cantidad de Cajas</label>
                                                <input class="form-control number" type="number" step="any" id="cajas" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="precio_unidad">Precio </label>
                                            <input step="any" class="form-control number" type="number" id="precio_unidad">
                                        </div>

                                    </div>

                                    <div class="col-xs-6">

                                        <div class="form-group">
                                            <label for="precio_tipo">Precio Por: </label>
                                            <select class="form-control" name="precio_tipo" id="precio_tipo">
                                                <option value="-1" selected>-SELECCIONE UN VALOR-</option>
                                                <option value="KIG">Kilogramo</option>
                                                <option value="CAJ">Caja</option>
                                                <option value="UNI">Unidad</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                    <div class="form-group">
                                        <label for="precio_total">Precio Total</label>
                                        <input class="form-control number" type="number" id="precio_total">
                                    </div>                    

                                <button type="submit" class="btn btn-primary">Submit</button>

                         
                            </form>


                                </div>

                            </div>-->
                            
                            </div>
                        </div>
                    </div>
                        
                </div>                    
        </div>
    </div>
        <!-- jQuery -->
        <script src="http://code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="js/bootstrap.js"></script>
        <script src="js/menu.js"> </script>
        <script>
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            var res = $("#icon-toogle").attr("class"); 
            if ( res == "fa fa-angle-double-left"){

                $("#icon-toogle").attr('class', "fa fa-angle-double-right");
            }
            else{

                $("#icon-toogle").attr('class', "fa fa-angle-double-left");
            }
            });
        </script>
        
        </body>
    </html>