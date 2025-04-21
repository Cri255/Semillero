<?php
session_start();
include('../conexion.php');

if ($_SESSION['tipo'] == 3) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['codigo_pro']) && isset($_POST['documento_per'])) {
            // Almacenar la asignación en variables de sesión
            $_SESSION['asignaciones'][$_POST['codigo_pro']] = $_POST['documento_per'];

            // Insertar datos en la base de datos
            $sql = "INSERT INTO profesores_proyectos (fk_id_profesor,  fk_id_proyecto, creation) 
            VALUES ('".$_POST['documento_per']."', '".$_POST['codigo_pro']."', NOW() )";

            if ($conn->query($sql) === TRUE) {
                echo "Asignación exitosa";
            }            
        }
    }
} else {
    echo "<p>Acceso denegado. Esta función solo está disponible para administradores.</p>";
}
?>
