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
                          <h1 class="box-title">Receta <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Fecha</th>
                            <th>Cristal</th>
                            <th>Plastico</th>
                            <th>Armazon</th>
                            <th>Color Armazon</th>
                            <th>Tamaño y Porte</th>
                            <th>Original</th>                                                        
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Fecha</th>
                            <th>Cristal</th>
                            <th>Plastico</th>
                            <th>Armazon</th>
                            <th>Color Armazon</th>
                            <th>Tamaño y Porte</th>
                            <th>Original</th>                                     
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha:</label>
                            <input type="date" class="form-control" name="fecha" id="fecha">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>ID Paciente:</label>              
                            <input type="text" class="form-control" name="idpaciente" id="idpaciente" maxlength="11" placeholder="ID Paciente">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>ID Doctor:</label>              
                            <input type="text" class="form-control" name="iddoctor" id="iddoctor" maxlength="11" placeholder="ID Doctor">
                            <input type="hidden" name="idreceta" id="idreceta">                      
                          </div>                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Cristal:</label>  
                            <br>                
                              <select class="form-select form-control" id="cristal", name="cristal">            
                                <option value="1">Si</option>
                                <option value="2">No</option>
                              </select>              
                          </div>                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Plastico:</label>  
                            <br>                
                              <select class="form-select form-control" id="plastico", name="plastico">            
                                <option value="1">Si</option>
                                <option value="2">No</option>
                              </select>              
                          </div> 
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Armazon:</label>
                            <input type="text" class="form-control" name="armazon" id="armazon" maxlength="100" placeholder="Armazon">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Color Armazon:</label>
                            <input type="text" class="form-control" name="color" id="color" maxlength="50" placeholder="Color de Armazon">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tamaño y Porte:</label>
                            <input type="text" class="form-control" name="tam" id="tam" maxlength="100" placeholder="Tamaño y Porte">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Original:</label>
                            <input type="text" class="form-control" name="original" id="original" maxlength="100" placeholder="Original">
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
<script type="text/javascript" src="scripts/receta.js"></script>