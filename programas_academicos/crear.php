<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Programa Académico</title>
    <link rel="stylesheet" href="styles.css">
</head>
<link rel="stylesheet" href="crear.css">
<body>
    <h2>Crear Nuevo Programa Académico</h2>
    <?php
    include("../conexion.php");

    // Verificar si se ha enviado el formulario de creación
    if(isset($_POST['crear'])) {
        $nombre_pro = $_POST['nombre_pro'];
        $sql = "INSERT INTO programas (nombre_pro) VALUES ('$nombre_pro')";

        if ($conn->query($sql) === TRUE) {
            echo "Nuevo programa académico creado correctamente";
        } else {
            echo "Error al crear el programa académico: " . $conn->error;
        }
    }
    ?>

    <form method="post">
        <label for="codigo_pro">Código del Programa:</label>
        <input type="text" id="codigo_pro" name="codigo_pro" readonly><br><br>

        <label for="nombre_pro">Nombre del Programa:</label>
        <input type="text" id="nombre_pro" name="nombre_pro"><br><br>

        <input type="submit" name="crear" value="Crear">
        <input type="button" value="Volver a Inicio" onclick="window.location.href='index.php';">
    </form>

    <?php $conn->close(); ?>
</body>
</html>
