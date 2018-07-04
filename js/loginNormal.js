$(document).ready(function () {
    function fajax(URL, parametros, metodo) {
        $.ajax({
            url: URL,
            data: parametros,
            type: 'post',
            cache: false,
            dataType: 'html', success: function (ZZx) {
                metodo(ZZx);
            },
            error: function (xhr, status) {
                alert("Existe un problema");
            }
        });
    }

    function envio() {

        var url = "menu1.php";
        var parameto = "ejemplo";
        var metodo = function (ssw) {
            $("#cabezara1").html(ssw);
        };
        fajax(url, parameto, metodo);
    }
    function pie() {

        var url = "pie.php";
        var parameto = "ejemplo";
        var metodo = function (ssw) {
            $("#pie").html(ssw);
        };
        fajax(url, parameto, metodo);
    }

    function envio1() {

        var url = "menu2.php";
        var parameto = "ejemplo";
        var metodo = function (ssw) {
            $("#cabezara").html(ssw);
        };
        fajax(url, parameto, metodo);
    }
    pie();
    envio();
    envio1();

    $("#CerrarSesion1").click(function () {
        location.href = "../cerrarSesion.php";
    });
});
