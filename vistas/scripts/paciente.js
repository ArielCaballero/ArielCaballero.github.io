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
	$("#idpaciente").val("");
	$("#idusuario").val("");
	$("#colonia	").val("");
	$("#ciudad").val("");
	$("#cp").val("");
	$("#edo").val("");
	$("#celular").val("");
	$("#rfc").val("");
	$("#fn").val("");
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
					url: '../ajax/paciente.php?op=listar',
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
		url: "../ajax/paciente.php?op=guardaryeditar",
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

function mostrar(idpaciente)
{
	$.post("../ajax/paciente.php?op=mostrar",{idpaciente : idpaciente}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idpaciente").val(data.ID_Paciente);
		$("#idusuario").val(data.ID_Usuario);
		$("#colonia").val(data.Colonia);
		$("#ciudad").val(data.Ciudad);
		$("#cp").val(data.CP);
		$("#edo").val(data.Edo);
		$("#celular").val(data.Celular);
		$("#rfc").val(data.RFC);
		$("#fn").val(data.FN);

 	})
}

//Función para desactivar registros
function desactivar(idpaciente)
{
	bootbox.confirm("¿Está Seguro de desactivar el paciente?", function(result){
		if(result)
        {
        	$.post("../ajax/paciente.php?op=desactivar", {idpaciente : idpaciente}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idpaciente)
{
	bootbox.confirm("¿Está Seguro de activar el paciente?", function(result){
		if(result)
        {
        	$.post("../ajax/paciente.php?op=activar", {idpaciente : idpaciente}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

function eliminar(idpaciente)
{
	bootbox.confirm("¿Está Seguro de eliminar el paciente?", function(result){
		if(result)
        {
        	$.post("../ajax/paciente.php?op=eliminar", {idpaciente : idpaciente}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();