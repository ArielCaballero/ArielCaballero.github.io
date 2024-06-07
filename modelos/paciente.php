<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

//ALTER TABLE `paciente` ADD `Condicion` TINYINT(1) NULL AFTER `FN`;
Class Paciente
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idusuario,$colonia,$ciudad,$cp,$edo,$celular, $rfc, $fn,$idmodificacion)
	{
		if ($idusuario == ''){
			$idusuario = 'null';
		}
		$sql="INSERT INTO paciente (ID_Usuario, Colonia, Ciudad, CP, EDO, Celular, RFC, FN, Condicion, ID_Modificacion)
		VALUES ('$idusuario','$colonia','$ciudad','$cp','$edo','$celular','$rfc', '$fn', '1', '$idmodificacion')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idpaciente,$idusuario,$colonia,$ciudad,$cp,$edo,$celular, $rfc, $fn, $idmodificacion)
	{
		$fechamod = date('Y-m-d');
		$sql="UPDATE paciente SET ID_Usuario='$idusuario', Colonia='$colonia', Ciudad='$ciudad', CP='$cp',  EDO='$edo', Celular='$celular', RFC='$rfc', FN = '$fn', Fecha_Modificacion='$fechamod', ID_Modificacion='$idmodificacion' WHERE ID_Paciente='$idpaciente'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idpaciente)
	{
		$sql="UPDATE paciente SET condicion='0' WHERE ID_Paciente='$idpaciente'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idpaciente)
	{
		$sql="UPDATE paciente SET condicion='1' WHERE ID_Paciente='$idpaciente'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idpaciente)
	{
		$sql="SELECT * FROM paciente WHERE ID_Paciente='$idpaciente'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function getusuario($idpaciente)
	{
		$sql="SELECT ID_Usuario FROM paciente WHERE ID_Paciente='$idpaciente'";
		return ejecutarConsultaSimpleFila($sql);
	}



	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM paciente";
		return ejecutarConsulta($sql);
	}
}

?>