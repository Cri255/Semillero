<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Archivos</title>
    <!-- Enlace a Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Estilos adicionales -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .file-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .file-link {
            display: block;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
            margin-bottom: 10px;
            text-decoration: none;
            color: #333;
            position: relative;
            transition: background-color 0.3s ease;
        }
        .file-link:hover {
            background-color: #e0e0e0;
        }
        .file-link i {
            margin-right: 10px;
        }
        .context-menu {
            display: none;
            position: absolute;
            top: 0;
            right: 0;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 10px;
            z-index: 1;
        }
        .file-link:hover .context-menu {
            display: block;
        }
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            font-size: 14px;
        }
        .file-link a {
            color: #333;
            text-decoration: none;
        }
    </style>
</head>
<body>
<!DOCTYPE html>
<html lang="es">
<head>
</head>
<body>
    <div class="container">
        <h1>Lista de Archivos</h1>
        <form method="post" action="procesar_asignacion.php">
            <ul class="file-list">
            <?php
            session_start();
            include('../conexion.php');

            // Verificar si el usuario es un administrador
            if ($_SESSION['tipo'] == 3) {
                // Consultar los proyectos para mostrar en la lista
                $query = $conn->query("SELECT codigo_pro, rutaarchivo_pro FROM proyectos");

                if ($query && $query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                        $codigo_pro = $row['codigo_pro'];
                        $rutaArchivo = $row['rutaarchivo_pro'];
                        $nombreArchivo = basename($rutaArchivo);
                        echo "<li class='file-link'>";
                        echo "<a href='$rutaArchivo'><i class='fas fa-file'></i> $nombreArchivo</a>";
                        echo "<div class='context-menu'>";
                        echo "<form method='POST' action='procesar_asignacion.php'>";
                        echo "<input type='hidden' name='codigo_pro' value='$codigo_pro'>";
                        echo "<select name='documento_per'>";
                        echo "<option value=''>Seleccionar Profesor</option>";
                        $query_profesores = $conn->query("SELECT documento_per, nombre_per FROM personas WHERE codigo_tip = 2");
                        if ($query_profesores && $query_profesores->num_rows > 0) {
                            while ($profesor = $query_profesores->fetch_assoc()) {
                                echo "<option value='" . $profesor['documento_per'] . "'>" . $profesor['nombre_per'] . "</option>";
                            }
                        }
                        echo "</select>";
                        echo "<button type='submit'>Asignar</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</li>";
                    }
                } else {
                    echo "<p>No hay archivos disponibles.</p>";
                }
            } else {
                echo "<p>Acceso denegado. Esta función solo está disponible para administradores.</p>";
            }
            $conn->close();
            ?>
            </ul>
        </form>
    </div>
    <a href="../admin.php" class="btn">Ir al inicio</a>
</body>
</html>

    
    <!-- Script de Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
