<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivos</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@400&display=swap">

    
    <style>

        h1{
            color:black;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px; /* Agregar margen superior a la tabla */
        }

        body {
            font-family: 'Arial', sans-serif; /* Cambiar a la fuente que desees, por ejemplo 'Arial' */
            margin-top: 50px; /* Aumentar el margen superior */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .visualizar-button {
            background-color: #2CBE1D;
            border: none;
            color: black;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 2px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
        .eliminar-button {
            background-color: red;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 2px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 10px; /* Añadir bordes redondeados */
        
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h1>Realiza el envío de tu proyecto</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="archivo" id="archivo" accept=".pdf">
    <input type="submit" value="Subir Archivo" name="submit">
</form>

<?php
$archivos = $conn->query("SELECT * FROM proyectos");

if ($archivos && $archivos->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>Nombre del Archivo</th><th>Acciones</th></tr>';
    while ($row = $archivos->fetch_assoc()) {
        $nombreArchivo = basename($row['rutaarchivo_pro']);
        $id = $row['codigo_pro'];
        $rutaArchivo = $row['rutaarchivo_pro'];
        
        echo "<tr><td>$nombreArchivo</td>";
        echo "<td>
        <a class='visualizar-button' href='./subir_archivos/visualizar.php?id=$id'>Visualizar</a> |
        <a class='eliminar-button' onclick='mostrarModal($id)'>Eliminar</a>
    </td>";
    }
    echo '</table>';
} else {
    echo "No hay archivos disponibles.";
}

?>

<div id="myModal" class="modal">
<div class="full-width pageContent">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal()">&times;</span>
        <p id="modalMsg"></p>
        <a id="eliminarLink" class="eliminar-button" href="#">Sí, Eliminar</a>
    </div>
</div>
</div>
<script>
    var modal = document.getElementById('myModal');
    var modalMsg = document.getElementById('modalMsg');
    var eliminarLink = document.getElementById('eliminarLink');

    function mostrarModal(id) {
        modal.style.display = "block";
        modalMsg.innerHTML = "¿Estás seguro de que deseas eliminar este archivo?";
        eliminarLink.href = 'subir_archivos/eliminar.php?id=' + id;
    }

    function cerrarModal() {
        modal.style.display = "none";
    }

</script>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "./subir_archivos/uploads/";
    $target_file = $target_dir . basename($_FILES["archivo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if($imageFileType != "pdf") {
        echo "Lo siento, solo se permiten archivos PDF.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Lo siento, tu archivo no fue subido.";
    } else {
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
            $nombreArchivo = htmlspecialchars(basename($_FILES["archivo"]["name"]));
            $rutaArchivo = $target_file;

            // Construye la consulta SQL y ejecútala
            $sql = "INSERT INTO proyectos (rutaarchivo_pro) VALUES ('$rutaArchivo')";
            if ($conn->query($sql) === TRUE) {
                echo "El archivo $nombreArchivo ha sido subido.";
            } else {
                echo "Error al subir el archivo: " . $conn->error;
            }
        } else {
            echo "Lo siento, hubo un error al subir tu archivo.";
        }
    }
}

?>

</body>
</html>
