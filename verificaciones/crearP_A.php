<?php
/*
    MATERIA: Programación IV
    NOMBRE PROYECTO: Sistema de Gestión de Envíos.
    DESARROLLADO POR: Hiram González V-26164832
*/

    require_once('../config/conexion.php');

    if(isset($_POST['cod'])&&isset($_POST['precio'])&&isset($_POST['direccion'])&&isset($_POST['estatus'])&&isset($_POST['transporte'])&&isset($_POST['id_cliente'])) {

        if ($_POST['cod'] != "" && $_POST['precio'] != "" && $_POST['direccion'] != "" && $_POST['estatus'] != "" && $_POST['transporte'] != "" && $_POST['id_cliente'] != "") {

            $cod = $_POST['cod'];
            $precio = $_POST['precio'];
            $dir = $_POST['direccion'];
            $estatus = $_POST['estatus'];
            $trans = $_POST['transporte'];
            $id_cliente = $_POST['id_cliente'];

            $query = "SELECT COUNT(*) FROM pedidos WHERE cod_pedido = ?";

            if ($sentencia = mysqli_prepare($enlace, $query)) {
                mysqli_stmt_bind_param($sentencia, "s", $cod);
                mysqli_stmt_execute($sentencia);
                mysqli_stmt_bind_result($sentencia, $existencia);
                while (mysqli_stmt_fetch($sentencia)) {
                    $existencia = $existencia;
                }
                mysqli_stmt_close($sentencia);

                if ($existencia == 0) {

                    $query = "INSERT INTO pedidos (cod_pedido,precio,direccion,estatus,cod_transporte,id_cliente) VALUES (?,?,?,?,?,?)";

                    if ($sentencia = mysqli_prepare($enlace, $query)) {
                        mysqli_stmt_bind_param($sentencia, "sssssi", $cod, $precio, $dir, $estatus, $trans, $id_cliente);
                        mysqli_stmt_execute($sentencia);
                        mysqli_stmt_close($sentencia);
                        echo "<script>alert('Pedido creado exitosamente.')</script>";
                    }
                } elseif ($existencia > 0) {
                    echo "<script>alert('Ya existe un pedido con el código: " . $cod . "')</script>";
                }
            } else {
                echo "<script>alert('Por favor, rellene todos los campos')</script>";
            }
        }
    }

    require_once('../config/cerrar.php')

?>
<script>
    $(document).ready(function() {
        $(document).on('click', 'crear', function () {
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