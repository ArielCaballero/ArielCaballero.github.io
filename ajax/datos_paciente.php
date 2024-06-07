<?php 
require_once "../modelos/datos_paciente.php";
require_once "../modelos/paciente.php";
require_once "../modelos/usuarios.php";

$datos_paciente=new Datos_Paciente();
$paciente=new Paciente();
$usuario=new Usuario();

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
		$rspta=$paciente->listar();
 		//Vamos a declarar un array
 		$data= Array();
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->ID_Paciente.')"><i class="fa fa-eye"></i></button>',
				"1"=>($usuario->getnombre($paciente->getusuario($reg->ID_Paciente)['ID_Usuario']))['Nombre'],
				"2"=>$reg->Colonia,
 				"3"=>$reg->Ciudad,
				"4"=>$reg->Celular,
				"5"=>$reg->FN,
				"6"=>($reg->Condicion)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>',
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