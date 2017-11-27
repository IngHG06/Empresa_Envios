<?php
/*
    MATERIA: Programación IV
    NOMBRE PROYECTO: Sistema de Gestión de Envíos.
    DESARROLLADO POR: Hiram González V-26164832
*/

    require_once('../config/conexion.php');

    if(isset($_POST['cod'])&&isset($_POST['precio'])&&isset($_POST['dir'])&&isset($_POST['estatus'])&&isset($_POST['cod_trans'])&&isset($_POST['id_cliente'])){
        if($_POST['cod']!=""&&$_POST['precio']!=""&&$_POST['dir']!=""&&$_POST['estatus']!=""&&$_POST['cod_trans']!=""&&$_POST['id_cliente']!=""){

            $cod = $_POST['cod'];
            $precio = $_POST['precio'];
            $dir = $_POST['dir'];
            $estatus = $_POST['estatus'];
            $cod_trans = $_POST['cod_trans'];
            $id_cliente = $_POST['id_cliente'];

            $query = "UPDATE pedidos SET cod_pedido = ?, precio = ?, direccion = ?, estatus = ?, cod_transporte = ?, id_cliente = ? WHERE cod_pedido = ?";

            $sentencia = mysqli_prepare($enlace, $query);
            if ($sentencia) {
                mysqli_stmt_bind_param($sentencia, "sssssis",$cod,$precio,$dir,$estatus,$cod_trans,$id_cliente,$cod);
                mysqli_stmt_execute($sentencia);
                mysqli_stmt_close($sentencia);
                echo "<script>alert('Pedido actualizado exitosamente. Presione <Buscar> para visualizar los cambios.')</script>";
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
