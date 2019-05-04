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
    function ListarAutores() {
        var url = "../Controlador/Libro/ListarAutores.php";
        var parametro = "myString";
        var metodo = function (respuesta) {
            var data = $.parseJSON(respuesta);
            var limite = data.length;
            for (var i = 0; i < limite; i++) {
                var local = data[i];
                item(local, i);
            }
        };
        fajax(url, parametro, metodo);
    }

    function ListarEditorial() {
        var url = "../Controlador/Libro/ListarEditorial.php";
        var parametro = "myString";
        var metodo = function (respuesta) {
            var data = $.parseJSON(respuesta);
            var limite = data.length;
            for (var i = 0; i < limite; i++) {
                var local = data[i];
                item1(local, i);
            }
        };
        fajax(url, parametro, metodo);
    }
    function item(tmp) {
        $("#Autores").append("<option value=" + tmp.NombreAutor + ">" + tmp.Nota + "</option>");
    }
    function item1(tmp) {
        $("#ListaEditores").append("<option value=" + tmp.NombreAutor1 + ">" + tmp.Nota1 + "</option>");
    }
    ListarEditorial();

    $("#btnRegistrarAutor ").click(function () {
        RegistrarAutor();
    });

    function RegistrarAutor() {

        var formulario = {
            NombreAutor: $("#NombreAutor").val(),
            NotaAutor: $("#observacionesAutor").val()
        };
        myJson.push(formulario);
        var myString = JSON.stringify(formulario);
        var url = "../Controlador/Libro/CrearAutor.php";
        var parametro = myString;

        console.log(formulario);
        var metodo = function (respuesta) {
            console.log(respuesta);
            var data = $.parseJSON(respuesta);
            if (data.sucess == 'ok') {
                alert("el usuario se registro con exito");
                LimpiarVideoBeam();
            } else {
                alert("No se pude registar al usuario");
            }
        };
        fajax(url, parametro, metodo);
    }

    //window.onload(ListarAutores());

});