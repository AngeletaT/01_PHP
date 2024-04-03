<?php
include("config.php");

$id = $_GET['id'];
echo $id;
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM Inmuebles WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
