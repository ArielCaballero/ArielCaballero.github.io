<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}
require_once "../modelos/agendarcita.php";
require_once "../modelos/usuarios.php";

$usuario=new Usuario();
$agendarcita=new agendarcita();


$idcita=isset($_POST["idcita"])? limpiarCadena($_POST["idcita"]):"";
$iddoctor=isset($_POST["doctor"])? limpiarCadena($_POST["doctor"]):"";
$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";
$hora=isset($_POST["hora"])? limpiarCadena($_POST["hora"]):"";
$fechaconf=isset($_POST["fechaconf"])? limpiarCadena($_POST["fechaconf"]):"";
$idconf=isset($_POST["idconf"])? limpiarCadena($_POST["idconf"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idcita)){
			$rspta=$agendarcita->insertar($_SESSION['idusuario'], $iddoctor, $fecha, $hora);
			echo $rspta ? "Cita Registrada" : "No se pudo registrar la cita";
		}
		else {
			$rspta=$agendarcita->editar($idcita,$_SESSION['idusuario'], $iddoctor, $fecha, $hora);
			echo $rspta ? "Cita Actualizada" : "No se pudo actualizar la cita";
		}
	break;

	case 'eliminar':
		$rspta=$agendarcita->eliminar($idcita);
 		echo $rspta ? "Cita Eliminada" : "No se puede eliminar la Cita";
 		break;
	break;

	case 'mostrar':
		$rspta=$agendarcita->mostrar($idcita);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listardoctores':
		//Obtenemos todos los permisos de la tabla permisos
		require_once "../modelos/doctor.php";
		$doctor = new doctor();
		$rspta = $doctor->listar();

		//Obtener los permisos asignados al usuario
		//Declaramos el array para almacenar todos los permisos marcados
		$valores=array();

		//Mostramos la lista de permisos en la vista y si están o no marcados
		while ($reg = $rspta->fetch_object())
				{
					echo '<option value="'.$reg->ID_Doctor.'">'.($usuario->getnombre($agendarcita->getusuariodoctor($reg->ID_Doctor)['ID_Usuario']))['Nombre'].'</option>';
				}
	break;

	case 'listar':
		$rspta=$agendarcita->listarmiscitas($_SESSION['idusuario']);
 		//Vamos a declarar un array
 		$data= Array();
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($usuario->getnombre($agendarcita->getusuariodoctor($reg->ID_Doctor)['ID_Usuario']))['Nombre'],
 				"1"=>$reg->Fecha,
				"2"=>$reg->Hora,
				"3"=>($reg->Condicion=='Pendiente')?'<span class="label bg-orange">Pendiente</span>': (($reg->Condicion=='Confirmado')?
 				'<span class="label bg-green">Confirmado</span>': '<span class="label bg-red">Cancelado</span>'),
 				"4"=>$reg->Fecha_Confirmacion,
				"5"=>(isset($reg->ID_Confirmacion)?($usuario->getnombre($reg->ID_Confirmacion))['Nombre']:''),			
				"6"=> ($reg->Condicion=='Pendiente')?'<button class="btn btn-danger" onclick="eliminar('.$reg->ID_Cita.')"><i class="fa fa-trash"></i></button>'.'<button class="btn btn-warning" onclick="mostrar('.$reg->ID_Cita.')"><i class="fa fa-pencil"></i></button>':'<button class="btn btn-danger" onclick="eliminar('.$reg->ID_Cita.')" disabled><i class="fa fa-trash"></i></button>'
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