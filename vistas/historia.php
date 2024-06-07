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
                            <th>Interrogatorio</th>
                            <th>Historia General</th>
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>Ocupacion</th>
                            <th>Usa Graduacion</th>
                            <th>Fecha Graduacion</th>
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
                            <th>Vias Lagrimales</th>
                            <th>Parpados</th>
                            <th>Globo Ocular</th>
                            <th>Conjuntivas</th>
                            <th>Corneas</th>
                            <th>Iris Porcion Ciliar</th>
                            <th>Cristalinos</th> 
                            <th>Vitreo</th>
                            <th>Fondo Ojo</th>  
                            <th>OI Tipo</th>
                            <th>OI Esferico</th>
                            <th>OI Cilindrico</th>
                            <th>OI Eje</th>
                            <th>OI Prisma</th>
                            <th>OI Altura</th>
                            <th>OI Oblea</th>  
                            <th>OI Color</th>
                            <th>OI AV</th>
                            <th>OI PIO</th>
                            <th>OI Estereopsis</th>
                            <th>OI Agudeza Visual S_L</th>
                            <th>OI Agudeza Visual C</th>
                            <th>OI Agudeza Visual L</th>
                            <th>OI Agudeza Visual C_C</th>   
                            <th>OD Tipo</th>
                            <th>OD Esferico</th>
                            <th>OD Cilindrico</th>
                            <th>OD Eje</th>
                            <th>OD Prisma</th>
                            <th>OD Altura</th>
                            <th>OD Oblea</th>  
                            <th>OD Color</th>
                            <th>OD AV</th>
                            <th>OD PIO</th>
                            <th>OD Estereopsis</th>
                            <th>OD Agudeza Visual S_L</th>
                            <th>OD Agudeza Visual C</th>
                            <th>OD Agudeza Visual L</th>
                            <th>OD Agudeza Visual C_C</th>                                
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Interrogatorio</th>
                            <th>Historia General</th>
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>Ocupacion</th>
                            <th>Graduacion que Usa</th>
                            <th>Fecha Graduacion</th>  
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
                            <th>Vias Lagrimales</th>
                            <th>Parpados</th>
                            <th>Globo Ocular</th>
                            <th>Conjuntivas</th>
                            <th>Corneas</th>
                            <th>Iris Porcion Ciliar</th>
                            <th>Cristalinos</th> 
                            <th>Vitreo</th>
                            <th>Fondo Ojo</th>
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
require 'footer.php';
?>
<script type="text/javascript" src="scripts/historia.js"></script>