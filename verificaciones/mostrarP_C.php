<?php
/*
    MATERIA: Programación IV
    NOMBRE PROYECTO: Sistema de Gestión de Envíos.
    DESARROLLADO POR: Hiram González V-26164832
*/

    session_start();

    require_once('../config/conexion.php');

    if(isset($_SESSION['id']) && isset($_POST['all']) && $_POST['all'] == true){
        $id = $_SESSION['id'];

        $query = "SELECT cod_pedido, precio, estatus, cod_transporte, direccion FROM pedidos WHERE id_cliente = ?";

        if ($sentencia = mysqli_prepare($enlace, $query)) {
            mysqli_stmt_bind_param($sentencia,"s",$id);
            mysqli_stmt_execute($sentencia);
            mysqli_stmt_bind_result($sentencia, $codigo, $precio, $estatus, $transporte, $direccion);
            while(mysqli_stmt_fetch($sentencia)){
                echo "<tr>";
                echo "<td>" .$codigo. "</td>";
                echo "<td>" .$estatus. "</td>";
                echo "<td>" .$direccion. "</td>";
                echo "<td>" .$transporte. "</td>";
                echo "<td>" .$precio. " BsF.</td>";
                echo "</tr>";
            }

            mysqli_stmt_close($sentencia);
        }

    }

    if (isset($_POST['code']) && $_POST['code'] != "") {
        $code = $_POST['code'];

        $query = "SELECT cod_pedido, precio, estatus, cod_transporte, direccion FROM pedidos WHERE cod_pedido = ?";

        if ($sentencia = mysqli_prepare($enlace, $query)) {
            mysqli_stmt_bind_param($sentencia,"s",$code);
            mysqli_stmt_execute($sentencia);
            mysqli_stmt_bind_result($sentencia, $codigo, $precio, $estatus, $transporte, $direccion);
            while(mysqli_stmt_fetch($sentencia)){
                echo "<tr>";
                echo "<td>" .$codigo. "</td>";
                echo "<td>" .$estatus. "</td>";
                echo "<td>" .$direccion. "</td>";
                echo "<td>" .$transporte. "</td>";
                echo "<td>" .$precio. " BsF.</td>";
                echo "</tr>";
            }

            mysqli_stmt_close($sentencia);
        }
    }

    require_once('../config/cerrar.php');
?>
<script>
    $(document).ready(function(){
        $(document).on('click','mostrar',function(){
            $.ajax({
                url: '../cliente/pedidos.php',
                type: 'POST',
                data: {},
            })
                .done(function(output){
                    $('#salida').empty().append(output);
                })
                .fail(function(){
                    console.log("error");
                })
                .always(function(){
                    console.log("complete");
                });
        })

        $(document).on('click','mostrarI',function(){
            $.ajax({
                url: '../cliente/pedidos.php',
                type: 'POST',
                data: {},
            })
                .done(function(output){
                    $('#salida').empty().append(output);
                })
                .fail(function(){
                    console.log("error");
                })
                .always(function(){
                    console.log("complete");
                });
        })
    })
</script>

