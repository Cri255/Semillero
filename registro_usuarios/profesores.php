
<?php
include("../conexion.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Procesar datos del formulario cuando se envíe
        $cedula = $_POST['cedulaprof'];
        $nombre = $_POST['Nameprof'];
        $apellido = $_POST['LastNameprof'];
        $fechanacimiento = $_POST['fech_nacimiento_prof'];
        $telefono = $_POST['phoneprof'];
        $foto = $_FILES['fileToUpload']['name']; 
        $email = $_POST['emailprof'];
        $estado = $_POST['estadoprof'];
        $password = $_POST['passwordprof'];
        $tipo_identificador = '2';
        $codigo_semillero = $_POST['semillero_prof'];;

        // Insertar datos en la base de datos
        $sql = "INSERT INTO personas (documento_per, nombre_per, apellidos_per, fechanacimiento, telefono_per, foto_per, email_per, estado_per, password_per, codigo_tip, codigo_sem)
        VALUES ('$cedula', '$nombre', '$apellido', '$fechanacimiento', '$telefono', '$foto', '$email', '$estado', '$password', '$tipo_identificador', '$codigo_semillero')";

        if ($conn->query($sql)) {
            echo "Registro Exitoso";

            $target_dir = "../fotos_perfil/"; // Directorio donde se almacenará la imagen
            $target_dir_db = "./fotos_perfil/"; // Directorio para la ruta en la db

            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                // El archivo se ha subido correctamente, ahora inserta la ruta en la base de datos
                $ruta_imagen = $target_dir_db . basename($_FILES["fileToUpload"]["name"]);

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
    <title>Formulario de Nuevo Profesor</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="profesores.css">
</head>
<body>
    <div class="container container-form">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header text-center">
                            Nuevo Profesor
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="text-condensedLight">Información del Profesor</h5>
                                    <div class="form-group">
                                        <label for="cedulapro">Documento</label>
                                        <input class="form-control" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="cedulapro" name="cedulaprof" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nameprof">Nombre</label>
                                        <input class="form-control" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="Nameprof" name="Nameprof" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="LastNameprof">Apellido</label>
                                        <input class="form-control" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="LastNameprof" name="LastNameprof" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fech_nacimiento_prof">Fecha de Nacimiento</label>
                                        <input class="form-control" type="date" id="fech_nacimiento_prof" name="fech_nacimiento_prof" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phoneprof">Teléfono</label>
                                        <input class="form-control" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="phoneprof" name="phoneprof" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="emailprof">Correo Electrónico</label>
                                        <input class="form-control" type="email" id="emailprof" name="emailprof"pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Por favor, introduce una dirección de correo electrónico válida" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-condensedLight">Detalles de la cuenta</h5>
                                    <div class="form-group">
                                        <label for="estadoprof">Estado</label>
                                        <select class="form-control" id="estadoprof" name="estadoprof" required>
                                            <option value="Activo">Activo</option>
                                            <option value="Inactivo">Inactivo</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordprof">Contraseña</label>
                                        <input class="form-control" type="password" id="passwordprof" name="passwordprof"pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$" title="La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una letra minúscula, un número y un carácter especial." required>
                                    </div>

                                    <div class="form-group">
                                        <label for="semillero_prof">Semillero</label>
                                        <select class="form-control" id="semillero_prof" name="semillero_prof" required>
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
