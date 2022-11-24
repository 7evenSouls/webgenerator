<?php
	include 'credenciales.php';
	$con = mysqli_connect(HOST,USER,PASS,DB);
	$ssql="SELECT * FROM webs";
	$response= mysqli_query($con,$ssql);
	$lista="<table>";
	while($fila=mysqli_fetch_array($response,MYSQLI_ASSOC)){
		$lista.='<tr>
					<td>
						<a href="../'.$fila["dominio"].'">'.$fila["dominio"].'</a>
					</td>
				</tr>';
		
	}
	$lista.="</table>"
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> CLASE 13 </title>
</head>
<body>
	<center>
	<h1>Bienvenido Admin</h1><br>
	<a href="logout.php">Cerrar sesión</a><br><br>
	<?php echo $lista;?>
	</center>
</body>
</html>