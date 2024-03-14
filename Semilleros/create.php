<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear Semillero</title>
    <link rel="stylesheet" href="styles_create.css">
    
    <script>
        // Función para mostrar/ocultar el menú desplegable
        function toggleDropdown() {
            var dropdownMenu = document.getElementById("dropdown-menu");
            dropdownMenu.classList.toggle("show");
        }

        // Cerrar el menú desplegable si el usuario hace clic fuera de él
        window.onclick = function(event) {
            if (!event.target.matches('.dropdown-select')) {
                var dropdowns = document.getElementsByClassName("dropdown-menu");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</head>
<body>
    <h2>Crear Nuevo Semillero</h2>
    <form action="create_process.php" method="post">
        <label for="codigo_sem">Código:</label>
        <input type="text" name="codigo_sem" id="codigo_sem"><br>
        
        <label for="nombre_sem">Nombre:</label>
        <input type="text" name="nombre_sem" id="nombre_sem"><br>
        
        <label for="fechacreacion_sem">Fecha de Creación:</label>
        <input type="date" name="fechacreacion_sem" id="fechacreacion_sem"><br>
        
        <label for="estado_sem">Estado:</label>
        <input type="text" name="estado_sem" id="estado_sem"><br>
        
        <!-- Campo de selección de código del programa -->
        <div class="dropdown">
            <label for="codigo_pro">Código del Programa:</label>
            <div class="dropdown-select" onclick="toggleDropdown()">
                Seleccione un programa
            </div>
            <div class="dropdown-menu" id="dropdown-menu">
                <?php
                    // Establecer conexión a la base de datos
                    include("../conexion.php");

                    // Consultar programas
                    $sql = "SELECT * FROM programas";
                    $result = $conn->query($sql);

                    // Mostrar opciones en el menú desplegable
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<div class='dropdown-menu-option' onclick='document.getElementById(\"codigo_pro\").value = \"" . $row['codigo_pro'] . "\"'>" . $row['nombre_pro'] . "</div>";
                        }
                    } else {
                        echo "<div class='dropdown-menu-option'>No hay programas disponibles</div>";
                    }
                    $conn->close();
                ?>
            </div>
            <br></br>
            <input type="submit" value="Guardar">
            <a href="../admin.php" class="btn">Ir al inicio</a>
        </div>
        
        
    </form>
    
</body>
</html>
