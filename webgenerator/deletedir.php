<?php
	if (isset($_GET["btnBorrar"])) {
		shell_exec("rm -r ../".$_GET["dir"]);
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Borrar Carpeta</title>
</head>
<body>
	<center>
	<form method="GET">
		<input type="text" name="dir" placholder="Carpeta a borrar">
		<input type="submit" name="btnBorrar" value="Borrar">
	</form>
	</center>
</body>
</html>