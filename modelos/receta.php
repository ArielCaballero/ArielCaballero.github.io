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
	public function insertar($idpaciente, $iddoctor,$fecha,$cristal,$plastico,$armazon,$color, $tam, $original)
	{
		$sql="INSERT INTO receta (ID_Paciente, ID_Doctor, Fecha, Cristal, Plastico, Armazon, Color_Armazon, Tamaño_y_Pte, Original)
		VALUES ('$idpaciente','$iddoctor','$fecha','$cristal','$plastico','$armazon','$color', '$tam', '$original')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idreceta, $idpaciente, $iddoctor,$fecha,$cristal,$plastico,$armazon,$color, $tam, $original)
	{
		$sql="UPDATE receta SET ID_Paciente='$idpaciente', ID_Doctor='$iddoctor', Fecha='$fecha', Cristal='$cristal', Plastico='$plastico', Armazon='$armazon', Color_Armazon='$color', Tamaño_y_Pte='$tam', Original='$original' WHERE ID_Receta='$idreceta'";
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
		$sql="SELECT * FROM receta";
		return ejecutarConsulta($sql);
	}
}

?>