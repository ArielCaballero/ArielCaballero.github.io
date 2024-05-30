<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Factura
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idpaciente , $fecha, $monto,$descripcion)
	{
		$sql="INSERT INTO factura (ID_Paciente, Fecha, Monto, Descripcion, Condicion)
		VALUES ('$idpaciente','$fecha','$monto','$descripcion','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idfactura, $idpaciente , $fecha, $monto,$descripcion)
	{
		$sql="UPDATE factura SET ID_Paciente='$idpaciente', Fecha='$fecha', Monto='$monto' ,descripcion='$descripcion' WHERE ID_Factura='$idfactura'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar facturas
	public function desactivar($idfactura)
	{
		$sql="UPDATE factura SET condicion='0' WHERE ID_Factura='$idfactura'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar facturas
	public function activar($idfactura)
	{
		$sql="UPDATE factura SET condicion='1' WHERE ID_Factura='$idfactura'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idfactura)
	{
		$sql="SELECT * FROM factura WHERE ID_Factura='$idfactura'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM factura";
		return ejecutarConsulta($sql);		
	}
}

?>