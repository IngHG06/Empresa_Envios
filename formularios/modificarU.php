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
		<title>Actualizar Usuarios - Envíos González C.A.</title>
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
			if (isset($_GET['id']) && $_GET['id'] != "") {
				$id = $_GET['id'];

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

			if(isset($_POST['id'])&&isset($_POST['nom_ape'])&&isset($_POST['user'])&&isset($_POST['pass'])&&isset($_POST['tipo'])&&isset($_POST['direccion'])&&isset($_POST['saldo'])&&isset($_POST['descuento'])){
				if($_POST['id']!=""&&$_POST['nom_ape']!=""&&$_POST['user']!=""&&$_POST['pass']!=""&&$_POST['tipo']!=""&&$_POST['direccion']!=""&&$_POST['saldo']!=""&&$_POST['descuento']!=""){

					$id = $_POST['id'];
					$nomape = $_POST['nom_ape'];
					$user = $_POST['user'];
					$pass = md5($_POST['pass']);
					$tipo = $_POST['tipo'];
					$direccion = $_POST['direccion'];
					$saldo = $_POST['saldo'];
					$descuento = $_POST['descuento'];

					$query = "UPDATE usuarios SET nom_ape = ?, user = ?, pass = ?, cuenta = ?, direccion = ?, saldo = ?, descuento = ? WHERE id = ?";

					$sentencia = mysqli_prepare($enlace, $query);
					if ($sentencia) {
						mysqli_stmt_bind_param($sentencia, "sssissis",$nomape,$user,$pass,$tipo,$direccion,$saldo,$descuento, $id);
						mysqli_stmt_execute($sentencia);
			            mysqli_stmt_close($sentencia);
						header('location: ../admin/usuariosA.php');
					}
				}else{
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
			<h2 class="titulo">Actualizacion de usuarios:</h2>
			<hr class="linea">
			<section>
				<center>
					<div id="envoltura">      
		                <div id="cuerpo">
		                    <form id="form-login" action="modificarU.php" method="POST" autocomplete="off" role="form" class="form-inline">
		                    	<input type="text" name="id" value="<?php echo $_GET['id']; ?>" hidden="true">
		                    	<div class="form-group op">
	                    			<input class="form-control" type="text" name="nom_ape" placeholder="Nuevo nombre y apellido">
	                    			<input class="form-control" type="text" name="user" placeholder="Nuevo usuario">
	                    			<select name="pass" class="form-control">
	                    				<option value="">Restablecer contraseña</option>
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
	                           		<input class="form-control" type="text" name="direccion" placeholder="Nueva dirección">
	                           		<input class="form-control" type="text" name="saldo" placeholder="Nuevo saldo">
	                           		<select name="descuento" class="form-control">
	                           			<option value="0">Nuevo Descuento a aplicar</option>
	                           			<option value="5">5%</option>
	                           			<option value="10">10%</option>
	                           			<option value="15">15%</option>
	                           			<option value="20">20%</option>
	                           		</select>
		                       	</div>
		                       	<br>
		                       	<br>
		                        <div class="form-group">
		                        	<input type="submit" class="btn btn-primary" name="submit" value="Actualizar usuario" class="boton">
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