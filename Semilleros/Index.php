<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Semilleros</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Lista de Semilleros</h2>
    <a href="create.php">Crear Nuevo Semillero</a>
    <br></br>
    <br><br>
    <table>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Fecha de Creación</th>
            <th>Estado</th>
            <th>Código del Programa</th>
            <th>Acciones</th>
        </tr>
        <?php
           include("../conexion.php");
            // Consulta SQL para obtener los semilleros
            $sql = "SELECT * FROM semilleros";
            $result = $conn->query($sql);

            // Mostrar los semilleros en la tabla
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['codigo_sem']."</td>";
                    echo "<td>".$row['nombre_sem']."</td>";
                    echo "<td>".$row['fechacreacion_sem']."</td>";
                    echo "<td>".$row['estado_sem']."</td>";
                    echo "<td>".$row['codigo_pro']."</td>";
                    echo "<td><a href='update.php?codigo_sem=".$row['codigo_sem']."'>Editar</a> | <a href='delete.php?codigo_sem=".$row['codigo_sem']."'>Eliminar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No se encontraron semilleros</td></tr>";
            }
            $conn->close();
        ?>
    </table>
</body>
</html>
