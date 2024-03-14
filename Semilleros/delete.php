<?php
    include("../conexion.php");

    // Verificar si se ha enviado el parámetro 'codigo_sem' mediante GET
    if(isset($_GET['codigo_sem'])) {
        // Obtener el código del semillero a eliminar
        $codigo_sem = $_GET['codigo_sem'];

        
        $sql_select = "SELECT * FROM semilleros WHERE codigo_sem='$codigo_sem'";
        $result = $conn->query($sql_select);

        // Verificar si se encontró el semillero
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nombre_sem = $row['nombre_sem'];

            // Mostrar un mensaje de confirmación antes de eliminar
            echo "<script>";
            echo "if(confirm('¿Estás seguro de que quieres eliminar el semillero $nombre_sem?')) {";
            echo "    window.location.href = 'delete_process.php?codigo_sem=$codigo_sem';";
            echo "} else {";
            echo "    window.location.href = 'index.php';";
            echo "}";
            echo "</script>";
        } else {
            echo "No se encontró el semillero.";
        }
    } else {
        echo "No se proporcionó el código del semillero a eliminar.";
    }
?>
