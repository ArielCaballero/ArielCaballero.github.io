<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

//ALTER TABLE `doctor` ADD `Condicion` TINYINT(1) NULL AFTER `Cedula_Profesional`;
Class Doctor
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idusuario,$especialidad, $rfc, $cedula)
	{
		if ($idusuario == ''){
			$idusuario = 'null';
		}
		$sql="INSERT INTO doctor (ID_Usuario, Especialidad, RFC, Cedula_Profesional, Condicion)
		VALUES ('$idusuario','$especialidad','$rfc', '$cedula', '1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($iddoctor,$idusuario,$especialidad, $rfc, $cedula)
	{
		$sql="UPDATE doctor SET ID_Usuario='$idusuario', Especialidad='$especialidad', RFC='$rfc', Cedula_Profesional = '$cedula' WHERE ID_Doctor='$iddoctor'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($iddoctor)
	{
		$sql="UPDATE doctor SET condicion='0' WHERE ID_Doctor='$iddoctor'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($iddoctor)
	{
		$sql="UPDATE doctor SET condicion='1' WHERE ID_Doctor='$iddoctor'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($iddoctor)
	{
		$sql="SELECT * FROM doctor WHERE ID_Doctor='$iddoctor'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM doctor";
		return ejecutarConsulta($sql);
	}
}

?>