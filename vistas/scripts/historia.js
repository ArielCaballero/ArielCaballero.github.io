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
	$("#idhistoria").val("");
	$("#idpaciente").val("");
	$("#interrogatorio").val("");
	$("#hg").val("");
	$("#edad").val("");
	$("#sexo").val("");
	$("#ocupacion").val("");
	$("#grad").val("");
	$("#fecha").val("");;

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
					url: '../ajax/historia.php?op=listar',
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
		url: "../ajax/historia.php?op=guardaryeditar",
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

function mostrar(idhistoria)
{
	$.post("../ajax/historia.php?op=mostrar",{idhistoria : idhistoria}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idhistoria").val(data.ID_Historia_Ocular);
		$("#idpaciente").val(data.ID_Paciente);
		$("#interrogatorio").val(data.Interrogatorio);
		$("#hg").val(data.Historia_General);
		$("#edad").val(data.Edad);
		$("#sexo").val(data.Sexo);
		$("#ocupacion").val(data.Ocupacion);
		$("#grad").val(data.Graduacion_Usa);
		$("#fecha").val(data.Fecha_Graduacion);
		
 	})
}

//Función para desactivar registros
// function desactivar(idhistoria)
// {
// 	bootbox.confirm("¿Está Seguro de desactivar el historia?", function(result){
// 		if(result)
//         {
//         	$.post("../ajax/historia.php?op=desactivar", {idhistoria : idhistoria}, function(e){
//         		bootbox.alert(e);
// 	            tabla.ajax.reload();
//         	});	
//         }
// 	})
// }

//Función para activar registros
// function activar(idhistoria)
// {
// 	bootbox.confirm("¿Está Seguro de activar el historia?", function(result){
// 		if(result)
//         {
//         	$.post("../ajax/historia.php?op=activar", {idhistoria : idhistoria}, function(e){
//         		bootbox.alert(e);
// 	            tabla.ajax.reload();
//         	});	
//         }
// 	})
// }

// function eliminar(idhistoria)
// {
// 	bootbox.confirm("¿Está Seguro de eliminar la historia?", function(result){
// 		if(result)
//         {
//         	$.post("../ajax/historia.php?op=eliminar", {idhistoria : idhistoria}, function(e){
//         		bootbox.alert(e);
// 	            tabla.ajax.reload();
//         	});	
//         }
// 	})
// }


init();