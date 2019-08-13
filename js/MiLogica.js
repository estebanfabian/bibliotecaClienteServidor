$(document).ready(function () {
// mis variables de uso Global creo 
    var cambio = 0;
    var myJson = new Array();
    var Codigo;
// la funciona ajax
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

//funcion para reservar 
    function reserva() {
        var fecha = $("#datetimepicker1").val();
        var ejemplo = fecha.split(":T11:");
        var formulario = {
            codigo: $("#codigo").val()
        };
        myJson.push(formulario);
        var myString = JSON.stringify(formulario);
        var url = "../Conta_res";
        var parameto = myString;
        var metodo = function (respuesta) {
            var data = $.parseJSON(respuesta);
            if (data[0]['count'] < 4) {
                reservacion1();
            } else {
                alert("tiene el numero maximo de reservas o prestamos")
            }
        };
        fajax(url, parameto, metodo);
    }
//funcion para saber el dia que se hace la reservacion
    function reservacion1() {
        if (moment().format("dddd") == "Sunday") {
            var fechaReserva = moment().add(2, "days").format('YYYY/MM/DD hh:mm:ss');
        } else {
            var fechaReserva = moment().add(1, "days").format('YYYY/MM/DD hh:mm:ss');
        }
        var txt = document.getElementById("isbnReserva");
        txt = (txt.innerHTML);
        var formulario = {
            diaPrestamo: moment().format('YYYY/MM/DD hh:mm:ss'),
            isbn: txt,
            codigo: $("#codigo").val(),
            diaEntrega: fechaReserva
        };
        myJson.push(formulario);
        var myString = JSON.stringify(formulario);
        var url = "../reserva";
        var parameto = myString;
        var metodo = function (respuesta) {
            console.log(respuesta);
            var data = $.parseJSON(respuesta);
            if (data.sucess == "ok") {
                alert("La reserva del libro fue un éxito");
                location.href = "../index.php"
            } else {
                alert("Hubo un problema con la reserva intentolo mas tarde");
            }
        };
        fajax(url, parameto, metodo);
        alert(parameto);
    }
//    function palabra($palabra) {
//
//        var listaNombres = $palabra.split('\\');
//        var i = listaNombres.length;
//        return listaNombres[i - 1];
//    }
//---------------

    function RegistrarLibro() {
        var formulario = {
            isbn: $("#Risbn").val(),
            titulo: $("#RTituo").val(),
            categoriaLibro: $("#RCategoria").val(),
            resena: $("#resenaLibro").val(),
            autor: $("#Autores").val(),
            editorial: $("#ListaEditores").val()
        };
        myJson.push(formulario);
        var myString = JSON.stringify(formulario);
        var url = "../Controlador/Libro/CrearLibro.php";
        var parametro = myString;
        console.log(myString);
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
    function LimpiarLibro() {
        $("#Risbn").val("");
        $("#RTituo").val("");
        $("#RCategoria").val("");
        $("#resenaLibro").val("");
        $("#Autores").val("");
        $("#ListaEditores").val("");
    }
    function ActualizarLibro() {
        var formulario = {
            NombreAutor: $("#NombreAutor").val(),
            NotaAutor: $("#observacionesAutor").val()
        }
        myJson.push(formulario);
        var myString = JSON.stringify(formulario);
        var url = "../Controlador/Libro/ModificarAutor.php";
        var parametro = myString;
        console.log(myString)
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
    function EliminarLibro() {
        $("#registar_VideoBeam").validate({
            rules: {
                idvideoBeam: {
                    required: true,
                    number: true,
                    digits: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                var formulario = {
                    idVideoBeam: $("#idvideoBeam").val()
                };
                myJson.push(formulario);
                var myString = JSON.stringify(formulario);
                var url = "../Controlador/VideoBeam/EliminarVideoBeam.php";
                var parametro = myString;
                console.log(myString)
                var metodo = function (respuesta) {
                    console.log(respuesta);
                    var data = $.parseJSON(respuesta);
                    if (data.sucess == 'ok') {
                        alert("se elimino con exito");
                        LimpiarVideoBeam();
                    } else {
                        alert("El video Beam no existe");
                    }
                };
                fajax(url, parametro, metodo);
            }
        });
    }
    function BuscarLibroPrestamo() {

        $("#btnBuscarPrestamo").click(function () {

            var formulario = {
                Consulta: $("#PrestamoIsbn").val()
            };
            myJson.push(formulario);
            var myString = JSON.stringify(formulario);
            var url = "../tablaXid";
            var parametro = myString;
            var metodo = function (respuesta) {
                console.log(respuesta);
                var data = $.parseJSON(respuesta);
                var limite = data.length;
                console.log(data);
                for (var i = 0; i < limite; i++) {
                    var local = data[i];
                    item(local, i);
                }
                noDispo();
                prestarLibro();
            };
            fajax(url, parametro, metodo);
        });
    }
    function item(tmp, i) {
        if (i == 0) {
            $("#PrestamoTabla").empty();
            tabla(tmp);
        } else {
            tabla(tmp);
        }
    }
    function  tabla(tmp) {
        var estr = $("<tr></tr>");
        estr.append("<td>" + tmp.isbn + "</td>"
                + "<td><img src=" + tmp.imagen + "   width=100 height=100></td>"
                + "<td><p> Titulo :" + tmp.titulo + "<br> Autor:" + tmp.autor + " Editorial:" + tmp.editorial + "</p></td>"
                + validacionEstado(tmp));
        $("#PrestamoTabla").append(estr);
    }
    function validacionEstado(tmp) {
        if (tmp.estado == 'libre') {
            return "<td class ='prestar' post ='" + tmp.isbn + "' >Libre</td>";
        } else {
            return "<td class ='no_diponible' post ='" + tmp.isbn + "' >No disponible</td>";
        }
    }
    function  noDispo() {
        $(".no_diponible").click(function () {
            alert("materia no disponoble");

            var lo = prompt("ejemplo", "");
            console.log(lo);
        })
    }
    function prestarLibro() {
        $(".prestar").click(function () {

            var lo = prompt("Codigo del estudiante que solicita el libro", "");
            if (lo == null || lo == "") {
                alert("No hay codigo de estudiante");
            } else
            {
                var formulario = {
                    codigo: $("#codigoPrestamo").val()
                };
                myJson.push(formulario);
                var myString = JSON.stringify(formulario);
                var url = "../Conta_res";
                var parameto = myString;
                var metodo = function (respuesta) {
                    var data = $.parseJSON(respuesta);
                    if (data[0]['count'] < 4) {
                        Prestamo1();
                    } else {
                        alert("tiene el numero maximo de reservas o prestamos")
                    }
                };
                //    fajax(url, parameto, metodo);

            }

        })
    }
    function Pretamo() {
        var fecha = $("#datetimepicker1").val();
        var ejemplo = fecha.split(":T11:");
        var formulario = {
            codigo: $("#codigo").val()
        };
        myJson.push(formulario);
        var myString = JSON.stringify(formulario);
        var url = "../Conta_res";
        var parameto = myString;
        var metodo = function (respuesta) {
            var data = $.parseJSON(respuesta);
            if (data[0]['count'] < 4) {
                Prestamo1();
            } else {
                alert("tiene el numero maximo de reservas o prestamos")
            }
        };
        fajax(url, parameto, metodo);
    }
    function Prestamo1() {
        if (moment().format("dddd") == "Sunday") {
            var fechaReserva = moment().add(2, "days").format('YYYY/MM/DD hh:mm:ss');
        } else {
            var fechaReserva = moment().add(1, "days").format('YYYY/MM/DD hh:mm:ss');
        }
        var txt = document.getElementById("isbnReserva");
        txt = (txt.innerHTML);
        var formulario = {
            diaPrestamo: moment().format('YYYY/MM/DD hh:mm:ss'),
            isbn: txt,
            codigo: $("#codigo").val(),
            diaEntrega: fechaReserva,
            estado: 2
        };
        myJson.push(formulario);
        var myString = JSON.stringify(formulario);
        var url = "../reserva";
        var parameto = myString;
        var metodo = function (respuesta) {
            console.log(respuesta);
            var data = $.parseJSON(respuesta);
            if (data.sucess == "ok") {
                alert("La reserva del libro fue un éxito");
                location.href = "../index.php"
            } else {
                alert("Hubo un problema con la reserva intentolo mas tarde");
            }
        };
        fajax(url, parameto, metodo);
        alert(parameto);
    }
//-------------------------------------------------------
// botones
    $("#tabla").click(function () {
        alert("mesaje");
    });
    $("#btnCatalogoLinea").click(function () {
// Catalogo();
        location.href = "view/Catalogo.php";
    });
    $("#btnResercarLibro").click(function () {
        reserva();
    });
    $("#btnVolverCatalogo").click(function () {
        location.href = "Catalogo.php"
    });
    $("#btnRegistrarLibro ").click(function () {
        RegistrarLibro();
    });
    $("#btnLimpiarLibro ").click(function () {
        LimpiarLibro()
    });
    $("#btnActualizaLibro ").click(function () {
        ActualizarLibro()
    });
    $("#btnEliminarLibro ").click(function () {
        EliminarLibro()
    });
    $("#btnBuscarLibro ").click(function () {
        BuscarLibro()
    });

    $("#btnBuscarPrestamo").click(function () {
        BuscarLibroPrestamo();
    });

});