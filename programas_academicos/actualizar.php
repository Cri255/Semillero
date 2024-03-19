<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Programa Académico</title>
    <link rel="stylesheet" href="styles.css">
</head>
<link rel="stylesheet" href="actualizar.css">
<body>
    <h2>Actualizar Programa Académico</h2>
    <?php
    include("../conexion.php");

    // Verificar si se ha enviado el formulario de actualización
    if(isset($_POST['actualizar'])) {
        $codigo_pro = $_POST['codigo_pro'];
        $nombre_pro = $_POST['nombre_pro'];
        $sql = "UPDATE programas SET nombre_pro='$nombre_pro' WHERE codigo_pro='$codigo_pro'";

        if ($conn->query($sql) === TRUE) {
            echo "Programa académico actualizado correctamente";
        } else {
            echo "Error al actualizar el programa académico: " . $conn->error;
        }
    }

    // Obtener el código del programa académico a actualizar
    if(isset($_GET['codigo_pro'])) {
        $codigo_pro = $_GET['codigo_pro'];

        // Consultar el programa académico con el código proporcionado
        $sql = "SELECT * FROM programas WHERE codigo_pro='$codigo_pro'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nombre_pro = $row['nombre_pro'];
        } else {
            echo "No se encontró ningún programa académico con el código proporcionado.";
            exit();
        }
    } else {
        echo "No se proporcionó un código de programa académico.";
        exit();
    }
    ?>

    <form method="post">
        <label for="codigo_pro">Código del Programa:</label>
        <input type="text" id="codigo_pro" name="codigo_pro" value="<?php echo $codigo_pro; ?>" readonly><br><br>

        <label for="nombre_pro">Nuevo Nombre del Programa:</label>
        <input type="text" id="nombre_pro" name="nombre_pro" value="<?php echo $nombre_pro; ?>"><br><br>

        <input type="submit" name="actualizar" value="Actualizar">
        <input type="button" value="Volver a Inicio" onclick="window.location.href='index.php';">
    </form>

    <?php $conn->close(); ?>
</body>
</html>
