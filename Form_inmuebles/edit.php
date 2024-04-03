<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);

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
	} else {	
		//Actualizar la tabla
		$result = mysqli_query($mysqli, "UPDATE `inmuebles` SET `id_ref`='$id_ref',`descripcion`='$descripcion',`opcion`='$opcion',`tipo`='$tipo',`m2`='$m2',`precio`='$precio',`habs`='$habs',`banys`='$banys',`ascensor`='$ascensor',`publicado`='$publicado'  WHERE id=$id");
		
		header("Location: index.php");
	}
}
?>
<?php
// Obtener id desde la URL

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "SELECT * FROM inmuebles WHERE id=$id");
    
	while($res = mysqli_fetch_array($result))
	{
		$id_ref = $res['id_ref'];
		$descripcion = $res['descripcion'];
		$opcion = $res['opcion'];
		$tipo = $res['tipo'];
		$m2 = $res['m2'];
		$precio = $res['precio'];
		$habs = $res['habs'];
		$banys = $res['banys'];
		$ascensor = $res['ascensor']; 
		$publicado = $res['publicado'];
	}

} else {
    echo "Error: No se proporcionó un ID válido.";
}
?>

<html>
<head>	
	<title>Editar Datos</title>
</head>

<body>
	<a href="index.php">Inicio</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
            <tr> 
				Referencia Catastral: 
				<input type="text" name="id_ref" value="<?php echo $id_ref;?>">
				<span class="error">* </span>
  				<br></br>
			</tr>
			<tr> 
				Descripcion: 
				<input type="text" name="descripcion" value="<?php echo $descripcion;?>">
				<span class="error">* </span>
				<br></br>
			</tr>
			<tr> 
				Opcion:
				<span class="error">* </span>
				<br></br>
				<input type="radio" name="opcion" <?php if (isset($opcion) && $opcion=="Casa") echo "checked";?> value = "Casa">Casa
				<input type="radio" name="opcion" <?php if (isset($opcion) && $opcion=="Piso") echo "checked";?> value = "Piso">Piso
				<input type="radio" name="opcion" <?php if (isset($opcion) && $opcion=="Local") echo "checked";?> value = "Local">Local  
				<input type="radio" name="opcion" <?php if (isset($opcion) && $opcion=="Trastero") echo "checked";?> value = "Trastero">Trastero
				<input type="radio" name="opcion" <?php if (isset($opcion) && $opcion=="Garaje") echo "checked";?> value = "Garaje">Garaje
				<input type="radio" name="opcion" <?php if (isset($opcion) && $opcion=="Terreno") echo "checked";?> value = "Terreno">Terreno
				<br></br>
			</tr>
			<tr>
				Tipo:
				<span class="error">* </span>
				<br></br>
				<select name = "tipo[]" size = "4">
					<option value="Venta" <?php if (isset($tipo) && $tipo=="Venta") echo "selected";?>> Venta</option>
					<option value="Alquiler" <?php if (isset($tipo) && $tipo=="Alquiler") echo "selected";?>> Alquiler</option>
					<option value="Nueva" <?php if (isset($tipo) && $tipo=="Nueva") echo "selected";?>> Obra nueva</option>
					<option value="Compartir"<?php if (isset($tipo) && $tipo=="Compartir") echo "selected";?>> Compartir</option>
				</select>
				<br></br>
			</tr>
			<tr>
				Metros cuadrados:
				<input type="number" name="m2" value="<?php echo $m2;?>">
				<span class="error">* </span>
				<br></br>
			</tr>
			<tr>
				Precio:
				<input type="number" name="precio" value="<?php echo $precio;?>">
				<span class="error">* </span>
				<br></br>
			</tr>
			<tr>
				Habitaciones:
				<input type="number" name="habs" value="<?php echo $habs;?>">
				<span class="error">* </span>
				<br></br>
			</tr>
			<tr>
				Banyos:
				<input type="number" name="banys" value="<?php echo $banys;?>">
				<span class="error">* </span>
				<br></br>
			</tr>
			<tr>
				Ascensor:
				<span class="error">* </span>
				<br></br>
				Si: <input type="checkbox" name="ascensor[]" value="1" <?php if (isset($ascensor) && $ascensor=="1") echo "checked";?>>
				No: <input type="checkbox" name="ascensor[]" value="0" <?php if (isset($ascensor) && $ascensor=="0") echo "checked";?>>
				<br></br>
			</tr>
			<tr>
				Fecha de Publicacion: 
				<input type="text" name="publicacion" id="fecha_publi" value="<?php echo $publicado;?>">
				<span class="error">* </span>
				<br></br>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Actualizar"></td>
			</tr>

        </table>
	</form>
</body>
</html> 
