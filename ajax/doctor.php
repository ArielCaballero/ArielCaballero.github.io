<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}
require_once "../modelos/doctor.php";
require_once "../modelos/usuarios.php";

$usuario=new Usuario();
$doctor=new Doctor();

$iddoctor=isset($_POST["iddoctor"])? limpiarCadena($_POST["iddoctor"]):"";
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$especialidad=isset($_POST["especialidad"])? limpiarCadena($_POST["especialidad"]):"";
$rfc=isset($_POST["rfc"])? limpiarCadena($_POST["rfc"]):"";
$cedula=isset($_POST["cedula"])? limpiarCadena($_POST["cedula"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($iddoctor)){
			$rspta=$doctor->insertar($idusuario,$especialidad, $rfc, $cedula,$_SESSION['idusuario']);
			echo $rspta ? "doctor registrado" : "doctor no se pudo registrar";
		}
		else {
			$rspta=$doctor->editar($iddoctor,$idusuario,$especialidad, $rfc, $cedula,$_SESSION['idusuario']);
			echo $rspta ? "doctor actualizado" : "doctor no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$doctor->desactivar($iddoctor);
 		echo $rspta ? "Doctor Desactivado" : "Doctor no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$doctor->activar($iddoctor);
 		echo $rspta ? "Doctor activado" : "Doctor no se puede activar";
 		break;
	break;


	case 'mostrar':
		$rspta=$doctor->mostrar($iddoctor);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$doctor->listar();
 		//Vamos a declarar un array
 		$data= Array();
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->Condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->ID_Doctor.')"><i class="fa fa-pencil"></i></button>'.
				 ' <button class="btn btn-danger" onclick="desactivar('.$reg->ID_Doctor.')"><i class="fa fa-close"></i></button>':
				 '<button class="btn btn-warning" onclick="mostrar('.$reg->ID_Doctor.')"><i class="fa fa-pencil"></i></button>'.
				 ' <button class="btn btn-primary" onclick="activar('.$reg->ID_Doctor.')"><i class="fa fa-check"></i></button>',
 				"1"=>($usuario->getnombre($doctor->getusuario($reg->ID_Doctor)['ID_Usuario']))['Nombre'],
				"2"=>$reg->Especialidad,
 				"3"=>$reg->RFC,
				"4"=>$reg->Cedula_Profesional,
				"5"=>($reg->Condicion)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>',
				"6"=>$reg->Fecha_Modificacion,
				"7"=>($usuario->getnombre($reg->ID_Modificacion))['Nombre'],
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