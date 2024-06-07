<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class agendarcita
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idusuario, $iddoctor, $fecha, $hora)
	{
	
		$sql="INSERT INTO citas (ID_Usuario, ID_Doctor, Fecha, Hora, Condicion)
		VALUES ('$idusuario','$iddoctor','$fecha', '$hora', 'Pendiente')";
		return ejecutarConsulta_retornarID($sql);

	}

	//Implementamos un método para editar registros
	public function editar($idcita,$idusuario, $iddoctor, $fecha, $hora)
	{
		$sql="UPDATE citas SET ID_Cita ='$idcita', ID_Usuario = '$idusuario', ID_Doctor='$iddoctor', Fecha='$fecha', Hora='$hora'  WHERE ID_Cita='$idcita'";
		return ejecutarConsulta($sql);

	}

	// //Implementamos un método para desactivar categorías
	public function confirmar($idcita, $idusuario)
	{
		$fechaconf=date('Y-m-d');
		$sql="UPDATE citas SET Condicion='Confirmado', Fecha_Confirmacion='$fechaconf' ,ID_Confirmacion='$idusuario' WHERE ID_Cita='$idcita'";
		return ejecutarConsulta($sql);
	}

	// //Implementamos un método para activar categorías
	public function cancelar($idcita, $idusuario)
	{
		$fechaconf=date('Y-m-d');
		$sql="UPDATE citas SET Condicion='Cancelado', Fecha_Confirmacion='$fechaconf' ,ID_Confirmacion='$idusuario'WHERE ID_Cita='$idcita'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un metodo para borrar un agendarcita
	public function eliminar($idcita)
	{
		$sql="DELETE FROM citas WHERE ID_Cita='$idcita'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idcita)
	{
		$sql="SELECT * FROM citas WHERE ID_Cita='$idcita'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar

	public function getusuariodoctor($iddoctor)
	{
		$sql="SELECT ID_Usuario FROM doctor WHERE ID_Doctor='$iddoctor'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM citas";
		return ejecutarConsulta($sql);
	}

	public function listarmiscitas($idusuario)
	{
		$sql="SELECT * FROM citas WHERE ID_Usuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

}



?>