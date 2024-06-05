<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}
require_once "../modelos/usuarios.php";

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
		//Hash SHA256 en la contraseña
		$clavehash=hash("SHA256",$password);

		if (empty($idusuario)){
			$rspta=$usuario->insertar($nombre,$direccion,$tel,$email,$tipo,$username, $clavehash,$_POST['permiso']);
			echo $rspta ? "Usuario registrado" : "Usuario no se pudo registrar";
		}
		else {
			$rspta=$usuario->editar($idusuario,$nombre,$direccion,$tel,$email,$tipo,$username, $clavehash,$_POST['permiso']);
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

	case 'permisos':
		//Obtenemos todos los permisos de la tabla permisos
		require_once "../modelos/permiso.php";
		$permiso = new Permiso();
		$rspta = $permiso->listar();

		//Obtener los permisos asignados al usuario
		$id=$_GET['id'];
		$marcados = $usuario->listarmarcados($id);
		//Declaramos el array para almacenar todos los permisos marcados
		$valores=array();

		//Almacenar los permisos asignados al usuario en el array
		while ($per = $marcados->fetch_object())
			{
				array_push($valores, $per->idpermiso);
			}

		//Mostramos la lista de permisos en la vista y si están o no marcados
		while ($reg = $rspta->fetch_object())
				{
					$sw=in_array($reg->idpermiso,$valores)?'checked':'';
					echo '<li> <input type="checkbox" '.$sw.'  name="permiso[]" value="'.$reg->idpermiso.'">'.$reg->nombre.'</li>';
				}
	break;

	case 'verificar':
		$usernamea=$_POST['usernamea'];
	    $clavea=$_POST['clavea'];

	    //Hash SHA256 en la contraseña
		$clavehash=hash("SHA256",$clavea);

		$rspta=$usuario->verificar($usernamea, $clavehash);

		$fetch=$rspta->fetch_object();

		if (isset($fetch))
	    {
	        //Declaramos las variables de sesión
	        $_SESSION['idusuario']=$fetch->ID_Usuario;
	        $_SESSION['nombre']=$fetch->Nombre;
	        $_SESSION['username']=$fetch->Username;

	        //Obtenemos los permisos del usuario
	    	$marcados = $usuario->listarmarcados($fetch->ID_Usuario);

	    	//Declaramos el array para almacenar todos los permisos marcados
			$valores=array();

			//Almacenamos los permisos marcados en el array
			while ($per = $marcados->fetch_object())
				{
					array_push($valores, $per->idpermiso);
				}

			//Determinamos los accesos del usuario
			in_array(1,$valores)?$_SESSION['datospaciente']=1:$_SESSION['datospaciente']=0;
			in_array(2,$valores)?$_SESSION['recetas']=1:$_SESSION['recetas']=0;
			in_array(3,$valores)?$_SESSION['acceso']=1:$_SESSION['acceso']=0;

	    }
	    echo json_encode($fetch);
	break;

	case 'salir':
		//Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../vistas/login.html");

	break;
}

?>