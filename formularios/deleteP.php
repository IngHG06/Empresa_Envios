<?php
	/*
		MATERIA: Programación IV
		NOMBRE PROYECTO: Sistema de Gestión de Envíos.
		DESARROLLADO POR: Hiram González V-26164832
	*/

	require_once('../config/conexion.php');

	if(isset($_POST['cod'])){

		$cod = $_POST['cod'];

		$query = "DELETE FROM pedidos WHERE cod_pedido = ?";

		if ($sentencia = mysqli_prepare($enlace, $query)) {
			mysqli_stmt_bind_param($sentencia, "s",$cod);
			mysqli_stmt_execute($sentencia);
            mysqli_stmt_close($sentencia);
            echo "<script>alert('Pedido eliminado exitosamente. Presione <Mostrar todos> para visualizar los cambios.')</script>";
		}
	}

	require_once('../config/cerrar.php');

?>
<script>
    $(document).ready(function() {
        $(document).on('click', 'del', function () {
            $.ajax({
                url: '../admin/pedidosA.php',
                type: 'POST',
                data: {},
            })
                .done(function (output) {
                    console.log('done');
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
        })
    })
</script>
