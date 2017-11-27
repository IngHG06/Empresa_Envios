<?php
/*
    MATERIA: Programación IV
    NOMBRE PROYECTO: Sistema de Gestión de Envíos.
    DESARROLLADO POR: Hiram González V-26164832
*/

    require_once('../config/conexion.php');

    if(isset($_POST['all']) && $_POST['all'] == true){

        $query = "SELECT cod_articulo, descripcion, cantidad, cod_pedido_asoc FROM articulos";

        if ($sentencia = mysqli_prepare($enlace, $query)) {
            mysqli_stmt_execute($sentencia);
            mysqli_stmt_bind_result($sentencia, $codigo, $descripcion, $cantidad, $pedido_asoc);
            while(mysqli_stmt_fetch($sentencia)){
                echo "<tr>";
                echo "<td>" .$codigo. "</td>";
                echo "<td>" .$descripcion. "</td>";
                echo "<td>" .$cantidad. "</td>";
                echo "<td>" .$pedido_asoc. "</td>";
                echo "<td class='info' colspan='2'>Para modificar o eliminar, use el buscador.</td>";
                echo "</tr>";
            }

            mysqli_stmt_close($sentencia);
        }

    }

    if (isset($_POST['code']) && $_POST['code'] != "") {
        $code = $_POST['code'];
        $encontrado = false;

        $query = "SELECT cod_articulo, descripcion, cantidad, cod_pedido_asoc FROM articulos WHERE cod_articulo = ?";

        if ($sentencia = mysqli_prepare($enlace, $query)) {
            mysqli_stmt_bind_param($sentencia,"s",$code);
            mysqli_stmt_execute($sentencia);
            mysqli_stmt_bind_result($sentencia, $codigo, $descripcion, $cantidad, $pedido_asoc);
            while(mysqli_stmt_fetch($sentencia)){
                echo "<tr>";
                echo "<td>" .$codigo. "</td>";
                echo "<td>" .$descripcion. "</td>";
                echo "<td>" .$cantidad. "</td>";
                echo "<td>" .$pedido_asoc. "</td>";
                echo "<td class='warning'><input type='text' id='cod' value='".$codigo."' hidden><button id='modif'>Modificar</button></td>";
                echo "<td class='danger'><input type='text' id='cod' value='".$codigo."' hidden><button id='del'>Eliminar</button></td>";
                echo "</tr>";
                $encontrado = true;
            }

            mysqli_stmt_close($sentencia);

            if($encontrado == false){
                echo "<script>alert('No se ha encontrado un artículo con el código ingresado.')</script>";
            }
        }
    }

    require_once('../config/cerrar.php');

?>
<script>
    $(document).ready(function(){
        $(document).on('click','mostrar',function(){
            $.ajax({
                url: '../admin/articulosA.php',
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
                url: '../admin/artciulosA.php',
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
