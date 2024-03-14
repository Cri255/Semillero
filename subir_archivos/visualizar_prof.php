<?php
session_start();
include('../conexion.php');

// Verificar si el usuario ha iniciado sesión como profesor
if ($_SESSION['tipo'] == 2) {

    // Consulta SQL para obtener los proyectos asignados al profesor
    $query = $conn->query("SELECT * FROM proyectos WHERE codigo_tip = '2'");

    if ($query && $query->num_rows > 0) {
        // Mostrar los proyectos asignados al profesor
        while ($row = $query->fetch_assoc()) {
            // Aquí puedes mostrar la información de cada proyecto asignado al profesor
            echo "Proyecto: " . $row['nombre_proyecto'] . "<br>";
            // Puedes mostrar más detalles del proyecto si lo deseas
        }
    } else {
        echo "No hay proyectos asignados para este profesor.";
    }
} else {
    echo "Acceso denegado. Esta función solo está disponible para profesores.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
