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
	$("#idexp_fisica").val("");
	$("#idpaciente").val("");
	$("#vias_lagrimales").val("");
	$("#parpados").val("");
	$("#globo_ocular").val("");
	$("#conjuntivas").val("");
	$("#corneas").val("");
	$("#iris").val("");
	$("#cristalinos").val("");
	$("#vitreo").val("");
	$("#fondo_ojo").val("");

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
					url: '../ajax/exp_fisica.php?op=listar',
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
		url: "../ajax/exp_fisica.php?op=guardaryeditar",
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

function mostrar(idexp_fisica)
{
	$.post("../ajax/exp_fisica.php?op=mostrar",{idexp_fisica : idexp_fisica}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idexp_fisica").val(data.ID_Exploracion);
		$("#idpaciente").val(data.ID_Paciente);
		$("#vias_lagrimales").val(data.Vias_Lagrimales);
		$("#parpados").val(data.Parpados);
		$("#globo_ocular").val(data.Globo_Ocular);
		$("#conjuntivas").val(data.Conjuntivas);
		$("#corneas").val(data.Corneas);
		$("#iris").val(data.Iris_Porcion_Ciliar);
		$("#cristalinos").val(data.Cristalinos);
		$("#vitreo").val(data.Vitreo);
		$("#fondo_ojo").val(data.Fondo_Ojo);
		
 	})
}

//Función para desactivar registros
// function desactivar(idexp_fisica)
// {
// 	bootbox.confirm("¿Está Seguro de desactivar el exp_fisica?", function(result){
// 		if(result)
//         {
//         	$.post("../ajax/exp_fisica.php?op=desactivar", {idexp_fisica : idexp_fisica}, function(e){
//         		bootbox.alert(e);
// 	            tabla.ajax.reload();
//         	});	
//         }
// 	})
// }

//Función para activar registros
// function activar(idexp_fisica)
// {
// 	bootbox.confirm("¿Está Seguro de activar el exp_fisica?", function(result){
// 		if(result)
//         {
//         	$.post("../ajax/exp_fisica.php?op=activar", {idexp_fisica : idexp_fisica}, function(e){
//         		bootbox.alert(e);
// 	            tabla.ajax.reload();
//         	});	
//         }
// 	})
// }

function eliminar(idexp_fisica)
{
	bootbox.confirm("¿Está Seguro de eliminar la Exploracion Funcional?", function(result){
		if(result)
        {
        	$.post("../ajax/exp_fisica.php?op=eliminar", {idexp_fisica : idexp_fisica}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();