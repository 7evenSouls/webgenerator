<?php
	session_start();
	include 'credenciales.php';
	if (!isset($_SESSION["email"])){
		header("Location: login.php");
	}
	if (isset($_GET["dominio"])) {
		shell_exec('rm -r '.$_GET["dominio"]);
		$con=mysqli_connect(HOST,USER,PASS,DB);
		$sql='DELETE FROM `webs` WHERE `webs`.`dominio`="'.$_GET["dominio"].'"';
		mysqli_query($con,$sql);
		header('Location: panel.php');
	}
?>

