<?php 
require_once "../modelos/datos_paciente.php";

$datos_paciente=new Datos_Paciente();

$idhistoria=isset($_POST["idhistoria"])? limpiarCadena($_POST["idhistoria"]):"";
$idpaciente=isset($_POST["idpaciente"])? limpiarCadena($_POST["idpaciente"]):"";
$interrogatorio=isset($_POST["interrogatorio"])? limpiarCadena($_POST["interrogatorio"]):"";
$hg=isset($_POST["hg"])? limpiarCadena($_POST["hg"]):"";
$edad=isset($_POST["edad"])? limpiarCadena($_POST["edad"]):"";
$sexo=isset($_POST["sexo"])? limpiarCadena($_POST["sexo"]):"";
$ocupacion=isset($_POST["ocupacion"])? limpiarCadena($_POST["ocupacion"]):"";
$grad=isset($_POST["grad"])? limpiarCadena($_POST["grad"]):"";
$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idhistoria)){
			$rspta=$datos_paciente->insertar($idpaciente, $interrogatorio, $hg, $edad, $sexo, $ocupacion, $grad, $fecha);
			echo $rspta ? "Historia Ocular registrada" : "Historia Ocular no se pudo registrar";
		}
		else {
			$rspta=$datos_paciente->editar($idhistoria,$idpaciente, $interrogatorio, $hg, $edad, $sexo, $ocupacion, $grad, $fecha);
			echo $rspta ? "Historia Ocular actualizada" : "Historia Ocular no se pudo actualizar";
		}
	break;

	// case 'desactivar':
	// 	$rspta=$datos_paciente->desactivar($idhistoria);
 	// 	echo $rspta ? "datos_paciente Desactivado" : "datos_paciente no se puede desactivar";
 	// 	break;
	// break;

	// case 'activar':
	// 	$rspta=$datos_paciente->activar($idhistoria);
 	// 	echo $rspta ? "datos_paciente activado" : "datos_paciente no se puede activar";
 	// 	break;
	// break;

	// case 'eliminar':
	// 	$rspta=$datos_paciente->eliminar($idhistoria);
 	// 	echo $rspta ? "Historia Ocular Eliminada" : "Historia Ocular no se puede eliminar";
 	// 	break;
	// break;

	case 'mostrar':
		$rspta=$datos_paciente->mostrar($idpaciente);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$datos_paciente->listartodo();
 		//Vamos a declarar un array
 		$data= Array();
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->ID_Paciente.')"><i class="fa fa-eye"></i></button>',
 				"1"=>$reg->Interrogatorio,
				"2"=>$reg->Historia_General,
 				"3"=>$reg->Edad,
				"4"=>$reg->Sexo,
				"5"=>$reg->Ocupacion,
 				"6"=>($reg->Graduacion_Usa == 1? 'Si': 'No'),
				"7"=>$reg->Fecha_Graduacion,
				"8"=>$reg->Pupilas_PP,
				"9"=>$reg->Pupilas_C_Rup,
 				"10"=>$reg->Pupilas_Rec,
				"11"=>$reg->Queratometria_OD,
				"12"=>$reg->Queratometria_OI,
 				"13"=>$reg->Retinoscopia_OD,
				"14"=>$reg->Retinoscopia_OI,
				"15"=>$reg->Subjetivo_OD,
				"16"=>$reg->Subjetivo_OI,
				"17"=>$reg->Add_OD_AV,
				"18"=>$reg->Add_OI_AV,
				"19"=>$reg->Vias_Lagrimales,
				"20"=>$reg->Parpados,
 				"21"=>$reg->Globo_Ocular,
				"22"=>$reg->Conjuntivas,
				"23"=>$reg->Corneas,
 				"24"=>$reg->Iris_Porcion_Ciliar,
				"25"=>$reg->Cristalinos,
				"26"=>$reg->Vitreo,
				"27"=>$reg->Fondo_Ojo,
				"28"=>$reg->itipo,
 				"29"=>$reg->iesferico,
				"30"=>$reg->icilindrico,
 				"31"=>$reg->ieje,
				"32"=>$reg->iprisma,
 				"33"=>$reg->ialtura,
				"34"=>$reg->ioblea,
				"35"=>$reg->icolor,
 				"36"=>$reg->iav,
				"37"=>$reg->ipio,
				"38"=>$reg->iestereopsis,
				"39"=>$reg->iavsl,
				"40"=>$reg->iavc,
				"41"=>$reg->iavl,
				"42"=>$reg->iavcc,
				"43"=>$reg->dtipo,
 				"44"=>$reg->desferico,
				"45"=>$reg->dcilindrico,
 				"46"=>$reg->deje,
				"47"=>$reg->dprisma,
 				"48"=>$reg->daltura,
				"49"=>$reg->doblea,
				"50"=>$reg->dcolor,
 				"51"=>$reg->dav,
				"52"=>$reg->dpio,
				"53"=>$reg->destereopsis,
				"54"=>$reg->davsl,
				"55"=>$reg->davc,
				"56"=>$reg->davl,
				"57"=>$reg->davcc,

 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
}
?>