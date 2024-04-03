<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Conexion fallida: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE FotoHogar";
if ($conn->query($sql) === TRUE) {
  echo "Base de datos creada con exito";
} else {
  echo "Error creando la base de datos: " . $conn->error;
}

$conn->close();
?>