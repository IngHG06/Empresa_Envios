<?php

    require_once('../config/conexion.php');

    if(isset($_POST['cod'])&&isset($_POST['descripcion'])&&isset($_POST['cantidad'])&&isset($_POST['cod_pedido'])){

        if($_POST['cod']!=""&&$_POST['descripcion']!=""&&$_POST['cantidad']!=""&&$_POST['cod_pedido']!=""){

            $cod = $_POST['cod'];
            $descripcion = $_POST['descripcion'];
            $cantidad = $_POST['cantidad'];
            $pedido_asoc = $_POST['cod_pedido'];

            $query = "UPDATE articulos SET descripcion = ?, cantidad = ?, cod_pedido_asoc = ? WHERE cod_articulo = ?";

            $sentencia = mysqli_prepare($enlace, $query);
            if ($sentencia) {
                mysqli_stmt_bind_param($sentencia, "siss",$descripcion,$cantidad,$pedido_asoc,$cod);
                mysqli_stmt_execute($sentencia);
                mysqli_stmt_close($sentencia);
                echo "<script>alert('Artículo actualizado exitosamente. Presione <Buscar> para visualizar los cambios.')</script>";
            }
        }else{
            echo "<script>alert('Por favor, rellene todos los campos')</script>";
        }

    }

    require_once('../config/cerrar.php');

?>
<script>
    $(document).ready(function() {
        $(document).on('click', 'modificar', function () {
            $.ajax({
                url: '../admin/articulosA.php',
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
