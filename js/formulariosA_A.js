$(document).ready(function() {
    $(document).on('click', '#nuevo', function () {
        $.ajax({
            url: '../formularios/ingresarA.php',
            type: 'POST',
            data: {},
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

    $(document).on('click', '#modif', function () {
        $.ajax({
            url: '../formularios/modificarA.php',
            type: 'POST',
            data: {cod: $('#cod').val()},
            beforeSend: function () {
                console.log('Desde la consola');
                var res = confirm('¿Está seguro(a) de querer modificar el artículo: '+$('#cod').val()+'?');
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

    $(document).on('click', '#del', function () {
        $.ajax({
            url: '../formularios/deleteA.php',
            type: 'POST',
            data: {cod: $('#cod').val()},
            beforeSend: function () {
                console.log('Desde la consola');
                var res = confirm('¿Está seguro(a) de querer eliminar el artículo: '+$('#cod').val()+'?');
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