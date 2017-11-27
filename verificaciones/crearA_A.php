<?php
/*
    MATERIA: Programación IV
    NOMBRE PROYECTO: Sistema de Gestión de Envíos.
    DESARROLLADO POR: Hiram González V-26164832
*/

    require_once('../config/conexion.php');

    if(isset($_POST['cod'])&&isset($_POST['descripcion'])&&isset($_POST['cantidad'])&&isset($_POST['cod_pedido'])){

        if($_POST['cod']!=""&&$_POST['descripcion']!=""&&$_POST['cantidad']!=""&&$_POST['cod_pedido']!=""){

            $cod = $_POST['cod'];
            $descripcion = $_POST['descripcion'];
            $cantidad = $_POST['cantidad'];
            $cod_pedido = $_POST['cod_pedido'];

            $query = "SELECT COUNT(*) FROM articulos WHERE cod_articulo = ?";

            if ($sentencia = mysqli_prepare($enlace, $query)) {
                mysqli_stmt_bind_param($sentencia, "s", $cod);
                mysqli_stmt_execute($sentencia);
                mysqli_stmt_bind_result($sentencia, $existencia);
                while(mysqli_stmt_fetch($sentencia)){
                    $existencia = $existencia;
                }
                mysqli_stmt_close($sentencia);

                if($existencia == 0){

                    $query = "INSERT INTO articulos (cod_articulo,descripcion,cantidad,cod_pedido_asoc) VALUES (?,?,?,?)";

                    if ($sentencia = mysqli_prepare($enlace, $query)) {
                        mysqli_stmt_bind_param($sentencia, "ssis", $cod, $descripcion, $cantidad, $cod_pedido);
                        mysqli_stmt_execute($sentencia);
                        mysqli_stmt_close($sentencia);
                        echo "<script>alert('Artículo creado exitosamente.')</script>";
                    }
                }elseif($existencia > 0){
                    echo "<script>alert('Ya existe un producto con el código: ".$cod."')</script>";
                }
            }

        }else{
            echo "<script>alert('Por favor, rellene todos los campos')</script>";
        }

    }

    require_once('../config/cerrar.php')

?>
<script>
    $(document).ready(function() {
        $(document).on('click', 'crear', function () {
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
