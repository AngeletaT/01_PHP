<html>
<head>
	<title>Nuevo registro</title>
</head>

<body>
<?php
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$id_ref = mysqli_real_escape_string($mysqli, $_POST['id_ref']);
	$descripcion = mysqli_real_escape_string($mysqli, $_POST['descripcion']);
	$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : [];
	$tipo = isset($_POST['tipo']) && is_array($_POST['tipo']) ? implode(', ', $_POST['tipo']) : '';
	$m2 = mysqli_real_escape_string($mysqli, $_POST['m2']);
	$precio = mysqli_real_escape_string($mysqli, $_POST['precio']);
	$habs = mysqli_real_escape_string($mysqli, $_POST['habs']);
	$banys = mysqli_real_escape_string($mysqli, $_POST['banys']);
	$ascensor = isset($_POST['ascensor']) ? 1 : 0; // 1 si está marcado, 0 si no lo está
	$publicado = isset($_POST['publicacion']) ? $_POST['publicacion'] : '';
		
	if(empty($id_ref) || empty($descripcion) || empty($opcion) || empty($tipo) || empty($m2) || empty($precio) || empty($habs) || empty($banys) || empty($publicado)) {
				
		if(empty($id_ref)) {
			echo "<font color='red'>Registro Catastral es obligatorio.</font><br/>";
		}
		if(empty($descripcion)) {
			echo "<font color='red'>Descripcion es obligatorio.</font><br/>";
		}
		if(empty($opcion)) {
			echo "<font color='red'>Elige una opcion, es obligatorio.</font><br/>";
		}
		if(empty($tipo)) {
			echo "<font color='red'>Elige un tipo, es obligatorio.</font><br/>";
		}
		if(empty($m2)) {
			echo "<font color='red'>Metros cuadrados son obligatorios.</font><br/>";
		}
		if(empty($precio)) {
			echo "<font color='red'>Precio es obligatorio.</font><br/>";
		}
		if(empty($habs)) {
			echo "<font color='red'>Numero de habitaciones es obligatorio.</font><br/>";
		}
		if(empty($banys)) {
			echo "<font color='red'>Numero de banyos es obligatorio.</font><br/>";
		}
		if(empty($publicado)) {
			echo "<font color='red'>Poner la fecha de publicación es obligatorio.</font><br/>";
		} else if(!preg_match("/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/",$publicado)){
			echo "<font color='red'>La fecha no es valida.</font><br/>";
		}
	echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
	} else { 	
		//añadir datos a la base de datos
		$result = mysqli_query($mysqli, "INSERT INTO `inmuebles`(`id_ref`, `descripcion`, `opcion`, `tipo`, `m2`, `precio`, `habs`, `banys`, `ascensor`, `publicado`) 
		VALUES ('$id_ref', '$descripcion', '$opcion', '$tipo', '$m2', '$precio', '$habs', '$banys', '$ascensor', '$publicado')");
		
		//display success message
		echo "<font color='green'>El registro de tu propiedad de ha realizado correctamente.";
		echo "<br/><a href='index.php'>Ver Resultado</a>";
	}
}
?>
</body>
</html>