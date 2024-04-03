
<?php
include("../conexion.php");

// Procesar datos del formulario cuando se envíe
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['cedulaAdmin'];
    $nombre = $_POST['NameAdmin'];
    $apellido = $_POST['LastNameAdmin'];
    $fechanacimiento = $_POST['fech_nacimiento_admin'];
    $telefono = $_POST['phoneAdmin'];
    $foto = $_FILES['fileToUpload']['name']; // Nombre del archivo de la imagen
    $email = $_POST['emailAdmin'];
    $estado = $_POST['estadoAdmin'];
    $password = $_POST['passwordAdmin'];
	$tipo_identificador = '3'; 
	$codigo_semillero = '1';


    // Insertar datos en la base de datos
    $sql = "INSERT INTO personas (documento_per, nombre_per, apellidos_per, fechanacimiento, telefono_per, foto_per, email_per, estado_per, password_per, codigo_tip, codigo_sem )
    VALUES ('$cedula', '$nombre', '$apellido', '$fechanacimiento', '$telefono', '$foto','$email','$estado', '$password', '$tipo_identificador', '$codigo_semillero')";
 // Insertar datos en la base de datos
 $sql = "INSERT INTO personas (documento_per, nombre_per, apellidos_per, fechanacimiento, telefono_per, foto_per, email_per, estado_per, password_per, codigo_tip, codigo_sem)
 VALUES ('$cedula', '$nombre', '$apellido', '$fechanacimiento', '$telefono', '$foto', '$email', '$estado', '$password', '$tipo_identificador', '$codigo_semillero')";

 if ($conn->query($sql) === TRUE) {
	 echo "Registro Exitoso";
	 
	 $target_dir = "../fotos_perfil/"; // Directorio donde se almacenará la imagen
	 $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	 $uploadOk = 1;
	 $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		 // El archivo se ha subido correctamente, ahora inserta la ruta en la base de datos
		 $ruta_imagen = $target_file;

		 $sql_update = "UPDATE personas SET foto_per = '$ruta_imagen' WHERE documento_per = '$cedula'"; // O INSERT INTO si es un nuevo registro

		 if ($conn->query($sql_update) === TRUE) {
			 echo "El archivo " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " ha sido subido y la ruta ha sido guardada en la base de datos.";
		 } else {
			 echo "Hubo un error al guardar la ruta en la base de datos: " . $conn->error;
		 }
	 } else {
		 echo "Lo siento, hubo un error al subir el archivo.";
	 }
 } else {
	 echo "Error en la inserción: " . $conn->error;
 }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Administrador</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="administrador.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center cosa1">
            <div class="col-md-12 cosa">
                <div class="card cosaxd">
                    <div class="card-header text-center">
                        Nuevo Administrador
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cedulaAdmin">Documento:</label>
                                        <input type="number" class="form-control" id="cedulaAdmin" name="cedulaAdmin" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="NameAdmin">Nombre:</label>
                                        <input type="text" class="form-control" id="NameAdmin" name="NameAdmin" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fech_nacimiento_admin">Fecha de Nacimiento:</label>
                                        <input type="date" class="form-control" id="fech_nacimiento_admin" name="fech_nacimiento_admin" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phoneAdmin">Teléfono:</label>
                                        <input type="tel" class="form-control" id="phoneAdmin" name="phoneAdmin" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="estadoAdmin">Estado:</label>
                                        <select class="form-control" id="estadoAdmin" name="estadoAdmin" required>
                                            <option value="Activo">Activo</option>
                                            <option value="Inactivo">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="LastNameAdmin">Apellido:</label>
                                        <input type="text" class="form-control" id="LastNameAdmin" name="LastNameAdmin" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="emailAdmin">Correo Electrónico:</label>
                                        <input type="email" class="form-control" id="emailAdmin" name="emailAdmin" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Por favor, introduce una dirección de correo electrónico válida" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordAdmin">Contraseña:</label>
                                        <input type="password" class="form-control" id="passwordAdmin" name="passwordAdmin" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$" title="La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una letra minúscula, un número y un carácter especial." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Subir Foto de Perfil:</label>
                                        <label for="fileToUpload" class="custom-file-upload">Seleccionar Archivo</label>
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="submit" value="Enviar" name="submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
