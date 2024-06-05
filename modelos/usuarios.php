<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$direccion,$tel,$email,$tipo,$username, $password, $permisos)
	{
		$sql="INSERT INTO usuario (Nombre, Direccion, Tel, Email, Tipo, Username, Password)
		VALUES ('$nombre','$direccion','$tel','$email','$tipo','$username','$password')";
		$idusuarionew=ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES('$idusuarionew', '$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;
	}

	//Implementamos un método para editar registros
	public function editar($idusuario,$nombre,$direccion,$tel,$email,$tipo,$username,$password, $permisos)
	{
		$sql="UPDATE usuario SET Nombre='$nombre', Direccion='$direccion', Tel='$tel',Email='$email',  Tipo='$tipo', Username='$username', Password='$password' WHERE ID_Usuario='$idusuario'";
		ejecutarConsulta($sql);

		$sqldel="DELETE FROM usuario_permiso WHERE idusuario='$idusuario'";
		ejecutarConsulta($sqldel);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES('$idusuario', '$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;

	}

	// //Implementamos un método para desactivar categorías
	// public function desactivar($idusuario)
	// {
	// 	$sql="UPDATE usuario SET condicion='0' WHERE ID_Usuario='$idusuario'";
	// 	return ejecutarConsulta($sql);
	// }

	// //Implementamos un método para activar categorías
	// public function activar($idusuario)
	// {
	// 	$sql="UPDATE usuario SET condicion='1' WHERE ID_Usuario='$idusuario'";
	// 	return ejecutarConsulta($sql);
	// }

	//Implementamos un metodo para borrar un usuario
	public function eliminar($idusuario)
	{
		$sql="DELETE FROM usuario WHERE ID_Usuario='$idusuario'";
		ejecutarConsulta($sql);
		$sqldel="DELETE FROM usuario_permiso WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sqldel);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idusuario)
	{
		$sql="SELECT * FROM usuario WHERE ID_Usuario='$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM usuario";
		return ejecutarConsulta($sql);
	}

	public function listarmarcados($idusuario)
	{
		$sql="SELECT * FROM usuario_permiso WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	public function verificar($username,$password)
    {
    	$sql="SELECT ID_Usuario, Nombre, Direccion, Tel, Email, Tipo, Username FROM usuario WHERE Username='$username' AND Password='$password'"; 
    	return ejecutarConsulta($sql);  
    }
}



?>