/*
    MATERIA: Programación IV
    NOMBRE PROYECTO: Sistema de Gestión de Envíos.
    DESARROLLADO POR: Hiram González V-26164832
*/
$(document).ready(function() {
    $(document).on('click', '#crear', function () {
        $.ajax({
            url: '../verificaciones/crearP_A.php',
            type: 'POST',
            data: {cod: $('#cod').val(), precio: $('#precio').val(), direccion: $('#direccion').val(), estatus: $('#estatus').val(), transporte: $('#transporte').val(), id_cliente: $('#id_cliente').val()},
            beforeSend: function () {
                console.log('Desde la consola');
                var res = confirm('¿Está seguro(a) de crear este nuevo pedido? Recuerde que debe rellenar todos los campos.');
                if(!res){
                    $.ajax().cancel();
                }
            }
        })
            .done(function (output) {
                console.log(output);
                $('#table').show();
                $('#formularios').empty().append(output);
            })
            .fail(function () {
                console.log("error");
            })
            .always(function () {
                console.log("complete");
            });
    })
})