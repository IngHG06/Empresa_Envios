$(document).ready(function() {
    $(document).on('click', '#modificar', function () {
        $.ajax({
            url: '../verificaciones/modificarA_A.php',
            type: 'POST',
            data: {cod: $('#cod').val(), descripcion: $('#descripcion').val(), cantidad: $('#cantidad').val(), cod_pedido: $('#cod_pedido').val()},
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