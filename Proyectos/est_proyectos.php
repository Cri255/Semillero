<?php
include('../conexion.php');

if(isset($_POST['submit'])) {
    $codigo_pro = $_POST['codigo_pro'];
    $documento_per = $_POST['documento_per'];
    $rol_est_pro = $_POST['rol_est_pro'];
    $horassemana = $_POST['horassemana'];
    $semestreacademico = $_POST['semestreacademico'];
    $promedio = $_POST['promedio'];
    $mesessemillero = $_POST['mesessemillero'];

    $sql_insert = "INSERT INTO estudiantes_proyectos (codigo_pro, documento_per, rol_est_pro, horassemana, semestreacademico, promedio, mesessemillero) 
                VALUES ('$codigo_pro', '$documento_per', '$rol_est_pro', '$horassemana', '$semestreacademico', '$promedio', '$mesessemillero')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "<p>Registro creado exitosamente.</p>";
    } else {
        echo "<p>Error al crear registro: " . $conn->error . "</p>";
    }
}

// Consulta para obtener los códigos de proyecto
$sql_proyectos = "SELECT codigo_pro FROM tabla_proyectos";
$result_proyectos = $conn->query($sql_proyectos);

// Cerrar conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Proyectos.css">
    <title>CRUD Estudiantes Proyectos</title>
</head>
<body>
    <h1>CRUD Estudiantes Proyectos</h1>
   
    <h2>Agregar Estudiante Proyecto</h2>
    <form action="" method="post">

    <label for="id_est_pro">ID Estudiante Proyecto:</label>
        <input type="text" name="id_est_pro" id="id_est_pro">

        <?php

            include ("../conexion.php");

            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            $query_proyectos = "SELECT * FROM proyectos";
            $result_proyectos = $conn->query($query_proyectos);


            if (!$result_proyectos) {
                echo "Error al ejecutar la consulta: " . $conn->error;
            } else {
            
                echo '<label for="codigo_pro">Código Proyecto:</label>';
                echo '<select name="codigo_pro" id="codigo_pro">';
                if ($result_proyectos->num_rows > 0) {
                    while ($row = $result_proyectos->fetch_assoc()) {
                        echo "<option value='" . $row['codigo_pro'] . "'>" . $row['codigo_pro'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No hay proyectos disponibles</option>";
                }
                echo '</select>';
            }
            $result_proyectos->free();
            $conn->close();
            ?>
                    </select>
        
            <label for="documento_per">Documento Persona:</label>
            <input type="text" name="documento_per" id="documento_per" required>

            <label for="rol_est_pro">Rol Estudiante Proyecto:</label>
            <input type="text" name="rol_est_pro" id="rol_est_pro" required>

            <label for="horassemana">Horas Semana:</label>
            <input type="text" name="horassemana" id="horassemana" required>

            <label for="semestreacademico">Semestre Académico:</label>
            <input type="text" name="semestreacademico" id="semestreacademico" required>

            <label for="promedio">Promedio:</label>
            <input type="text" name="promedio" id="promedio" required>

            <label for="mesessemillero">Meses Semillero:</label>
            <input type="text" name="mesessemillero" id="mesessemillero" required>

        
        <input type="submit" name="submit" value="Enviar">
    </form>
    <form action="../admin.php" method="get">
    <input type="submit" value="Ir a Inicio">
</form>
</body>
</html>
