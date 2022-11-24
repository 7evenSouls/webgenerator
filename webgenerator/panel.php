<?php
	session_start();
	include 'credenciales.php';
	if (!isset($_SESSION["email"])){
		header("Location: login.php");
	}
	$msg="";
	if(isset($_POST["btnCrearWeb"])){
		if($_POST["dominio"]==""){
			$msg="Complete los campos";
		}else{
			$dominio=$_SESSION['idUsuario'].$_POST["dominio"];
			$con = mysqli_connect(HOST,USER,PASS,DB);
			$ssql="SELECT * FROM webs";
			$response= mysqli_query($con,$ssql);
			$ver=true;
			while($fila=mysqli_fetch_array($response,MYSQLI_ASSOC)){
				if ($fila["dominio"]==$dominio){
					$msg="Este dominio ya existe";
					$ver=false;
				}
			}
			if($ver){
				$date=date("Y-m-d");
				$sql='INSERT INTO webs(idUsuario,dominio,fechaCreacion) VALUES ("'.$_SESSION["idUsuario"].'","'.$dominio.'","'.$date.'")';
				if (mysqli_query($con, $sql)) {
      				$msg="El dominio se creo con exito";
      				shell_exec('../wix.sh ../'.$dominio);
      				//header("Location: login.php");
				} else {
      				$msg="Error: ".$sql."<br>".mysqli_error($con);
				}
			}
		}
	}

	//listar webs
	$con = mysqli_connect(HOST,USER,PASS,DB);
	$ssql="SELECT * FROM webs";
	$response= mysqli_query($con,$ssql);
	$lista="<table>";
	while($fila=mysqli_fetch_array($response,MYSQLI_ASSOC)){
		if ($fila["idUsuario"]==$_SESSION["idUsuario"]){
			$lista.='
			<tr>
			<td>
				<a href="../'.$fila["dominio"].'">'.$fila["dominio"].'</a>
			</td>
			<td>
				<a href="zip.php?zip='.$fila["dominio"].'">
					Descargar <br>
				</a>
			</td>
			<td>
				<a href="delete.php?dominio='.$fila["dominio"].'">
					Eliminar <br>
				</a>
			</td>
			</tr>';
		}
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
		<h1>Bienvenido a tu panel</h1>
		<a href="logout.php">Cerrar sesión de <?php echo $_SESSION['idUsuario'];?></a><br><br>
		<label for="formulario"><h3> Generar Web de: </h3></label>
			<form method="POST" id="formulario">
				<input type="text" name="dominio" placeholder="Nombre de la web"></input>
				<br>
				<input type="submit" name="btnCrearWeb" value="Crear Web">
				<br>
			</form>
		<div><?php echo $msg;?></div><br>
		<?php echo $lista;?>
	</center>
</body>
</html>