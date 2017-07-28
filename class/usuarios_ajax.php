<?php

echo '<link rel="stylesheet" href="css/bootstrap-table.css">


<div class="panel panel-info">
    <div class="panel-heading"><i class="fa fa-pencil-square-o"></i> Usuarios Activos </div>

    <div id="usuarios_botonera" style="padding: 10px"; >
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Modal_Usuario" id="agregar_usuario">Agregar Usuario</button> 
    <button style="margin-left: 5px" id="eliminar_usuario" type="button" class="btn btn-danger" disabled>Eliminar Usuario</button>
    <button style="margin-left: 5px" id="suspender_usuario" type="button" class="btn btn-warning" disabled>Suspender Usuario</button>
    <button style="margin-left: 5px" id="habilitar_usuario" type="button" class="btn btn-success" disabled>Habilitar Usuario</button>
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#Modal_Usuario_Tipo" id="agregar_usuario_tipo">Agregar Tipo de Usuario</button> 

    </div>

    <div class="panel-body">
        <div class="row ">
                
                <div class="col-xs-12">                
                <table data-click-to-select="true" data-single-select="true" data-toggle="table" data-show-refresh="true" data-sort-name="id" data-sort-order="asc" id="table-pagination" data-url="class/obtener_usuarios_ajax.php" data-height="500" data-pagination="true" data-search="true" data-show-columns="true">
                <thead>
                    <tr>
                        <th data-field="state" data-checkbox="true"></th>
                        <th data-field="id" data-align="right" data-sortable="true">ID</th>
                        <th data-field="usuario" data-align="center" data-sortable="true">Nombre</th>
                        <th data-field="tipos_nombre" data-sortable="true" data-sortable="true">Tipo de Usuario</th>
                        <th data-field="situacion" data-sortable="true" data-sortable="true">Situacion</th>


                    </tr>
                </thead>
            </table>


                </div>

            </div>    
        </div>
</div>

<div id="Modal_Usuario" class="modal fade">

  <div class="modal-dialog">
    <div class="modal-content">
    <div class="col-xs-10 col-xs-offset-1" style="padding-top:20px" id="mensaje_usuario"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Agregar Nuevo Usuario</h4>
      </div>
      <div class="modal-body">
        <p></p> <form id="form_usuario">
        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" id="usuario" >
        </div>
        <div class="form-group">
            <label for="contraseña">Contraseña</label>
            <input type="password" class="form-control" id="contraseña" >
        </div>
        <div class="form-group">
            <label for="usuarios_tipos_id">Tipo de Usuario</label>
            <select class="form-control" id="usuarios_tipos_id" >
            </select>
            </form>
        </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="guardar_usuario">Guardar</button>
      </div>
      <div class="col-xs-10 col-xs-offset-1" id="mensaje_usuario"></div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="Modal_Usuario_Tipo" class="modal fade">

  <div class="modal-dialog">
    <div class="modal-content">
    <div class="col-xs-10 col-xs-offset-1" style="padding-top:20px" id="mensaje_usuario"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Agregar Nuevo Usuario</h4>
      </div>
      <div class="modal-body">
        <p></p> <form id="form_usuario">
        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" id="usuario" >
        </div>
        <div class="form-group">
            <label for="contraseña">Contraseña</label>
            <input type="password" class="form-control" id="contraseña" >
        </div>
        <div class="form-group">
            <label for="usuarios_tipos_id">Tipo de Usuario</label>
            <select class="form-control" id="usuarios_tipos_id" >
            </select>
            </form>
        </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="guardar_usuario">Guardar</button>
      </div>
      <div class="col-xs-10 col-xs-offset-1" id="mensaje_usuario"></div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script src="js/bootstrap-table.js"></script>
<script src="js/usuarios.js"></script>

';
 ?>