<?php
	session_start();
	if (isset($_SESSION['email'])){
		header("Location: panel.php");
	}
	include 'credenciales.php';
	$msg="";
	if(isset($_POST["btn"])){
		$email = $_POST['email'];
		$pass1 = $_POST['password1'];
		$pass2 = $_POST['password2'];
		$con = mysqli_connect(HOST,USER,PASS,DB);
		$ssql="SELECT * FROM usuarios";
		$response= mysqli_query($con,$ssql);
		$ver=true;
		//var_dump($response);
		if(mysqli_num_rows($response)>0){
			while($fila=mysqli_fetch_array($response,MYSQLI_ASSOC)){
				if ($fila["email"]==$email){
					$msg="Este mail ya existe";
					$ver=false;
				}
			}
			if($ver){
				if($pass1!=$pass2){
					$msg="Las contraseñas no son iguales";
				}else{
					$date=date("Y-m-d");
					$sql='INSERT INTO usuarios(email,password,fechaRegistro) VALUES ("'.$email.'","'.$pass1.'","'.$date.'")';
					if (mysqli_query($con, $sql)) {
      					$msg="Usuario creado con exito";
      					header("Location: login.php");
					} else {
      					$msg="Error: ".$sql."<br>".mysqli_error($con);
					}
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrarse</title>
</head>
<body>
	<center>
	<h1>Registrarse</h1>
	<form method="POST">
		<input type="text" name="email" placeholder="Email">
		<br>
		<input type="password" name="password1" placeholder="Contraseña">
		<br>
		<input type="password" name="password2" placeholder="Repite contraseña">
		<br>
		<input type="submit" name="btn" value="Registrarse">
	</form>
	<div>
		<?php
			echo $msg;
		?>
	</div>
	</center>
</body>
</html>