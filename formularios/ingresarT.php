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
		<title>Ingresar Transportes - Envíos González C.A.</title>
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

			if(isset($_POST['cod'])&&isset($_POST['tipo'])&&isset($_POST['color'])&&isset($_POST['matricula'])&&isset($_POST['nom_con'])&&isset($_POST['destino'])&&isset($_POST['fecha'])){

				$cod = $_POST['cod'];
				$tipo = $_POST['tipo'];
				$color = $_POST['color'];
				$matricula = $_POST['matricula'];
				$nom_con = $_POST['nom_con'];
				$destino = $_POST['destino'];
				$fecha = $_POST['fecha'];

				$query = "INSERT INTO transportes (cod_transporte,tipo_transporte,color,matricula,nom_conductor,destino_asig,fecha_salida) VALUES (?,?,?,?,?,?,?)";

				if ($sentencia = mysqli_prepare($enlace, $query)) {
					mysqli_stmt_bind_param($sentencia, "sssssss",$cod,$tipo,$color,$matricula,$nom_con,$destino,$fecha);
					mysqli_stmt_execute($sentencia);
		            mysqli_stmt_close($sentencia);
					header('location: ../admin/transportesA.php');
				}
			}

			require_once('../config/cerrar.php')

		?>

        <div class="container">
            <div class="opciones">
                <form action="../admin/transportesA.php" method="post">
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
		                    <form id="form-login" action="ingresarT.php" method="POST" autocomplete="off" role="form" class="form-inline">
		                    	<div class="form-group op">
	                    			<input class="form-control" type="text" name="cod" placeholder="Código del transporte" autofocus="">
	                    			<input class="form-control" type="text" name="tipo" placeholder="Tipo de transporte">
	                    			<input class="form-control" type="text" name="color" placeholder="Color del transporte">
	                    			<input class="form-control" type="text" name="matricula" placeholder="Matrícula del Transporte">
		                    	</div>
		                    	<br>
		                    	<br>
		                    	<div class="form-group op">
	                           		<input class="form-control" type="text" name="nom_con" placeholder="Nombre del conductor">
	                           		<input class="form-control" type="text" name="destino" placeholder="Destino asignado">
	                           		<input class="form-control" type="text" name="fecha" placeholder="Fecha de salida">
		                       	</div>
		                       	<br>
		                       	<br>
		                        <div class="form-group">
		                        	<input type="submit" class="btn btn-primary" name="submit" value="Crear transporte" class="boton">
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