<?php 
require_once "../modelos/exp_funcional.php";

$exp_funcional=new Exp_funcional();

$idexp_funcional=isset($_POST["idexp_funcional"])? limpiarCadena($_POST["idexp_funcional"]):"";
$idpaciente=isset($_POST["idpaciente"])? limpiarCadena($_POST["idpaciente"]):"";
$pupilas_pp=isset($_POST["pupilas_pp"])? limpiarCadena($_POST["pupilas_pp"]):"";
$pupilas_c_rup=isset($_POST["pupilas_c_rup"])? limpiarCadena($_POST["pupilas_c_rup"]):"";
$pupilas_rec=isset($_POST["pupilas_rec"])? limpiarCadena($_POST["pupilas_rec"]):"";
$queratometria_od=isset($_POST["queratometria_od"])? limpiarCadena($_POST["queratometria_od"]):"";
$queratometria_oi=isset($_POST["queratometria_oi"])? limpiarCadena($_POST["queratometria_oi"]):"";
$retinoscopia_od=isset($_POST["retinoscopia_od"])? limpiarCadena($_POST["retinoscopia_od"]):"";
$retinoscopia_oi=isset($_POST["retinoscopia_oi"])? limpiarCadena($_POST["retinoscopia_oi"]):"";
$subjetivo_od=isset($_POST["subjetivo_od"])? limpiarCadena($_POST["subjetivo_od"]):"";
$subjetivo_oi=isset($_POST["subjetivo_oi"])? limpiarCadena($_POST["subjetivo_oi"]):"";
$add_od_av=isset($_POST["add_od_av"])? limpiarCadena($_POST["add_od_av"]):"";
$add_oi_av=isset($_POST["add_oi_av"])? limpiarCadena($_POST["add_oi_av"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idexp_funcional)){
			$rspta=$exp_funcional->insertar($idpaciente, $pupilas_pp, $pupilas_c_rup, $pupilas_rec, $queratometria_od, $queratometria_oi, $retinoscopia_od, $retinoscopia_oi, $subjetivo_od, $subjetivo_oi, $add_od_av, $add_oi_av);
			echo $rspta ? "Exploracion Funcional registrada" : "Exploracion Funcional no se pudo registrar";
		}
		else {
			$rspta=$exp_funcional->editar($idexp_funcional,$idpaciente, $pupilas_pp, $pupilas_c_rup, $pupilas_rec, $queratometria_od, $queratometria_oi, $retinoscopia_od, $retinoscopia_oi, $subjetivo_od, $subjetivo_oi, $add_od_av, $add_oi_av);
			echo $rspta ? "Exploracion Funcional actualizada" : "Exploracion Funcional no se pudo actualizar";
		}
	break;

	// case 'desactivar':
	// 	$rspta=$exp_funcional->desactivar($idexp_funcional);
 	// 	echo $rspta ? "exp_funcional Desactivado" : "exp_funcional no se puede desactivar";
 	// 	break;
	// break;

	// case 'activar':
	// 	$rspta=$exp_funcional->activar($idexp_funcional);
 	// 	echo $rspta ? "exp_funcional activado" : "exp_funcional no se puede activar";
 	// 	break;
	// break;

	// case 'eliminar':
	// 	$rspta=$exp_funcional->eliminar($idexp_funcional);
 	// 	echo $rspta ? "exp_funcional Ocular Eliminada" : "exp_funcional Ocular no se puede eliminar";
 	// 	break;
	// break;

	case 'mostrar':
		$rspta=$exp_funcional->mostrar($idexp_funcional);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$exp_funcional->listar();
 		//Vamos a declarar un array
 		$data= Array();
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->ID_Exploracion_Funcional.')"><i class="fa fa-pencil"></i></button>',
 				"1"=>$reg->Pupilas_PP,
				"2"=>$reg->Pupilas_C_Rup,
 				"3"=>$reg->Pupilas_Rec,
				"4"=>$reg->Queratometria_OD,
				"5"=>$reg->Queratometria_OI,
 				"6"=>$reg->Retinoscopia_OD,
				"7"=>$reg->Retinoscopia_OI,
				"8"=>$reg->Subjetivo_OD,
				"9"=>$reg->Subjetivo_OI,
				"10"=>$reg->Add_OD_AV,
				"11"=>$reg->Add_OI_AV,
				

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