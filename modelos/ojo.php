<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

//ALTER TABLE `ojo` ADD `Condicion` TINYINT(1) NULL AFTER `FN`;
Class Ojo
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idpaciente, $tipo, $esferico, $cilindrico, $eje, $prisma, $altura, $oblea, $color, $av, $pio, $estereopsis, $avsl, $avc, $avl, $avcc)
	{
		if ($idpaciente == ''){
			$idpaciente = 'null';
		}
		$sql="INSERT INTO ojo (ID_Paciente, Tipo, Esferico, Cilindrico, Eje, Prisma, Altura, Oblea, Color, AV, PIO, Estereopsis, Agudeza_Visual_S_L, Agudeza_Visual_C, Agudeza_Visual_L, Agudeza_Visual_C_C)
		VALUES ('$idpaciente', '$tipo', '$esferico', '$cilindrico', '$eje', '$prisma', '$altura', '$oblea', '$color', '$av', '$pio', '$estereopsis', '$avsl', '$avc', '$avl', '$avcc')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idojo,$idpaciente, $tipo, $esferico, $cilindrico, $eje, $prisma, $altura, $oblea, $color, $av, $pio, $estereopsis, $avsl, $avc, $avl, $avcc)
	{
		$sql="UPDATE ojo SET ID_paciente='$idpaciente', Tipo='$tipo', Esferico='$esferico', Cilindrico='$cilindrico', Eje='$eje', Prisma='$prisma', Altura='$altura', Oblea='$oblea', Color='$color', AV='$av', PIO='$pio', Estereopsis='$estereopsis', Agudeza_Visual_S_L='$avsl', Agudeza_Visual_C='$avc', Agudeza_Visual_L='$avl', Agudeza_Visual_C_C='$avcc' WHERE ID_Ojo='$idojo'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	// public function desactivar($idojo)
	// {
	// 	$sql="UPDATE ojo SET condicion='0' WHERE ID_Ojo='$idojo'";
	// 	return ejecutarConsulta($sql);
	// }

	// //Implementamos un método para activar categorías
	// public function activar($idojo)
	// {
	// 	$sql="UPDATE ojo SET condicion='1' WHERE ID_Ojo='$idojo'";
	// 	return ejecutarConsulta($sql);
	// }

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idojo)
	{
		$sql="SELECT * FROM ojo WHERE ID_Ojo='$idojo'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM ojo";
		return ejecutarConsulta($sql);
	}
}

?>