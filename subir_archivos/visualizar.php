<?php
session_start();
include('../conexion.php');

// Verificar si el usuario tiene permisos de administrador (tipo 3)
if($_SESSION['tipo'] == 3) {
    // Consulta a la base de datos para obtener la lista de archivos subidos por los estudiantes
    $query = $conn->query("SELECT codigo_pro, rutaarchivo_pro FROM proyectos");

    if ($query && $query->num_rows > 0) {
        // Mostrar la lista de archivos
        while ($row = $query->fetch_assoc()) {
            $idArchivo = $row['codigo_pro'];
            $rutaArchivo = $row['rutaarchivo_pro'];
            $nombreArchivo = basename($rutaArchivo); // Obtener el nombre del archivo de la ruta
            echo "<a href='ver_archivo.php?id=$idArchivo'>$nombreArchivo</a><br>";
        }
    } else {
        echo "No hay archivos disponibles.";
    }
} else {
    echo "Acceso denegado. Esta función solo está disponible para administradores.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
