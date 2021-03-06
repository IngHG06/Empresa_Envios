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
		<title>Pedidos - Envíos González C.A.</title>
		<link rel="shortcut icon" type="image/ico" href="../img/favicon.png">
		<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/opciones-style.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/miscelaneo-style.css">
	</head>
	<body>
		
		<?php include_once 'navbarA.php'; ?>
		
		<div class="container">
			<div class="opciones">
				<div class="nav1">
					<form method="post">
						<input type="button" name="ingresar" value="Nuevo Pedido" class="btn btn-secundary ingresar" id="nuevo">
					</form>
					<form method="post">
						<input type="hidden" name="all" value="true" id="all">
						<input type="button" name="enviar" value="Mostrar todos" class="btn btn-secundary" id="mostrar">
					</form>
				</div>
				<form method="post" autocomplete="off" role="form" class="form-inline">
					<div class="from-group">
						<input type="text" name="code" placeholder="Código del Pedido" class="form-control" id="code">
						<input type="button" name="enviar" value="Buscar" class="btn btn-secundary" id="mostrarI">
					</div>
				</form>
			</div>
			<div class="table-responsive" id="table">
				<table class="table table-bordered table-hover">
					<thead>
						<th class="info">Código Pedido</th>
						<th class="info">Id Cliente</th>
					    <th class="info">Estatus</th>
					    <th class="info">Dirección de Envío</th>
					    <th class="info">Transporte</th>
					    <th class="info">Precio</th>
					    <th class="info" colspan="2">Opciones</th>
					</thead>
					<tbody id="salida">
					</tbody>
				</table>
			</div>
            <div id="formularios"></div>
		</div>

		<footer class="footer">
			<p><small><em>© 2017 Hiram González, C.I: V-26164832. La Vecindad, Isla de Margarita, Nueva Esparta - Venezuela.</em></small></p>
		</footer>

		<script src="../js/jquery.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/mostrarP_A.js"></script>
        <script src="../js/formulariosP_A.js"></script>

	</body>
</html>
<?php 
	}else{
		header('location: ../login.php');
	}
 ?>