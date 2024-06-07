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
if ($_SESSION['datospacientes']==1)
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
                          <h1 class="box-title">Exploracion Fisica <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Vias Lagrimales</th>
                            <th>Parpados</th>
                            <th>Globo Ocular</th>
                            <th>Conjuntivas</th>
                            <th>Corneas</th>
                            <th>Iris Porcion Ciliar</th>
                            <th>Cristalinos</th> 
                            <th>Vitreo</th>
                            <th>Fondo Ojo</th>                         
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Vias Lagrimales</th>
                            <th>Parpados</th>
                            <th>Globo Ocular</th>
                            <th>Conjuntivas</th>
                            <th>Corneas</th>
                            <th>Iris Porcion Ciliar</th>
                            <th>Cristalinos</th> 
                            <th>Vitreo</th>
                            <th>Fondo Ojo</th>                         
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 700px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>ID Paciente:</label>         
                            <input type="hidden" name="idexp_fisica" id="idexp_fisica">      
                            <input type="text" class="form-control" name="idpaciente" id="idpaciente" maxlength="11" placeholder="ID Paciente">
                          </div>                        
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Vias Lagrimales:</label>                                            
                            <input type="textarea" class="form-control" name="vias_lagrimales" id="vias_lagrimales" placeholder="Vias Lagrimales">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Parpados:</label>                                            
                            <input type="textarea" class="form-control" name="parpados" id="parpados" placeholder="Parpados">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Globo Ocular:</label>                                            
                            <input type="text" class="form-control" name="globo_ocular" id="globo_ocular" placeholder="Globo Ocular">
                          </div>                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Conjuntivas:</label>                                            
                            <input type="text" class="form-control" name="conjuntivas" id="conjuntivas" placeholder="Conjuntivas">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Corneas:</label>                                            
                            <input type="text" class="form-control" name="corneas" id="corneas" placeholder="Corneas">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Iris Porcion Ciliar:</label>                                            
                            <input type="text" class="form-control" name="iris" id="iris" placeholder="Iris Porcion Ciliar">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Cristalinos:</label>                                            
                            <input type="text" class="form-control" name="cristalinos" id="cristalinos" placeholder="Cristalinos">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Vitreo:</label>                                            
                            <input type="text" class="form-control" name="vitreo" id="vitreo" placeholder="Vitreo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fondo Ojo:</label>                                            
                            <input type="text" class="form-control" name="fondo_ojo" id="fondo_ojo" placeholder="Fondo Ojo">
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

<script type="text/javascript" src="scripts/exp_fisica.js"></script>
<?php 
}
ob_end_flush();
?>