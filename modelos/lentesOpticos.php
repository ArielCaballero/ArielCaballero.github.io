<?php
// Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class LentesOpticos
{
    // Implementamos nuestro constructor
    public function __construct()
    {

    }

    // Implementamos un método para insertar registros
    public function insertar($nombre_modelo, $descripcion, $color, $material, $precio, $imagen, $compatibilidad_facial, $compatibilidad_altas_graduaciones, $alto_mica, $ancho_frente, $largo_pata)
    {
        $sql = "INSERT INTO lentes_opticos (nombre_modelo, descripcion, color, material, precio, imagen, compatibilidad_facial, compatibilidad_altas_graduaciones, alto_mica, ancho_frente, largo_pata)
                VALUES ('$nombre_modelo', '$descripcion', '$color', '$material', '$precio', '$imagen', '$compatibilidad_facial', '$compatibilidad_altas_graduaciones', '$alto_mica', '$ancho_frente', '$largo_pata')";
        return ejecutarConsulta($sql);
    }

    // Implementamos un método para editar registros
    public function editar($id_modelo, $nombre_modelo, $descripcion, $color, $material, $precio, $imagen, $compatibilidad_facial, $compatibilidad_altas_graduaciones, $alto_mica, $ancho_frente, $largo_pata)
    {
        $sql = "UPDATE lentes_opticos 
                SET nombre_modelo='$nombre_modelo', descripcion='$descripcion', color='$color', material='$material', precio='$precio', imagen='$imagen', compatibilidad_facial='$compatibilidad_facial', compatibilidad_altas_graduaciones='$compatibilidad_altas_graduaciones', alto_mica='$alto_mica', ancho_frente='$ancho_frente', largo_pata='$largo_pata' 
                WHERE id_modelo='$id_modelo'";
        return ejecutarConsulta($sql);
    }

    // Implementamos un método para eliminar un registro
    public function eliminar($id_modelo)
    {
        $sql = "DELETE FROM lentes_opticos WHERE id_modelo='$id_modelo'";
        return ejecutarConsulta($sql);
    }

    // Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($id_modelo)
    {
        $sql = "SELECT * FROM lentes_opticos WHERE id_modelo='$id_modelo'";
        return ejecutarConsultaSimpleFila($sql);
    }

    // Implementar un método para listar los registros
    public function listar()
    {
        $sql = "SELECT * FROM lentes_opticos";
        return ejecutarConsulta($sql);
    }
}
?>