<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FotoHogar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Conexion fallida: " . $conn->connect_error);
}

$sql = "UPDATE Inmuebles SET opcion='Alquiler' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "Datos actualizados con exito";
} else {
  echo "Error actualizando datos: " . $conn->error;
}

$conn->close();
?>