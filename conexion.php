<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_semillero_sinergy";


$conn = new mysqli('localhost', 'root','','db_semillero_sinergy',3307);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
    
} else {
    return $conn;
}

?>