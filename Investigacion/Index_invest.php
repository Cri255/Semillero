<?php
include ('../conexion.php');
// Procesar el formulario cuando se envíe
if ($_SERVER["REQUEST_METHOD"] == "POST") 

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario y limpiarlos
    $codigo_lin = mysqli_real_escape_string($conn, $_POST['codigo_lin']);
    $nombre_lin = mysqli_real_escape_string($conn, $_POST['nombre_lin']);
    $estado_lin = mysqli_real_escape_string($conn, $_POST['estado_lin']);
    $codigo_sem = mysqli_real_escape_string($conn, $_POST['codigo_sem']);

    // Consulta SQL para insertar los datos en la tabla 'lineas'
    $sql = "INSERT INTO lineas (codigo_lin, nombre_lin, estado_lin, codigo_sem) VALUES ('$codigo_lin', '$nombre_lin', '$estado_lin', '$codigo_sem')";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "Los datos se han guardado correctamente.";
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Consulta SQL para recuperar los registros de la tabla 'semilleros'
$sql_semilleros = "SELECT CONCAT(nombre_sem) AS codigo_nombre_sem FROM semilleros";
$result_semilleros = $conn->query($sql_semilleros);

// Crear un array para almacenar los resultados
$semilleros = array();

if ($result_semilleros->num_rows > 0) {
    // Iterar sobre los resultados y almacenarlos en el array $semilleros
    while($row = $result_semilleros->fetch_assoc()) {
        $semilleros[] = $row['codigo_nombre_sem'];
    }
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Registro de Líneas</title>
    <style>
    </style>
</head>
<body>
    <h2>Registro de Líneas</h2>
    <div class="form-container">
        <?php
        if (isset($mensaje)) {
            echo "<p class='success'>$mensaje</p>";
        }
        if (isset($error)) {
            echo "<p class='error'>$error</p>";
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="codigo_lin">Código de línea:</label><br>
            <input type="text" id="codigo_lin" name="codigo_lin"><br>
            
            <label for="nombre_lin">Nombre de línea:</label><br>
            <input type="text" id="nombre_lin" name="nombre_lin"><br>

            <label for="estado_lin">Estado de línea:</label><br>
            <select id="estado_lin" name="estado_lin">
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select><br>

            <label for="codigo_sem">Código y nombre de semillero:</label><br>
            <select id="codigo_sem" name="codigo_sem">
                <?php
                // Iterar sobre los registros de semilleros y generar las opciones del menú desplegable
                foreach ($semilleros as $semillero) {
                    echo "<option value='" . $semillero . "'>" . $semillero . "</option>";
                }
                ?>
            </select><br>
            
            <input type="submit" value="Registrar">
        </form>
    </div>
</body>
</html>
