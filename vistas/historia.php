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
                          <h1 class="box-title">Historia Ocular <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Paciente</th>
                            <th>Interrogatorio</th>
                            <th>Historia General</th>
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>Ocupacion</th>
                            <th>Usa Graduacion</th>
                            <th>Fecha Graduacion</th>    
                            <th>Fecha Modificacion</th>
                            <th>Modificado por</th>                           
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Paciente</th>
                            <th>Interrogatorio</th>
                            <th>Historia General</th>
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>Ocupacion</th>
                            <th>Graduacion que Usa</th>
                            <th>Fecha Graduacion</th>     
                            <th>Fecha Modificacion</th>
                            <th>Modificado por</th>                                   
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 700px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>ID Paciente:</label>         
                            <input type="hidden" name="idhistoria" id="idhistoria">      
                            <input type="text" class="form-control" name="idpaciente" id="idpaciente" maxlength="11" placeholder="ID Paciente">
                          </div>                        
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Interrogatorio:</label>                                            
                            <input type="textarea" class="form-control" name="interrogatorio" id="interrogatorio" placeholder="Interrogatorio">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Historia General:</label>                                            
                            <input type="textarea" class="form-control" name="hg" id="hg" placeholder="Historia General">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Edad:</label>                                            
                            <input type="number" class="form-control" name="edad" id="edad" placeholder="0">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Sexo:</label>  
                            <br>                
                              <select class="form-select form-control" id="sexo", name="sexo" required>            
                                <option>Masculino</option>
                                <option>Femenino</option>
                              </select>              
                          </div>  
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Ocupacion:</label>                                            
                            <input type="text" class="form-control" name="ocupacion" id="ocupacion" maxlength="100" placeholder="Ocupacion">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Usa Graduacion:</label>  
                            <br>                
                              <select class="form-select form-control" id="grad", name="grad" required>            
                                <option value="1">Si</option>
                                <option value="0">No</option>
                              </select>              
                          </div> 
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha de Graduacion:</label>
                            <input type="date" class="form-control" name="fecha" id="fecha">
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

<script type="text/javascript" src="scripts/historia.js"></script>
<?php 
}
ob_end_flush();
?>
