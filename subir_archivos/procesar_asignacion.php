<?php
session_start();

if ($_SESSION['tipo'] == 3) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['codigo_pro']) && isset($_POST['documento_per'])) {
            // Almacenar la asignación en variables de sesión
            $_SESSION['asignaciones'][$_POST['codigo_pro']] = $_POST['documento_per'];
            echo "Asignación exitosa";
        }
    }
} else {
    echo "<p>Acceso denegado. Esta función solo está disponible para administradores.</p>";
}
?>
