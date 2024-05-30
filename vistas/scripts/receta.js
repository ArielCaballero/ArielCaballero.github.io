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
	$("#idreceta").val("");
	$("#idpaciente").val("");
	$("#iddoctor").val("");
	$("#fecha").val("");
	$("#cristal").val("");
	$("#plastico").val("");
	$("#armazon").val("");
	$("#color").val("");
	$("#tam").val("");
	$("#original").val("");
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
					url: '../ajax/receta.php?op=listar',
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
		url: "../ajax/receta.php?op=guardaryeditar",
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

function mostrar(idreceta)
{
	$.post("../ajax/receta.php?op=mostrar",{idreceta : idreceta}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idreceta").val(data.ID_Receta);
		$("#idpaciente").val(data.ID_Paciente);
		$("#iddoctor").val(data.ID_Doctor);
		$("#fecha").val(data.Fecha);
		$("#cristal").val(data.Cristal);
		$("#plastico").val(data.Plastico);
		$("#armazon").val(data.Armazon);
		$("#color").val(data.Color_Armazon);
		$("#tam").val(data.Tamaño_y_Pte);
		$("#original").val(data.Original);

 	})
}

//Función para desactivar registros
// function desactivar(idreceta)
// {
// 	bootbox.confirm("¿Está Seguro de desactivar el receta?", function(result){
// 		if(result)
//         {
//         	$.post("../ajax/receta.php?op=desactivar", {idreceta : idreceta}, function(e){
//         		bootbox.alert(e);
// 	            tabla.ajax.reload();
//         	});	
//         }
// 	})
// }

// //Función para activar registros
// function activar(idreceta)
// {
// 	bootbox.confirm("¿Está Seguro de activar el receta?", function(result){
// 		if(result)
//         {
//         	$.post("../ajax/receta.php?op=activar", {idreceta : idreceta}, function(e){
//         		bootbox.alert(e);
// 	            tabla.ajax.reload();
//         	});	
//         }
// 	})
// }

function eliminar(idreceta)
{
	bootbox.confirm("¿Está Seguro de eliminar la receta?", function(result){
		if(result)
        {
        	$.post("../ajax/receta.php?op=eliminar", {idreceta : idreceta}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();