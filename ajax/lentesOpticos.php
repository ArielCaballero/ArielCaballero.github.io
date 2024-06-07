<?php
ob_start();
if (strlen(session_id()) < 1) {
    session_start(); // Validamos si existe o no la sesión
}

require_once "../modelos/lentesOpticos.php";

$lentesOpticos = new LentesOpticos();

$id_modelo = isset($_POST["id_modelo"]) ? limpiarCadena($_POST["id_modelo"]) : "";
$nombre_modelo = isset($_POST["nombre_modelo"]) ? limpiarCadena($_POST["nombre_modelo"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
$color = isset($_POST["color"]) ? limpiarCadena($_POST["color"]) : "";
$material = isset($_POST["material"]) ? limpiarCadena($_POST["material"]) : "";
$precio = isset($_POST["precio"]) ? limpiarCadena($_POST["precio"]) : "";
$imagen = isset($_FILES["imagen"]) ? addslashes(file_get_contents($_FILES["imagen"]["tmp_name"])) : "";
$compatibilidad_facial = isset($_POST["compatibilidad_facial"]) ? limpiarCadena($_POST["compatibilidad_facial"]) : "";
$compatibilidad_altas_graduaciones = isset($_POST["compatibilidad_altas_graduaciones"]) ? limpiarCadena($_POST["compatibilidad_altas_graduaciones"]) : "";
$alto_mica = isset($_POST["alto_mica"]) ? limpiarCadena($_POST["alto_mica"]) : "";
$ancho_frente = isset($_POST["ancho_frente"]) ? limpiarCadena($_POST["ancho_frente"]) : "";
$largo_pata = isset($_POST["largo_pata"]) ? limpiarCadena($_POST["largo_pata"]) : "";

switch ($_GET["op"]) {
    case 'guardaryeditar':
        if($_SESSION['agregarlentes']){
        if (empty($id_modelo)) {
            $rspta = $lentesOpticos->insertar($nombre_modelo, $descripcion, $color, $material, $precio, $imagen, $compatibilidad_facial, $compatibilidad_altas_graduaciones, $alto_mica, $ancho_frente, $largo_pata);
            echo $rspta ? "Lente óptico registrado" : "Lente óptico no se pudo registrar";
        } else {
            $rspta = $lentesOpticos->editar($id_modelo, $nombre_modelo, $descripcion, $color, $material, $precio, $imagen, $compatibilidad_facial, $compatibilidad_altas_graduaciones, $alto_mica, $ancho_frente, $largo_pata);
            echo $rspta ? "Lente óptico actualizado" : "Lente óptico no se pudo actualizar";
        }
    }
        else {
            header ('Location: vistas/lentesOpticos.php');
        }
        break;

    case 'mostrar':
        $rspta = $lentesOpticos->mostrar($id_modelo);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $lentesOpticos->listar();
        $data = array();
        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<button class="btn btn-danger" onclick="eliminar(' .$reg->id_modelo. ')"><i class="fa fa-trash"></i></button>',
                "1" => $reg->nombre_modelo,
                "2" => $reg->descripcion,
                "3" => $reg->color,
                "4" => $reg->material,
                "5" => $reg->precio,
                "6" => '<img src="data:image/jpeg;base64,' . base64_encode($reg->imagen) . '" height="50px" width="50px" />',
                "7" => $reg->compatibilidad_facial,
                "8" => $reg->compatibilidad_altas_graduaciones,
                "9" => $reg->alto_mica,
                "10" => $reg->ancho_frente,
                "11" => $reg->largo_pata
            );
        }
        $results = array(
            "sEcho" => 1, // Información para el datatables
            "iTotalRecords" => count($data), // enviamos el total registros al datatable
            "iTotalDisplayRecords" => count($data), // enviamos el total registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);
        break;

    case 'eliminar':
        $rspta = $lentesOpticos->eliminar($id_modelo);
        echo $rspta ? "Lente óptico eliminado" : "Lente óptico no se pudo eliminar";
        break;
}