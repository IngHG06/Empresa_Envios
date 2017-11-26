$(document).ready(function() {
    $(document).on('click', '#modificar', function () {
        $.ajax({
            url: '../verificaciones/modificarA_A.php',
            type: 'POST',
            data: {cod: $('#cod').val(), descripcion: $('#descripcion').val(), cantidad: $('#cantidad').val(), cod_pedido: $('#cod_pedido').val()},
            beforeSend: function () {
                console.log('Desde la consola');
                var res = confirm('¿Está conforme con las modificaciones realizadas? Recuerde que debe rellenar todos los campos.');
                if(!res){
                    $.ajax().cancel();
                }
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