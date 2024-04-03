<?php
//including the database connection file
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM inmuebles ORDER BY id DESC"); 
?>
<html>
<head>	
	<title>Pagina de inicio</title>
</head>

<body>
<a href="add.html">Nuevo registro</a><br/><br/>
    <table width='95%' border=1>

	    <tr bgcolor='#CCCCCC'>
            <td>ID</td>
		    <td>Reg.Catastro</td>
		    <td>Descripcion</td>
		    <td>Opcion</td>
            <td>Tipo</td>
            <td>Metros Cuadrados</td>
            <td>Precio</td>
            <td>Habitaciones</td>
            <td>Baños</td>
            <td>Ascensor</td>
            <td>Publicado</td>
	    </tr>
        <?php
        while($res = mysqli_fetch_array($result)) { 		
            echo "<tr>";
            echo "<td>".$res['id']."</td>";
            echo "<td>".$res['id_ref']."</td>";
            echo "<td>".$res['descripcion']."</td>";
            echo "<td>".$res['opcion']."</td>";
            echo "<td>".$res['tipo']."</td>";
            echo "<td>".$res['m2']."</td>";	
            echo "<td>".$res['precio']."</td>";
            echo "<td>".$res['habs']."</td>";
            echo "<td>".$res['banys']."</td>";
            echo "<td>".$res['ascensor']."</td>";
            echo "<td>".$res['publicado']."</td>";
            echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('¿Estas seguro de querer eliminarlo?')\">Borrar</a></td>";		
        }
        ?>
    </table>
</body>
</html> 
