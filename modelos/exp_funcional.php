<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

//ALTER TABLE `exp_funcional` ADD `Condicion` TINYINT(1) NULL AFTER `FN`;
Class Exp_funcional
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idpaciente, $pupilas_pp, $pupilas_c_rup, $pupilas_rec, $queratometria_od, $queratometria_oi, $retinoscopia_od, $retinoscopia_oi, $subjetivo_od, $subjetivo_oi, $add_od_av, $add_oi_av, $idmodificacion)
	{
		$sql="INSERT INTO exploracion_funcional (ID_Paciente, Pupilas_PP, Pupilas_C_Rup, Pupilas_Rec, Queratometria_OD, Queratometria_OI, Retinoscopia_OD, Retinoscopia_OI, Subjetivo_OD, Subjetivo_OI, Add_OD_AV, Add_OI_AV, ID_Modificacion)
		VALUES ('$idpaciente', '$pupilas_pp', '$pupilas_c_rup', '$pupilas_rec', '$queratometria_od', '$queratometria_oi', '$retinoscopia_od', '$retinoscopia_oi', '$subjetivo_od', '$subjetivo_oi', '$add_od_av', '$add_oi_av', '$idmodificacion')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idexp_funcional,$idpaciente, $pupilas_pp, $pupilas_c_rup, $pupilas_rec, $queratometria_od, $queratometria_oi, $retinoscopia_od, $retinoscopia_oi, $subjetivo_od, $subjetivo_oi, $add_od_av, $add_oi_av, $idmodificacion)
	{
		$fechamod=date('Y-m-d');
		$sql="UPDATE exploracion_funcional SET ID_paciente='$idpaciente', Pupilas_PP='$pupilas_pp', Pupilas_C_Rup='$pupilas_c_rup', Pupilas_Rec='$pupilas_rec', Queratometria_OD='$queratometria_od', Queratometria_OI='$queratometria_oi', Retinoscopia_OD='$retinoscopia_od', Retinoscopia_OI='$retinoscopia_oi', Subjetivo_OD='$subjetivo_od', Subjetivo_OI='$subjetivo_oi', Add_OD_AV='$add_od_av', Add_OI_AV='$add_oi_av', Fecha_Modificacion='$fechamod', ID_Modificacion='$idmodificacion' WHERE ID_Exploracion_Funcional='$idexp_funcional'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	// public function desactivar($idexp_funcional)
	// {
	// 	$sql="UPDATE exp_funcional SET condicion='0' WHERE ID_exploracion_funcional='$idexp_funcional'";
	// 	return ejecutarConsulta($sql);
	// }

	// //Implementamos un método para activar categorías
	// public function activar($idexp_funcional)
	// {
	// 	$sql="UPDATE exp_funcional SET condicion='1' WHERE ID_exploracion_funcional='$idexp_funcional'";
	// 	return ejecutarConsulta($sql);
	// }

	public function eliminar($idexp_funcional)
	{
		$sql="DELETE FROM exploracion_funcional WHERE ID_Exploracion_Funcional='$idexp_funcional'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idexp_funcional)
	{
		$sql="SELECT * FROM exploracion_funcional WHERE ID_Exploracion_Funcional='$idexp_funcional'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM exploracion_funcional";
		return ejecutarConsulta($sql);
	}
}

?>