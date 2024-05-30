<?php 
require_once "../modelos/factura.php";

$factura=new factura();

$idfactura=isset($_POST["idfactura"])? limpiarCadena($_POST["idfactura"]):"";
$idpaciente=isset($_POST["idpaciente"])? limpiarCadena($_POST["idpaciente"]):"";
$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";
$monto=isset($_POST["monto"])? limpiarCadena($_POST["monto"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idfactura)){
			$rspta=$factura->insertar($idpaciente , $fecha, $monto,$descripcion);
			echo $rspta ? "Factura registrada" : "Factura no se pudo registrar";
		}
		else {
			$rspta=$factura->editar($idfactura,$idpaciente , $fecha, $monto,$descripcion);
			echo $rspta ? "Factura actualizada" : "Factura no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$factura->desactivar($idfactura);
 		echo $rspta ? "Factura Desactivada" : "Factura no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$factura->activar($idfactura);
 		echo $rspta ? "Factura activada" : "Factura no se puede activar";
 		break;
	break;

	case 'mostrar':
		$rspta=$factura->mostrar($idfactura);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$factura->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->Condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->ID_Factura.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->ID_Factura.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->ID_Factura.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->ID_Factura.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->Fecha,
				"2"=>$reg->Monto,
				"3"=>$reg->Descripcion,
 				"4"=>($reg->Condicion)?'<span class="label bg-green">Activado</span>':
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