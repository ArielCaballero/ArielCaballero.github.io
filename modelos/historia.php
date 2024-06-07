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
	public function insertar($idpaciente, $interrogatorio, $hg, $edad, $sexo, $ocupacion, $graduacion, $fecha)
	{
		$sql="INSERT INTO historia_ocular (ID_Paciente, Interrogatorio, Historia_General, Edad, Sexo, Ocupacion, Graduacion_Usa, Fecha_Graduacion)
		VALUES ('$idpaciente', '$interrogatorio', '$hg', '$edad', '$sexo', '$ocupacion', '$graduacion', '$fecha')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idhistoria,$idpaciente, $interrogatorio, $hg, $edad, $sexo, $ocupacion, $graduacion, $fecha)
	{
		$sql="UPDATE historia_ocular SET ID_paciente='$idpaciente', Interrogatorio='$interrogatorio', Historia_General='$hg', Edad='$edad', Sexo='$sexo', Ocupacion='$ocupacion', Graduacion_Usa='$graduacion', Fecha_Graduacion='$fecha' WHERE ID_Historia_Ocular='$idhistoria'";
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

	public function listartodo()
	{
		$sql="SELECT h.*, efu.*, efi.*, i.Tipo itipo, i.Esferico iesferico, i.Cilindrico icilindrico, i.Eje ieje, i.Prisma iprisma, i.Altura ialtura, i.Oblea ioblea, i.Color icolor, i.AV iav, i.PIO ipio, i.Estereopsis iestereopsis, i.Agudeza_Visual_S_L iavsl, i.Agudeza_Visual_C iavc, i.Agudeza_Visual_L iavl, i.Agudeza_Visual_C_C iavcc, d.Tipo dtipo, d.Esferico desferico, d.Cilindrico dcilindrico, d.Eje deje, d.Prisma dprisma, d.Altura daltura, d.Oblea doblea, d.Color dcolor, d.AV dav, d.PIO dpio, d.Estereopsis destereopsis, d.Agudeza_Visual_S_L davsl, d.Agudeza_Visual_C davc, d.Agudeza_Visual_L davl, d.Agudeza_Visual_C_C davcc FROM historia_ocular h, exploracion_funcional efu, exploracion_fisica efi, ojo i, ojo d 
		WHERE h.ID_Paciente=efu.ID_Paciente AND efu.ID_Paciente=efi.ID_Paciente AND efi.ID_Paciente=i.ID_Paciente AND i.ID_Paciente=d.ID_Paciente AND i.tipo='OI' AND d.tipo='OD'" ;
		return ejecutarConsulta($sql);
	}
}

?>