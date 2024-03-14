<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Semillero</title>
    <link rel="stylesheet" href="styles_update.css">
</head>
<body>
    <h2>Actualizar Semillero</h2>
    <?php
      
        include("../conexion.php");

        $codigo_sem = $_GET['codigo_sem'];

        $sql = "SELECT * FROM semilleros WHERE codigo_sem='$codigo_sem'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
            <form action="update_process.php" method="post">
                <input type="hidden" name="codigo_sem" value="<?php echo $row['codigo_sem']; ?>">
                Nombre: <input type="text" name="nombre_sem" value="<?php echo $row['nombre_sem']; ?>"><br>
                Fecha de Creación: <input type="date" name="fechacreacion_sem" value="<?php echo $row['fechacreacion_sem']; ?>"><br>
                Estado: <input type="text" name="estado_sem" value="<?php echo $row['estado_sem']; ?>"><br>
                Código del Programa: <input type="text" name="codigo_pro" value="<?php echo $row['codigo_pro']; ?>"><br>
                <input type="submit" value="Actualizar">
                <br> </br>
                <a href="../admin.php" class="btn">Ir al inicio</a>
            </form>
            
    <?php
        } else {
            echo "No se encontró el semillero con el código ".$codigo_sem;
        }
        $conn->close();
    ?>
</body>
</html>
