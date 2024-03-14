<?php
include("../conexion.php");

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos actuales del registro
    $sql = "SELECT documento_per, nombre_per, apellidos_per, fechanacimiento, email_per, telefono_per, foto_per, estado_per, password_per, codigo_tip, codigo_sem FROM personas WHERE documento_per = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Registro no encontrado.";
    }
}

if(isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $fechanacimiento = $_POST['fechanacimiento'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $estado = $_POST['estado'];
    $password = $_POST['password'];
    $codigo_tip = $_POST['codigo_tip'];
    $codigo_sem = $_POST['codigo_sem'];

    // Verificamos si se ha enviado un archivo
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['foto']['tmp_name'];
        $fileName = $_FILES['foto']['name'];

        // Directorio donde se almacenará la imagen
        $uploadDirectory = '../fotos_perfil/' . $fileName;

        // Movemos la imagen al directorio de destino
        if(move_uploaded_file($fileTmpPath, $uploadDirectory)) {
            echo "Imagen subida exitosamente.";

            // URL de la imagen para almacenar en la base de datos
            $urlFoto = '../fotos_perfil/' . $fileName;

            // Actualizamos la columna 'foto_per' con la URL en la base de datos
            $sqlUpdate = "UPDATE personas SET nombre_per='$nombre', apellidos_per='$apellidos', fechanacimiento='$fechanacimiento', email_per='$email', telefono_per='$telefono', foto_per='$urlFoto', estado_per='$estado', password_per='$password', codigo_tip='$codigo_tip', codigo_sem='$codigo_sem' WHERE documento_per='$id'";

            if ($conn->query($sqlUpdate) === TRUE) {
                echo "Registro actualizado exitosamente.";
            } else {
                echo "Error al actualizar el registro: " . $conn->error;
            }
        } else {
            echo "Error al subir la imagen.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Registro con Foto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 50%;
            margin: 0 auto;
        }

        input[type="text"],
        input[type="date"],
        input[type="password"],
        input[type="submit"],
        select {
            width: calc(100% - 10px);
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<div class="btn-container">
        <a href="Tabla_usuarios.php" class="btn">Página Principal</a>
    </div>
<body>
    <h1>Editar Registro con Foto</h1>
    <form method="post" enctype="multipart/form-data">
        Nombre: <input type="text" name="nombre" value="<?php echo $row['nombre_per']; ?>"><br>
        Apellidos: <input type="text" name="apellidos" value="<?php echo $row['apellidos_per']; ?>"><br>
        Fecha de Nacimiento: <input type="date" name="fechanacimiento" value="<?php echo $row['fechanacimiento']; ?>"><br>
        Email: <input type="text" name="email" value="<?php echo $row['email_per']; ?>"><br>
        Teléfono: <input type="text" name="telefono" value="<?php echo $row['telefono_per']; ?>"><br>
        Foto: <input type="file" name="foto"><br></br>
        Estado:
        <select name="estado">
            <option value="Activo" <?php if($row['estado_per'] == 'Activo') echo 'selected'; ?>>Activo</option>
            <option value="Inactivo" <?php if($row['estado_per'] == 'Inactivo') echo 'selected'; ?>>Inactivo</option>
        </select><br><br>
        Contraseña: <input type="password" name="password" value="<?php echo $row['password_per']; ?>"><br>
        Código tipo de usuario: <input type="text" name="codigo_tip" value="<?php echo $row['codigo_tip']; ?>"><br>
        Código del semillero: <input type="text" name="codigo_sem" value="<?php echo $row['codigo_sem']; ?>"><br>
        <input type="submit" name="submit" value="Actualizar">
    </form>
</body>
</html>
