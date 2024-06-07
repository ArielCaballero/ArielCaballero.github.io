var tabla;

//Función que se ejecuta al inicio
function init(){
	
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
	$.post("../ajax/agendarcita.php?op=listardoctores",function(r){
		$("#doctor").html(r);
	})
}

//Función limpiar
function limpiar()
{
	$("#idcita").val("");
	$("#doctor").val("");
	$("#fecha").val("");
	$("#hora").val("");

	
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
					url: '../ajax/agendarcita.php?op=listar',
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
		url: "../ajax/agendarcita.php?op=guardaryeditar",
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

function mostrar(idcita)
{
	$.post("../ajax/agendarcita.php?op=mostrar",{idcita : idcita}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idcita").val(data.ID_Cita);
		$("#doctor").val(data.ID_Doctor);
		$("#fecha").val(data.Fecha);
		$("#hora").val(data.Hora);


 	});
	 $.post("../ajax/agendarcita.php?op=listardoctores",function(r){
		$("#doctor").html(r);
});
}

//Función para desactivar registros
// function confirmar(idcita)
// {
// 	bootbox.confirm("¿Está Seguro de confirmar la Cita?", function(result){
// 		if(result)
//         {
//         	$.post("../ajax/agendarcita.php?op=confirmar", {idcita : idcita}, function(e){
//         		bootbox.alert(e);
// 	            tabla.ajax.reload();
//         	});	
//         }
// 	})
// }

// // //Función para activar registros
// function cancelar(idcita)
// {
// 	bootbox.confirm("¿Está Seguro de cancelar la Cita?", function(result){
// 		if(result)
//         {
//         	$.post("../ajax/agendarcita.php?op=cancelar", {idcita : idcita}, function(e){
//         		bootbox.alert(e);
// 	            tabla.ajax.reload();
//         	});	
//         }
// 	})
// }

function eliminar(idcita)
{
	bootbox.confirm("¿Está Seguro de eliminar la Cita?", function(result){
		if(result)
        {
        	$.post("../ajax/agendarcita.php?op=eliminar", {idcita : idcita}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();