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

// sql to delete a record
$sql = "DELETE FROM Inmuebles WHERE id=3";

if ($conn->query($sql) === TRUE) {
  echo "Datos borrados con exito";
} else {
  echo "Error borrando datos: " . $conn->error;
}

$conn->close();
?>