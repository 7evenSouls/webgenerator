<?php
	session_start();
	if (!isset($_SESSION["email"])){
		header("Location: login.php");
	}
	if(isset($_GET["zip"])){
		shell_exec('zip ../'.$_GET["zip"].'.zip ../'.$_GET["zip"]);
		header("Location: ../".$_GET["zip"].'.zip');
	}
?>