<?php
	session_start();
	if (isset($_SESSION['email'])){
		header("Location: panel.php");
	}
	include 'credenciales.php';
	$msg="";
	if(isset($_GET['btn'])){
		$email = $_GET['email'];
		$pass = $_GET['password'];
		if($email=="admin@server.com" && $pass=="serveradmin"){
			$msg="Bienvenido";
			session_start();
			$_SESSION['email']="admin@server.com";
			$_SESSION['password']="serveradmin";
			header("Location: paneladmin.php");
		}
		$con = mysqli_connect(HOST,USER,PASS,DB);
		$ssql="SELECT * FROM usuarios";
		$response= mysqli_query($con,$ssql);
		if(mysqli_num_rows($response)>0){
			while($fila=mysqli_fetch_array($response,MYSQLI_ASSOC)){
				//var_dump($fila);
				if ($fila["email"]==$email && $fila["password"]==$pass){
					$msg="Bienvenido";
					session_start();
					$_SESSION['idUsuario']=$fila['idUsuario'];
					$_SESSION['email']=$email;
					$_SESSION['password']=$password;
					header("Location: panel.php");
				}else{
					$msg="Usuario y/o clave incorrectos";
				}
			}
		}else{
			$msg="Los datos no existen, registrate nuevamente";
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CLASE 13</title>
</head>
<body bgcolor="lightblue">
	<center>
		<h1>IAN SCHENZLE</h1>
		<h2>Iniciar Sesion</h2>
		<form method="GET">
			<input type="text" name="email" placeholder="Email">
			<br>
			<input type="password" name="password" placeholder="Contraseña">
			<br>
			<input type="submit" name="btn" value="Ingresar">
		</form>
		¿Aun no te registraste?<a href="register.php"> Registrarte </a>
		<div>
		<?php
			echo $msg;
		?>
	</div>
	</center>
</body>
</html>