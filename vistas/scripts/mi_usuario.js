var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform();
	mostrar(document.getElementById('ssidusuario').innerHTML)
	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
	$.post("../ajax/usuarios.php?op=permisos&id=",function(r){
		$("#permisos").html(r);
	})
}

//Función limpiar
function limpiar()
{
	$("#idusuario").val("");
	$("#nombre").val("");
	$("#direccion").val("");
	$("#tel").val("");
	$("#email").val("");
	$("#tipo").val("");
	$("#username").val("");
	$("#password").val("");
	$("#oldpassword").val("");
	$("#condicion").val("");
	$("#fechamod").val("");
	$("#idmod").val("");
}

//Función mostrar formulario
function mostrarform()
{
	limpiar();
	$("#formularioregistros").show();
	$("#btnGuardar").prop("disabled",false);
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
					url: '../ajax/usuarios.php?op=listar',
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
		url: "../ajax/usuarios.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	            bootbox.alert(datos);	          
	            mostrar(document.getElementById('ssidusuario').innerHTML);
	    }

	});
	
}

function mostrar(idusuario)
{
	$.post("../ajax/usuarios.php?op=mostrar",{idusuario : idusuario}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idusuario").val(data.ID_Usuario);
		$("#nombre").val(data.Nombre);
		$("#direccion").val(data.Direccion);
		$("#tel").val(data.Tel);
		$("#email").val(data.Email);
		$("#tipo").val(data.Tipo);
		$("#usuario").val(data.Username);
		$("#condicion").val(data.Condicion);
		$("#fechamod").val(data.Fecha_Modificacion);
		$("#idmod").val(data.ID_Modificacion);
		$("#oldpassword").val(data.Password);


 	});
	 $.post("../ajax/usuarios.php?op=permisos&id="+idusuario,function(r){
		$("#permisos").html(r);
});
}

//Función para desactivar registros
// function desactivar(idusuario)
// {
// 	bootbox.confirm("¿Está Seguro de desactivar el Usuario?", function(result){
// 		if(result)
//         {
//         	$.post("../ajax/usuario.php?op=desactivar", {idusuario : idusuario}, function(e){
//         		bootbox.alert(e);
// 	            tabla.ajax.reload();
//         	});	
//         }
// 	})
// }

// //Función para activar registros
// function activar(idusuario)
// {
// 	bootbox.confirm("¿Está Seguro de activar el Usuario?", function(result){
// 		if(result)
//         {
//         	$.post("../ajax/usuarios.php?op=activar", {idusuario : idusuario}, function(e){
//         		bootbox.alert(e);
// 	            tabla.ajax.reload();
//         	});	
//         }
// 	})
// }

function eliminar(idusuario)
{
	bootbox.confirm("¿Está Seguro de eliminar el Usuario?", function(result){
		if(result)
        {
        	$.post("../ajax/usuarios.php?op=eliminar", {idusuario : idusuario}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();