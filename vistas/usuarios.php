<?php
require 'header.php';
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Usuario <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>E-mail</th>
                            <th>Tipo</th>
                            <th>Nombre de Usuario</th>
                            <th>Contraseña</th>              
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>E-mail</th>
                            <th>Tipo</th>
                            <th>Nombre de Usuario</th>
                            <th>Contraseña</th>                           
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre:</label>
                            <input type="hidden" name="idusuario" id="idusuario">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Direccion:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" maxlength="256" placeholder="Direccion">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Telefono:</label>
                            <input type="text" class="form-control" name="tel" id="tel" maxlength="256" placeholder="Telefono">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>E-mail:</label>
                            <input type="text" class="form-control" name="email" id="email" maxlength="256" placeholder="E-mail">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo de Usuario:</label>  
                            <br>                
                              <select class="form-select form-control" id="tipo", name="tipo">            
                                <option value="1">Cliente</option>
                                <option value="2">Doctor</option>
                              </select>              
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre de Usuario:</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" maxlength="256" placeholder="Nombre de Usuario">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Constraseña:</label>
                            <input type="text" class="form-control" name="password" id="password" maxlength="256" placeholder="Constraseña">
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/usuarios.js"></script>