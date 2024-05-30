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
	$("#idexp_funcional").val("");
	$("#idpaciente").val("");
	$("#pupilas_pp").val("");
	$("#pupilas_c_rup").val("");
	$("#pupilas_rec").val("");
	$("#queratometria_od").val("");
	$("#queratometria_oi").val("");
	$("#retinoscopia_od").val("");
	$("#retinoscopia_oi").val("");
	$("#subjetivo_od").val("");
	$("#subjetivo_oi").val("");
	$("#add_od_av").val("");
	$("#add_oi_av").val("");

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
					url: '../ajax/exp_funcional.php?op=listar',
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
		url: "../ajax/exp_funcional.php?op=guardaryeditar",
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

function mostrar(idexp_funcional)
{
	$.post("../ajax/exp_funcional.php?op=mostrar",{idexp_funcional : idexp_funcional}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

	$("#idexp_funcional").val(data.ID_Exploracion_Funcional);
	$("#idpaciente").val(data.ID_Paciente);
	$("#pupilas_pp").val(data.Pupilas_PP);
	$("#pupilas_c_rup").val(data.Pupilas_C_Rup);
	$("#pupilas_rec").val(data.Pupilas_Rec);
	$("#queratometria_od").val(data.Queratometria_OD);
	$("#queratometria_oi").val(data.Queratometria_OI);
	$("#retinoscopia_od").val(data.Retinoscopia_OD);
	$("#retinoscopia_oi").val(data.Retinoscopia_OI);
	$("#subjetivo_od").val(data.Subjetivo_OD);
	$("#subjetivo_oi").val(data.Subjetivo_OI);
	$("#add_od_av").val(data.Add_OD_AV);
	$("#add_oi_av").val(data.Add_OI_AV);
		
 	})
}

//Función para desactivar registros
// function desactivar(idexp_funcional)
// {
// 	bootbox.confirm("¿Está Seguro de desactivar el exp_funcional?", function(result){
// 		if(result)
//         {
//         	$.post("../ajax/exp_funcional.php?op=desactivar", {idexp_funcional : idexp_funcional}, function(e){
//         		bootbox.alert(e);
// 	            tabla.ajax.reload();
//         	});	
//         }
// 	})
// }

//Función para activar registros
// function activar(idexp_funcional)
// {
// 	bootbox.confirm("¿Está Seguro de activar el exp_funcional?", function(result){
// 		if(result)
//         {
//         	$.post("../ajax/exp_funcional.php?op=activar", {idexp_funcional : idexp_funcional}, function(e){
//         		bootbox.alert(e);
// 	            tabla.ajax.reload();
//         	});	
//         }
// 	})
// }

function eliminar(idexp_funcional)
{
	bootbox.confirm("¿Está Seguro de eliminar la Exploracion Funcional?", function(result){
		if(result)
        {
        	$.post("../ajax/exp_funcional.php?op=eliminar", {idexp_funcional : idexp_funcional}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();