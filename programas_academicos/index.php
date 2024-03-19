<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Programas</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<link rel="stylesheet" href="index.css">
<body>
    <h2>Lista de Programas Académicos</h2>
    <button onclick="window.location.href='crear.php';" class="back-to-top">Agregar nuevo Programa</button>
    <button onclick="window.location.href='../admin.php';" class="back-to-top">Volver a Inicio</button>
    <br><br>
    <table>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Opciones</th>
        </tr>
        <?php
            include("../conexion.php");
            // Consulta SQL para obtener los programas académicos
            $sql = "SELECT * FROM programas";
            $result = $conn->query($sql);

            // Mostrar los programas académicos en la tabla
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['codigo_pro']."</td>";
                    echo "<td>".$row['nombre_pro']."</td>";
                    echo "<td><a href='actualizar.php?codigo_pro=".$row['codigo_pro']."'>Editar</a> | <a href='eliminar.php?codigo_pro=".$row['codigo_pro']."'>Eliminar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No se encontraron programas académicos</td></tr>";
            }
            $conn->close();
        ?>
    </table>
</body>
</html>
