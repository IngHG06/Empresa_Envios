<!--
	MATERIA: Programación IV
	NOMBRE PROYECTO: Sistema de Gestión de Envíos.
	DESARROLLADO POR: Hiram González V-26164832
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0">
		<title>Crear Usuario - Envíos González C.A.</title>
		<link rel="shortcut icon" type="image/ico" href="../img/favicon.png">
		<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/formularios-style.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/miscelaneo-style.css">
	</head>
	<body>
		
		<?php include_once 'navbarCrear.php'; ?>

		<?php
			require_once('../config/conexion.php');

			if(isset($_POST['nom_ape'])&&isset($_POST['user'])&&isset($_POST['pass'])&&isset($_POST['ver_pass'])&&isset($_POST['direccion'])){
				if($_POST['nom_ape']!=""&&$_POST['user']!=""&&$_POST['pass']!=""&&$_POST['ver_pass']!=""&&$_POST['direccion']!=""){

					$nomape = $_POST['nom_ape'];
					$user = $_POST['user'];
					if(strcmp($_POST['pass'],$_POST['ver_pass'])==0){
						$pass = md5($_POST['pass']);
					}else{
						echo "<script language='javascript'>alert('Las contraseñas "
	                		  . "no coinciden. Intente de nuevo.')</script>";
						header('location: ../login.php');
					}
					$tipo = 1;
					$direccion = $_POST['direccion'];
					$saldo = "0";
					$descuento = 0;

					$query = "INSERT INTO usuarios (nom_ape,user,pass,cuenta,direccion,saldo,descuento) VALUES (?,?,?,?,?,?,?)";

					if ($sentencia = mysqli_prepare($enlace, $query)) {
						mysqli_stmt_bind_param($sentencia, "sssissi",$nomape,$user,$pass,$tipo,$direccion,$saldo,$descuento);
						mysqli_stmt_execute($sentencia);
			            mysqli_stmt_close($sentencia);
                        echo "<script>alert('Cuenta creada con éxito.'), window.location.href='../login.php'</script>";
					}
				}else{
                    echo "<script>alert('No se han introducido datos en los campos. Intente de nuevo.')</script>";
				}
			}

			require_once('../config/cerrar.php');
		?>

		<div class="container mod">
			<h2 class="titulo">Ingrese los siguientes datos:</h2>
			<hr class="linea">
			<section>
				<center>
					<div id="envoltura">      
		                <div id="cuerpo">
		                    <form id="form-login" action="crearU.php" method="POST" autocomplete="off" role="form" class="form-inline">
		                    	<div class="form-group op">
	                    			<input class="form-control" type="text" name="nom_ape" placeholder="Nombre y Apellido" autofocus="">
	                    			<input class="form-control" type="text" name="user" placeholder="Usuario">
	                    			<input class="form-control" type="password" name="pass" placeholder="Contraseña">
		                    	</div>
		                    	<br>
		                    	<br>
		                    	<div class="form-group op">
		                    		<input class="form-control" type="password" name="ver_pass" placeholder="Verificar contraseña">
	                           		<input class="form-control" type="text" name="direccion" placeholder="Direccion">
		                       	</div>
		                       	<br>
		                       	<br>
		                        <div class="form-group">
		                        	<input type="submit" class="btn btn-primary" name="submit" value="Crear usuario" class="boton">
		                        </div>
		                    </form>
		                </div>
		            </div>
	        	</center>
	        </section>
		</div>

		<footer class="footer">
			<p><small><em>© 2017 Hiram González, C.I: V-26164832. La Vecindad, Isla de Margarita, Nueva Esparta - Venezuela.</em></small></p>
		</footer>

		<script src="../js/jquery.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>

	</body>
</html>