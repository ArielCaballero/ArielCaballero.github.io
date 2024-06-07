<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}
require_once "../modelos/paciente.php";
require_once "../modelos/usuarios.php";

$usuario=new Usuario();
$paciente=new paciente();


$idpaciente=isset($_POST["idpaciente"])? limpiarCadena($_POST["idpaciente"]):"";
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$colonia=isset($_POST["colonia"])? limpiarCadena($_POST["colonia"]):"";
$ciudad=isset($_POST["ciudad"])? limpiarCadena($_POST["ciudad"]):"";
$cp=isset($_POST["cp"])? limpiarCadena($_POST["cp"]):"";
$edo=isset($_POST["edo"])? limpiarCadena($_POST["edo"]):"";
$celular=isset($_POST["celular"])? limpiarCadena($_POST["celular"]):"";
$rfc=isset($_POST["rfc"])? limpiarCadena($_POST["rfc"]):"";
$fn=isset($_POST["fn"])? limpiarCadena($_POST["fn"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idpaciente)){
			$rspta=$paciente->insertar($idusuario,$colonia,$ciudad,$cp,$edo,$celular, $rfc, $fn, $_SESSION['idusuario']);
			echo $rspta ? "paciente registrado" : "paciente no se pudo registrar";
		}
		else {
			$rspta=$paciente->editar($idpaciente,$idusuario,$colonia,$ciudad,$cp,$edo,$celular, $rfc, $fn, $_SESSION['idusuario']);
			echo $rspta ? "paciente actualizado" : "paciente no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$paciente->desactivar($idpaciente);
 		echo $rspta ? "paciente Desactivado" : "paciente no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$paciente->activar($idpaciente);
 		echo $rspta ? "paciente activado" : "paciente no se puede activar";
 		break;
	break;


	case 'mostrar':
		$rspta=$paciente->mostrar($idpaciente);
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
 				"0"=>($reg->Condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->ID_Paciente.')"><i class="fa fa-pencil"></i></button>'.
				 ' <button class="btn btn-danger" onclick="desactivar('.$reg->ID_Paciente.')"><i class="fa fa-close"></i></button>':
				 '<button class="btn btn-warning" onclick="mostrar('.$reg->ID_Paciente.')"><i class="fa fa-pencil"></i></button>'.
				 ' <button class="btn btn-primary" onclick="activar('.$reg->ID_Paciente.')"><i class="fa fa-check"></i></button>',
 				"1"=>($usuario->getnombre($paciente->getusuario($reg->ID_Paciente)['ID_Usuario']))['Nombre'],
				"2"=>$reg->Colonia,
 				"3"=>$reg->Ciudad,
				"4"=>$reg->CP,
 				"5"=>$reg->Edo,
				"6"=>$reg->Celular,
 				"7"=>$reg->RFC,
				"8"=>$reg->FN,
				"9"=>($reg->Condicion)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>',
				"10"=>$reg->Fecha_Modificacion,
				"11"=>($usuario->getnombre($reg->ID_Modificacion))['Nombre'],
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