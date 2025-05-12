<?php
// Iniciar sesión y verificar que el profesor esté logueado
session_start();
include('../conexion.php');

// Verificar que el usuario esté logueado y sea profesor
if (isset($_SESSION['id_per']) && isset($_POST['id_proyecto']) && isset($_POST['mensaje'])) {
    $idProfesor = $_SESSION['id_per']; // ID del profesor desde la sesión
    $idProyecto = $_POST['id_proyecto']; // ID del proyecto enviado en el formulario
    $mensaje = mysqli_real_escape_string($conn, $_POST['mensaje']); // Obtener y limpiar el mensaje

    // Obtener el ID del estudiante asociado al proyecto
    $sqlEstudiante = "
        SELECT ep.id_per AS id_estudiante
        FROM personas p
        INNER JOIN estudiantes_proyectos ep ON p.documento_per = ep.documento_per
        WHERE ep.codigo_pro = $idProyecto";

    $sqlProfesor = "SELECT fk_id_profesor FROM profesores_proyectos WHERE fk_id_proyecto = $idProyecto";

    // Ejecutar las consultas
    $resultEstudiante = $conn->query($sqlEstudiante);
    $resultProfesor = $conn->query($sqlProfesor);

    // Verificar que se ha encontrado tanto el estudiante como el profesor
    if ($resultEstudiante->num_rows > 0 && $resultProfesor->num_rows > 0) {
        // Obtener los datos del estudiante
        $rowEstudiante = $resultEstudiante->fetch_assoc();
        $idEstudiante = $rowEstudiante['id_estudiante'];

        // Obtener los datos del profesor
        $rowProfesor = $resultProfesor->fetch_assoc();
        $idProfesor = $rowProfesor['fk_id_profesor'];

        echo $idProyecto . " - ";
        echo $idProfesor . " - "; 
        echo $idEstudiante . " - ";

        // Insertar el mensaje en la tabla de conversaciones
        $sqlInsert = "
            INSERT INTO conversaciones (id_proyecto, id_profesor, id_estudiante, mensaje, enviado_por)
            VALUES (?, ?, ?, ?, 'profesor')";

        // Preparar la consulta
        if ($stmt = $conn->prepare($sqlInsert)) {
            // Enlazar los parámetros
            $stmt->bind_param("iiis", $idProyecto, $idProfesor, $idEstudiante, $mensaje);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Redirigir de vuelta a la conversación con éxito
                header("Location: conversacion.php?id_proyecto=$idProyecto&mensaje_enviado=true");
                exit();
            } else {
                echo "Error al guardar el mensaje: " . $stmt->error;
            }

            // Cerrar el statement
            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $conn->error;
        }
    } else {
        echo "No se ha encontrado un estudiante o profesor para este proyecto.";
    }
} else {
    echo "Acceso no autorizado o datos incompletos.";
}

$conn->close();
?>