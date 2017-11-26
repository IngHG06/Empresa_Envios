<!--
	MATERIA: Programación IV
	NOMBRE PROYECTO: Sistema de Gestión de Envíos.
	DESARROLLADO POR: Hiram González V-26164832
-->
<?php 
	session_start(); 
	if(isset($_SESSION['user'])&&isset($_SESSION['pass'])&&$_SESSION['cuenta']==0)
	{
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0">
		<title>Ingresar Usuarios - Envíos González C.A.</title>
		<link rel="shortcut icon" type="image/ico" href="../img/favicon.png">
		<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/formularios-style.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/miscelaneo-style.css">
	</head>
	<body>
		
		<?php include_once 'navbarF.php'; ?>

		<?php
			require_once('../config/conexion.php');

			if(isset($_POST['nom_ape'])&&isset($_POST['user'])&&isset($_POST['pass'])&&isset($_POST['tipo'])&&isset($_POST['direccion'])&&isset($_POST['saldo'])&&isset($_POST['descuento'])){

				$nomape = $_POST['nom_ape'];
				$user = $_POST['user'];
				$pass = md5($_POST['pass']);
				$tipo = $_POST['tipo'];
				$direccion = $_POST['direccion'];
				$saldo = $_POST['saldo'];
				$descuento = $_POST['descuento'];

				$query = "INSERT INTO usuarios (nom_ape,user,pass,cuenta,direccion,saldo,descuento) VALUES (?,?,?,?,?,?,?)";

				if ($sentencia = mysqli_prepare($enlace, $query)) {
					mysqli_stmt_bind_param($sentencia, "sssissi",$nomape,$user,$pass,$tipo,$direccion,$saldo,$descuento);
					mysqli_stmt_execute($sentencia);
		            mysqli_stmt_close($sentencia);
		            $_SESSION['result'] = true;
					header('location: ../admin/usuariosA.php');
				}
			}

			require_once('../config/cerrar.php');
		?>

        <div class="container">
            <div class="opciones">
                <form action="../admin/usuariosA.php" method="post">
                    <input type="submit" name="ingresar" value="<- Volver" class="btn btn-secundary ingresar">
                </form>
            </div>
        </div>
		<div class="container mod">
			<h2 class="titulo">Ingrese los siguientes datos:</h2>
			<hr class="linea">
			<section>
				<center>
					<div id="envoltura">      
		                <div id="cuerpo">
		                    <form id="form-login" action="ingresarU.php" method="POST" autocomplete="off" role="form" class="form-inline">
		                    	<div class="form-group op">
	                    			<input class="form-control" type="text" name="nom_ape" placeholder="Nombre y Apellido" autofocus="">
	                    			<input class="form-control" type="text" name="user" placeholder="Usuario">
	                    			<select name="pass" class="form-control">
	                    				<option value="">Elige una contraseña</option>
	                    				<option value="admin1234">Default - Administrador</option>
	                    				<option value="0123456789">Default- Cliente</option>
	                    			</select>
	                    			<select name="tipo" class="form-control">
	                    				<option value="">Nivel de Usuario</option>
	                    				<option value="0">Administrador</option>
	                    				<option value="1">Cliente</option>
	                    			</select>
		                    	</div>
		                    	<br>
		                    	<br>
		                    	<div class="form-group op">
	                           		<input class="form-control" type="text" name="direccion" placeholder="Direccion">
	                           		<input class="form-control" type="text" name="saldo" placeholder="Saldo">
	                           		<select name="descuento" class="form-control">
	                           			<option value="">Descuento a aplicar</option>
	                           			<option value="5">5%</option>
	                           			<option value="10">10%</option>
	                           			<option value="15">15%</option>
	                           			<option value="20">20%</option>
	                           		</select>
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
<?php 
	}else{
		header('location: ../login.php');
	}
?>