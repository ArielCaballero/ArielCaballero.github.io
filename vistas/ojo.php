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
                          <h1 class="box-title">Ojo <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Tipo</th>
                            <th>Esferico</th>
                            <th>Cilindrico</th>
                            <th>Eje</th>
                            <th>Prisma</th>
                            <th>Altura</th>
                            <th>Oblea</th>  
                            <th>Color</th>
                            <th>AV</th>
                            <th>PIO</th>
                            <th>Estereopsis</th>
                            <th>Agudeza Visual S_L</th>
                            <th>Agudeza Visual C</th>
                            <th>Agudeza Visual L</th>
                            <th>Agudeza Visual C_C</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                          <th>Opciones</th>
                            <th>Tipo</th>
                            <th>Esferico</th>
                            <th>Cilindrico</th>
                            <th>Eje</th>
                            <th>Prisma</th>
                            <th>Altura</th>
                            <th>Oblea</th>  
                            <th>Color</th>
                            <th>AV</th>
                            <th>PIO</th>
                            <th>Estereopsis</th>
                            <th>Agudeza Visual S_L</th>
                            <th>Agudeza Visual C</th>
                            <th>Agudeza Visual L</th>
                            <th>Agudeza Visual C_C</th>                                      
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 700px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>ID Paciente:</label>              
                            <input type="text" class="form-control" name="idpaciente" id="idpaciente" maxlength="11" placeholder="ID Paciente">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo:</label>  
                            <br>                
                              <select class="form-select form-control" id="tipo", name="tipo" required>            
                                <option value="1">OD</option>
                                <option value="2">OI</option>
                              </select>              
                          </div>  
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Esferico:</label>
                            <input type="hidden" name="idojo" id="idojo">                      
                            <input type="text" class="form-control" name="esferico" id="esferico">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Cilindrico:</label>                                            
                            <input type="text" class="form-control" name="cilindrico" id="cilindrico">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Eje:</label>                                            
                            <input type="text" class="form-control" name="eje" id="eje">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Prisma:</label>                                            
                            <input type="text" class="form-control" name="prisma" id="prisma">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Altura:</label>                                            
                            <input type="text" class="form-control" name="altura" id="altura">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Oblea:</label>                                            
                            <input type="text" class="form-control" name="oblea" id="oblea">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Color:</label>
                            <input type="text" class="form-control" name="color" id="color" maxlength="50" placeholder="Color de Ojo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>AV:</label>
                            <input type="text" class="form-control" name="av" id="av" maxlength="50" placeholder="Agudeza Visual">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>PIO:</label>
                            <input type="text" class="form-control" name="pio" id="pio" maxlength="50" placeholder="PIO">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Estereopsis:</label>
                            <input type="text" class="form-control" name="estereopsis" id="estereopsis" maxlength="50" placeholder="Estereopsis">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Agudeza Visual S_L:</label>
                            <input type="text" class="form-control" name="avsl" id="avsl" maxlength="50" placeholder="Agudeza Visual S_L">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Agudeza Visual C:</label>
                            <input type="text" class="form-control" name="avc" id="avc" maxlength="50" placeholder="Agudeza Visual C">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Agudeza Visual L:</label>
                            <input type="text" class="form-control" name="avl" id="avl" maxlength="50" placeholder="Agudeza Visual L">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Agudeza Visual C_C:</label>
                            <input type="text" class="form-control" name="avcc" id="avcc" maxlength="50" placeholder="Agudeza Visual C_C">
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
<script type="text/javascript" src="scripts/ojo.js"></script>