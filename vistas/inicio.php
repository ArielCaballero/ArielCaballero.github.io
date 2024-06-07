<?php
// Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"])) {
    header("Location: login.html");
} else {
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
                        <h1>Sistema de Óptica</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <div class="container">
                            <a href="datos_paciente.php" class="button">Datos de Paciente</a>
                            <a href="recetas.php" class="button">Recetas</a>
                            <a href="acceso.php" class="button">Acceso</a>
                        </div>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
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
    ob_end_flush();
}
?>

<style>
    .container {
        text-align: center;
    }
    .button {
        display: inline-block;
        width: 200px;
        padding: 15px;
        margin: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }
    .button:hover {
        background-color: #45a049;
    }
</style>