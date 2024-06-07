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
	$("#fecha").val("");
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
	$("#iidojo").val("");
	$("#iidpaciente").val("");
	$("#itipo").val("");
	$("#iesferico").val("");
	$("#icilindrico").val("");
	$("#ieje").val("");
	$("#iprisma").val("");
	$("#ialtura").val("");
	$("#ioblea").val("");
	$("#icolor").val("");
	$("#iav").val("");
	$("#ipio").val("");
	$("#iestereopsis").val("");
	$("#iavsl").val("");
	$("#iavc").val("");
	$("#iavl").val("");
	$("#iavcc").val("");
	$("#didojo").val("");
	$("#didpaciente").val("");
	$("#dtipo").val("");
	$("#desferico").val("");
	$("#dcilindrico").val("");
	$("#deje").val("");
	$("#dprisma").val("");
	$("#daltura").val("");
	$("#doblea").val("");
	$("#dcolor").val("");
	$("#dav").val("");
	$("#dpio").val("");
	$("#destereopsis").val("");
	$("#davsl").val("");
	$("#davc").val("");
	$("#davl").val("");
	$("#davcc").val("");

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
					url: '../ajax/datos_paciente.php?op=listar',
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
		url: "../ajax/datos_paciente.php?op=guardaryeditar",
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
	$.post("../ajax/datos_paciente.php?op=mostrar",{idpaciente : idpaciente}, function(data, status)
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
		$("#iidojo").val(data.iidojo);
		$("#itipo").val(data.itipo);
		$("#iesferico").val(data.iesferico);
		$("#icilindrico").val(data.icilindrico);
		$("#ieje").val(data.ieje);
		$("#iprisma").val(data.iprisma);
		$("#ialtura").val(data.ialtura);
		$("#ioblea").val(data.ioblea);
		$("#icolor").val(data.icolor);
		$("#iav").val(data.iav);
		$("#ipio").val(data.ipio);
		$("#iestereopsis").val(data.iestereopsis);
		$("#iavsl").val(data.iavsl);
		$("#iavc").val(data.iavc);
		$("#iavl").val(data.iavl);
		$("#iavcc").val(data.iavcc);
		$("#didojo").val(data.didojo);
		$("#dtipo").val(data.dtipo);
		$("#desferico").val(data.desferico);
		$("#dcilindrico").val(data.dcilindrico);
		$("#deje").val(data.deje);
		$("#dprisma").val(data.dprisma);
		$("#daltura").val(data.daltura);
		$("#doblea").val(data.doblea);
		$("#dcolor").val(data.dcolor);
		$("#dav").val(data.dav);
		$("#dpio").val(data.dpio);
		$("#destereopsis").val(data.destereopsis);
		$("#davsl").val(data.davsl);
		$("#davc").val(data.davc);
		$("#davl").val(data.davl);
		$("#davcc").val(data.davcc);
		
		
 	})
}

//Función para desactivar registros
// function desactivar(idhistoria)
// {
// 	bootbox.confirm("¿Está Seguro de desactivar el historia?", function(result){
// 		if(result)
//         {
//         	$.post("../ajax/datos_paciente.php?op=desactivar", {idhistoria : idhistoria}, function(e){
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
//         	$.post("../ajax/datos_paciente.php?op=activar", {idhistoria : idhistoria}, function(e){
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
//         	$.post("../ajax/datos_paciente.php?op=eliminar", {idhistoria : idhistoria}, function(e){
//         		bootbox.alert(e);
// 	            tabla.ajax.reload();
//         	});	
//         }
// 	})
// }


init();