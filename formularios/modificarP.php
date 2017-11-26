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
		<link rel="stylesheet" type="text/css" href="../css/formularios-style.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/miscelaneo-style.css">
	</head>
	<body>

		<div class="container mod">
			<h2 class="titulo">Actualizacion de pedidos:</h2>
			<hr class="linea">
			<section>
				<center>
					<div id="envoltura">      
		                <div id="cuerpo">
		                    <form id="form-login" method="POST" autocomplete="off" role="form" class="form-inline">
		                    	<input type="text" name="cod" value="<?php echo $_POST['cod']; ?>" hidden="true" id="cod">
		                    	<div class="form-group op">
	                    			<input class="form-control" type="text" name="precio" placeholder="Precio del pedido" id="precio">
	                    			<input class="form-control" type="text" name="dir" placeholder="Dirección de entrega" id="dir">
	                    			<input class="form-control" type="text" name="estatus" placeholder="Estatus del pedido" id="estatus">
		                    	</div>
		                    	<br>
		                    	<br>
		                    	<div class="form-group op">
	                           		<input class="form-control" type="text" name="cod_trans" placeholder="Código del transporte" id="cod_trans">
	                           		<input class="form-control" type="text" name="id_cliente" placeholder="ID del cliente" id="id_cliente">
		                       	</div>
		                       	<br>
		                       	<br>
		                        <div class="form-group">
		                        	<input type="button" class="btn btn-primary" name="submit" value="Actualizar pedido" class="boton" id="modificar">
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
        <script src="../js/modificarP_A.js"></script>

	</body>
</html>