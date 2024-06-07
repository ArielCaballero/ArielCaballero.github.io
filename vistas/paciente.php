<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';
if ($_SESSION['acceso']==1)
{
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
                          <h1 class="box-title">Paciente <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Colonia</th>
                            <th>Ciudad</th>
                            <th>CP</th>
                            <th>Edo</th>
                            <th>Celular</th>
                            <th>RFC</th>
                            <th>FN</th>  
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Colonia</th>
                            <th>Ciudad</th>
                            <th>CP</th>
                            <th>Edo</th>
                            <th>Celular</th>
                            <th>RFC</th>
                            <th>FN</th>
                            <th>Estado</th>                                      
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>ID Usuario:</label>              
                            <input type="text" class="form-control" name="idusuario" id="idusuario" maxlength="11" placeholder="ID usuario">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Colonia:</label>
                            <input type="hidden" name="idpaciente" id="idpaciente">                      
                            <input type="text" class="form-control" name="colonia" id="colonia" maxlength="100" placeholder="colonia" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Ciudad:</label>
                            <input type="text" class="form-control" name="ciudad" id="ciudad" maxlength="100" placeholder="ciudad">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Codigo Postal:</label>
                            <input type="text" class="form-control" name="cp" id="cp" maxlength="10" placeholder="Codigo Postal">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Edo:</label>
                            <input type="text" class="form-control" name="edo" id="edo" maxlength="100" placeholder="Edo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Celular:</label>
                            <input type="text" class="form-control" name="celular" id="celular" maxlength="15" placeholder="Celular">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>RFC:</label>
                            <input type="text" class="form-control" name="rfc" id="rfc" maxlength="13" placeholder="RFC">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" name="fn" id="fn">
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
}
else
{
  require 'noacceso.php';
}
require 'footer.php';
?>

<script type="text/javascript" src="scripts/paciente.js"></script>
<?php 
}
ob_end_flush();
?>
