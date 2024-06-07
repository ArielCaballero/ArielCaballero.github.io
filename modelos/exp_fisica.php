<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

//ALTER TABLE `exp_fisica` ADD `Condicion` TINYINT(1) NULL AFTER `FN`;
Class exp_fisica
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idpaciente, $vias_lagrimales, $parpados, $globo_ocular, $conjuntivas, $corneas, $iris, $cristalinos, $vitreo, $fondo_ojo, $idmodificacion)
	{
		$sql="INSERT INTO exploracion_fisica (ID_Paciente, Vias_Lagrimales, Parpados, Globo_Ocular, Conjuntivas, Corneas, Iris_Porcion_Ciliar, Cristalinos, Vitreo, Fondo_Ojo, ID_Modificacion)
		VALUES ('$idpaciente', '$vias_lagrimales', '$parpados', '$globo_ocular', '$conjuntivas', '$corneas', '$iris', '$cristalinos', '$vitreo', '$fondo_ojo', '$idmodificacion')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idexp_fisica,$idpaciente, $vias_lagrimales, $parpados, $globo_ocular, $conjuntivas, $corneas, $iris, $cristalinos, $vitreo, $fondo_ojo, $idmodificacion)
	{
		$fechamod=date('Y-m-d');
		$sql="UPDATE exploracion_fisica SET ID_paciente='$idpaciente', Vias_Lagrimales='$vias_lagrimales', Parpados='$parpados', Globo_Ocular='$globo_ocular', Conjuntivas='$conjuntivas', Corneas='$corneas', Iris_Porcion_Ciliar='$iris', Cristalinos='$cristalinos', Vitreo='$vitreo', Fondo_Ojo='$fondo_ojo', Fecha_Modificacion='$fechamod', ID_Modificacion='$idmodificacion' WHERE ID_Exploracion='$idexp_fisica'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	// public function desactivar($idexp_fisica)
	// {
	// 	$sql="UPDATE exp_fisica SET condicion='0' WHERE ID_Exploracion_Fisica='$idexp_fisica'";
	// 	return ejecutarConsulta($sql);
	// }

	// //Implementamos un método para activar categorías
	// public function activar($idexp_fisica)
	// {
	// 	$sql="UPDATE exp_fisica SET condicion='1' WHERE ID_Exploracion_Fisica='$idexp_fisica'";
	// 	return ejecutarConsulta($sql);
	// }

	public function eliminar($idexp_fisica)
	{
		$sql="DELETE FROM exploracion_fisica WHERE ID_Exploracion='$idexp_fisica'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idexp_fisica)
	{
		$sql="SELECT * FROM exploracion_fisica WHERE ID_Exploracion='$idexp_fisica'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM exploracion_fisica";
		return ejecutarConsulta($sql);
	}
}

?>