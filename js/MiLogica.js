$(document).ready(function () {

    var myJson = new Array();
    var $formLogin = $('#login-form');
    var $formLost = $('#lost-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    function fajax(URL, parametros, metodo) {
        $.ajax({
            url: URL,
            data: parametros,
            type: 'post',
            cache: false,
            dataType: 'html',
            success: function (ZZx) {
                metodo(ZZx);
            },
            error: function (xhr, status) {
                alert("Existe un problema");
            }
        });
    }

    function login() {

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
            messages: {
                codigo: {
                    digits: "Este campo no puede tener ni comas, ni puntos",
                    number: "Este campo solo permite número"
                }
            }, submitHandler: function () {

                var formulario = {
                    codigo: $("#codigo").val(),
                    contrasena: $("#contrasena").val()
                };

                myJson.push(formulario);
                var myString = JSON.stringify(formulario);
                var url1 = "Validar";
                var parametro1 = myString;
                var metodo1 = function (respuesta) {
                    $("#codigo").val("");
                    $("#contrasena").val("");
                    var data = $.parseJSON(respuesta);
                    if (data.length == 0) {
                        alert("El código o clave esta errada ");
                        $('#login-modal').modal('hide');
                    } else {
                        console.log("primero");
                        // $('#login-modal').modal('hide');
                        console.log("entra1");
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        envio();
                    }
                };


                fajax(url1, parametro1, metodo1);

            }
        });

        alert("entra1");
    }

    function envio() {
        var url = "Ingreso";
        var parameto = "hola";
        var metodo = function (ssw) {
            $("#cabezara").html(ssw);
              
        };
        fajax(url, parameto, metodo);

    }
    function Correo() {
        var url = "";
        var parameto = "hola";
        var metodo = function (ssw) {
            //  $("#login-form").html(ssw);
        };
        $("#lost-form").validate({
            rules: {
                lost_codigo: {
                    required: true,
                    number: true,
                    digits: true
                },
                lost_email: {
                    required: true,
                    minlength: 1
                }
            },
            messages: {
                lost_codigo: {
                    digits: "Este campo no puede tener ni comas, ni puntos",
                    number: "Este campo solo permite número"
                }
            }, submitHandler: function () {

                var formulario = {
                    codigo: $("#lost_codigo").val(),
                    emailPrincipal: $("#lost_email").val()
                };

                myJson.push(formulario);
                var myString = JSON.stringify(formulario);
                var url1 = "Correo";
                var parametro1 = myString;
                var metodo1 = function (respuesta) {

                    $("#lost_codigo").val("");
                    $("#lost_email").val("");
                    var data = $.parseJSON(respuesta);
                    if (data == "no") {
                        alert("El código o clave esta errada ")
                    } else {
                        $('#login-modal').modal('hide');
                    }
                };
                fajax(url1, parametro1, metodo1);
            }
        });
        fajax(url, parameto, metodo);
    }

    $("#BTNIngresar").click(function () {
        login();
    });

    $("#Enviar_correo").click(function () {
        Correo();
    });
    $("#login_lost_btn").click(function () {
        modalAnimate($formLogin, $formLost);
    });
    $("#lost_login_btn").click(function () {
        modalAnimate($formLost, $formLogin);
    });
    function modalAnimate($oldForm, $newForm) {

        var $oldH = $oldForm.height();
        var $newH = $newForm.height();

        $divForms.css("height", $oldH);
        $oldForm.fadeToggle($modalAnimateTime, function () {
            $divForms.animate({height: $newH}, $modalAnimateTime, function () {
                $newForm.fadeToggle($modalAnimateTime);
            });
        });

    }

});