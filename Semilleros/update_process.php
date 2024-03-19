<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include("../conexion.php");

    // Obtener los datos del formulario
    $codigo_sem = $_POST['codigo_sem'];
    $nombre_sem = $_POST['nombre_sem'];
    $fechacreacion_sem = $_POST['fechacreacion_sem'];
    $estado_sem = $_POST['estado_sem'];
    $codigo_pro = $_POST['codigo_pro'];

    // Preparar la consulta SQL para actualizar el registro en la tabla de semilleros
    $sql = "UPDATE semilleros SET nombre_sem='$nombre_sem', fechacreacion_sem='$fechacreacion_sem', estado_sem='$estado_sem', codigo_pro='$codigo_pro' WHERE codigo_sem='$codigo_sem'";

    // Ejecutar la consulta y verificar si se realizó correctamente
    if ($conn->query($sql) === TRUE) {
        echo "Semillero actualizado correctamente.";
    } else {
        echo "Error al actualizar el semillero: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Redireccionar si se intenta acceder directamente a este script sin enviar datos por POST
    header("Location: update.php?codigo_sem=" . $_POST['codigo_sem']);
    exit();
}
?>
