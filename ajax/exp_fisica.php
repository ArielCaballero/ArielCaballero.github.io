<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}

require_once "../modelos/exp_fisica.php";
require_once "../modelos/usuarios.php";

$usuario=new usuario();
$exp_fisica=new Exp_fisica();

$idexp_fisica=isset($_POST["idexp_fisica"])? limpiarCadena($_POST["idexp_fisica"]):"";
$idpaciente=isset($_POST["idpaciente"])? limpiarCadena($_POST["idpaciente"]):"";
$vias_lagrimales=isset($_POST["vias_lagrimales"])? limpiarCadena($_POST["vias_lagrimales"]):"";
$parpados=isset($_POST["parpados"])? limpiarCadena($_POST["parpados"]):"";
$globo_ocular=isset($_POST["globo_ocular"])? limpiarCadena($_POST["globo_ocular"]):"";
$conjuntivas=isset($_POST["conjuntivas"])? limpiarCadena($_POST["conjuntivas"]):"";
$corneas=isset($_POST["corneas"])? limpiarCadena($_POST["corneas"]):"";
$iris=isset($_POST["iris"])? limpiarCadena($_POST["iris"]):"";
$cristalinos=isset($_POST["cristalinos"])? limpiarCadena($_POST["cristalinos"]):"";
$vitreo=isset($_POST["vitreo"])? limpiarCadena($_POST["vitreo"]):"";
$fondo_ojo=isset($_POST["fondo_ojo"])? limpiarCadena($_POST["fondo_ojo"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idexp_fisica)){
			$rspta=$exp_fisica->insertar($idpaciente, $vias_lagrimales, $parpados, $globo_ocular, $conjuntivas, $corneas, $iris, $cristalinos, $vitreo, $fondo_ojo, $_SESSION['idusuario']);
			echo $rspta ? "Exploracion Fisica registrada" : "Exploracion Fisica no se pudo registrar";
		}
		else {
			$rspta=$exp_fisica->editar($idexp_fisica, $idpaciente, $vias_lagrimales, $parpados, $globo_ocular, $conjuntivas, $corneas, $iris, $cristalinos, $vitreo, $fondo_ojo, $_SESSION['idusuario']);
			echo $rspta ? "Exploracion Fisica actualizada" : "Exploracion Fisica no se pudo actualizar";
		}
	break;

	// case 'desactivar':
	// 	$rspta=$exp_fisica->desactivar($idexp_fisica);
 	// 	echo $rspta ? "exp_fisica Desactivado" : "exp_fisica no se puede desactivar";
 	// 	break;
	// break;

	// case 'activar':
	// 	$rspta=$exp_fisica->activar($idexp_fisica);
 	// 	echo $rspta ? "exp_fisica activado" : "exp_fisica no se puede activar";
 	// 	break;
	// break;

	// case 'eliminar':
	// 	$rspta=$exp_fisica->eliminar($idexp_fisica);
 	// 	echo $rspta ? "exp_fisica Ocular Eliminada" : "exp_fisica Ocular no se puede eliminar";
 	// 	break;
	// break;

	case 'mostrar':
		$rspta=$exp_fisica->mostrar($idexp_fisica);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$exp_fisica->listar();
 		//Vamos a declarar un array
 		$data= Array();
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->ID_Exploracion.')"><i class="fa fa-pencil"></i></button>',
 				"1"=>$reg->Vias_Lagrimales,
				"2"=>$reg->Parpados,
 				"3"=>$reg->Globo_Ocular,
				"4"=>$reg->Conjuntivas,
				"5"=>$reg->Corneas,
 				"6"=>$reg->Iris_Porcion_Ciliar,
				"7"=>$reg->Cristalinos,
				"8"=>$reg->Vitreo,
				"9"=>$reg->Fondo_Ojo,
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