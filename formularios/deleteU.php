<?php
	/*
		MATERIA: Programación IV
		NOMBRE PROYECTO: Sistema de Gestión de Envíos.
		DESARROLLADO POR: Hiram González V-26164832
	*/

	require_once('../config/conexion.php');

		if(isset($_GET['id'])){

			$id = $_GET['id'];

			$query = "DELETE FROM usuarios WHERE id = ?";

			if ($sentencia = mysqli_prepare($enlace, $query)) {
				mysqli_stmt_bind_param($sentencia, "i",$id);
				mysqli_stmt_execute($sentencia);
	            mysqli_stmt_close($sentencia);
                echo "<script>alert('Usuario eliminado exitosamente.'), window.location.href='../admin/usuariosA.php'</script>";
			}
		}

		require_once('../config/cerrar.php');

?>