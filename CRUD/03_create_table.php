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

// sql to create table
$sql = "CREATE TABLE Inmuebles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_ref VARCHAR(5) NOT NULL,
nombre VARCHAR(30) NOT NULL,
opcion VARCHAR(30) NOT NULL,
tipo VARCHAR(30) NOT NULL,
m2 INT(50) NOT NULL,
precio INT(50) NOT NULL,
habs INT(50) NOT NULL,
banys INT(50) NOT NULL,
ascensor TINYINT(0) NOT NULL,
fechapubli VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Tabla Inmuebles creada con exito";
} else {
  echo "Error creando la tabla: " . $conn->error;
}

$conn->close();
?>