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

$sql = "INSERT INTO Inmuebles (id, id_ref, nombre, opcion, tipo, m2, precio, habs, banys, ascensor, fechapubli)
VALUES (1, '1526AB', 'Chalet en Madrid', 'Venta', 'Chalet', 150, 152.000, 5, 2, 0, '10/12/2023'),
(2, '1527AB', 'Piso en Barcelona', 'Alquiler', 'Casa', 100, 105.000, 4, 2, 1, '11/12/2023'),
(3, '1528AB', 'Casa en Valencia', 'Obra Nueva', 'Casa', 120, 132.000, 4, 3, 0, '10/12/2023')";

if ($conn->query($sql) === TRUE) {
  echo "Se han añadido datos con exito";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 