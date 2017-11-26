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
		<title>Inicio de Sesión - Envíos González C.A.</title>
		<link rel="shortcut icon" type="image/ico" href="img/favicon.png">
		<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/login-style.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		
		<?php
			session_start();
            if(isset($_SESSION["invalid"])){
            	echo "<script language='javascript'>alert('Usuario y/o Contraseña "
                . "incorrectas. Intente de nuevo.')</script>";
            }elseif (isset($_SESSION["non_data"])) {
            	echo "<script language='javascript'>alert('No se han introducido datos en los campos.')</script>";
            }
            session_destroy();
		?>

		<header class="header">
			<img src="img/banne-login.png" alt="Banner para el Login" class="banner">
		</header>

		<section>
			<h1 class="titulo">Bienvenido al Sistema de Gestión de Envíos</h1>
			<div class="container-fluid">
				<center>
					<div id="envoltura">      
		                <div id="cuerpo">
		                    <form id="form-login" action="config/check.php" method="POST" autocomplete="off" role="form" class="form-inline">
		                    	<div class="form-group">
		                    		<div class="col-lg-5">
		                    			<input class="form-control" type="text" id="usuario" name="username" placeholder="Usuario" autofocus="" required="">
		                    		</div>
		                    	</div>
		                    	<br>
		                    	<br>
		                    	<div class="form-group">
		                    		<div class="col-lg-5">
		                           		<input class="form-control" type="password" id="contrasenia" name="password" placeholder="Contraseña" required="">
		                           	</div>
		                       	</div>
		                       	<br>
		                       	<a href="formularios/crearU.php" class="crear"><small><em>Crear cuenta</em></small></a>
		                       	<br>
		                       	<br>
		                        <div class="form-group">
		                        	<input type="submit" class="btn btn-primary" name="submit" value="Ingresar" class="boton">
		                        </div>
		                    </form>
		                </div>
		            </div>
	        	</center>
			</div>
		</section>

		<footer class="footer">
			<p><small><em>© 2017 Hiram González, C.I: V-26164832. La Vecindad, Isla de Margarita, Nueva Esparta - Venezuela.</em></small></p>
		</footer>

		<script src="js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>

	</body>
</html>