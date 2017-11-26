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
		<title>Transporte - Envíos González C.A.</title>
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
					<form action="../formularios/ingresarT.php" method="post">
						<input type="submit" name="ingresar" value="Nuevo Transporte" class="btn btn-secundary ingresar">
					</form>
					<form action="transportesA.php" method="post">
						<input type="hidden" name="all" value="true">
						<input type="submit" name="enviar" value="Mostrar todos" class="btn btn-secundary">
					</form>
				</div>
				<form action="transportesA.php" method="post" autocomplete="off" role="form" class="form-inline">
					<div class="from-group">
						<input type="text" name="code" placeholder="Código del Transporte" class="form-control" id="text">
						<input type="submit" name="enviar" value="Buscar" class="btn btn-secundary">
					</div>
				</form>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<th class="info">Código Transporte</th>
					    <th class="info">Tipo</th>
					    <th class="info">Color</th>
					    <th class="info">Matrícula</th>
					    <th class="info">Nombre del Conductor</th>
					    <th class="info">Destino</th>
					    <th class="info">Fecha de Salida</th>
					    <th class="info" colspan="2">Opciones</th>
					</thead>
					<tbody>
						<?php 
						require_once('../config/conexion.php');

						if(isset($_POST['all']) && $_POST['all'] == true){

							$query = "SELECT cod_transporte, tipo_transporte, color, matricula, nom_conductor, destino_asig,
									  fecha_salida FROM transportes";

							if ($sentencia = mysqli_prepare($enlace, $query)) {
								mysqli_stmt_execute($sentencia);
								mysqli_stmt_bind_result($sentencia, $codigo, $tipo, $color, $matricula, $nombre, $destino, $fecha);
								while(mysqli_stmt_fetch($sentencia)){
									echo "<tr>";
									    echo "<td>" .$codigo. "</td>";
									    echo "<td>" .$tipo. "</td>";
									    echo "<td>" .$color. "</td>";
									    echo "<td>" .$matricula. "</td>";
									    echo "<td>" .$nombre. "</td>";
									    echo "<td>" .$destino. "</td>";
									    echo "<td>" .$fecha. "</td>";
									    echo "<td class='warning'><a href='../formularios/modificarT.php?cod=".$codigo."'>Modificar</a></td>";
									    echo "<td class='danger'><a href='../formularios/deleteT.php?cod=".$codigo."'>Eliminar</a></td>";
								    echo "</tr>";
								}

								mysqli_stmt_close($sentencia);
							}

						}

						if (isset($_POST['code']) && $_POST['code'] != "") {
							$code = $_POST['code'];

							$query = "SELECT cod_transporte, tipo_transporte, color, matricula, nom_conductor, destino_asig,
									  fecha_salida FROM transportes WHERE cod_transporte = ?";

							if ($sentencia = mysqli_prepare($enlace, $query)) {
								mysqli_stmt_bind_param($sentencia,"s",$code);
								mysqli_stmt_execute($sentencia);
								mysqli_stmt_bind_result($sentencia, $codigo, $tipo, $color, $matricula, $nombre, $destino, $fecha);
								while(mysqli_stmt_fetch($sentencia)){
									echo "<tr>";
									    echo "<td>" .$codigo. "</td>";
									    echo "<td>" .$tipo. "</td>";
									    echo "<td>" .$color. "</td>";
									    echo "<td>" .$matricula. "</td>";
									    echo "<td>" .$nombre. "</td>";
									    echo "<td>" .$destino. "</td>";
									    echo "<td>" .$fecha. "</td>";
									    echo "<td class='warning'><a href='../formularios/modificarT.php?cod=".$codigo."'>Modificar</a></td>";
									    echo "<td class='danger'><a href='../formularios/deleteT.php?cod=".$codigo."'>Eliminar</a></td>";
								    echo "</tr>";
								}

								mysqli_stmt_close($sentencia);
							}
						}

						require_once('../config/cerrar.php');
						?>
					</tbody>
				</table>
			</div>
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