<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Programa Académico</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function confirmarEliminar() {
            return confirm('¿Estás seguro de que deseas eliminar este programa académico? Esta acción no se puede deshacer.');
        }
    </script>
</head>
<link rel="stylesheet" href="eliminar.css">
<body>
    <h2>Eliminar Programa Académico</h2>
    <?php
    include("../conexion.php");

    // Verificar si se ha enviado el formulario de eliminación
    if(isset($_GET['codigo_pro'])) {
        $codigo_pro = $_GET['codigo_pro'];
        
        // Consultar el programa académico a eliminar
        $sql = "SELECT * FROM programas WHERE codigo_pro='$codigo_pro'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nombre_pro = $row['nombre_pro'];
            
            // Mostrar formulario de eliminación
            echo "<p>¿Seguro que deseas eliminar el programa académico '$nombre_pro'?</p>";
            echo "<form method='post'>";
            echo "<input type='hidden' name='codigo_pro' value='$codigo_pro'>";
            echo "<input type='submit' name='eliminar' value='Eliminar' onclick='return confirmarEliminar();'>";
            echo "<input type='button' value='Volver a Inicio' onclick=\"window.location.href='index.php';\">";
            echo "</form>";
        } else {
            echo "No se encontró ningún programa académico con el código proporcionado.";
        }
    } else {
        echo "No se proporcionó un código de programa académico.";
    }

    // Procesar la eliminación del programa académico
    if(isset($_POST['eliminar'])) {
        $codigo_pro = $_POST['codigo_pro'];
        $sql = "DELETE FROM programas WHERE codigo_pro='$codigo_pro'";

        if ($conn->query($sql) === TRUE) {
            echo "Programa académico eliminado correctamente";
        } else {
            echo "Error al eliminar el programa académico: " . $conn->error;
        }
    }

    $conn->close();
    ?>
</body>
</html>
