<?php
include("../conexion.php");

// Verificar si se recibió un ID válido
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Operación READ (Leer registro específico)
    $sql = "SELECT documento_per, nombre_per, apellidos_per, fechanacimiento, email_per, telefono_per, foto_per, estado_per, password_per FROM personas WHERE documento_per = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verificar si se envió el formulario
        if(isset($_POST['submit'])) {
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $fechanacimiento = $_POST['fechanacimiento'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $estado = $_POST['estado'];
            $password = $_POST['password'];

            // Verificar si se ha enviado un archivo
            if(isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['foto']['tmp_name'];
                $fileName = $_FILES['foto']['name'];

                // Directorio donde se almacenará la imagen
                $uploadDirectory = '../fotos_perfil/' . $fileName;

                // Movemos la imagen al directorio de destino
                if(move_uploaded_file($fileTmpPath, $uploadDirectory)) {
                    echo "Imagen subida exitosamente.";

                    // URL de la imagen para almacenar en la base de datos
                    $urlFoto = './fotos_perfil/' . $fileName;

                    // Actualizamos la columna 'foto_per' con la URL en la base de datos
                    $sqlUpdate = "UPDATE personas SET nombre_per='$nombre', apellidos_per='$apellidos', fechanacimiento='$fechanacimiento', email_per='$email', telefono_per='$telefono', foto_per='$urlFoto', estado_per='$estado', password_per='$password' WHERE documento_per='$id'";

                    if ($conn->query($sqlUpdate) === TRUE) {
                        echo "Registro actualizado exitosamente.";
                    } else {
                        echo "Error al actualizar el registro: " . $conn->error;
                    }
                } else {
                    echo "Error al subir la imagen.";
                }
            } else {
                // Si no se sube una nueva imagen, se actualizan los demás datos sin cambios en la foto
                $sqlUpdate = "UPDATE personas SET nombre_per='$nombre', apellidos_per='$apellidos', fechanacimiento='$fechanacimiento', email_per='$email', telefono_per='$telefono', estado_per='$estado', password_per='$password' WHERE documento_per='$id'";

                if ($conn->query($sqlUpdate) === TRUE) {
                    echo "Registro actualizado exitosamente.";
                } else {
                    echo "Error al actualizar el registro: " . $conn->error;
                }
            }
        }
    } else {
        echo "Registro no encontrado.";
    }
} else {
    echo "ID no válido.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Registro</title>
</head>
<link rel="stylesheet" href="editar.css">
<body>
    <h1>Editar Registro</h1>
    <form method="post" enctype="multipart/form-data">
        Nombre: <input type="text" name="nombre" value="<?php echo $row['nombre_per']; ?>"><br>
        Apellidos: <input type="text" name="apellidos" value="<?php echo $row['apellidos_per']; ?>"><br>
        Fecha de Nacimiento: <input type="date" name="fechanacimiento" value="<?php echo $row['fechanacimiento']; ?>"><br>
        Email: <input type="text" name="email" value="<?php echo $row['email_per']; ?>"><br>
        Teléfono: <input type="text" name="telefono" value="<?php echo $row['telefono_per']; ?>"><br>
        Foto: <input type="file" name="foto"><br><br>
        Estado:
        <select name="estado">
            <option value="Activo" <?php if($row['estado_per'] == 'Activo') echo 'selected'; ?>>Activo</option>
            <option value="Inactivo" <?php if($row['estado_per'] == 'Inactivo') echo 'selected'; ?>>Inactivo</option>
        </select><br>
        Contraseña: <input type="password" name="password" value="<?php echo $row['password_per']; ?>"><br>
        <input type="submit" name="submit" value="Actualizar">
        <br></br>
        <a href="Tabla_usuarios.php" class="btn">Ir a Inicio</a>

    </form>
</body>
</html>
