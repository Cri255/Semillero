<?php
include ('../conexion.php');

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Definir el número de registros por página por defecto
$registros_por_pagina = 10;

// Obtener la página actual
if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 1;
}

// Calcular el inicio del conjunto de registros que se mostrarán en esta página
$inicio = ($pagina - 1) * $registros_por_pagina;

// Consulta SQL para obtener el número total de registros
$sql_total = "SELECT COUNT(*) AS total FROM ciudades";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();
$total_registros = $row_total['total'];

// Calcular el número total de páginas
$total_paginas = ceil($total_registros / $registros_por_pagina);

// Procesar el formulario de búsqueda cuando se envíe
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el término de búsqueda
    $busqueda = $_POST['busqueda'];

    // Consulta SQL para buscar en la tabla ciudades
    $sql = "SELECT * FROM ciudades WHERE nombre_ciu LIKE '%$busqueda%'";
    $result = $conn->query($sql);
} else {
    // Consulta SQL para obtener los registros de la página actual
    $sql = "SELECT * FROM ciudades LIMIT $inicio, $registros_por_pagina";
    $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles_ciu.css">
    <title>Tabla de Ciudades</title>
    <style>
        /* Aquí puedes incluir los estilos CSS si los necesitas */
    </style>
</head>
<body>
    <h2>Tabla de Ciudades</h2>

    <!-- Campo de búsqueda -->
    <form action="" method="post">
        <label for="busqueda">Buscar:</label>
        <input type="text" name="busqueda" id="busqueda">
        <input type="submit" value="Buscar">
    </form>

    <!-- Tabla de registros -->
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Nombre de la Ciudad</th>
            <th>Código del Departamento</th>
            <!-- Puedes agregar más columnas si es necesario -->
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['codigo_ciu'] . "</td>";
                echo "<td>" . $row['nombre_ciu'] . "</td>";
                echo "<td>" . $row['codigo_dep'] . "</td>";
                // Puedes agregar más columnas si es necesario
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No se encontraron registros.</td></tr>";
        }
        ?>
    </table>

    <!-- Navegación entre páginas -->
    <div>
        <?php
        // Mostrar los enlaces para navegar entre páginas
        for ($i = 1; $i <= $total_paginas; $i++) {
            echo "<a href='?pagina=$i'>$i</a> ";
        }
        ?>
    </div>
    <button type="button" onclick="window.history.back()">Volver</button>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
