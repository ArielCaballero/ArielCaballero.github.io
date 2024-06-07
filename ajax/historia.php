<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}

require_once "../modelos/historia.php";
require_once "../modelos/usuarios.php";

$usuario=new usuario();
$historia=new historia();

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
			$rspta=$historia->insertar($idpaciente, $interrogatorio, $hg, $edad, $sexo, $ocupacion, $grad, $fecha,  $_SESSION['idusuario']);
			echo $rspta ? "Historia Ocular registrada" : "Historia Ocular no se pudo registrar";
		}
		else {
			$rspta=$historia->editar($idhistoria,$idpaciente, $interrogatorio, $hg, $edad, $sexo, $ocupacion, $grad, $fecha, $_SESSION['idusuario']);
			echo $rspta ? "Historia Ocular actualizada" : "Historia Ocular no se pudo actualizar";
		}
	break;

	// case 'desactivar':
	// 	$rspta=$historia->desactivar($idhistoria);
 	// 	echo $rspta ? "historia Desactivado" : "historia no se puede desactivar";
 	// 	break;
	// break;

	// case 'activar':
	// 	$rspta=$historia->activar($idhistoria);
 	// 	echo $rspta ? "historia activado" : "historia no se puede activar";
 	// 	break;
	// break;

	// case 'eliminar':
	// 	$rspta=$historia->eliminar($idhistoria);
 	// 	echo $rspta ? "Historia Ocular Eliminada" : "Historia Ocular no se puede eliminar";
 	// 	break;
	// break;

	case 'mostrar':
		$rspta=$historia->mostrar($idhistoria);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$historia->listar();
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
				"8"=>$reg->Fecha_Modificacion,
				"9"=>($usuario->getnombre($reg->ID_Modificacion))['Nombre'],

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