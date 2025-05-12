<?php
session_start();
include('../conexion.php');

// Variables de sesión e inicialización
$id_per = $_SESSION['id_per'];
$documento_per = $_SESSION['documento_per'];

// Primera consulta para obtener el código del proyecto del estudiante
$stmt = $conn->prepare(
    'SELECT 
        p.id_per,
        p.nombre_per,
        p.apellidos_per,
        p.email_per,
        p.documento_per,
        pro.codigo_pro,
        pro.tiutlo_pro,
        es_pro.promedio
     FROM personas as p
     INNER JOIN estudiantes_proyectos as es_pro ON es_pro.id_per = p.id_per 
     INNER JOIN proyectos as pro ON pro.codigo_pro = es_pro.codigo_pro
     WHERE p.codigo_tip = 1 AND p.id_per = ?'
);

$stmt->bind_param('i', $id_per);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontró el código del proyecto
$cod_pro = null; // Inicialización de la variable
if ($row = $result->fetch_assoc()) {
    $cod_pro = $row['codigo_pro'];
}

$stmt->close();

if (isset($_POST['submit'])) {

    if ($cod_pro) {
        
        $id_estudiante = $id_per;
        $codigo_pro = $cod_pro;
    
        // Asignación de variables POST con sanitización básica
        $rol_est_pro = $_POST['rol_est_pro'];
        $horassemana = $_POST['horassemana'];
        $semestreacademico = $_POST['semestreacademico'];
        $promedio = $_POST['promedio'];
        $mesessemillero = $_POST['mesessemillero'];
    
        // Actualizar datos en la base de datos
        $sql_update = "UPDATE estudiantes_proyectos 
                       SET rol_est_pro = '$rol_est_pro', 
                           horassemana = '$horassemana', 
                           semestreacademico = '$semestreacademico', 
                           promedio = '$promedio', 
                           mesessemillero = '$mesessemillero' 
                       WHERE codigo_pro = '$codigo_pro' 
                       AND id_per = '$id_estudiante'"; // Asegúrate de usar la variable correcta aquí
    
        if ($conn->query($sql_update)) {
            echo "<script>alert('Registro actualizado exitosamente.');</script>";
        } else {
            echo "<script>alert('Error al actualizar registro: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('El estudiante aún no tiene un proyecto asignado');</script>";
    }    
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Proyectos.css">
    <title>CRUD Estudiantes Proyectos</title>
</head>
<body>
    <h1>Estudiantes Proyectos</h1>
   
    <h2>Envia los datos para tu proyecto</h2>
    <form action="" method="post">
        <label for="rol_est_pro">Rol Estudiante Proyecto:</label>
        <input type="text" name="rol_est_pro" id="rol_est_pro" required>

        <label for="horassemana">Horas Semana:</label>
        <input type="text" name="horassemana" id="horassemana" required>

        <label for="semestreacademico">Semestre Académico:</label>
        <input type="text" name="semestreacademico" id="semestreacademico" required>

        <label for="promedio">Promedio:</label>
        <input type="text" name="promedio" id="promedio" required>

        <label for="mesessemillero">Meses Semillero:</label>
        <input type="text" name="mesessemillero" id="mesessemillero" required>
        
        <input type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>

<?php
$conn->close();
?>