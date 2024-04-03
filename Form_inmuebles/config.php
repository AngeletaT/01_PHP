<?php
$databaseHost = 'localhost';
$databaseName = 'FotoHogar';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
if ($mysqli->connect_error) {
    die("Conexion fallida: " . $mysqli->connect_error);
  }
  echo "Se ha conectado a base de datos";
?>
<br></br> 