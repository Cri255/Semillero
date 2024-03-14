<?php
include('conexion.php');

$target_dir = "fotos_perfil/"; // Carpeta donde se almacenarán las imágenes subidas
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Verificar si el archivo es una imagen real o una imagen falsa
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "El archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "<script> alert('El archivo no es una imagen');window.location= 'admin.php' </script>";
        $uploadOk = 0;
    }
}

// Verificar si el archivo ya existe
if (file_exists($target_file)) {
    echo "<script> alert('Lo siento el archivo ya existe');window.location= 'admin.php' </script>";
    $uploadOk = 0;
}

// Verificar el tamaño del archivo
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<script> alert('Lo siento el archivo es demasiado grande');window.location= 'admin.php' </script>";
    $uploadOk = 0;
}

// Permitir ciertos formatos de archivo
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<script> alert('Lo siento solo se permiten archivos en formato de imagen');window.location= 'admin.php' </script>";
    $uploadOk = 0;
}

// Verificar si $uploadOk es 0 por algún error
if ($uploadOk == 0) {
    echo "<script> alert('Lo siento tu archivo no fue subido');window.location= 'admin.php' </script>";
// Si todo está bien, intenta subir el archivo
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "El archivo ". basename( $_FILES["fileToUpload"]["name"]). " ha sido subido.";
    } else {
        echo "<script> alert('Lo siento hubo un error al subir tu foto');window.location= 'admin.php' </script>";
    }
}
?>
