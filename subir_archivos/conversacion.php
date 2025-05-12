<?php
session_start();
include('../conexion.php');

// Validar que se ha recibido el ID del proyecto
if (!isset($_GET['id_proyecto']) || !is_numeric($_GET['id_proyecto'])) {
    echo "<p>ID de proyecto no válido.</p>";
    exit;
}

$idProyecto = intval($_GET['id_proyecto']);

// Mostrar mensajes del proyecto
$sql = "
    SELECT c.mensaje, c.fecha, p.nombre_per 
    FROM conversaciones c
    INNER JOIN personas p ON c.id_profesor = p.id_per
    WHERE c.id_proyecto = $idProyecto
    ORDER BY c.fecha ASC
";


$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conversación del Proyecto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .chat-container {
            max-width: 600px;
            margin: 20px auto;
        }

        .mensaje {
            background-color: #f0f0f0;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .mensaje strong {
            display: block;
            margin-bottom: 4px;
        }

        form {
            margin-top: 20px;
        }

        textarea {
            width: 100%;
            height: 80px;
            padding: 10px;
        }

        button {
            padding: 8px 16px;
            margin-top: 8px;
        }

        .alert {
            color: green;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="chat-container">
    <h2><i class="fas fa-comments"></i> Conversación del Proyecto</h2>

    <?php
    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='mensaje'>";
                echo "<strong>" . htmlspecialchars($row['nombre_per'], ENT_QUOTES, 'UTF-8') . "</strong>";
                echo "<small><i>" . htmlspecialchars($row['fecha'], ENT_QUOTES, 'UTF-8') . "</i></small>";
                echo "<p>" . nl2br(htmlspecialchars($row['mensaje'], ENT_QUOTES, 'UTF-8')) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No hay mensajes aún.</p>";
        }
    } else {
        echo "<p>Error al cargar los mensajes.</p>";
    }

    $result->free_result();
    ?>

    <!-- Formulario para nuevo mensaje -->
    <form method="POST" action="guardar_mensaje.php">
        <input type="hidden" name="id_proyecto" value="<?= $idProyecto ?>">
        <textarea name="mensaje" placeholder="Escribe tu mensaje..." required></textarea>
        <br>
        <button type="submit"><i class="fas fa-paper-plane"></i> Enviar</button>
    </form>

    <!-- Mostrar mensaje de éxito o error después de enviar el mensaje -->
    <?php
    if (isset($_GET['mensaje_enviado']) && $_GET['mensaje_enviado'] == 'true') {
        echo "<p class='alert'>Mensaje enviado con éxito.</p>";
    }
    ?>
</div>
</body>
</html>

<?php $conn->close(); ?>