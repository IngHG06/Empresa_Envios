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
		<title>Inicio - Envíos González C.A.</title>
		<link rel="shortcut icon" type="image/ico" href="../img/favicon.png">
		<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/index-style.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/miscelaneo-style.css">
	</head>
	<body>
		<div class="container-fluid">
			<header>
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
								<span class="sr-only">Menú</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="indexA.php" class="navbar-brand"><img src="../img/favicon.png" alt="Brand">Envíos González</a>
						</div>
						<div class="collapse navbar-collapse navbar-right" id="navbar-1">
							<ul class="nav navbar-nav navbar_right">
								<li><a href="../formularios/datosA.php">Datos de Cuenta</a></li>
								<li><a href="../logout.php">Cerrar Sesión</a></li>
							</ul>
						</div>
						
					</div>
				</nav>
			</header>
		</div>

		<div class="container">
			<section>
				<div class="div1">
					<figure>
						<a href="usuariosA.php">
							<center>
								<img src="../img/user.png" alt="">
								<figcaption>Usuarios</figcaption>
							</center>
						</a>
					</figure>
					<figure>
						<a href="pedidosA.php">
							<center>
								<img src="../img/pedidos.png" alt="">
								<figcaption>Pedidos</figcaption>
							</center>
						</a>
					</figure>
				</div>
				<div class="div2">
					<figure>
						<a href="articulosA.php">
							<center>
								<img src="../img/articulo.png" alt="">
								<figcaption>Artículos</figcaption>
							</center>
						</a>
					</figure>
					<figure>
						<a href="transportesA.php">
							<center>
								<img src="../img/transporte.png" alt="">
								<figcaption>Transportes</figcaption>
							</center>
						</a>
					</figure>
				</div>
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