var url_listar_usuario = "../Controlador/Libro/MasBuscado.php";

var x;
$(document).ready(function () {

    var myJson = new Array();
    // se genera el paginador
    paginador = $(".pagination");
    // cantidad de items por pagina
    var items = 1;
    var numeros = 4;
    // inicia el paginador
    init_paginator(paginador, items, numeros);
    // se envia la peticion ajax que se realizara como callback
    set_callback(get_data_callback);
    cargaPagina(0);

    function get_data_callback() {
        $.ajax({
            data: {
                limit: itemsPorPagina,
                offset: desde,
            },
            type: "POST",
            url: url_listar_usuario
        }).done(function (data, textStatus, jqXHR) {
            // obtiene la clave lista del json data
            var lista = data.lista;
            $("#tabla1").html("");

            // si es necesario actualiza la cantidad de paginas del paginador
            if (pagina == 0) {
                creaPaginador(data.cantidad);
            }
            // genera el cuerpo de la tabla
            $.each(lista, function (tmp) {
                $('<tr>' +
                        "<td>" + tmp.isbn + "</td>"
                        + "<td><img src=" + tmp.imagen + "   width=100 height=100></td>"
                        + "<td><p> Titulo :" + tmp.titulo + " Autor:" + tmp.nombreAutor + "</p></td>"
                        + "<td class ='reservar' post ='" + tmp.isbn + "' >Reservas</td>" +
                        '</tr>').appendTo($("#tabla1"));

            });
        }).fail(function (jqXHR, textStatus, textError) {
            alert("Error al realizar la peticion dame".textError);
        });
    }

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
    function Catalogo() {
        var formulario = {
            codigo: $("#codigoUsuario").val()
        };
        myJson.push(formulario);
        var myString1 = JSON.stringify(formulario);
        var url = "../controlador/Usuario/Historial_Prestamo.php";
        var parametro = myString1;
        var metodo = function (respuesta) {
            console.log(respuesta)
            var data = $.parseJSON(respuesta);
            var limite = data.length;
            for (var i = 0; i < limite; i++) {
                var local = data[i];
                item(local, i);
            }

        };
        fajax(url, parametro, metodo);
    }

    function item(tmp, i) {
        if (i == 0) {
            tabla(tmp);
        } else {
            tabla(tmp);
        }
    }

    function tabla(tmp) {
        var estr = $("<tr></tr>");
        estr.append("<td>" + tmp.Dreserva + "</td>"
                + "<td>" + tmp.Dentrega + "</td>"
                + "<td>" + tmp.Dprestamo + "</td>"
                + "<td>" + tmp.titulo + "</td>"
                + "<td class ='renovar' post ='" + tmp.isbn + "' >" + Renorvar(tmp.renovacion+1) + "</td>"
                + "<td>" + estado(tmp.estado) + "</td>");
        $("#historialTabla").append(estr);
    }
    function estado(array) {
        switch (array) {
            case 1:
                return "entregado";

                break;
            case 2:
                return "reservado";
                break;
            case 3:
                return "Prestamo";
                break;
            default:
                return "Error";
        }
    }

    function Renorvar(array) {
        switch (array) {
            case 1:
                return "Renorvar";
                break;
            case 2:
                return "";
                break;
            default:
                return "Error";
        }
    }

    window.onload(Catalogo());
});