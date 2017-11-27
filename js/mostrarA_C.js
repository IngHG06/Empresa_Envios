/*
    MATERIA: Programación IV
    NOMBRE PROYECTO: Sistema de Gestión de Envíos.
    DESARROLLADO POR: Hiram González V-26164832
*/
$(document).ready(function(){
    $(document).on('click','#mostrar',function(){
        $.ajax({
            url: '../verificaciones/mostrarA_C.php',
            type: 'POST',
            data: {all: $('#all').val()},
            beforeSend: function(){
                console.log('Desde la consola');
                var res = confirm('Está seguro(a) de realizar esta consulta?');
                if(!res){
                    $.ajax().cancel();
                }
            }
        })
            .done(function(output){
                console.log(output);
                $('#salida').empty().append(output);
            })
            .fail(function(){
                console.log("error");
            })
            .always(function(){
                console.log("complete");
            });
    })

    $(document).on('click','#mostrarI',function(){
        $.ajax({
            url: '../verificaciones/mostrarA_C.php',
            type: 'POST',
            data: {code: $('#code').val()},
            beforeSend: function(){
                console.log('Desde la consola');
                var res = confirm('Está seguro(a) de realizar esta consulta?');
                if(!res){
                    $.ajax().cancel();
                }
            }
        })
            .done(function(output){
                console.log(output);
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