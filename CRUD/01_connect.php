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
echo "Conexion exitosa";
?> 