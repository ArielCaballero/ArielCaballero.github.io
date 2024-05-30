<?php 
require_once "../modelos/paciente.php";

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
			$rspta=$paciente->insertar($idusuario,$colonia,$ciudad,$cp,$edo,$celular, $rfc, $fn);
			echo $rspta ? "paciente registrado" : "paciente no se pudo registrar";
		}
		else {
			$rspta=$paciente->editar($idpaciente,$idusuario,$colonia,$ciudad,$cp,$edo,$celular, $rfc, $fn);
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
 				"1"=>$reg->Colonia,
 				"2"=>$reg->Ciudad,
				"3"=>$reg->CP,
 				"4"=>$reg->Edo,
				"5"=>$reg->Celular,
 				"6"=>$reg->RFC,
				"7"=>$reg->FN,
				"8"=>($reg->Condicion)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
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