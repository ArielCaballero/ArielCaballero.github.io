<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}
require_once "../modelos/lente.php";
require_once "../modelos/usuarios.php";

$usuario=new usuario();
$lente=new lente();

$idlente=isset($_POST["idlente"])? limpiarCadena($_POST["idlente"]):"";
$idpaciente=isset($_POST["idpaciente"])? limpiarCadena($_POST["idpaciente"]):"";
$radio=isset($_POST["radio"])? limpiarCadena($_POST["radio"]):"";
$diam=isset($_POST["diam"])? limpiarCadena($_POST["diam"]):"";
$cp=isset($_POST["cp"])? limpiarCadena($_POST["cp"]):"";
$rx=isset($_POST["rx"])? limpiarCadena($_POST["rx"]):"";
$grueso=isset($_POST["grueso"])? limpiarCadena($_POST["grueso"]):"";
$zo=isset($_POST["zo"])? limpiarCadena($_POST["zo"]):"";
$pl=isset($_POST["pl"])? limpiarCadena($_POST["pl"]):"";
$color=isset($_POST["color"])? limpiarCadena($_POST["color"]):"";
$av=isset($_POST["av"])? limpiarCadena($_POST["av"]):"";
$observaciones=isset($_POST["observaciones"])? limpiarCadena($_POST["observaciones"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idlente)){
			$rspta=$lente->insertar($idpaciente, $radio, $diam, $cp, $rx, $grueso, $zo, $pl, $color, $av,  $observaciones, $_SESSION['idusuario']);
			echo $rspta ? "Lente registrado" : "Lente no se pudo registrar";
		}
		else {
			$rspta=$lente->editar($idlente,$idpaciente, $radio, $diam, $cp, $rx, $grueso, $zo, $pl, $color, $av, $observaciones, $_SESSION['idusuario']);
			echo $rspta ? "Lente actualizado" : "Lente no se pudo actualizar";
		}
	break;

	// case 'desactivar':
	// 	$rspta=$lente->desactivar($idlente);
 	// 	echo $rspta ? "lente Desactivado" : "lente no se puede desactivar";
 	// 	break;
	// break;

	// case 'activar':
	// 	$rspta=$lente->activar($idlente);
 	// 	echo $rspta ? "lente activado" : "lente no se puede activar";
 	// 	break;
	// break;

	case 'eliminar':
		$rspta=$lente->eliminar($idlente);
 		echo $rspta ? "Lente Eliminado" : "Lente no se puede eliminar";
 		break;
	break;

	case 'mostrar':
		$rspta=$lente->mostrar($idlente);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$lente->listar();
 		//Vamos a declarar un array
 		$data= Array();
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->ID_Lente.')"><i class="fa fa-pencil"></i></button>'.
				 ' <button class="btn btn-danger" onclick="eliminar('.$reg->ID_Lente.')"><i class="fa fa-close"></i></button>',
 				"1"=>$reg->Radio,
				"2"=>$reg->Diam,
 				"3"=>$reg->CP,
				"4"=>$reg->RX,
 				"5"=>$reg->Grueso,
				"6"=>$reg->ZO,
				"7"=>$reg->PL,
				"8"=>$reg->Color,
 				"9"=>$reg->AV,
				"10"=>$reg->Observaciones,
				"11"=>$reg->Fecha_Modificacion,
				"12"=>($usuario->getnombre($reg->ID_Modificacion))['Nombre'],

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