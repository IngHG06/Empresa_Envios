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

        <div class="mod">
			<h2 class="titulo">Ingrese los siguientes datos:</h2>
			<hr class="linea">
			<section>
				<center>
					<div id="envoltura">      
		                <div id="cuerpo">
		                    <form id="form-login" method="POST" autocomplete="off" role="form" class="form-inline">
		                    	<div class="form-group op">
	                    			<input class="form-control" type="text" name="cod" placeholder="Código de artículo" autofocus="" id="cod">
	                    			<input class="form-control" type="text" name="descripcion" placeholder="Nombre del Artículo" id="descripcion">
		                    	</div>
		                    	<br>
		                    	<br>
		                    	<div class="form-group op">
	                           		<input class="form-control" type="text" name="cantidad" placeholder="Cantidad" id="cantidad">
	                           		<input class="form-control" type="text" name="cod_pedido" placeholder="Código del pedido asociado" id="cod_pedido">
		                       	</div>
		                       	<br>
		                       	<br>
		                        <div class="form-group">
		                        	<input type="button" class="btn btn-primary" name="submit" value="Crear artículo" class="boton" id="crear">
		                        </div>
		                    </form>
		                </div>
		            </div>
	        	</center>
	        </section>
		</div>

		<script src="../js/jquery.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/crearA_A.js"></script>

	</body>
</html>