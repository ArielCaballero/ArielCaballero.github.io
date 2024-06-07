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
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->ID_Historia_Ocular.')"><i class="fa fa-pencil"></i></button>',
 				"1"=>$reg->Interrogatorio,
				"2"=>$reg->Historia_General,
 				"3"=>$reg->Edad,
				"4"=>$reg->Sexo,
				"5"=>$reg->Ocupacion,
 				"6"=>($reg->Graduacion_Usa == 1? 'Si': 'No'),
				"7"=>$reg->Fecha_Graduacion,
				/*"8"=>$reg->Pupilas_PP,
				"9"=>$reg->Pupilas_C_Rup,
 				"10"=>$reg->Pupilas_Rec,*/
				"8"=>$reg->Queratometria_OD,
				"9"=>$reg->Queratometria_OI,
 				"10"=>$reg->Retinoscopia_OD,
				"11"=>$reg->Retinoscopia_OI,
				"12"=>$reg->Subjetivo_OD,
				"13"=>$reg->Subjetivo_OI,
				/*"17"=>$reg->Add_OD_AV,
				"18"=>$reg->Add_OI_AV,*/
				"14"=>$reg->Vias_Lagrimales,
				"15"=>$reg->Parpados,
 				"16"=>$reg->Globo_Ocular,
				"17"=>$reg->Conjuntivas,
				"18"=>$reg->Corneas,
 				"19"=>$reg->Iris_Porcion_Ciliar,
				/*"20"=>$reg->Cristalinos,
				"21"=>$reg->Vitreo,*/
				"20"=>$reg->Fondo_Ojo,
				"21"=>$reg->itipo,
 				"22"=>$reg->iesferico,
				"23"=>$reg->icilindrico,
 				"24"=>$reg->ieje,
				"25"=>$reg->iprisma,
 				"26"=>$reg->ialtura,
				/*"34"=>$reg->ioblea,*/
				"27"=>$reg->icolor,
 				/*"36"=>$reg->iav,*/
				"28"=>$reg->ipio,
				"29"=>$reg->iestereopsis,
				/*"39"=>$reg->iavsl,
				"40"=>$reg->iavc,
				"41"=>$reg->iavl,
				"42"=>$reg->iavcc,*/
				"30"=>$reg->dtipo,
 				"31"=>$reg->desferico,
				"32"=>$reg->dcilindrico,
 				"33"=>$reg->deje,
				"34"=>$reg->dprisma,
 				"35"=>$reg->daltura,
				/*"49"=>$reg->doblea,*/
				"36"=>$reg->dcolor,
 				/*"51"=>$reg->dav,*/
				"37"=>$reg->dpio,
				"38"=>$reg->destereopsis,
				/*"54"=>$reg->davsl,
				"55"=>$reg->davc,
				"56"=>$reg->davl,
				"57"=>$reg->davcc,*/

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