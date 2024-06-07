<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["idusuario"]))
{
  header("Location: login.html");
}
else
{
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
                          <h1 class="box-title">Mi Usuario </h1>                          
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <label name="ssidusuario" id="ssidusuario" hidden><?php echo $_SESSION["idusuario"]?></label>
                    <!-- /.box-header -->
                    <!-- centro -->                
                    <div class="panel-body" style="height: 500px;" id="formularioregistros">
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
                              <select class="form-select form-control" id="tipo", name="tipo" disabled>            
                                <option>Cliente</option>
                                <option>Doctor</option>
                                <option>Admin</option>
                              </select>              
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre de Usuario:</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" maxlength="256" placeholder="Nombre de Usuario">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Constraseña:</label>
                            <input type="password" class="form-control" name="password" id="password" maxlength="256" placeholder="Constraseña">
                            <input type="hidden" name="oldpassword" id="oldpassword">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Permisos:</label>
                            <ul style="list-style: none;" id="permisos">
                              
                            </ul>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">     
                          <label>Fecha de Modificacion:</label>                       
                            <input type="text" class="form-control" name="fechamod" id="fechamod" maxlength="256" disabled>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Usuario que Modifico:</label>
                            <input type="text" class="form-control" name="idmod" id="idmod" maxlength="256" disabled>
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            
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
require 'footer.php';
?>

<script type="text/javascript" src="scripts/mi_usuario.js"></script>
<?php 
ob_end_flush();
?>