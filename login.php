<?php
session_start();
  
include('conexion.php');

$usu = $_POST["usuario"];
$pass = $_POST["password"];

$query = $conn->query("SELECT p.*, t.nombre_tip FROM personas p,tipopersonas t WHERE p.documento_per ='$usu' and p.password_per= '$pass' and p.codigo_tip = t.codigo_tip");
$filas = $query->num_rows;
//die (var_dump (mysqli_num_rows($query)));
if ($filas == 0) {
   
    echo "<script> alert('Usuario o contraseña incorrecta.');window.location= 'index.html' </script>";

} else {
   
    $row = mysqli_fetch_object($query);
    $rol = $row->codigo_tip;
    $status = $row->estado_per; 
    $_SESSION['tipo'] = $row->codigo_tip;

    if ($status !== 'Inactivo') {

        if ($rol == 1) {
            // Código para el rol de estudiante
            $_SESSION['id_per'] = $row->id_per;
            $_SESSION['privilegios'] = 'estudiante';
            $_SESSION['nombre'] = $row->nombre_per;
            $_SESSION['rol'] = $row->nombre_tip;
            $_SESSION['tipo'] = $row->codigo_tip;
            $_SESSION['documento_per'] = $row->documento_per;
            $ruta_imagen_usuario = $row->foto_per;
            // Guardar la ubicación de la imagen en la sesión
            $_SESSION['imagen'] = $ruta_imagen_usuario;
            header('Location: admin.php');
           
    
        } elseif ($rol == 2) {

            $_SESSION['id_per'] = $row->id_per;
            $_SESSION['privilegios'] = 'profesor';
            $_SESSION['nombre'] = $row->nombre_per;
            $_SESSION['rol'] = $row->nombre_tip;
            $_SESSION['tipo'] = $row->codigo_tip;
            $_SESSION['documento_per'] = $row->documento_per;
            $ruta_imagen_usuario = $row->foto_per;
            // Guardar la ubicación de la imagen en la sesión
            $_SESSION['imagen'] = $ruta_imagen_usuario;
            header('Location: admin.php');
            
    
        } elseif ($rol == 3) {

            $_SESSION['id_per'] = $row->id_per;
            $_SESSION['privilegios'] = 'Admin';
            $_SESSION['nombre'] = $row->nombre_per;
            $_SESSION['rol'] = $row->nombre_tip;
            $_SESSION['tipo'] = $row->codigo_tip;
            $_SESSION['documento_per'] = $row->documento_per;
            $_SESSION['imagen'] = $row->foto_per;
            header('Location: admin.php');
            
        }
    } else {
        
        echo "<script> alert('Su usuario actualmente se encuentra en estado inactivo.');
                        window.location= 'index.html' 
                </script>";
    }
}
?>
