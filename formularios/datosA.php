<!--
	MATERIA: Programación IV
	NOMBRE PROYECTO: Sistema de Gestión de Envíos.
	DESARROLLADO POR: Hiram González V-26164832
-->
<?php 
	session_start(); 
	if(isset($_SESSION['user'])&&isset($_SESSION['pass']))
	{
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimun-scale=1.0">
		<title>Actualizar Datos de Cuenta - Envíos González C.A.</title>
		<link rel="shortcut icon" type="image/ico" href="../img/favicon.png">
		<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/datos-style.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/miscelaneo-style.css">
	</head>
	<body>
		
		<?php include_once 'navbarF.php'; ?>

		<?php 
			require_once('../config/conexion.php');
			if (isset($_SESSION['id']) && $_SESSION['id'] != "") {
				$id = $_SESSION['id'];

				$query = "SELECT id, nom_ape, user, cuenta, direccion, saldo, descuento FROM usuarios WHERE id = ?";

				if ($sentencia = mysqli_prepare($enlace, $query)) {
					mysqli_stmt_bind_param($sentencia,"s",$id);
					mysqli_stmt_execute($sentencia);
					mysqli_stmt_bind_result($sentencia, $id_res, $nom_ape, $user_act, $cuenta_act, $direccion_act, $saldo_act, $descuento_act);
					while(mysqli_stmt_fetch($sentencia)){
						echo '<div class="container">
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
									</thead>
									<tbody>';
										echo "<tr>";
										    echo "<td>" .$id_res. "</td>";
										    echo "<td>" .$nom_ape. "</td>";
										    echo "<td>" .$user_act. "</td>";
										    echo "<td title='0 = Admin / 1 = Cliente'>" .$cuenta_act. "</td>";
										    echo "<td>" .$direccion_act. "</td>";
										    echo "<td>" .$saldo_act. "</td>";
										    echo "<td>" .$descuento_act. "</td>";
									    echo "</tr>";
							echo '	</tbody>
								</table>
							</div>
						</div>';
					}

					mysqli_stmt_close($sentencia);
				}
			}
		?>

		<?php

			if(isset($_SESSION['id'])&&isset($_POST['nom_ape'])&&isset($_POST['user'])&&isset($_POST['direccion'])){
				if($_SESSION['id']!=""&&$_POST['nom_ape']!=""&&$_POST['user']!=""&&$_POST['direccion']!=""){

					$id = $_SESSION['id'];
					$nomape = $_POST['nom_ape'];
					$user = $_POST['user'];
					$direccion = $_POST['direccion'];

					$query = "UPDATE usuarios SET nom_ape = ?, user = ?, direccion = ? WHERE id = ?";

					$sentencia = mysqli_prepare($enlace, $query);
					if ($sentencia) {
						mysqli_stmt_bind_param($sentencia, "sssi",$nomape,$user,$direccion,$id);
						mysqli_stmt_execute($sentencia);
			            mysqli_stmt_close($sentencia);
						header('location: ../formularios/datos.php');
					}
				}else{
					header('location: ../formularios/datos.php');
				}
			}

			if(isset($_SESSION['id'])&&isset($_POST['pass_act'])&&isset($_POST['pass_nueva'])&&isset($_POST['ver_pass'])){
				if($_SESSION['id']!=""&&$_POST['pass_act']!=""&&$_POST['pass_nueva']!=""&&$_POST['ver_pass']!=""){
					
					$id = $_SESSION['id'];

					$query = "SELECT pass FROM usuarios WHERE id = ?";

					if ($sentencia = mysqli_prepare($enlace, $query)) {
						mysqli_stmt_bind_param($sentencia,"i",$id);
						mysqli_stmt_execute($sentencia);
						mysqli_stmt_bind_result($sentencia, $pass_res);
						while(mysqli_stmt_fetch($sentencia)){
							$pass_res = $pass_res;
						}
					}

					$pass_act = md5($_POST['pass_act']);

					if(strcmp($pass_res, $pass_act)==0){
						if(strcmp($_POST['pass_nueva'],$_POST['ver_pass'])==0){
							$pass_nueva = md5($_POST['pass_nueva']);
						}
						$query = "UPDATE usuarios SET pass = ? WHERE id = ?";
						$sentencia = mysqli_prepare($enlace, $query);
						if ($sentencia) {
							mysqli_stmt_bind_param($sentencia, "si",$pass_nueva,$id);
							mysqli_stmt_execute($sentencia);
				            mysqli_stmt_close($sentencia);
							header('location: ../formularios/datos.php');
						}
					}
				}	
			}

			require_once('../config/cerrar.php');
		?>

		<div class="container mod">
			<h2 class="titulo">Actualizar datos de cuenta:</h2>
			<hr class="linea-tit">
			<section>
				<center>
					<div id="envoltura">      
		                <div id="cuerpo">
		                    <form id="form-login" action="datos.php" method="POST" autocomplete="off" role="form" class="form-inline">
		                    	<!--<input type="text" name="id" value="<?php echo $_SESSION['id']; ?>" hidden="true">-->
		                    	<div class="form-group op">
	                    			<input class="form-control" type="text" name="nom_ape" placeholder="Nombre y Apellido">
	                    			<input class="form-control" type="text" name="user" placeholder="Usuario">
	                    			<input class="form-control" type="text" name="direccion" placeholder="Dirección">
		                    	</div>
		                    	<br>
		                    	<br>
		                    	<div class="form-group">
		                        	<input type="submit" class="btn btn-primary" name="submit" value="Actualizar datos" class="boton">
		                        </div>
		                    </form>
		                </div>
		            </div>
	        	</center>
	        	<hr class="linea-sec">
	        	<center>
					<div id="envoltura">      
		                <div id="cuerpo">
		                    <form id="form-login" action="datos.php" method="POST" autocomplete="off" role="form" class="form-inline">
		                    	<!--<input type="text" name="id" value="<?php echo $_SESSION['id']; ?>" hidden="true">-->
		                    	<div class="form-group op">
		                    		<input class="form-control" type="password" name="pass_act" placeholder="Contraseña actual">
	                    			<input class="form-control" type="password" name="pass_nueva" placeholder="Nueva contraseña">
	                    			<input class="form-control" type="password" name="ver_pass" placeholder="Verificar contraseña">	
		                    	</div>
		                    	<br>
		                    	<br>
		                    	<div class="form-group">
		                        	<input type="submit" class="btn btn-primary" name="submit" value="Actualizar contraseña" class="boton">
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