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
if ($_SESSION['datospaciente']==1)
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
                          <h1 class="box-title">Exploracion Funcional <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Pupilas_PP</th>
                            <th>Pupilas_C_Rup</th>
                            <th>Pupilas_Rec</th>
                            <th>Queratometria Ojo Derecho</th>
                            <th>Queratometria Ojo Izquierdo</th>
                            <th>Retinoscopia Ojo Derecho</th>
                            <th>Retinoscopia Ojo Izquierdo</th> 
                            <th>Subjetivo Ojo Derecho</th>
                            <th>Subjetivo Ojo Izquierdo</th>                               
                            <th>Adicion Ojo Derecho AV</th>
                            <th>Adicion Ojo Izquierdo AV</th> 
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Pupilas_PP</th>
                            <th>Pupilas_C_Rup</th>
                            <th>Pupilas_Rec</th>
                            <th>Queratometria Ojo Derecho</th>
                            <th>Queratometria Ojo Izquierdo</th>
                            <th>Retinoscopia Ojo Derecho</th>
                            <th>Retinoscopia Ojo Izquierdo</th> 
                            <th>Subjetivo Ojo Derecho</th>
                            <th>Subjetivo Ojo Izquierdo</th>                               
                            <th>Adicion Ojo Derecho AV</th>
                            <th>Adicion Ojo Izquierdo AV</th>                                       
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 700px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>ID Paciente:</label>         
                            <input type="hidden" name="idexp_funcional" id="idexp_funcional">      
                            <input type="text" class="form-control" name="idpaciente" id="idpaciente" maxlength="11" placeholder="ID Paciente">
                          </div>                        
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Pupilas_PP:</label>                                            
                            <input type="textarea" class="form-control" name="pupilas_pp" id="pupilas_pp" placeholder="Pupilas_pp">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Pupilas_C_Rup:</label>                                            
                            <input type="textarea" class="form-control" name="pupilas_c_rup" id="pupilas_c_rup" placeholder="Pupilas_C_Rup">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Pupilas_Rec:</label>                                            
                            <input type="text" class="form-control" name="pupilas_rec" id="pupilas_rec" placeholder="Pupilas_Rec">
                          </div>                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Queratometria Ojo Derecho:</label>                                            
                            <input type="text" class="form-control" name="queratometria_od" id="queratometria_od" maxlength="50" placeholder="Queratometria Ojo Derecho">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Queratometria Ojo Izquierdo:</label>                                            
                            <input type="text" class="form-control" name="queratometria_oi" id="queratometria_oi" maxlength="50" placeholder="Queratometria Ojo Izquierdo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Retinoscopia Ojo Derecho:</label>                                            
                            <input type="text" class="form-control" name="retinoscopia_od" id="retinoscopia_od" maxlength="50" placeholder="Retinoscopia Ojo Derecho">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Retinoscopia Ojo Izquierdo:</label>                                            
                            <input type="text" class="form-control" name="retinoscopia_oi" id="retinoscopia_oi" maxlength="50" placeholder="Retinoscopia Ojo Izquierdo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Subjetivo Ojo Derecho:</label>                                            
                            <input type="text" class="form-control" name="subjetivo_od" id="subjetivo_od" maxlength="50" placeholder="Subjetivo Ojo Derecho">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Subjetivo Ojo Izquierdo:</label>                                            
                            <input type="text" class="form-control" name="subjetivo_oi" id="subjetivo_oi" maxlength="50" placeholder="Subjetivo Ojo Izquierdo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Adicion Ojo Derecho AV:</label>                                            
                            <input type="text" class="form-control" name="add_od_av" id="add_od_av" maxlength="50" placeholder="Adicion Ojo Derecho AV">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Adicion Ojo Izquierdo AV:</label>                                            
                            <input type="text" class="form-control" name="add_oi_av" id="add_oi_av" maxlength="50" placeholder="Adicion Ojo Izquierdo AV">
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

<script type="text/javascript" src="scripts/exp_funcional.js"></script>
<?php 
}
ob_end_flush();
?>
