<?php
session_start();
include('../conexion.php');

/*if ($_SESSION['tipo'] == 3) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['codigo_pro']) && isset($_POST['documento_per'])) {
            // Almacenar la asignación en variables de sesión
            $_SESSION['asignaciones'][$_POST['codigo_pro']] = $_POST['documento_per'];

            // Insertar datos en la base de datos
            $sql = "INSERT INTO profesores_proyectos (fk_id_profesor,  fk_id_proyecto, creation) 
            VALUES ('".$_POST['documento_per']."', '".$_POST['codigo_pro']."', NOW() )";

            if ($conn->query($sql) === TRUE) {
                echo "Asignación exitosa";
            }            
<<<<<<< HEAD
        }
    }
} else {
    echo "<p>Acceso denegado. Esta función solo está disponible para administradores.</p>";
}*/

if ($_SESSION['tipo'] == 3) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['codigo_pro']) && isset($_POST['documento_per'])) {
            $codigoProyecto = $_POST['codigo_pro'];
            $nuevoProfesor = $_POST['documento_per'];

            // Verificar si ya está asignado al mismo profesor
            $verificarMismo = "SELECT * FROM profesores_proyectos 
                               WHERE fk_id_proyecto = '$codigoProyecto' 
                               AND fk_id_profesor = '$nuevoProfesor'";
            $resultadoMismo = $conn->query($verificarMismo);

            if ($resultadoMismo && $resultadoMismo->num_rows > 0) {
                echo "<script>alert('Este proyecto ya está asignado a este profesor.');</script>";
                return;
            }

            // Verificar si el proyecto ya tiene un profesor asignado
            $verificarOtro = "SELECT * FROM profesores_proyectos 
                              WHERE fk_id_proyecto = '$codigoProyecto'";
            $resultadoOtro = $conn->query($verificarOtro);

            if ($resultadoOtro && $resultadoOtro->num_rows > 0) {
                echo "<script>alert('Este proyecto ya tiene un profesor asignado. Debes desasignarlo primero.');</script>";
                return;
            }

            // Buscar último profesor anterior (si existiera)
            $consultaAnterior = "SELECT fk_id_profesor FROM profesores_proyectos 
                                 WHERE fk_id_proyecto = '$codigoProyecto' 
                                 ORDER BY creation DESC LIMIT 1";
            $resultadoAnterior = $conn->query($consultaAnterior);
            $profesorAnterior = null;

            if ($resultadoAnterior && $resultadoAnterior->num_rows > 0) {
                $fila = $resultadoAnterior->fetch_assoc();
                $profesorAnterior = $fila['fk_id_profesor'];
            }

            // Insertar en profesores_proyectos
            $sql1 = "INSERT INTO profesores_proyectos (fk_id_profesor, fk_id_proyecto, creation) 
                     VALUES ('$nuevoProfesor', '$codigoProyecto', NOW())";

            // Insertar en modificaciones
            $sql2 = "INSERT INTO modificaciones (fk_codigo_pro, fk_id_per_pro, fk_id_per_asig, fecha_asignacion)
                     VALUES ('$codigoProyecto', " . ($profesorAnterior ? "'$profesorAnterior'" : "NULL") . ", '$nuevoProfesor', NOW())";

            if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
                echo "Asignación y trazabilidad registradas correctamente.";
            } else {
                echo "Error al guardar: " . $conn->error;
            }
=======
>>>>>>> b677339b38163076ab689b7c218f5fa2dde71470
        }
    }
} else {
    echo "<p>Acceso denegado. Esta función solo está disponible para administradores.</p>";
}

?>
