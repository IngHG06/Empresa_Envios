$(document).ready(function() {
    $(document).on('click', '#modificar', function () {
        $.ajax({
            url: '../verificaciones/modificarP_A.php',
            type: 'POST',
            data: {cod: $('#cod').val(), precio: $('#precio').val(), dir: $('#dir').val(), estatus: $('#estatus').val(), cod_trans: $('#cod_trans').val(), id_cliente: $('#id_cliente').val()},
            beforeSend: function () {
                console.log('Desde la consola');
            }
        })
            .done(function (output) {
                console.log(output);
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