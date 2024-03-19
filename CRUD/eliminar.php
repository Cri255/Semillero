<?php
include("../conexion.php");

// Obtener el ID del registro a eliminar
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
        
        $sql = "DELETE FROM personas WHERE documento_per = $id"; 
        if ($conn->query($sql) === TRUE) {
            echo "<p>Registro eliminado correctamente.</p>";
        } else {
            echo "<p>Error al eliminar el registro: " . $conn->error . "</p>";
        }
    } else {
        $confirmDelete = "<script>
            var confirmDelete = confirm('¿Estás seguro de eliminar este registro?');
            if(confirmDelete) {
                window.location.href = 'eliminar.php?id=$id&confirm=yes';
            } else {
                window.location.href = 'Tabla_usuarios.php'; 
            }
        </script>";
        
        echo $confirmDelete;
    }
}
?>
