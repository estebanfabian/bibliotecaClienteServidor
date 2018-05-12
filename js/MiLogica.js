$(document).ready(function () {


    /**
     * esta es la funcion ajax que permite soliciatr al servidor datros
     * @param {type} URL
     * @param {type} parametros
     * @param {type} metodo
     * @return {undefined}
     */


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
            //  $("#carouselExampleIndicators").html(ssw);

        }
        $("#login-form").validate({
            rules: {
                login_username: {
                    required: true,
                    number: true,
                    digits: true
                },
                login_password: {
                    required: true,
                    minlength: 8
                }
            },
            messages: {
                login_username: {
                    digits: "Este campo no puede tener ni comas, ni puntos",
                    number: "Este campo solo permite número"
                }
            }
        });
        fajax(url, parameto, metodo);
        alert(url + parameto + metodo);
    }
    $("#BTNIngresar").click(function () {
        login();
    });
});