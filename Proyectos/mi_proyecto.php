<?php
session_start();
include('../conexion.php'); // conexión con MySQLi

// Validar sesión
if (!isset($_SESSION['id_per']) || $_SESSION['privilegios'] !== 'estudiante') {
    header('Location: login.php');
    exit();
}

$id_per = $_SESSION['id_per'];

// Obtener información del proyecto
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

$stmt->bind_param("i", $id_per);
$stmt->execute();
$result = $stmt->get_result();
$proyecto = $result->fetch_assoc();

$conversaciones = [];
if ($proyecto) {
    $idProyecto = $proyecto['codigo_pro'];

    // Obtener conversaciones del profesor
    $sql = "
        SELECT c.id, c.mensaje, c.fecha, p.nombre_per 
        FROM conversaciones c
        INNER JOIN personas p ON c.id_profesor = p.id_per
        WHERE c.id_proyecto = $idProyecto
        ORDER BY c.fecha ASC
    ";

    $resConv = $conn->query($sql);
    if ($resConv) {
        while ($row = $resConv->fetch_assoc()) {
            $conversaciones[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proyecto del Estudiante</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f4f4f4; }
        .card {
            background: white;
            padding: 20px;
            max-width: 700px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        h2, h3 { text-align: center; color: #333; }
        p { margin: 10px 0; }
        strong { color: #555; }

        .mensaje-box {
            background: #fdfdfd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
        }
        .mensaje-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .fecha { color: #888; font-size: 0.9em; }
        .contenido { display: none; margin-top: 10px; }
        .btn-ver {
            background: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-ver:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Información del Proyecto</h2>
        <?php if ($proyecto): ?>
            <p><strong>Nombre:</strong> <?= htmlspecialchars($proyecto['nombre_per'] . ' ' . $proyecto['apellidos_per']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($proyecto['email_per']) ?></p>
            <p><strong>Documento:</strong> <?= htmlspecialchars($proyecto['documento_per']) ?></p>
            <p><strong>Código del Proyecto:</strong> <?= htmlspecialchars($proyecto['codigo_pro']) ?></p>
            <p><strong>Título del Proyecto:</strong> <?= htmlspecialchars($proyecto['tiutlo_pro']) ?></p>
        <?php else: ?>
            <p>No se encontró información del proyecto.</p>
        <?php endif; ?>
    </div>

    <?php if (!empty($conversaciones)): ?>
        <div class="card">
            <h3>Conversaciones del Profesor</h3>
            <?php foreach ($conversaciones as $conv): ?>
                <div class="mensaje-box">
                    <div class="mensaje-header">
                        <strong><?= htmlspecialchars($conv['nombre_per']) ?></strong>
                        <span class="fecha"><?= htmlspecialchars($conv['fecha']) ?></span>
                    </div>
                    <button class="btn-ver" onclick="toggleMensaje('msg<?= $conv['id'] ?>')">Ver mensaje</button>
                    <div class="contenido" id="msg<?= $conv['id'] ?>">
                        <p><?= nl2br(htmlspecialchars($conv['mensaje'])) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <script>
        function toggleMensaje(id) {
            const div = document.getElementById(id);
            div.style.display = div.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>
</html>