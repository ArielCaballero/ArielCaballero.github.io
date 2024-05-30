<?php 
require_once "../modelos/usuario.php";

$usuario=new usuario();

$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$tel=isset($_POST["tel"])? limpiarCadena($_POST["tel"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
$tipo=isset($_POST["tipo"])? limpiarCadena($_POST["tipo"]):"";
$username=isset($_POST["usuario"])? limpiarCadena($_POST["usuario"]):"";
$password=isset($_POST["password"])? limpiarCadena($_POST["password"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idusuario)){
			$rspta=$usuario->insertar($nombre,$direccion,$tel,$email,$tipo,$username, $password);
			echo $rspta ? "Usuario registrado" : "Usuario no se pudo registrar";
		}
		else {
			$rspta=$usuario->editar($idusuario,$nombre,$direccion,$tel,$email,$tipo,$username, $password);
			echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
		}
	break;

	// case 'desactivar':
	// 	$rspta=$usuario->desactivar($idusuario);
 	// 	echo $rspta ? "Usuario Desactivado" : "Usuario no se puede desactivar";
 	// 	break;
	// break;

	// case 'activar':
	// 	$rspta=$usuario->activar($idusuario);
 	// 	echo $rspta ? "Usuario activado" : "Usuario no se puede activar";
 	// 	break;
	// break;

	case 'eliminar':
		$rspta=$usuario->eliminar($idusuario);
 		echo $rspta ? "Usuario Eliminado" : "Usuario no se puede eliminar";
 		break;
	break;


	case 'mostrar':
		$rspta=$usuario->mostrar($idusuario);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$usuario->listar();
 		//Vamos a declarar un array
 		$data= Array();
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->ID_Usuario.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="eliminar('.$reg->ID_Usuario.')"><i class="fa fa-close"></i></button>',
 				"1"=>$reg->Nombre,
 				"2"=>$reg->Direccion,
				"3"=>$reg->Tel,
 				"4"=>$reg->Email,
				"5"=>$reg->Tipo,
 				"6"=>$reg->Username,
				"7"=>$reg->Password,
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