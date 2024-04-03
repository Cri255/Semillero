
<?php
include("../conexion.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cedula = $_POST['cedulaestu'];
            $nombre = $_POST['Nameestu'];
            $apellido = $_POST['LastNameestu'];
            $fechanacimiento = $_POST['fech_nacimiento_estu'];
            $telefono = $_POST['phoneestu'];
            $foto = $_FILES['fileToUpload']['name']; 
            $email = $_POST['emailestu'];
            $estado = $_POST['estadoestu'];
            $password = $_POST['passwordestu'];
            $tipo_identificador = '1';
			$codigo_semillero = ['semillero_estu'];

        // Insertar datos en la base de datos
        $sql = "INSERT INTO personas (documento_per, nombre_per, apellidos_per, fechanacimiento, telefono_per, foto_per, email_per, estado_per, password_per, codigo_tip, codigo_sem)
        VALUES ('$cedula', '$nombre', '$apellido', '$fechanacimiento', '$telefono', '$foto', '$email', '$estado', '$password', '$tipo_identificador', '$codigo_semillero')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro Exitoso";
           
            $target_dir = "./fotos_perfil/"; // Directorio donde se almacenará la imagen
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
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Estudiante</title>
    <link rel="stylesheet" href="estudiantes.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header text-center">
                            Nuevo Estudiante
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cedulaestu">Documento:</label>
                                        <input type="number" class="form-control" id="cedulaestu" name="cedulaestu" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nameestu">Nombre:</label>
                                        <input type="text" class="form-control" id="Nameestu" name="Nameestu" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="LastNameestu">Apellido:</label>
                                        <input type="text" class="form-control" id="LastNameestu" name="LastNameestu" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fech_nacimiento_estu">Fecha de Nacimiento:</label>
                                        <input type="date" class="form-control" id="fech_nacimiento_estu" name="fech_nacimiento_estu" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phoneestu">Teléfono:</label>
                                        <input type="tel" class="form-control" id="phoneestu" name="phoneestu" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="emailestu">Correo Electrónico:</label>
                                        <input type="email" class="form-control" id="emailestu" name="emailestu" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Por favor, introduce una dirección de correo electrónico válida" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="estadoestu">Estado:</label>
                                        <select class="form-control" id="estadoestu" name="estadoestu" required>
                                            <option value="Activo">Activo</option>
                                            <option value="Inactivo">Inactivo</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordestu">Contraseña:</label>
                                        <input type="password" class="form-control" id="passwordestu" name="passwordestu" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$" title="La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una letra minúscula, un número y un carácter especial." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="semillero_estu">Semillero</label>
                                        <select class="form-control" id="semillero_estu" name="semillero_estu" required>
                                            <option value="">Seleccionar Semillero</option>
                                            <?php
                                            include('../conexion.php');

                                            // Consultar los semilleros para mostrar en la lista desplegable
                                            $query_semilleros = $conn->query("SELECT codigo_sem, nombre_sem FROM semilleros");

                                            if ($query_semilleros && $query_semilleros->num_rows > 0) {
                                                while ($semillero = $query_semilleros->fetch_assoc()) {
                                                    echo "<option value='" . $semillero['codigo_sem'] . "'>" . $semillero['nombre_sem'] . "</option>";
                                                }
                                            } else {
                                                echo "<option value='' disabled>No hay semilleros disponibles</option>";
                                            }

                                            $conn->close();
                                            ?>
                                        </select>
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
