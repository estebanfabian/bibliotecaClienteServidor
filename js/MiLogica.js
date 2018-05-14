$(document).ready(function () {
    var myJson = new Array();
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
        var url = "";
        var parameto = "hola";
        var metodo = function (ssw) {
            //  $("#login-form").html(ssw);

        };
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
                var url1 = "Controlador/UsuarioControlador/Validar_Usuario.php";
                var parametro1 = myString;
                var metodo1 = function (respuesta) {
                    var data = $.parseJSON(respuesta);
                   
                    if (data.length==0){
                        alert("El código o clave esta errada ")
                    }else{
                        
                    }
//                    if (data.sucess == "ok") {
//                        // $("#limpiar").trigger("click");
//                        //idProvedorModi = "null";
//                        alert("Los datos fueron registrados en la BD");
//                    } else {
//                        alert("Los datos NO fueron registrados en la BD");
//                    }
                };
                fajax(url1, parametro1, metodo1);
            }
        });
        fajax(url, parameto, metodo);
    }
    $("#BTNIngresar").click(function () {
        login();
    });
});