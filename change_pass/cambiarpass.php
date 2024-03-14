<?php
include("../conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pass.css">

    <title>Cambiar Contraseña</title>
</head>

<form method="get" action="../admin.php"> 
    <input type="submit" value="Volver atrás">
    
<body>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['ID'];
    $newPassword = $_POST['new_password'];

    // Verificar si el usuario existe en la base de datos
    $checkUserQuery = "SELECT * FROM personas WHERE documento_per='$username'";
    $result = $conn->query($checkUserQuery);

    if ($result->num_rows > 0) {
        // El usuario existe en la base de datos

        // No se aplica hashing a la contraseña para depuración
        $hashedPassword = $newPassword;

        // Imprimir los valores para depuración
        var_dump($username, $newPassword, $hashedPassword);

        $sql = "UPDATE personas SET password_per='$hashedPassword' WHERE documento_per='$username'";

        if ($conn->query($sql) === TRUE) {
            echo "Contraseña actualizada exitosamente";
        } else {
            echo "Error al actualizar la contraseña: " . $conn->error;
        }
    } else {
        // El usuario no existe en la base de datos
        echo "El usuario no existe en la base de datos";
    }

    // Cerrar la conexión
    $conn->close();
}
?>



<h2>Cambiar Contraseña</h2>

</form>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="username">ID usuario:</label>
    <input type="text" id="ID" name="ID" required><br><br>

    <label for="new_password">Nueva contraseña:</label>
    <input type="password" id="new_password" name="new_password" required><br><br>

    <input type="submit" value="Cambiar contraseña">
</form>

</body>
</html>
