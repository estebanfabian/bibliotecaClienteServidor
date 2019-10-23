$(document).ready(function () {
    var op = 0;
    var cambio = 0;
    var myJson = new Array();
    var aux;
    function fajax(URL, parametros, metodo) {
        $.ajax({
            url: URL,
            data: parametros,
            type: 'post',
            cache: false,
            dataType: 'html',
            processData: false,
            contentType: false,
            success: function (ZZx) {
                metodo(ZZx);
            },
            error: function (xhr, status) {
                alert("Existe un problema");
            }
        });
    }

// funcion para llammar el login y hacer la valicaciones pertinentes
    function catalogo() {
        $("#login-form").validate({
            rules: {
                codigo: {
                    required: true,
                    number: true,
                    digits: true
                },
                contrasena: {
                    required: true,
                    minlength: 1
                }
            },
            submitHandler: function () {
                var formulario = {
                    codigo: $("#login_username").val(),
                    contrasena: $("#login_password").val()
                };
                var url = "Validar";
                var parametro = myjson(formulario);
                var metodo = function (respuesta) {
                    $("#login_username").val("");
                    $("#login_password").val("");
                    var data = $.parseJSON(respuesta);
                    if (data.length === 0) {
                        alert("El código o clave esta errada ");
                        $('#login-modal').modal('hide');
                    } else {
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        iniciarSeccion(respuesta);
                    }
                };
                fajax(url, parametro, metodo);
            }
        });
    }
    catalogo();
});