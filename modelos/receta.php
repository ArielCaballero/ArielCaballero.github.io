<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

//ALTER TABLE `receta` ADD `Condicion` TINYINT(1) NULL AFTER `FN`;
Class Receta
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idpaciente, $iddoctor, $idmodelo,$idmodificacion)
	{
		$fecha = date('Y-m-d');
		$sql="INSERT INTO receta (ID_Paciente, ID_Doctor, Fecha, id_modelo, ID_Modificacion)
		VALUES ('$idpaciente','$iddoctor','$fecha','$idmodelo', '$idmodificacion')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idreceta, $idpaciente, $iddoctor, $idmodelo,$idmodificacion)
	{
		$fechamod = date('Y-m-d');
		$sql="UPDATE receta SET ID_Paciente='$idpaciente', ID_Doctor='$iddoctor', id_modelo='$idmodelo', Fecha_Modificacion='$fechamod', ID_Modificacion='$idmodificacion' WHERE ID_Receta='$idreceta'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	// public function desactivar($idreceta)
	// {
	// 	$sql="UPDATE receta SET condicion='0' WHERE ID_receta='$idreceta'";
	// 	return ejecutarConsulta($sql);
	// }

	// //Implementamos un método para activar categorías
	// public function activar($idreceta)
	// {
	// 	$sql="UPDATE receta SET condicion='1' WHERE ID_receta='$idreceta'";
	// 	return ejecutarConsulta($sql);
	// }

	//Implementar un método para mostrar los datos de un registro a modificar

	public function eliminar($idreceta)
	{
		$sql="DELETE FROM receta WHERE ID_Receta='$idreceta'";
		return ejecutarConsulta($sql);
	}
	public function mostrar($idreceta)
	{
		$sql="SELECT * FROM receta WHERE ID_Receta='$idreceta'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM receta r, lentes_opticos l WHERE r.id_modelo = l.id_modelo";
		return ejecutarConsulta($sql);
	}

	public function listarmodelos()
	{
		$sql="SELECT id_modelo, nombre_modelo FROM lentes_opticos";
		return ejecutarConsulta($sql);
	}
}

?>