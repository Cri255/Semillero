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
        <h1>Asignar profesores a proyectos</h1>
        <form method="post" action="procesar_asignacion.php">
            <ul class="file-list">
            <?php
            session_start();
            include('../conexion.php');

            if ($_SESSION['tipo'] == 3) {
<<<<<<< HEAD
                // Lista de proyectos SIN asignar
                $query = $conn->query("SELECT * FROM proyectos WHERE codigo_pro NOT IN (SELECT fk_id_proyecto FROM profesores_proyectos)");
=======
                // Consultar los proyectos para mostrar en la lista
                $query = $conn->query("SELECT codigo_pro,tiutlo_pro, rutaarchivo_pro FROM proyectos");
>>>>>>> b677339b38163076ab689b7c218f5fa2dde71470

                if ($query && $query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                        $codigo_pro = $row['codigo_pro'];
                        $rutaArchivo = $row['rutaarchivo_pro'];
                        $nombreArchivo = basename($rutaArchivo);
                        $name = $row['tiutlo_pro'];
<<<<<<< HEAD

                        echo "<li class='file-link'>";
                            echo "<a><i class='fas fa-file'></i> $name</a>";
=======
                        echo "<li class='file-link'>";
                            echo "<a ><i class='fas fa-file'></i> $name</a>";
>>>>>>> b677339b38163076ab689b7c218f5fa2dde71470
                            echo "<div class='context-menu'>";
                                echo "<form method='POST' action='procesar_asignacion.php'>";
                                    echo "<input type='hidden' name='codigo_pro' value='$codigo_pro'>";
                                    echo "<select name='documento_per'>";
                                        echo "<option value=''>Seleccionar Profesor</option>";
                                        $query_profesores = $conn->query("SELECT * FROM personas WHERE codigo_tip = 2");
                                        if ($query_profesores && $query_profesores->num_rows > 0) {
                                            while ($profesor = $query_profesores->fetch_assoc()) {
                                                echo "<option value='" . $profesor['id_per'] . "'>" . $profesor['nombre_per'].' '.$profesor['apellidos_per'] . "</option>";
                                            }
                                        }
                                    echo "</select>";
                                    echo "<button type='submit'>Asignar</button>";
                                echo "</form>";
                            echo "</div>";
                        echo "</li>";
                    }
                } else {
                    echo "<p>No hay proyectos disponibles para asignar.</p>";
                }
            } else {
                echo "<p>Acceso denegado. Esta función solo está disponible para administradores.</p>";
            }
            ?>
            </ul>
        </form>
    </div>

<<<<<<< HEAD
    <!-- NUEVA SECCIÓN: Proyectos YA ASIGNADOS -->
    <div class="container" style="margin-top: 30px;">
        <h2>Proyectos ya asignados</h2>
        <ul class="file-list">
        <?php
        if ($_SESSION['tipo'] == 3) {
            $query_asignados = $conn->query("
                SELECT 
                    pro.tiutlo_pro,
                    pro.rutaarchivo_pro,
                    p.nombre_per,
                    p.apellidos_per
                FROM profesores_proyectos pp
                INNER JOIN proyectos pro ON pro.codigo_pro = pp.fk_id_proyecto
                INNER JOIN personas p ON p.id_per = pp.fk_id_profesor
            ");

            if ($query_asignados && $query_asignados->num_rows > 0) {
                while ($row = $query_asignados->fetch_assoc()) {
                    $titulo = $row['tiutlo_pro'];
                    $archivo = $row['rutaarchivo_pro'];
                    $profesor = $row['nombre_per'] . ' ' . $row['apellidos_per'];

                    echo "<li class='file-link'>";
                        echo "<a><i class='fas fa-file'></i> $titulo</a>";
                        echo "<div class='context-menu'>";
                            echo "<p><strong>Profesor asignado:</strong> $profesor</p>";
                            echo "<p><a href='$archivo' target='_blank'>Ver archivo</a></p>";
                        echo "</div>";
                    echo "</li>";
                }
            } else {
                echo "<p>No hay proyectos asignados aún.</p>";
            }

            $conn->close();
        }
        ?>
        </ul>
    </div>
=======
>>>>>>> b677339b38163076ab689b7c218f5fa2dde71470

    
    <!-- Script de Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
