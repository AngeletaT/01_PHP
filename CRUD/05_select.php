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

$sql = "SELECT id_ref, nombre, tipo FROM Inmuebles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id_ref: " . $row["id_ref"]. " - Name: " . $row["nombre"]. " - Tipo: " . $row["tipo"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?> 