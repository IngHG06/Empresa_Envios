<?php
	/*
		MATERIA: Programación IV
		NOMBRE PROYECTO: Sistema de Gestión de Envíos.
		DESARROLLADO POR: Hiram González V-26164832
	*/

	require_once('../config/conexion.php');

	if(isset($_GET['cod'])){

		$cod = $_GET['cod'];

		$query = "DELETE FROM transportes WHERE cod_transporte = ?";

		if ($sentencia = mysqli_prepare($enlace, $query)) {
			mysqli_stmt_bind_param($sentencia, "s",$cod);
			mysqli_stmt_execute($sentencia);
            mysqli_stmt_close($sentencia);
            echo "<script>alert('Transporte eliminado exitosamente.'), window.location.href='../admin/transportesA.php'</script>";
		}
	}

	require_once('../config/cerrar.php');

?>