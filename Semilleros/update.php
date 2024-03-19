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
                <label for="estado_sem">Estado:</label>
                <label for="estado_sem" class="rounded-label">Estado:</label>
                <select name="estado_sem" id="estado_sem" class="rounded-dropdown">
                    <option value="Activo" <?php if($row['estado_sem'] == 'Activo') echo 'selected'; ?>>Activo</option>
                    <option value="Inactivo" <?php if($row['estado_sem'] == 'Inactivo') echo 'selected'; ?>>Inactivo</option>
                </select><br></br>


                Código del Programa:
                <select name="codigo_pro">
                    <?php
                        $programas_sql = "SELECT codigo_pro, nombre_pro FROM programas";
                        $programas_result = $conn->query($programas_sql);
                        if ($programas_result->num_rows > 0) {
                            while($programa = $programas_result->fetch_assoc()) {
                                echo "<option value='" . $programa['codigo_pro'] . "'";
                                if ($row['codigo_pro'] == $programa['codigo_pro']) {
                                    echo " selected";
                                }
                                echo ">" . $programa['nombre_pro'] . "</option>";
                            }
                        }
                    ?>
                </select><br></br>
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
