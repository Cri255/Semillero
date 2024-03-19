<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Botones Bootstrap</title>
    <!-- Agregar el CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<br></br>
    <div class="container">
        <h2>Cambiar Contraseña</h2>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="username">Ingrese su usuario:</label>
                <input type="text" class="form-control" id="ID" name="ID" required>
            </div>

            <div class="form-group">
                <label for="new_password">Nueva contraseña:</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>

            <!-- Botón tipo submit con Bootstrap -->
            <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
        </form>
        <br></br>

        <!-- Botón para redireccionar con Bootstrap -->
        <a href="../admin.php" class="btn btn-primary">Ir a inicio</a>
    </div>

    <!-- Agregar el JavaScript de Bootstrap al final del cuerpo del documento -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php
    // Verificar si se ha enviado el formulario
    if (isset($_POST['submit'])) {
        // Realizar el procesamiento del formulario

        // Incluir el archivo de conexión
        include("../conexion.php");

        // Obtener los datos del formulario
        $username = $_POST['ID'];
        $newPassword = $_POST['new_password'];

        // Verificar si el usuario existe en la base de datos
        $checkUserQuery = "SELECT * FROM personas WHERE documento_per='$username'";
        $result = $conn->query($checkUserQuery);

        if ($result->num_rows > 0) {
            // El usuario existe en la base de datos

            // No se aplica hashing a la contraseña para depuración
            $hashedPassword = $newPassword;

            // Actualizar la contraseña en la base de datos
            $sql = "UPDATE personas SET password_per='$hashedPassword' WHERE documento_per='$username'";

            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Contraseña actualizada exitosamente</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al actualizar la contraseña: ' . $conn->error . '</div>';
            }
        } else {
            // El usuario no existe en la base de datos
            echo '<div class="alert alert-danger" role="alert">El usuario no existe en la base de datos</div>';
        }

        // Cerrar la conexión
        $conn->close();
    }
    ?>
</body>
</html>
