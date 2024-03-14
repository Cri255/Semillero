<?php
include('../conexion.php');

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obtener la ruta del archivo
    $result = $conn->query("SELECT * FROM proyectos WHERE codigo_pro = $id");

    if($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $rutaArchivo = $row['rutaarchivo_pro'];

        // Eliminar el archivo de la base de datos
        $conn->query("DELETE FROM proyectos WHERE codigo_pro = $id");

        // Eliminar el archivo del sistema de archivos
        unlink($rutaArchivo);

        echo "El archivo ha sido eliminado correctamente.";
    } else {
        echo "No se encontró el archivo.";
    }
} else {
    echo "Parámetro de ID inválido.";
}

$conn->close();
?>
