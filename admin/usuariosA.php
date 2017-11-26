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
		<title>Usuarios - Envíos González C.A.</title>
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
					<form action="../formularios/ingresarU.php" method="post">
						<input type="submit" name="ingresar" value="Nuevo Usuario" class="btn btn-secundary ingresar">
					</form>
					<form action="usuariosA.php" method="post">
						<input type="hidden" name="all" value="true">
						<input type="submit" name="enviar" value="Mostrar todos" class="btn btn-secundary">
					</form>
				</div>
				<form action="usuariosA.php" method="post" autocomplete="off" role="form" class="form-inline">
					<div class="from-group">
						<input type="text" name="id" placeholder="ID del Ususario" class="form-control" id="text">
						<input type="submit" name="enviar" value="Buscar" class="btn btn-secundary">
					</div>
				</form>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<th class="info">ID Usuario</th>
						<th class="info">Nombre y Apellido</th>
						<th class="info">Usuario</th>
					    <th class="info">Tipo de Cuenta</th>
					    <th class="info">Dirección</th>
					    <th class="info">Saldo</th>
					    <th class="info">Descuento</th>
					    <th class="info" colspan="2">Opciones</th>
					</thead>
					<tbody>
						<?php 
						require_once('../config/conexion.php');

						if(isset($_POST['all'])&&$_POST['all'] == true){
							
							$query = "SELECT id, nom_ape, user, cuenta, direccion, saldo, descuento FROM usuarios";

							if ($sentencia = mysqli_prepare($enlace, $query)) {
								mysqli_stmt_execute($sentencia);
								mysqli_stmt_bind_result($sentencia, $id_res, $nom_ape, $user, $cuenta, $direccion, $saldo, $descuento);
								while(mysqli_stmt_fetch($sentencia)){
									echo "<tr>";
									    echo "<td>" .$id_res. "</td>";
									    echo "<td>" .$nom_ape. "</td>";
									    echo "<td>" .$user. "</td>";
									    echo "<td title='0 = Admin / 1 = Cliente'>" .$cuenta. "</td>";
									    echo "<td>" .$direccion. "</td>";
									    echo "<td>" .$saldo. "</td>";
									    echo "<td>" .$descuento. "</td>";
									    echo "<td class='warning'><a href='../formularios/modificarU.php?id=".$id_res."'>Modificar</a></td>";
									    echo "<td class='danger'><a href='../formularios/deleteU.php?id=".$id_res."'>Eliminar</a></td>";
								    echo "</tr>";
								}
								mysqli_stmt_close($sentencia);
							}
						}

						if (isset($_POST['id']) && $_POST['id'] != "") {
							$id = $_POST['id'];

							$query = "SELECT id, nom_ape, user, cuenta, direccion, saldo, descuento FROM usuarios WHERE id = ?";

							if ($sentencia = mysqli_prepare($enlace, $query)) {
								mysqli_stmt_bind_param($sentencia,"s",$id);
								mysqli_stmt_execute($sentencia);
								mysqli_stmt_bind_result($sentencia, $id_res, $nom_ape, $user, $cuenta, $direccion, $saldo, $descuento);
								while(mysqli_stmt_fetch($sentencia)){
									echo "<tr>";
									    echo "<td>" .$id_res. "</td>";
									    echo "<td>" .$nom_ape. "</td>";
									    echo "<td>" .$user. "</td>";
									    echo "<td title='0 = Admin / 1 = Cliente'>" .$cuenta. "</td>";
									    echo "<td>" .$direccion. "</td>";
									    echo "<td>" .$saldo. "</td>";
									    echo "<td>" .$descuento. "</td>";
									    echo "<td class='warning'><a href='../formularios/modificarU.php?id=".$id_res."'>Modificar</a></td>";
									    echo "<td class='danger'><a href='../formularios/deleteU.php?id=".$id_res."'>Eliminar</a></td>";
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