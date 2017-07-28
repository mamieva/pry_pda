<?php

echo '<div class="panel panel-info">
    <div class="panel-heading"><i class="fa fa-pencil-square-o"></i> Cargar Salida de Productos a Locales o Repartidores</div>

    <div class="panel-body">
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

                            </div>    </div>
</div>';
 ?>