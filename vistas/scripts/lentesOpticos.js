var tabla;

//Función que se ejecuta al inicio
function init(){
    mostrarform(false);
    listar();

    $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);    
    })
}

//Función limpiar
function limpiar()
{
    $("#id_modelo").val("");
    $("#nombre_modelo").val("");
    $("#descripcion").val("");
    $("#color").val("");
    $("#material").val("");
    $("#precio").val("");
    $("#imagen").val("");
    $("#compatibilidad_facial").val("");
    $("#compatibilidad_altas_graduaciones").val("");
    $("#alto_mica").val("");
    $("#ancho_frente").val("");
    $("#largo_pata").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
    limpiar();
    if (flag)
    {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
        $("#btnagregar").hide();
    }
    else
    {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

//Función cancelarform
function cancelarform()
{
    limpiar();
    mostrarform(false);
}

//Función Listar
function listar()
{
    tabla=$('#tbllistado').dataTable(
    {
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [                  
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdf'
                ],
        "ajax":
                {
                    url: '../ajax/lentesOpticos.php?op=listar',
                    type : "get",
                    dataType : "json",                        
                    error: function(e){
                        console.log(e.responseText);    
                    }
                },
        "bDestroy": true,
        "iDisplayLength": 5,//Paginación
        "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    }).DataTable();
}

//Función para guardar o editar
function guardaryeditar(e)
{
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/lentesOpticos.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos)
        {                    
                bootbox.alert(datos);              
                mostrarform(false);
                tabla.ajax.reload();
        }

    });
    limpiar();
}

function mostrar(id_modelo)
{
    $.post("../ajax/lentesOpticos.php?op=mostrar",{id_modelo : id_modelo}, function(data, status)
    {
        data = JSON.parse(data);        
        mostrarform(true);

        $("#id_modelo").val(data.id_modelo);
        $("#nombre_modelo").val(data.nombre_modelo);
        $("#descripcion").val(data.descripcion);
        $("#color").val(data.color);
        $("#material").val(data.material);
        $("#precio").val(data.precio);
        $("#imagen").val(data.imagen);
        $("#compatibilidad_facial").val(data.compatibilidad_facial);
        $("#compatibilidad_altas_graduaciones").val(data.compatibilidad_altas_graduaciones);
        $("#alto_mica").val(data.alto_mica);
        $("#ancho_frente").val(data.ancho_frente);
        $("#largo_pata").val(data.largo_pata);
        
    })
}

//Función para eliminar registros
function eliminar(id_modelo)
{
    bootbox.confirm("¿Está Seguro de eliminar el modelo?", function(result){
        if(result)
        {
            $.post("../ajax/lentesOpticos.php?op=eliminar", {id_modelo : id_modelo}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });    
        }
    })
}

init();