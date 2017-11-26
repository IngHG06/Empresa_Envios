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
		<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/formularios-ajax-style.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/miscelaneo-style.css">
	</head>
	<body>

		<div class="container mod">
			<h2 class="titulo">Ingrese los siguientes datos:</h2>
			<hr class="linea">
			<section>
				<center>
					<div id="envoltura">      
		                <div id="cuerpo">
		                    <form id="form-login" method="POST" autocomplete="off" role="form" class="form-inline">
		                    	<div class="form-group op">
	                    			<input class="form-control" type="text" name="cod" placeholder="Código del pedido" autofocus="" id="cod">
	                    			<input class="form-control" type="text" name="precio" placeholder="Precio" id="precio">
	                    			<input class="form-control" type="text" name="direccion" placeholder="Dirección" id="direccion">
		                    	</div>
		                    	<br>
		                    	<br>
		                    	<div class="form-group op">
	                           		<input class="form-control" type="text" name="estatus" placeholder="Estatus del envío" id="estatus">
	                           		<input class="form-control" type="text" name="transporte" placeholder="Código del transporte" id="transporte">
	                           		<input class="form-control" type="text" name="id_cliente" placeholder="ID del cliente" id="id_cliente">
		                       	</div>
		                       	<br>
		                       	<br>
		                        <div class="form-group">
		                        	<input type="button" class="btn btn-primary" name="submit" value="Crear pedido" class="boton" id="crear">
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
        <script src="../js/crearP_A.js"></script>

	</body>
</html>