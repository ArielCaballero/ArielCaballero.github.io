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
if ($_SESSION['recetas']==1)
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
                          <h1 class="box-title">Lentes de Contacto <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Radio</th>
                            <th>Diametro</th>
                            <th>CP</th>
                            <th>RX</th>
                            <th>Grueso</th>
                            <th>ZO</th>
                            <th>PL</th>  
                            <th>Color</th>
                            <th>AV</th>
                            <th>Observaciones</th>
                            <th>Fecha Modificacion</th>
                            <th>Modificado por</th>    
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Radio</th>
                            <th>Diametro</th>
                            <th>CP</th>
                            <th>RX</th>
                            <th>Grueso</th>
                            <th>ZO</th>
                            <th>PL</th>  
                            <th>Color</th>
                            <th>AV</th>
                            <th>Observaciones</th>
                            <th>Fecha Modificacion</th>
                            <th>Modificado por</th>                                      
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 700px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>ID Paciente:</label>         
                            <input type="hidden" name="idlente" id="idlente">      
                            <input type="text" class="form-control" name="idpaciente" id="idpaciente" maxlength="11" placeholder="ID Paciente">
                          </div>                        
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Radio:</label>                                            
                            <input type="text" class="form-control" name="radio" id="radio" maxlength="50" placeholder="Radio">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Diametro:</label>                                            
                            <input type="text" class="form-control" name="diam" id="diam" maxlength="50" placeholder="Diametro">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>CP:</label>                                            
                            <input type="text" class="form-control" name="cp" id="cp" maxlength="50" placeholder="CP">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>RX:</label>                                            
                            <input type="text" class="form-control" name="rx" id="rx" maxlength="50" placeholder="RX">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Grueso:</label>                                            
                            <input type="text" class="form-control" name="grueso" id="grueso" maxlength="50" placeholder="Grueso">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>ZO:</label>
                            <input type="text" class="form-control" name="zo" id="zo" maxlength="50" placeholder="ZO">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>PL:</label>
                            <input type="text" class="form-control" name="pl" id="pl" maxlength="50" placeholder="PL">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Color:</label>
                            <input type="text" class="form-control" name="color" id="color" maxlength="50" placeholder="Color de lente">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>AV:</label>
                            <input type="text" class="form-control" name="av" id="av" maxlength="50" placeholder="Agudeza Visual">
                          </div>                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Observaciones:</label>
                            <input type="textarea" class="form-control" name="observaciones" id="observaciones" placeholder="Observaciones">
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

<script type="text/javascript" src="scripts/lente.js"></script>
<?php 
}
ob_end_flush();
?>
