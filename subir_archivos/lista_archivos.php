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
    <link rel="stylesheet" href="lista_archivos.css">
    <!-- Estilos adicionales -->
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
