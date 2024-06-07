<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}
require_once "../modelos/receta.php";
require_once "../modelos/usuarios.php";

$usuario=new usuario();
$receta=new Receta();

$idreceta=isset($_POST["idreceta"])? limpiarCadena($_POST["idreceta"]):"";
$idpaciente=isset($_POST["idpaciente"])? limpiarCadena($_POST["idpaciente"]):"";
$iddoctor=isset($_POST["iddoctor"])? limpiarCadena($_POST["iddoctor"]):"";
$idmodelo=isset($_POST["modelo"])? limpiarCadena($_POST["modelo"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idreceta)){
			$rspta=$receta->insertar($idpaciente, $iddoctor,$idmodelo, $_SESSION['idusuario']);
			echo $rspta ? "Receta registrada" : "Receta no se pudo registrar";
		}
		else {
			$rspta=$receta->editar($idreceta,$idpaciente, $iddoctor,$idmodelo, $_SESSION['idusuario']);
			echo $rspta ? "Receta actualizada" : "Receta no se pudo actualizar";
		}
	break;
	break;

	// case 'desactivar':
	// 	$rspta=$receta->desactivar($idreceta);
 	// 	echo $rspta ? "receta Desactivado" : "receta no se puede desactivar";
 	// 	break;
	// break;

	// case 'activar':
	// 	$rspta=$receta->activar($idreceta);
 	// 	echo $rspta ? "receta activado" : "receta no se puede activar";
 	// 	break;
	// break;
	case 'eliminar':
		$rspta=$receta->eliminar($idreceta);
 		echo $rspta ? "Receta Eliminada" : "Receta no se puede eliminar";
 		break;
	break;


	case 'mostrar':
		$rspta=$receta->mostrar($idreceta);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listarmodelos':
		//Obtenemos todos los permisos de la tabla permisos

		$rspta = $receta->listarmodelos();

		//Mostramos la lista de permisos en la vista y si están o no marcados
		while ($reg = $rspta->fetch_object())
				{
					echo '<option value="'.$reg->id_modelo.'">'.($reg->nombre_modelo).'</option>';
				}
	break;
	break;

	case 'listar':

		require_once "../modelos/doctor.php";
		$doctor=new Doctor();
		require_once "../modelos/paciente.php";
		$paciente=new Paciente();

		$rspta=$receta->listar();
 		//Vamos a declarar un array
 		$data= Array();
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->ID_Receta.')"><i class="fa fa-pencil"></i></button>'.
				 ' <button class="btn btn-danger" onclick="eliminar('.$reg->ID_Receta.')"><i class="fa fa-close"></i></button>',
 				"1"=>($usuario->getnombre($doctor->getusuario($reg->ID_Doctor)['ID_Usuario']))['Nombre'],
				"2"=>($usuario->getnombre($paciente->getusuario($reg->ID_Paciente)['ID_Usuario']))['Nombre'],
				"3"=>$reg->Fecha,
				"4"=>$reg->nombre_modelo,
				"5"=>$reg->descripcion,
				"6"=>$reg->color,
				"7"=>$reg->material,
				"8"=>$reg->precio,
				"9"=>$reg->compatibilidad_facial,
				"10"=>$reg->compatibilidad_altas_graduaciones,
				"11"=>$reg->alto_mica,
				"12"=>$reg->ancho_frente,
				"13"=>$reg->largo_pata,
				"14"=>$reg->Fecha_Modificacion,
				"15"=>($usuario->getnombre($reg->ID_Modificacion))['Nombre'],
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
	break;
}
?>