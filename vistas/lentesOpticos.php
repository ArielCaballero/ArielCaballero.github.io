<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"])) {
    header("Location: login.html");
} else {
    require 'header.php';
    if ($_SESSION['lentes_opticos'] == 1) {
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
                                <h1 class="box-title">Lentes Ópticos <?php if ($_SESSION['agregarlentes'] == 1){echo '<button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button>';}?></h1>
                                <div class="box-tools pull-right">
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <!-- centro -->
                            <div class="panel-body table-responsive" id="listadoregistros">
                                <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                                    <thead>
                                        <th>Opciones</th>
                                        <th>Nombre Modelo</th>
                                        <th>Descripción</th>
                                        <th>Color</th>
                                        <th>Material</th>
                                        <th>Precio</th>
                                        <th>Imagen</th>
                                        <th>Compatibilidad Facial</th>
                                        <th>Compatibilidad Altas Graduaciones</th>
                                        <th>Alto Mica</th>
                                        <th>Ancho Frente</th>
                                        <th>Largo Pata</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <th>Opciones</th>
                                        <th>Nombre Modelo</th>
                                        <th>Descripción</th>
                                        <th>Color</th>
                                        <th>Material</th>
                                        <th>Precio</th>
                                        <th>Imagen</th>
                                        <th>Compatibilidad Facial</th>
                                        <th>Compatibilidad Altas Graduaciones</th>
                                        <th>Alto Mica</th>
                                        <th>Ancho Frente</th>
                                        <th>Largo Pata</th>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="panel-body" style="height: 700px;" id="formularioregistros">
                                <form name="formulario" id="formulario" method="POST" enctype="multipart/form-data">
                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Nombre Modelo:</label>
                                        <input type="hidden" name="id_modelo" id="id_modelo">
                                        <input type="text" class="form-control" name="nombre_modelo" id="nombre_modelo" maxlength="255" placeholder="Nombre del Modelo" required>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Descripción:</label>
                                        <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripción" required></textarea>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Color:</label>
                                        <input type="text" class="form-control" name="color" id="color" maxlength="100" placeholder="Color" required>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Material:</label>
                                        <input type="text" class="form-control" name="material" id="material" maxlength="100" placeholder="Material" required>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Precio:</label>
                                        <input type="number" class="form-control" name="precio" id="precio" step="0.01" placeholder="Precio" required>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Imagen:</label>
                                        <input type="file" class="form-control" name="imagen" id="imagen" required>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Compatibilidad Facial:</label>
                                        <input type="text" class="form-control" name="compatibilidad_facial" id="compatibilidad_facial" maxlength="255" placeholder="Compatibilidad Facial" required>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Compatibilidad Altas Graduaciones:</label>
                                        <input type="text" class="form-control" name="compatibilidad_altas_graduaciones" id="compatibilidad_altas_graduaciones" maxlength="255" placeholder="Compatibilidad Altas Graduaciones" required>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Alto Mica (mm):</label>
                                        <input type="number" class="form-control" name="alto_mica" id="alto_mica" step="0.01" placeholder="Alto de la Mica" required>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Ancho Frente (mm):</label>
                                        <input type="number" class="form-control" name="ancho_frente" id="ancho_frente" step="0.01" placeholder="Ancho del Frente" required>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Largo Pata (mm):</label>
                                        <input type="number" class="form-control" name="largo_pata" id="largo_pata" step="0.01" placeholder="Largo de la Pata" required>
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
    } else {
        require 'noacceso.php';
    }
    require 'footer.php';
    ?>

    <script type="text/javascript" src="scripts/lentesOpticos.js"></script>
<?php
}
ob_end_flush();
?>