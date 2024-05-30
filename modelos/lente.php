<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

//ALTER TABLE `Lente` ADD `Condicion` TINYINT(1) NULL AFTER `FN`;
Class Lente
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idpaciente, $radio, $diam, $cp, $rx, $grueso, $zo, $pl, $color, $av, $observaciones)
	{
		if ($idpaciente == ''){
			$idpaciente = 'null';
		}
		$sql="INSERT INTO lente_contacto (ID_Paciente, Radio, Diam, CP, RX, Grueso, ZO, PL, Color, AV, Observaciones)
		VALUES ('$idpaciente', '$radio', '$diam', '$cp', '$rx', '$grueso', '$zo', '$pl', '$color', '$av', '$observaciones')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idLente,$idpaciente, $radio, $diam, $cp, $rx, $grueso, $zo, $pl, $color, $av, $observaciones)
	{
		$sql="UPDATE lente_contacto SET ID_paciente='$idpaciente', Radio='$radio', Diam='$diam', CP='$cp', RX='$rx', Grueso='$grueso', ZO='$zo', PL='$pl', Color='$color', AV='$av', Observaciones = '$observaciones' WHERE ID_Lente='$idLente'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	// public function desactivar($idLente)
	// {
	// 	$sql="UPDATE Lente SET condicion='0' WHERE ID_Lente='$idLente'";
	// 	return ejecutarConsulta($sql);
	// }

	// //Implementamos un método para activar categorías
	// public function activar($idLente)
	// {
	// 	$sql="UPDATE Lente SET condicion='1' WHERE ID_Lente='$idLente'";
	// 	return ejecutarConsulta($sql);
	// }

	public function eliminar($idLente)
	{
		$sql="DELETE FROM lente_contacto WHERE ID_Lente='$idLente'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idLente)
	{
		$sql="SELECT * FROM lente_contacto WHERE ID_Lente='$idLente'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM lente_contacto";
		return ejecutarConsulta($sql);
	}
}

?>