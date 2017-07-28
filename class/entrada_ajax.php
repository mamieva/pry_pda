<?php
include "set_session.php";

include "proveedores.php";

$proveedor = new Proveedores();

$res = $proveedor->select_all();

$return = '';
while($resultado = $res->fetch_assoc()){

	$return = $return.'<option value="'.$resultado["id"].'">'.$resultado["nombre"].'</option>';
}


echo '<div class="content-box ">

                            <div class="content-box-header">Cargar Datos de Entrada</div>

                            <div class="row ">
                                
                                <div class="col-xs-10 col-xs-offset-1">
                                
                                <form id="form_entrada" action="#" method="POST" class="form" role="form">
                                           
                                    <div class="form-group">
                                        <label for="dia_entrada">Fecha de Entrada </label>
                                        <input type="date" class="form-control" id="dia_entrada" name="fecha_entrada" >
                                    </div>
                                
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="proveedor_id">Proveedor</label>
                                            <select id="proveedor_id" class="form-control" name="proveedor_id" >
                                                <option value="-1" selected>-SELECCIONE UN VALOR-</option>
                                                '.$return.'
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="marca_id">Marca del Producto</label>
                                            <select class="form-control" name="marca_id" id="marca_id">
                                                <option value="-1" selected>-SELECCIONE UN VALOR-</option>
                                                <option value="12">Los Robledos</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                    <div class="form-group">
                                        <label for="producto_id">Producto</label>
                                        <select class="form-control" name="producto_id" id="producto_id">
                                            <option value="-1" selected>-SELECCIONE UN VALOR-</option>
                                            <option value="12">Salame Milan (Picado Grueso)</option>
                                        </select>
                                    </div>

                                <div class="row">

                                    <div class="col-xs-4">
                                        <div class="form-group">
                                              <label for="peso">Peso Kg. <input type="radio" name="check" value="peso"></label>
                                                <input class="form-control number" type="number" step="any" id="peso" name="peso" />
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="unidades">Cantidad de Unidades <input type="radio" name="check" value="unidades"></label>
                                                <input class="form-control number" type="number" step="any" id="unidades" name="unidades" />
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                                <label for="cajas">Cantidad de Cajas <input type="radio" name="check" value="cajas"></label>
                                                <input class="form-control number" type="number" step="any" id="cajas" name="cajas" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="precio_unidad">Precio </label>
                                            <input step="any" class="form-control number" name="precio_unidad" type="number" id="precio_unidad" disabled>
                                        </div>

                                    </div>

                                    <div class="col-xs-6">

                                        <div class="form-group">
                                            <label for="precio_tipo">Precio Por: </label>
                                            <select class="form-control" name="precio_tipo" id="precio_tipo" disabled>
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
                                        <input class="form-control number" name="precio_total" type="number" id="precio_total">
                                    </div>                    

                                <button type="button" id="submit_entrada" class="btn btn-primary">Crear Entrada</button>

                         
                            </form>


                                </div>

                            </div>

                            <div id="tabla"></div> 
                            <script src="js/entrada.js"></script>'; ?>