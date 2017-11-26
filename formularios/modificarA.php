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
			<h2 class="titulo">Actualización de artículos:</h2>
			<hr class="linea">
			<section>
				<center>
					<div id="envoltura">      
		                <div id="cuerpo">
		                    <form id="form-login" method="POST" autocomplete="off" role="form" class="form-inline">
                                <input type="text" name="cod" value="<?php echo $_POST['cod']; ?>" id="cod" hidden>
		                    	<div class="form-group op">
	                    			<input class="form-control" type="text" name="descripcion" placeholder="Nombre del artículo" id="descripcion">
                                    <input class="form-control" type="text" name="cantidad" placeholder="Cantidad pedida" id="cantidad">
		                    	</div>
		                    	<br>
		                    	<br>
		                    	<div class="form-group op">
	                           		<input class="form-control" type="text" name="pedido_asoc" placeholder="Código del pedido asociado" id="cod_pedido">
		                       	</div>
		                       	<br>
		                       	<br>
		                        <div class="form-group">
		                        	<input type="button" class="btn btn-primary" name="submit" value="Actualizar artículo" class="boton" id="modificar">
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
        <script src="../js/modificarA_A.js"></script>

	</body>
</html>