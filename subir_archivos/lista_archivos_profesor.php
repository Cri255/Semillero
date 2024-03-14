<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivos Asignados</title>
    <!-- Enlace a Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .file-list {
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }
        .file-link {
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .file-link:hover {
            background-color: #f0f0f0;
        }
        .file-link a {
            color: #333;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .file-link i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        include('../conexion.php');

        // Verificar si el usuario ha iniciado sesión y si es un profesor
        //if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2 && isset($_SESSION['documento_per'])) {
            //$documento_per = $_SESSION['documento_per'];

            // Realizar la consulta SQL
            $sql = "SELECT personas.nombre_per, proyectos.rutaarchivo_pro
            FROM personas
            INNER JOIN estudiantes_proyectos ON personas.documento_per = estudiantes_proyectos.documento_per
            INNER JOIN proyectos ON estudiantes_proyectos.codigo_pro = proyectos.codigo_pro
            WHERE personas.codigo_tip = '" . $_SESSION['tipo'] . "'";    

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<ul class='file-list'>";
                while ($row = $result->fetch_assoc()) {
                    // Obtener el nombre del archivo de la ruta
                    $rutaArchivo = $row['rutaarchivo_pro'];
                    $nombreArchivo = basename($rutaArchivo);

                    // Generar enlaces a los archivos asignados y mostrarlos
                    echo "<li class='file-link'>";
                    echo "<a href='$rutaArchivo'><i class='fas fa-file'></i> $nombreArchivo</a>";
                    echo "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No hay archivos asignados para este profesor.</p>";
            }

            // Liberar el resultado y cerrar la conexión
            $result->free_result();
        //} else {
            //echo "<p>Acceso denegado. Esta función solo está disponible para profesores.</p>";
        //}

        $conn->close();
        ?>
        <a href="../admin.php" class="btn">Ir al inicio</a>
    </div>
</body>
</html>
