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
	$("#idojo").val("");
	$("#idpaciente").val("");
	$("#tipo").val("");
	$("#esferico").val("");
	$("#cilindrico").val("");
	$("#eje").val("");
	$("#prisma").val("");
	$("#altura").val("");
	$("#oblea").val("");
	$("#color").val("");
	$("#av").val("");
	$("#pio").val("");
	$("#estereopsis").val("");
	$("#avsl").val("");
	$("#avc").val("");
	$("#avl").val("");
	$("#avcc").val("");

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
					url: '../ajax/ojo.php?op=listar',
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
		url: "../ajax/ojo.php?op=guardaryeditar",
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

function mostrar(idojo)
{
	$.post("../ajax/ojo.php?op=mostrar",{idojo : idojo}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idojo").val(data.ID_Ojo);
		$("#idpaciente").val(data.ID_Paciente);
		$("#tipo").val(data.Tipo);
		$("#esferico").val(data.Esferico);
		$("#cilindrico").val(data.Cilindrico);
		$("#eje").val(data.Eje);
		$("#prisma").val(data.Prisma);
		$("#altura").val(data.Altura);
		$("#oblea").val(data.Oblea);
		$("#color").val(data.Color);
		$("#av").val(data.AV);
		$("#pio").val(data.PIO);
		$("#estereopsis").val(data.Estereopsis);
		$("#avsl").val(data.Agudeza_Visual_S_L);
		$("#avc").val(data.Agudeza_Visual_C);
		$("#avl").val(data.Agudeza_Visual_L);
		$("#avcc").val(data.Agudeza_Visual_C_C);
 	})
}

//Función para desactivar registros
// function desactivar(idojo)
// {
// 	bootbox.confirm("¿Está Seguro de desactivar el ojo?", function(result){
// 		if(result)
//         {
//         	$.post("../ajax/ojo.php?op=desactivar", {idojo : idojo}, function(e){
//         		bootbox.alert(e);
// 	            tabla.ajax.reload();
//         	});	
//         }
// 	})
// }

//Función para activar registros
// function activar(idojo)
// {
// 	bootbox.confirm("¿Está Seguro de activar el ojo?", function(result){
// 		if(result)
//         {
//         	$.post("../ajax/ojo.php?op=activar", {idojo : idojo}, function(e){
//         		bootbox.alert(e);
// 	            tabla.ajax.reload();
//         	});	
//         }
// 	})
// }

// function eliminar(idojo)
// {
// 	bootbox.confirm("¿Está Seguro de eliminar el ojo?", function(result){
// 		if(result)
//         {
//         	$.post("../ajax/ojo.php?op=eliminar", {idojo : idojo}, function(e){
//         		bootbox.alert(e);
// 	            tabla.ajax.reload();
//         	});	
//         }
// 	})
// }


init();