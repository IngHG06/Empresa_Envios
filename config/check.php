<?php

	session_start();
	require_once("conexion.php");

	if (isset($_POST['username']) && isset($_POST['password'])) {
		if ($_POST['username']!="" && $_POST['password']!="") {
			
			$user = $_POST['username'];
			$pass = md5($_POST['password']);

			$query = "SELECT id, user, pass, cuenta FROM usuarios WHERE user = ? AND pass = ?";

			if ($sentencia = mysqli_prepare($enlace, $query)) {
				mysqli_stmt_bind_param($sentencia, "ss", $user, $pass);
				mysqli_stmt_execute($sentencia);
				mysqli_stmt_store_result($sentencia);
				mysqli_stmt_bind_result($sentencia, $id, $nombre, $clave, $cuenta);
				$rowCount = mysqli_stmt_num_rows($sentencia);
				if ($rowCount > 0) {
					while (mysqli_stmt_fetch($sentencia)) {
						$_SESSION['id'] = $id;
						$_SESSION['user'] = $nombre;
						$_SESSION['pass'] = $clave;
						$_SESSION['cuenta'] = $cuenta;
					}
					if($_SESSION['cuenta'] == 1){
						header('Location: ../cliente/indexC.php');
					}else if ($_SESSION['cuenta'] == 0){
						header('Location: ../admin/indexA.php');
					}
				}else{
					$_SESSION["invalid"] = true;
					header('Location: ../login.php');
				}
				mysqli_stmt_close($sentencia);
			}
		}else{
			$_SESSION["non_data"] = true;
            header('Location: ../login.php');
		}
	}

	require_once("cerrar.php");

?>