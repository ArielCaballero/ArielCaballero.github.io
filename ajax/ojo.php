<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}

require_once "../modelos/ojo.php";
require_once "../modelos/usuarios.php";

$usuario=new usuario();
$ojo=new Ojo();

$idojo=isset($_POST["idojo"])? limpiarCadena($_POST["idojo"]):"";
$idpaciente=isset($_POST["idpaciente"])? limpiarCadena($_POST["idpaciente"]):"";
$tipo=isset($_POST["tipo"])? limpiarCadena($_POST["tipo"]):"";
$esferico=isset($_POST["esferico"])? limpiarCadena($_POST["esferico"]):"";
$cilindrico=isset($_POST["cilindrico"])? limpiarCadena($_POST["cilindrico"]):"";
$eje=isset($_POST["eje"])? limpiarCadena($_POST["eje"]):"";
$prisma=isset($_POST["prisma"])? limpiarCadena($_POST["prisma"]):"";
$altura=isset($_POST["altura"])? limpiarCadena($_POST["altura"]):"";
$oblea=isset($_POST["oblea"])? limpiarCadena($_POST["oblea"]):"";
$color=isset($_POST["color"])? limpiarCadena($_POST["color"]):"";
$av=isset($_POST["av"])? limpiarCadena($_POST["av"]):"";
$pio=isset($_POST["pio"])? limpiarCadena($_POST["pio"]):"";
$estereopsis=isset($_POST["estereopsis"])? limpiarCadena($_POST["estereopsis"]):"";
$avsl=isset($_POST["avsl"])? limpiarCadena($_POST["avsl"]):"";
$avc=isset($_POST["avc"])? limpiarCadena($_POST["avc"]):"";
$avl=isset($_POST["avl"])? limpiarCadena($_POST["avl"]):"";
$avcc=isset($_POST["avcc"])? limpiarCadena($_POST["avcc"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idojo)){
			$rspta=$ojo->insertar($idpaciente, $tipo, $esferico, $cilindrico, $eje, $prisma, $altura, $oblea, $color, $av, $pio, $estereopsis, $avsl, $avc, $avl, $avcc, $_SESSION['idusuario']);
			echo $rspta ? "Ojo registrado" : "Ojo no se pudo registrar";
		}
		else {
			$rspta=$ojo->editar($idojo,$idpaciente, $tipo, $esferico, $cilindrico, $eje, $prisma, $altura, $oblea, $color, $av, $pio, $estereopsis, $avsl, $avc, $avl, $avcc,$_SESSION['idusuario']);
			echo $rspta ? "Ojo actualizado" : "Ojo no se pudo actualizar";
		}
	break;

	// case 'desactivar':
	// 	$rspta=$ojo->desactivar($idojo);
 	// 	echo $rspta ? "ojo Desactivado" : "ojo no se puede desactivar";
 	// 	break;
	// break;

	// case 'activar':
	// 	$rspta=$ojo->activar($idojo);
 	// 	echo $rspta ? "ojo activado" : "ojo no se puede activar";
 	// 	break;
	// break;


	case 'mostrar':
		$rspta=$ojo->mostrar($idojo);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$ojo->listar();
 		//Vamos a declarar un array
 		$data= Array();
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->ID_Ojo.')"><i class="fa fa-pencil"></i></button>',
 				"1"=>($usuario->getnombre($ojo->getusuario($reg->ID_Paciente)['ID_Usuario']))['Nombre'],
				"2"=>$reg->Tipo,
 				"3"=>$reg->Esferico,
				"4"=>$reg->Cilindrico,
 				"5"=>$reg->Eje,
				"6"=>$reg->Prisma,
 				"7"=>$reg->Altura,
				"8"=>$reg->Oblea,
				"9"=>$reg->Color,
 				"10"=>$reg->AV,
				"11"=>$reg->PIO,
				"12"=>$reg->Estereopsis,
				"13"=>$reg->Agudeza_Visual_S_L,
				"14"=>$reg->Agudeza_Visual_C,
				"15"=>$reg->Agudeza_Visual_L,
				"16"=>$reg->Agudeza_Visual_C_C,
				"17"=>$reg->Fecha_Modificacion,
				"18"=>($usuario->getnombre($reg->ID_Modificacion))['Nombre'],




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