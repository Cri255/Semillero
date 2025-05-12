<?php 
session_start();
include('../conexion.php');

// Variables de sesión e inicialización
$id_per = $_SESSION['id_per'];
$cod_pro = null;
$nom_profesor = null;
$email_profesor = null;
$foto_profesor = null;
$telefono_profesor = null;

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
if ($row = $result->fetch_assoc()) {
    $cod_pro = $row['codigo_pro'];
}
$stmt->close();

// Segunda consulta para obtener los datos del tutor si existe un código de proyecto
if ($cod_pro) {
    $stmt = $conn->prepare(
        'SELECT
            pro.id as id_pro_proyecto,
            pro.fk_id_proyecto,
            p.id_per as id_pro,
            p.nombre_per as nombre_pro,
            p.apellidos_per as apellido_pro,
            p.email_per as email_pro,
            p.telefono_per as telefono_pro,
            p.foto_per as foto_profesor,
            p.documento_per as documento_pro
         FROM personas as p
         INNER JOIN profesores_proyectos as pro ON pro.fk_id_profesor = p.id_per 
         AND pro.fk_id_proyecto = ?
         WHERE p.codigo_tip = 2'
    );

    $stmt->bind_param('i', $cod_pro);
    $stmt->execute();
    $result = $stmt->get_result();

    // Guardar datos del tutor en variables
    if ($row = $result->fetch_assoc()) {
        $nom_profesor = $row['nombre_pro'] . ' ' . $row['apellido_pro'];
        $email_profesor = $row['email_pro'];
        $telefono_profesor = $row['telefono_pro'];
        $foto_profesor = $row['foto_profesor'];
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mi_tutor.css">
    <title>Mi tutor</title>
</head>
<body>
    <h3>Mi tutor:</h3>
    
    <?php if ($nom_profesor): ?>
<<<<<<< HEAD
    <div class="card">
        <!-- Imagen del profesor -->
        <img src="<?php echo $foto_profesor ? str_replace('./', '../', htmlspecialchars($foto_profesor)) : '../img/default.png'; ?>" alt="Foto del profesor">

        <!-- Nombre y apellidos del profesor -->
        <h3><?php echo htmlspecialchars($nom_profesor); ?></h3>
        
        <!-- Título y Universidad (quemados porque no están en la BD) -->
        <p>Profesor</p>
        <p>Universidad Uniciencia</p>

        <!-- Email y Teléfono del profesor (desde la base de datos) -->
        <p>Contacto: <?php echo htmlspecialchars($email_profesor); ?></p>
        <p>Teléfono: <?php echo htmlspecialchars($telefono_profesor); ?></p>

    </div>
<?php else: ?>
    <h3>No se te ha asignado aún un tutor para tu proyecto</h3>
<?php endif; ?>
=======
        <div class="card">
            <!-- Imagen del profesor -->
            <img src="<?php echo htmlspecialchars($foto_profesor); ?>" alt="Foto del profesor">
            
            <!-- Nombre y apellidos del profesor -->
            <h3><?php echo htmlspecialchars($nom_profesor); ?></h3>
            
            <!-- Título del profesor -->
            <p>Profesor</p>
            <p>Universidad Uniciencia</p>

            <!-- Habilidades del profesor -->
            <div class="skills">
                <span>UI</span>
                <span>UX</span>
                <span>Java</span>
                <span>+3</span>
            </div>

            <!-- Información del profesor -->
            <p>Contacto: <?php echo htmlspecialchars($email_profesor); ?></p>
            <p>Teléfono: <?php echo htmlspecialchars($telefono_profesor); ?></p>

            <button class="profile-btn">Ver perfil</button>
        </div>
    <?php else: ?>
        <h3>No se te ha asignado aún un tutor para tu proyecto</h3>
    <?php endif; ?>
>>>>>>> b677339b38163076ab689b7c218f5fa2dde71470
</body>
</html>