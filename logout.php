<?php
	/*
		MATERIA: Programación IV
		NOMBRE PROYECTO: Sistema de Gestión de Envíos.
		DESARROLLADO POR: Hiram González V-26164832
	*/

	session_start();
  	unset($_SESSION['user']);

	$_SESSION["user"] = FALSE;
	$_SESSION["pass"] = FALSE;
  	session_destroy();
  	header("location: login.php");

?>