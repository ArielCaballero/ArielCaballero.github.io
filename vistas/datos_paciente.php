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
                          <h1 class="box-title">Datos de los Pacientes <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
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
                            <!--<th>Pupilas_PP</th>
                            <th>Pupilas_C_Rup</th>
                            <th>Pupilas_Rec</th>-->
                            <th>Queratometria Ojo Derecho</th>
                            <th>Queratometria Ojo Izquierdo</th>
                            <th>Retinoscopia Ojo Derecho</th>
                            <th>Retinoscopia Ojo Izquierdo</th> 
                            <th>Subjetivo Ojo Derecho</th>
                            <th>Subjetivo Ojo Izquierdo</th>                               
                            <!--<th>Adicion Ojo Derecho AV</th>
                            <th>Adicion Ojo Izquierdo AV</th> -->
                            <th>Vias Lagrimales</th>
                            <th>Parpados</th>
                            <th>Globo Ocular</th>
                            <th>Conjuntivas</th>
                            <th>Corneas</th>
                            <th>Iris Porcion Ciliar</th>
                            <!--<th>Cristalinos</th> 
                            <th>Vitreo</th>-->                            <th>Fondo Ojo</th>  
                            <th>OI Tipo</th>
                            <th>OI Esferico</th>
                            <th>OI Cilindrico</th>
                            <th>OI Eje</th>
                            <th>OI Prisma</th>
                            <th>OI Altura</th>
                            <!--<th>OI Oblea</th>-->
                            <th>OI Color</th>
                            <!--<th>OI AV</th>-->
                            <th>OI PIO</th>
                            <th>OI Estereopsis</th>
                            <!--<th>OI Agudeza Visual S_L</th>
                            <th>OI Agudeza Visual C</th>
                            <th>OI Agudeza Visual L</th>
                            <th>OI Agudeza Visual C_C</th>  --> 
                            <th>OD Tipo</th>
                            <th>OD Esferico</th>
                            <th>OD Cilindrico</th>
                            <th>OD Eje</th>
                            <th>OD Prisma</th>
                            <th>OD Altura</th>
                            <!--<th>OD Oblea</th>-->
                            <th>OD Color</th>
                            <!--<th>OD AV</th>-->
                            <th>OD PIO</th>
                            <th>OD Estereopsis</th>
                            <!-- <th>OD Agudeza Visual S_L</th>
                            <th>OD Agudeza Visual C</th>
                            <th>OD Agudeza Visual L</th>
                            <th>OD Agudeza Visual C_C</th>  -->                              
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
                            <!-- <th>Pupilas_PP</th>
                            <th>Pupilas_C_Rup</th>
                            <th>Pupilas_Rec</th>-->
                            <th>Queratometria Ojo Derecho</th>
                            <th>Queratometria Ojo Izquierdo</th>
                            <th>Retinoscopia Ojo Derecho</th>
                            <th>Retinoscopia Ojo Izquierdo</th> 
                            <th>Subjetivo Ojo Derecho</th>
                            <th>Subjetivo Ojo Izquierdo</th>                               
                            <!-- <th>Adicion Ojo Derecho AV</th>
                            <th>Adicion Ojo Izquierdo AV</th>-->
                            <th>Vias Lagrimales</th>
                            <th>Parpados</th>
                            <th>Globo Ocular</th>
                            <th>Conjuntivas</th>
                            <th>Corneas</th>
                            <th>Iris Porcion Ciliar</th>
                            <!--<th>Cristalinos</th> 
                            <th>Vitreo</th>-->
                            <th>Fondo Ojo</th>
                            <th>Tipo</th>
                            <th>Esferico</th>
                            <th>Cilindrico</th>
                            <th>Eje</th>
                            <th>Prisma</th>
                            <th>Altura</th>
                            <!--<th>Oblea</th>-->  
                            <th>Color</th>
                            <!--<th>AV</th>-->
                            <th>PIO</th>
                            <th>Estereopsis</th>
                            <!--<th>Agudeza Visual S_L</th>
                            <th>Agudeza Visual C</th>
                            <th>Agudeza Visual L</th>
                            <th>Agudeza Visual C_C</th>-->  
                            <th>Tipo</th>
                            <th>Esferico</th>
                            <th>Cilindrico</th>
                            <th>Eje</th>
                            <th>Prisma</th>
                            <th>Altura</th>
                            <!--<th>Oblea</th> --> 
                            <th>Color</th>
                            <!-- <th>AV</th>-->
                            <th>PIO</th>
                            <th>Estereopsis</th>
                            <!--<th>Agudeza Visual S_L</th>
                            <th>Agudeza Visual C</th>
                            <th>Agudeza Visual L</th>
                            <th>Agudeza Visual C_C</th>-->                              
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 2200px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>ID Paciente:</label>         
                            <input disabled type="hidden" name="idhistoria" id="idhistoria">      
                            <input disabled type="text" class="form-control" name="idpaciente" id="idpaciente" maxlength="11" placeholder="ID Paciente">
                          </div>                        
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Interrogatorio:</label>                                            
                            <input disabled type="textarea" class="form-control" name="interrogatorio" id="interrogatorio" placeholder="Interrogatorio">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Historia General:</label>                                            
                            <input disabled type="textarea" class="form-control" name="hg" id="hg" placeholder="Historia General">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Edad:</label>                                            
                            <input disabled type="number" class="form-control" name="edad" id="edad" placeholder="0">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Sexo:</label>  
                            <br>                
                              <select disabled class="form-select disabled form-control" id="sexo", name="sexo" required>            
                                <option>Masculino</option>
                                <option>Femenino</option>
                              </select disabled>              
                          </div>  
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Ocupacion:</label>                                            
                            <input disabled type="text" class="form-control" name="ocupacion" id="ocupacion" maxlength="100" placeholder="Ocupacion">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Usa Graduacion:</label>  
                            <br>                
                              <select disabled class="form-select disabled form-control" id="grad", name="grad" required>            
                                <option value="1">Si</option>
                                <option value="0">No</option>
                              </select disabled>              
                          </div> 
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha de Graduacion:</label>
                            <input disabled type="date" class="form-control" name="fecha" id="fecha">
                          </div>                         
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Pupilas_PP:</label>                                            
                            <input disabled type="textarea" class="form-control" name="pupilas_pp" id="pupilas_pp" placeholder="Pupilas_pp">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Pupilas_C_Rup:</label>                                            
                            <input disabled type="textarea" class="form-control" name="pupilas_c_rup" id="pupilas_c_rup" placeholder="Pupilas_C_Rup">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Pupilas_Rec:</label>                                            
                            <input disabled type="text" class="form-control" name="pupilas_rec" id="pupilas_rec" placeholder="Pupilas_Rec">
                          </div>                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Queratometria Ojo Derecho:</label>                                            
                            <input disabled type="text" class="form-control" name="queratometria_od" id="queratometria_od" maxlength="50" placeholder="Queratometria Ojo Derecho">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Queratometria Ojo Izquierdo:</label>                                            
                            <input disabled type="text" class="form-control" name="queratometria_oi" id="queratometria_oi" maxlength="50" placeholder="Queratometria Ojo Izquierdo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Retinoscopia Ojo Derecho:</label>                                            
                            <input disabled type="text" class="form-control" name="retinoscopia_od" id="retinoscopia_od" maxlength="50" placeholder="Retinoscopia Ojo Derecho">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Retinoscopia Ojo Izquierdo:</label>                                            
                            <input disabled type="text" class="form-control" name="retinoscopia_oi" id="retinoscopia_oi" maxlength="50" placeholder="Retinoscopia Ojo Izquierdo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Subjetivo Ojo Derecho:</label>                                            
                            <input disabled type="text" class="form-control" name="subjetivo_od" id="subjetivo_od" maxlength="50" placeholder="Subjetivo Ojo Derecho">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Subjetivo Ojo Izquierdo:</label>                                            
                            <input disabled type="text" class="form-control" name="subjetivo_oi" id="subjetivo_oi" maxlength="50" placeholder="Subjetivo Ojo Izquierdo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Adicion Ojo Derecho AV:</label>                                            
                            <input disabled type="text" class="form-control" name="add_od_av" id="add_od_av" maxlength="50" placeholder="Adicion Ojo Derecho AV">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Adicion Ojo Izquierdo AV:</label>                                            
                            <input disabled type="text" class="form-control" name="add_oi_av" id="add_oi_av" maxlength="50" placeholder="Adicion Ojo Izquierdo AV">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Vias Lagrimales:</label>                                            
                            <input disabled type="textarea" class="form-control" name="vias_lagrimales" id="vias_lagrimales" placeholder="Vias Lagrimales">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Parpados:</label>                                            
                            <input disabled type="textarea" class="form-control" name="parpados" id="parpados" placeholder="Parpados">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Globo Ocular:</label>                                            
                            <input disabled type="text" class="form-control" name="globo_ocular" id="globo_ocular" placeholder="Globo Ocular">
                          </div>                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Conjuntivas:</label>                                            
                            <input disabled type="text" class="form-control" name="conjuntivas" id="conjuntivas" placeholder="Conjuntivas">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Corneas:</label>                                            
                            <input disabled type="text" class="form-control" name="corneas" id="corneas" placeholder="Corneas">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Iris Porcion Ciliar:</label>                                            
                            <input disabled type="text" class="form-control" name="iris" id="iris" placeholder="Iris Porcion Ciliar">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Cristalinos:</label>                                            
                            <input disabled type="text" class="form-control" name="cristalinos" id="cristalinos" placeholder="Cristalinos">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Vitreo:</label>                                            
                            <input disabled type="text" class="form-control" name="vitreo" id="vitreo" placeholder="Vitreo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fondo Ojo:</label>                                            
                            <input disabled type="text" class="form-control" name="fondo_ojo" id="fondo_ojo" placeholder="Fondo Ojo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OI Esferico:</label>
                            <input disabled type="hidden" name="iidojo" id="iidojo">                      
                            <input disabled type="text" class="form-control" name="iesferico" id="iesferico">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OI Cilindrico:</label>                                            
                            <input disabled type="text" class="form-control" name="icilindrico" id="icilindrico">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OI Eje:</label>                                            
                            <input disabled type="text" class="form-control" name="ieje" id="ieje">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OI Prisma:</label>                                            
                            <input disabled type="text" class="form-control" name="iprisma" id="iprisma">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OI Altura:</label>                                            
                            <input disabled type="text" class="form-control" name="ialtura" id="ialtura">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OI Oblea:</label>                                            
                            <input disabled type="text" class="form-control" name="ioblea" id="ioblea">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OI Color:</label>
                            <input disabled type="text" class="form-control" name="icolor" id="icolor" maxlength="50" placeholder="Color de Ojo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OI AV:</label>
                            <input disabled type="text" class="form-control" name="iav" id="iav" maxlength="50" placeholder="Agudeza Visual">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label> OI PIO:</label>
                            <input disabled type="text" class="form-control" name="ipio" id="ipio" maxlength="50" placeholder="PIO">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OI Estereopsis:</label>
                            <input disabled type="text" class="form-control" name="iestereopsis" id="iestereopsis" maxlength="50" placeholder="Estereopsis">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OI Agudeza Visual S_L:</label>
                            <input disabled type="text" class="form-control" name="iavsl" id="iavsl" maxlength="50" placeholder="Agudeza Visual S_L">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OI Agudeza Visual C:</label>
                            <input disabled type="text" class="form-control" name="iavc" id="iavc" maxlength="50" placeholder="Agudeza Visual C">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OI Agudeza Visual L:</label>
                            <input disabled type="text" class="form-control" name="iavl" id="iavl" maxlength="50" placeholder="Agudeza Visual L">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OI Agudeza Visual C_C:</label>
                            <input disabled type="text" class="form-control" name="iavcc" id="iavcc" maxlength="50" placeholder="Agudeza Visual C_C">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OD Esferico:</label>
                            <input disabled type="hidden" name="didojo" id="didojo">                      
                            <input disabled type="text" class="form-control" name="desferico" id="desferico">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OD Cilindrico:</label>                                            
                            <input disabled type="text" class="form-control" name="dcilindrico" id="dcilindrico">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OD Eje:</label>                                            
                            <input disabled type="text" class="form-control" name="deje" id="deje">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OD Prisma:</label>                                            
                            <input disabled type="text" class="form-control" name="dprisma" id="dprisma">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OD Altura:</label>                                            
                            <input disabled type="text" class="form-control" name="daltura" id="daltura">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OD Oblea:</label>                                            
                            <input disabled type="text" class="form-control" name="doblea" id="doblea">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OD Color:</label>
                            <input disabled type="text" class="form-control" name="dcolor" id="dcolor" maxlength="50" placeholder="Color de Ojo">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OD AV:</label>
                            <input disabled type="text" class="form-control" name="diav" id="dav" maxlength="50" placeholder="Agudeza Visual">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label> OD PIO:</label>
                            <input disabled type="text" class="form-control" name="dpio" id="dpio" maxlength="50" placeholder="PIO">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OD Estereopsis:</label>
                            <input disabled type="text" class="form-control" name="destereopsis" id="destereopsis" maxlength="50" placeholder="Estereopsis">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OD Agudeza Visual S_L:</label>
                            <input disabled type="text" class="form-control" name="davsl" id="davsl" maxlength="50" placeholder="Agudeza Visual S_L">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OD Agudeza Visual C:</label>
                            <input disabled type="text" class="form-control" name="davc" id="davc" maxlength="50" placeholder="Agudeza Visual C">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OD Agudeza Visual L:</label>
                            <input disabled type="text" class="form-control" name="davl" id="davl" maxlength="50" placeholder="Agudeza Visual L">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>OD Agudeza Visual C_C:</label>
                            <input disabled type="text" class="form-control" name="davcc" id="davcc" maxlength="50" placeholder="Agudeza Visual C_C">
                          </div>
                      

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">                     

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Volver </button>
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

<script type="text/javascript" src="scripts/datos_paciente.js"></script>
<?php 
}
ob_end_flush();
?>

