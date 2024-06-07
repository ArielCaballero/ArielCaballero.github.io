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
$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";
$cristal=isset($_POST["cristal"])? limpiarCadena($_POST["cristal"]):"";
$plastico=isset($_POST["plastico"])? limpiarCadena($_POST["plastico"]):"";
$armazon=isset($_POST["armazon"])? limpiarCadena($_POST["armazon"]):"";
$color=isset($_POST["color"])? limpiarCadena($_POST["color"]):"";
$tam=isset($_POST["tam"])? limpiarCadena($_POST["tam"]):"";
$original=isset($_POST["original"])? limpiarCadena($_POST["original"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idreceta)){
			$rspta=$receta->insertar($idpaciente, $iddoctor,$fecha,$cristal,$plastico,$armazon,$color, $tam, $original, $_SESSION['idusuario']);
			echo $rspta ? "Receta registrada" : "Receta no se pudo registrar";
		}
		else {
			$rspta=$receta->editar($idreceta,$idpaciente, $iddoctor,$fecha,$cristal,$plastico,$armazon,$color, $tam, $original, $_SESSION['idusuario']);
			echo $rspta ? "Receta actualizada" : "Receta no se pudo actualizar";
		}
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

	case 'listar':
		$rspta=$receta->listar();
 		//Vamos a declarar un array
 		$data= Array();
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->ID_Receta.')"><i class="fa fa-pencil"></i></button>'.
				 ' <button class="btn btn-danger" onclick="eliminar('.$reg->ID_Receta.')"><i class="fa fa-close"></i></button>',
 				"1"=>$reg->Fecha,
 				"2"=>($reg->Cristal == 1? 'Si': 'No'),
				"3"=>($reg->Plastico == 1? 'Si': 'No'),
 				"4"=>$reg->Armazon,
				"5"=>$reg->Color_Armazon,
 				"6"=>$reg->Tamaño_y_Pte,
				"7"=>$reg->Original,
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