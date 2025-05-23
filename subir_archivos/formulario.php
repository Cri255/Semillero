<?php

session_start();

include('../conexion.php');

// Inicializar variables
$id_per = $_SESSION['id_per'];
$documento_per = $_SESSION['documento_per'];

$titulo_pro = $estado_pro = $anio_pro = $mes_pro = $palabras_pro = "";
$codigo_ciu = $duracion_pro = $codigo_tip_pro = $horassemanalider_pro = $resumen = "";
$planteamientoproblema = $justificacion = $preguntainvestigacion = $marcoteorico = $estadoarte = "";
$objetivogeneral = $objetivosespecificos = $metodologia = $cronograma = $resultadosproductos = "";
$bibliografia = $presupuesto = $gastosprofesores = $gastosequipos = $gastossoftware = $gastosviajes = "";
$gastosplanformacion = $ruta_archivo = "";

// Verificar si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Recibir los datos del formulario
    $titulo_pro = $_POST["titulo_pro"];
    $estado_pro = $_POST["estado_pro"];
    $anio_pro = $_POST["anio_pro"];
    $mes_pro = $_POST["mes_pro"];
    $palabras_pro = $_POST["palabras_pro"];
    $codigo_ciu = $_POST["codigo_ciu"];
    $duracion_pro = $_POST["duracion_pro"];
    $codigo_tip_pro = $_POST["codigo_tip_pro"];
    $horassemanalider_pro = $_POST["horassemanalider_pro"];
    $resumen = $_POST["resumen"];
    $planteamientoproblema = $_POST["planteamientoproblema"];
    $justificacion = $_POST["justificacion"];
    $preguntainvestigacion = $_POST["preguntainvestigacion"];
    $marcoteorico = $_POST["marcoteorico"];
    $estadoarte = $_POST["estadoarte"];
    $objetivogeneral = $_POST["objetivogeneral"];
    $objetivosespecificos = $_POST["objetivosespecificos"];
    $metodologia = $_POST["metodologia"];
    $cronograma = $_POST["cronograma"];
    $resultadosproductos = $_POST["resultadosproductos"];
    $bibliografia = $_POST["bibliografia"];
    $presupuesto = $_POST["presupuesto"];
    $gastosprofesores = $_POST["gastosprofesores"];
    $gastosequipos = $_POST["gastosequipos"];
    $gastossoftware = $_POST["gastossoftware"];
    $gastosviajes = $_POST["gastosviajes"];
    $gastosplanformacion = $_POST["gastosplanformacion"];

    // Captura el título del proyecto ingresado por el usuario
    $titulo_pro = $_POST["titulo_pro"];

    // Procesar el archivo subido
    $ruta_archivo = '/uploads'; // Variable para almacenar la ruta del archivo
    if (isset($_FILES['archivo']) && $_FILES['archivo']['size'] > 0) {
        $carpeta_destino = "uploads/"; // Directorio donde se almacenarán los archivos
        $nombre_archivo = $titulo_pro . ".pdf"; // Aquí usamos solo el título del proyecto como nombre del archivo
        $ruta_archivo = $carpeta_destino . $nombre_archivo;
        move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta_archivo);
    }

    // Variable para almacenar la ruta en la base de datos
    $rutaarchivo_pro = $ruta_archivo;

    // Consultar ciudades desde la base de datos
    $query_ciudades = "SELECT codigo_ciu, nombre_ciu FROM ciudades";
    $result_ciudades = mysqli_query($conn, $query_ciudades);

    // Consultar tipos de proyectos desde la base de datos
    $query_tipos_proyectos = "SELECT codigo_tip_pro, nombre_tip_pro FROM tipoproyectos";
    $result_tipos_proyectos = mysqli_query($conn, $query_tipos_proyectos);

    // Verificar la conexión a la base de datos
    if ($conn) {
        // Crear la consulta SQL para insertar datos en la tabla de la base de datos
        $consulta = "INSERT INTO proyectos (
            tiutlo_pro, estado_pro, anio_pro, mes_pro, palabras_pro,
            codigo_ciu, duracion_pro, codigo_tip_pro, horassemanalider_pro, resumen,
            planteamientoproblema, justificacion, preguntainvestigacion, marcoteorico,
            estadoarte, objetivogeneral, objetivosespecificos, metodologia, cronograma,
            resultadosproductos, bibliografia, presupuesto, gastosprofesores, gastosequipos,
            gastossoftware, gastosviajes, gastosplanformacion, rutaarchivo_pro
        ) VALUES (
            '$titulo_pro', '$estado_pro', '$anio_pro', '$mes_pro', '$palabras_pro',
            '$codigo_ciu', '$duracion_pro', '$codigo_tip_pro', '$horassemanalider_pro', '$resumen',
            '$planteamientoproblema', '$justificacion', '$preguntainvestigacion', '$marcoteorico',
            '$estadoarte', '$objetivogeneral', '$objetivosespecificos', '$metodologia', '$cronograma',
            '$resultadosproductos', '$bibliografia', '$presupuesto', '$gastosprofesores', '$gastosequipos',
            '$gastossoftware', '$gastosviajes', '$gastosplanformacion', '$rutaarchivo_pro'
        )";

        // Ejecutar la consulta
        if (mysqli_query($conn, $consulta)) {
            
            $codigo_pro = mysqli_insert_id($conn);

            // Inserción en estudiantes_proyectos
            $consulta_estudiantes = "INSERT INTO estudiantes_proyectos (codigo_pro, id_per, documento_per)
                                    VALUES ('$codigo_pro', '$id_per', '$documento_per')";

            if (mysqli_query($conn, $consulta_estudiantes)) {
                echo "<script>alert('Datos insertados correctamente.');</script>";
            } else {
                echo "<script>alert('Error al insertar en estudiantes_proyectos: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('Error al insertar datos en proyectos: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        echo "<script>alert('Error en la conexión a la base de datos');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"/>
<link rel="stylesheet" href="formulario.css">
<body>
    
    <h2>Formulario de Proyecto</h2>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <details>
            <summary class="pico-color-blue-500" role="button">Información del Proyecto </summary>           
            
            <label for="titulo_pro">Título del Proyecto:</label>
            <input type="text" id="titulo_pro" name="titulo_pro" required><br><br>
        
            <div class="form-group">
                <label for="estado_pro">Estado del Proyecto:</label>
                <select class="form-control" id="estado_pro" name="estado_pro" required>
                    <option value="">Selecciona</option>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                    <option value="Finalizado">Finalizado</option>
                </select>
            </div>
        
            <label for="anio_pro">Año del Proyecto:</label>
            <select id="anio_pro" name="anio_pro" class="form-control rounded" required>
            <option value="">Selecciona un año</option>
            </select>

            <script>
            // Obtener el elemento select
            var selectAnio = document.getElementById("anio_pro");

            // Obtener el año actual
            var añoActual = new Date().getFullYear();

            // Agregar opciones para los próximos 10 años
            for (var i = 0; i < 10; i++) {
                var option = document.createElement("option");
                option.text = añoActual + i;
                option.value = añoActual + i;
                selectAnio.add(option);
            }
            </script>
            <br></br>
        
            <label for="mes_pro">Mes del Proyecto:</label>
            <select id="mes_pro" name="mes_pro" class="form-control rounded" required>
                <option value="">Selecciona un mes</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option> 
            </select>
            <br><br>
        
            <label for="palabras_pro">Palabras clave:</label>
            <input type="text" id="palabras_pro" name="palabras_pro" required><br><br>

            <?php
                        
            $query_ciudades = "SELECT * FROM ciudades";
            $result_ciudades = mysqli_query($conn, $query_ciudades);

            $options = "";

            // Verificar si la consulta devuelve resultados
            if ($result_ciudades && mysqli_num_rows($result_ciudades) > 0) {
                while ($row = mysqli_fetch_assoc($result_ciudades)) {
                    // Construir las opciones de la lista desplegable
                    $options .= "<option value='" . $row['codigo_ciu'] . "'>" . $row['nombre_ciu'] . "</option>";
                }
                mysqli_free_result($result_ciudades); 
            } else {                       
                $options = "<option value=''>No hay datos de ciudades disponibles</option>";
            }
            ?>

            <label for="codigo_ciu">Ciudad:</label>
            <select id="codigo_ciu" class="form-control rounded" name="codigo_ciu" required>
                <option value="">Selecciona</option>
                <?php echo $options; ?>
            </select>
        </details>


        <details>
            <summary role="button">Desarrollo del proyecto</summary>
            <label for="duracion_pro">Duración del Proyecto:</label>
                <input type="text" id="duracion_pro" name="duracion_pro" required><br><br>

            <?php
            $query_tipos_proyectos = "SELECT * FROM tipoproyectos";
            $result_tipos_proyectos = mysqli_query($conn, $query_tipos_proyectos);
            ?>

            <label for="codigo_tip_pro">Código del Tipo de Proyecto:</label>
            <select id="codigo_tip_pro"  class="form-control rounded" name="codigo_tip_pro" required>
                <option value="">Selecciona</option>

                <?php
                if ($result_tipos_proyectos && mysqli_num_rows($result_tipos_proyectos) > 0) {
                    while ($row = mysqli_fetch_assoc($result_tipos_proyectos)) {
                        
                        $codigo_nombre = $row['nombre_tip_pro'];
                ?>
                        <option value="<?= $row['codigo_tip_pro'] ?>"><?= $codigo_nombre ?></option>
                <?php
                    }
                    mysqli_free_result($result_tipos_proyectos); 
                } else {      
                    echo "<option value=''>No hay datos de tipos de proyectos disponibles</option>";
                }
                ?>
            </select>
            <br></br>
            
            <label for="horassemanalider_pro">Horas semanales del líder de proyecto:</label>
            <input type="text" id="horassemanalider_pro" name="horassemanalider_pro" required><br><br>
        
            <label for="resumen">Resumen:</label>
            <textarea id="resumen" name="resumen" required></textarea><br><br>            
        
            <label for="planteamientoproblema">Planteamiento del problema:</label>
            <textarea id="planteamientoproblema" name="planteamientoproblema" required></textarea><br><br>          
        
            <label for="justificacion">Justificación:</label>
            <textarea id="justificacion" name="justificacion" required></textarea><br><br>

            <label for="preguntainvestigacion">Pregunta de investigación:</label>
            <input type="text" id="preguntainvestigacion" name="preguntainvestigacion" required><br><br>
        
            <label for="marcoteorico">Marco Teórico:</label>
            <textarea id="marcoteorico" name="marcoteorico" required></textarea><br><br>

        </div>

        <div class="column">

            <label for="estadoarte">Estado del Arte:</label>
            <textarea id="estadoarte" name="estadoarte" required></textarea><br><br>

            <label for="objetivogeneral">Objetivo General:</label>
            <input type="text" id="objetivogeneral" name="objetivogeneral" required><br><br>
        
            <label for="objetivosespecificos">Objetivos Específicos:</label>
            <input type="text" id="objetivosespecificos" name="objetivosespecificos" required><br><br>
        
            <label for="metodologia">Metodología:</label>
            <textarea id="metodologia" name="metodologia" required></textarea><br><br>

            <label for="cronograma">Cronograma:</label>
            <input type="text" id="cronograma" name="cronograma" required><br><br>
        
            <label for="resultadosproductos">Resultados del productos:</label>
            <input type="text" id="resultadosproductos" name="resultadosproductos" required><br><br>
            
            <label for="bibliografia">Bibliografía:</label>
            <textarea id="bibliografia" name="bibliografia" required></textarea><br><br>
            
        </details>

        <details>
            <summary role="button">Presupuestos</summary>
            <label for="presupuesto">Presupuesto:</label>
            <input type="text" id="presupuesto" name="presupuesto" required><br><br>
        
            <label for="gastosprofesores">Gastos profesores:</label>
            <input type="text" id="gastosprofesores" name="gastosprofesores" required><br><br>
        
            <label for="gastosequipos">Gastos equipos:</label>
            <input type="text" id="gastosequipos" name="gastosequipos" required><br><br>
        
            <label for="gastossoftware">Gastos Software:</label>
            <input type="text" id="gastossoftware" name="gastossoftware" required><br><br>
        
            <label for="gastosviajes">Gastos viajes:</label>
            <input type="text" id="gastosviajes" name="gastosviajes" required><br><br>
        
            <label for="gastosplanformacion">Gastos plan de formación:</label>
            <input type="text" id="gastosplanformacion" name="gastosplanformacion" required><br><br>
        
            <input type="file" name="archivo" id="archivo" accept=".pdf">
            <input type="submit" value="Enviar Información" name="submit">
            <br><br>
        </details>

</body>
</html>