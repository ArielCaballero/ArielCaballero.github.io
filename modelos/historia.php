<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

//ALTER TABLE `historia` ADD `Condicion` TINYINT(1) NULL AFTER `FN`;
Class historia
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idpaciente, $interrogatorio, $hg, $edad, $sexo, $ocupacion, $graduacion, $fecha, $idmodificacion)
	{
		$sql="INSERT INTO historia_ocular (ID_Paciente, Interrogatorio, Historia_General, Edad, Sexo, Ocupacion, Graduacion_Usa, Fecha_Graduacion, ID_Modificacion)
		VALUES ('$idpaciente', '$interrogatorio', '$hg', '$edad', '$sexo', '$ocupacion', '$graduacion', '$fecha', '$idmodificacion')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idhistoria,$idpaciente, $interrogatorio, $hg, $edad, $sexo, $ocupacion, $graduacion, $fecha, $idmodificacion)
	{
		$fechamod=date('Y-m-d');
		$sql="UPDATE historia_ocular SET ID_paciente='$idpaciente', Interrogatorio='$interrogatorio', Historia_General='$hg', Edad='$edad', Sexo='$sexo', Ocupacion='$ocupacion', Graduacion_Usa='$graduacion', Fecha_Graduacion='$fecha', Fecha_Modificacion='$fechamod', ID_Modificacion='$idmodificacion' WHERE ID_Historia_Ocular='$idhistoria'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	// public function desactivar($idhistoria)
	// {
	// 	$sql="UPDATE historia SET condicion='0' WHERE ID_Historia_Ocular='$idhistoria'";
	// 	return ejecutarConsulta($sql);
	// }

	// //Implementamos un método para activar categorías
	// public function activar($idhistoria)
	// {
	// 	$sql="UPDATE historia SET condicion='1' WHERE ID_Historia_Ocular='$idhistoria'";
	// 	return ejecutarConsulta($sql);
	// }

	public function eliminar($idhistoria)
	{
		$sql="DELETE FROM historia_ocular WHERE ID_Historia_Ocular='$idhistoria'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idhistoria)
	{
		$sql="SELECT * FROM historia_ocular WHERE ID_Historia_Ocular='$idhistoria'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM historia_ocular";
		return ejecutarConsulta($sql);
	}
}

?>