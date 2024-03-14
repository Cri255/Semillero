<?php
include("../conexion.php");

// Operación READ (Leer registros)
$sql = "SELECT documento_per, nombre_per, apellidos_per, fechanacimiento, email_per, telefono_per, foto_per, estado_per, password_per FROM personas";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD DE USUARIOS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 50px;
            max-height: 50px;
        }

        .btn-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
        }
    </style>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<body>
    <h1>CRUD de Personas</h1>

    <div class="btn-container">
        <a href="../admin.php" class="btn">Página Principal</a>
    </div>

    <table>
        <tr>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Fecha de Nacimiento</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Foto</th>
            <th>Estado</th>
            <th>Password</th>
            <th>Acciones</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["documento_per"] . "</td>";
                echo "<td>" . $row["nombre_per"] . "</td>";
                echo "<td>" . $row["apellidos_per"] . "</td>";
                echo "<td>" . $row["fechanacimiento"] . "</td>";
                echo "<td>" . $row["email_per"] . "</td>";
                echo "<td>" . $row["telefono_per"] . "</td>";
                echo "<td><img src='" . $row["foto_per"] . "' alt='Foto'></td>";
                echo "<td>" . $row["estado_per"] . "</td>";
                echo "<td>" . $row["password_per"] . "</td>";
                echo '<td><button><a href="editar.php?id=' . $row["documento_per"] . '"><i class="fas fa-edit"></i></a></button> | <button><a href="eliminar.php?id=' . $row["documento_per"] . '"><i class="fas fa-trash-alt"></i></a></button></td>';

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='12'>0 resultados</td></tr>";
        }
        ?>
    </table>
</body>
</html>
