<?php
include("../conexion.php");
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include("../conexion.php");

    // Obtener los datos del formulario
    $codigo_sem = $_POST['codigo_sem'];
    $nombre_sem = $_POST['nombre_sem'];
    $fechacreacion_sem = $_POST['fechacreacion_sem'];
    $estado_sem = $_POST['estado_sem'];
    $codigo_pro = $_POST['codigo_pro']; // Suponiendo que obtienes el código del programa seleccionado del menú desplegable

    // Preparar la consulta SQL para insertar el nuevo registro en la tabla de semilleros
    $sql = "INSERT INTO semilleros (codigo_sem, nombre_sem, fechacreacion_sem, estado_sem, codigo_pro) VALUES ('$codigo_sem', '$nombre_sem', '$fechacreacion_sem', '$estado_sem', '$codigo_pro')";

    // Ejecutar la consulta y verificar si se realizó correctamente
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo semillero creado correctamente.";
    } else {
        echo "Error al crear el semillero: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Redireccionar si se intenta acceder directamente a este script sin enviar datos por POST
    header("Location: create.php");
    exit();
}
?>
