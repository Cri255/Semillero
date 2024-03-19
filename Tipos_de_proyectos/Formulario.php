<?php
include('../conexion.php'); 

$codigo = "";
$nombre = "";
$error = "";

// Verificar si se han enviado datos mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han recibido los datos esperados
    if (isset($_POST["codigo"]) && isset($_POST["nombre"])) {
        // Recuperar los datos del formulario
        $codigo = $_POST["codigo"];
        $nombre = $_POST["nombre"];

        // Crear conexión a la base de datos
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Preparar y ejecutar el query para insertar los datos en la tabla
        $sql = "INSERT INTO tipoproyectos (codigo_tip_pro, nombre_tip_pro) VALUES ('$codigo', '$nombre')";

        if ($conn->query($sql) === TRUE) {
            echo "Datos insertados correctamente.";
        } else {
            echo "Error al insertar datos: " . $conn->error;
        }

        // Cerrar la conexión
        $conn->close();
    } else {
        // Mostrar error si no se completaron todos los campos
        $error = "Por favor, asegúrate de completar todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Tipos de Proyecto</title>
</head>
<body>
    <div class="container no-border">
        <br><br>
        <h2>Ingrese un nuevo tipo de Proyectos</h2>

        <?php if (!empty($error)): ?>
        <!-- Mostrar mensaje de error si existe uno -->
        <p><strong><?php echo $error; ?></strong></p>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="codigo">Código del Tipo de Proyecto:</label>
                <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo htmlspecialchars($codigo); ?>" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre del Tipo de Proyecto:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
            </div>
            <div>
                <!-- Botón tipo submit con Bootstrap -->
                <button type="submit" class="btn btn-primary">Enviar</button>
                <!-- Botón con Bootstrap para volver atrás -->
                <button type="button" class="btn btn-primary" onclick="window.history.back()">ir a inicio</button>
            </div>
        </form>
    </div>
</body>
</html>
