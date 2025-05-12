<?php
session_start();
include('../conexion.php');

if ($_SESSION['tipo'] != 3) {
    echo "<p>Acceso denegado. Solo disponible para administradores.</p>";
    exit;
}

$sql = "SELECT 
            m.fecha_asignacion,
            p1.nombre_per AS profesor_anterior,
            p2.nombre_per AS profesor_asignado,
            pro.tiutlo_pro
        FROM modificaciones m
        LEFT JOIN personas p1 ON m.fk_id_per_pro = p1.id_per
        LEFT JOIN personas p2 ON m.fk_id_per_asig = p2.id_per
        INNER JOIN proyectos pro ON m.fk_codigo_pro = pro.codigo_pro
        ORDER BY m.fecha_asignacion DESC";

$resultado = $conn->query($sql);
?>

<style>
    .tabla-historial {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-family: Arial, sans-serif;
    }

    .tabla-historial th,
    .tabla-historial td {
        border: 1px solid #ccc;
        padding: 12px;
        text-align: left;
    }

    .tabla-historial thead {
        background-color: #007BFF;
        color: white;
    }

    .tabla-historial tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .tabla-historial tbody tr:hover {
        background-color: #e6f7ff;
    }

    .container h2 {
        font-size: 24px;
        margin-bottom: 15px;
        color: #333;
    }
</style>

<div class="container">
    <h2>Historial de asignación de proyectos</h2>
    <?php if ($resultado && $resultado->num_rows > 0): ?>
        <table class="tabla-historial">
            <thead>
                <tr>
                    <th>Proyecto</th>
                    <th>Profesor anterior</th>
                    <th>Profesor asignado</th>
                    <th>Fecha de asignación</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['tiutlo_pro']); ?></td>
                        <td><?php echo $row['profesor_anterior'] ?? 'N/A'; ?></td>
                        <td><?php echo $row['profesor_asignado']; ?></td>
                        <td><?php echo $row['fecha_asignacion']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay historial de asignaciones registrado.</p>
    <?php endif; ?>
</div>

<?php $conn->close(); ?>