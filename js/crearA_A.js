$(document).ready(function() {
    $(document).on('click', '#crear', function () {
        $.ajax({
            url: '../verificaciones/crearA_A.php',
            type: 'POST',
            data: {cod: $('#cod').val(), descripcion: $('#descripcion').val(), cantidad: $('#cantidad').val(), cod_pedido: $('#cod_pedido').val()},
            beforeSend: function () {
                console.log('Desde la consola');
                var res = confirm('¿Está seguro(a) de crear este nuevo artículo? Recuerde que debe rellenar todos los campos.');
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