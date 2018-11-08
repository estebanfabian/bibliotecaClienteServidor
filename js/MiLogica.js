$(document).ready(function () {
// mis variables de uso Global creo 
    var cambio = 0;
    var myJson = new Array();
    var $formLogin = $('#login-form');
    var $formLost = $('#lost-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
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
// funcion para llammar el login y hacer la valicaciones pertinentes
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

                        var url2 = "Controlador/Usuario/Intentos_usuario.php";
                        var parametro2 = myString;
                        console.log(parametro2)
                        var metodo2 = function (respuesta) {
                        };
                        fajax(url2, parametro2, metodo2);
                    } else {

                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        envio(respuesta);
                        Codigo = $("#codigo").val("");
                        var url2 = "Controlador/Usuario/Intentos_usuarioExitoso.php";
                        var parametro2 = myString;
                        console.log(parametro2)
                        var metodo2 = function (respuesta) {
                        };
                        fajax(url2, parametro2, metodo2);
                    }
                };
                fajax(url1, parametro1, metodo1);
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
// funcion para registrar usuario
    function registarUsuario() {
        $("#registar_usuario").validate({
            rules: {
                cedula: {
                    required: true,
                    number: true,
                    digits: true,
                    minlength: 1
                },
                codigo: {
                    required: true,
                    number: true,
                    digits: true,
                    minlength: 1
                },
                nombre: {
                    required: true,
                    minlength: 1
                },
                apellido: {
                    required: true,
                    minlength: 1
                },
                fechaNacimiento: {
                    required: true,
                    minlength: 1
                },
                sexo: {
                    required: true,
                },
                Perfil: {
                    required: true,
                },
                direccion: {
                    required: true,
                    minlength: 1
                },
                telefono: {required: true,
                    minlength: 1
                },
                coreeo: {
                    required: true,
                    minlength: 1
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
                },
                telefono: {
                    digits: "Este campo no puede tener ni comas, ni puntos",
                    number: "Este campo solo permite número"
                },
            }, submitHandler: function () {
                var formulario = {
                    cedula: $("#cedula").val(),
                    codigo: $("#codigo").val(),
                    nombre: $("#nombre").val(),
                    apellido: $("#apellido").val(),
                    fechaNacimiento: $("#fechaNacimiento").val(),
                    sexo: $("#sexo").val(),
                    direccion: $("#direccion").val(),
                    telefonoPrincipal: $("#telefono").val(),
                    emailPrincipal: $("#coreeo").val(),
                    contrasena: $("#clave").val(),
                    direccion2: $("#direccion2").val(),
                    telefonoSecundario: $("#telefono2").val(),
                    telefonoOtro: $("#telefonoOtro").val(),
                    contactoNombre: $("#nombreContacto").val(),
                    contactoApellido: $("#apellidoContacto").val(),
                    contactoDireccion: $("#dirrecionContacto").val(),
                    contactoDireccion2: $("#dirrecionContacto2").val(),
                    contactoTelefono: $("#telefonoContacto").val(),
                    perfil: $("#Perfil").val()
                };
                myJson.push(formulario);
                var myString = JSON.stringify(formulario);
                var url1 = "../Controlador/Usuario/Insertar_Usuario.php";
                var parametro1 = myString;
                var metodo1 = function (respuesta) {
                    alert(respuesta);
                    var data = $.parseJSON(respuesta);
                    if (data.sucess == 'ok') {
                        alert("el usuario se registro con exito");
                        LimpiarUsuario();
                    } else {
                        alert("No se pude registar al usuario");
                    }
                };
                fajax(url1, parametro1, metodo1);
            }
        });
    }
// funcion que se utiliza para crear la variables de seccion
    function envio(respusta) {
        var url = "inicioSesion.php";
        var parameto = respusta;
        var metodo = function (ssw) {
        };
        fajax(url, parameto, metodo);
        location.href = "index.php";
    }
// funcion para enviar el correo electronico
    function Correo() {
        var url = "";
        var parameto = "hola";
        var metodo = function (ssw) {
        };
        $("#lost-form").validate({
            rules: {
                lost_codigo: {
                    required: true,
                    number: true,
                    digits: true
                }, lost_email: {
                    required: true,
                    minlength: 1
                }
            },
            messages: {
                lost_codigo: {digits: "Este campo no puede tener ni comas, ni puntos",
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
// funcion clear de registrar usuario
    function LimpiarUsuario() {
        $("#cedula").val("");
        $("#codigo").val("");
        $("#nombre").val("");
        $("#apellido").val("");
        $("#fechaNacimiento").val("");
        $("#sexo").val("");
        $("#direccion").val("");
        $("#telefono").val("");
        $("#coreeo").val("");
        $("#clave").val("");
        $("#validatedCustomFile").val("");
        $("#direccion2").val("");
        $("#telefono2").val("");
        $("#telefonoOtro").val("");
        $("#nombreContacto").val("");
        $("#apellidoContacto").val("");
        $("#dirrecionContacto").val("");
        $("#dirrecionContacto2").val("");
        $("#telefonoContacto").val("");
        $("#Perfil").val("");
    }
//animiacion de modal para el login
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

    function palabra($palabra) {

        var listaNombres = $palabra.split('\\');
        var i = listaNombres.length;
        return listaNombres[i - 1];
    }
// intento para hacer la carga de la foto al server
    function  cargarFoto() {
        var file = document.getElementById('foto').files[0];
        var formulario = {
            photo: file
        };
        myJson.push(formulario);
        var myString = JSON.stringify(formulario);
        var url = "../Controlador/Usuario/Cargar_Foto.php";
        var parameto = file;
        var metodo = function () {
        };
        console.log(formulario);
        fajax(url, parameto, metodo);
        alert("dentro de la funciona");
        console.log(file);
//        if (file) {
//            var reader = new FileReader();
//            reader.readAsText(file);
//            reader.onload = function (e) {
//                alert(e.target.result);
//            };
//        }
    }
// cambio de clave
    $("#CambioClave").click(function () {
        if (cambio == 10) {
            var formulario = {
                codigo: $("#codigo").val(),
                contrasena: $("#password1").val()

            };
            myJson.push(formulario);
            var myString = JSON.stringify(formulario);
            var url1 = "CambioClave";
            var parametro1 = myString;
            var metodo1 = function (respuesta) {
                var data = $.parseJSON(respuesta);
                if (data.sucess == "ok") {
                    console.log(data);
                    alert("Se cambio el la contraseña con exito ");
                    location.href = "../index.php";
                } else {
                    alert("No se  cambio el la contraseña con exito ");
                    $("#password1").val("");
                    $("#password2").val("");
                    $("#password1").focus();
                }
            };
            fajax(url1, parametro1, metodo1);
        }
        else {
            alert("ingrese los valores en los campos ");
            $("#password1").val("");
            $("#password2").val("");
        }
    });
//validaciones  de cambio de clave
    $("input[type=password]").keyup(function () {
        var ucase = new RegExp("[A-Z]+");
        var lcase = new RegExp("[a-z]+");
        var num = new RegExp("[0-9]+");
        if ($("#password1").val().length >= 6) {
            cambio++;
            $("#8char").removeClass("glyphicon-remove");
            $("#8char").addClass("glyphicon-ok");
            $("#8char").css("color", "#00A41E");
        } else {
            cambio = 0;
            $("#8char").removeClass("glyphicon-ok");
            $("#8char").addClass("glyphicon-remove");
            $("#8char").css("color", "#FF0004");
        }

        if (ucase.test($("#password1").val())) {
            cambio++;
            $("#ucase").removeClass("glyphicon-remove");
            $("#ucase").addClass("glyphicon-ok");
            $("#ucase").css("color", "#00A41E");
        } else {
            cambio = 0;
            $("#ucase").removeClass("glyphicon-ok");
            $("#ucase").addClass("glyphicon-remove");
            $("#ucase").css("color", "#FF0004");
        }

        if (lcase.test($("#password1").val())) {
            cambio++;
            $("#lcase").removeClass("glyphicon-remove");
            $("#lcase").addClass("glyphicon-ok");
            $("#lcase").css("color", "#00A41E");
        } else {
            cambio = 0;
            $("#lcase").removeClass("glyphicon-ok");
            $("#lcase").addClass("glyphicon-remove");
            $("#lcase").css("color", "#FF0004");
        }

        if (num.test($("#password1").val())) {
            cambio++;
            $("#num").removeClass("glyphicon-remove");
            $("#num").addClass("glyphicon-ok");
            $("#num").css("color", "#00A41E");
        } else {
            cambio = 0;
            $("#num").removeClass("glyphicon-ok");
            $("#num").addClass("glyphicon-remove");
            $("#num").css("color", "#FF0004");
        }

        if ($("#password1").val() == $("#password2").val()) {
            cambio++;
            $("#pwmatch").removeClass("glyphicon-remove");
            $("#pwmatch").addClass("glyphicon-ok");
            $("#pwmatch").css("color", "#00A41E");
        } else {
            cambio = 0;
            $("#pwmatch").removeClass("glyphicon-ok");
            $("#pwmatch").addClass("glyphicon-remove");
            $("#pwmatch").css("color", "#FF0004");
        }
    });
    function RegistrarVideoBeam() {
        $("#registar_VideoBeam").validate({
            rules: {
                idvideoBeam: {
                    required: true,
                    number: true,
                    digits: true,
                    minlength: 1
                },
                FabricanteVideoBeam: {
                    required: true,
                    minlength: 1
                },
                CableUSB: {
                    required: true,
                    minlength: 1
                },
                CableHDMI: {
                    required: true,
                    minlength: 1
                },
                CableVGA: {
                    required: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                var formulario = {
                    idVideoBeam: $("#idvideoBeam").val(),
                    fabricante: $("#FabricanteVideoBeam").val(),
                    cableUSB: $("#CableUSB").val(),
                    cableHDMI: $("#CableHDMI").val(),
                    cableVGA: $("#CableVGA").val(),
                    observaciones: $("#txtObservacionesVideoBeam").val()
                }
                myJson.push(formulario);
                var myString = JSON.stringify(formulario);
                var url = "../Controlador/VideoBeam/RegistrarVideoBeam.php";
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
        });
    }
    function LimpiarVideoBeam() {
        $("#idvideoBeam").val("");
        $("#FabricanteVideoBeam").val("");
        $("#CableUSB").val("");
        $("#CableHDMI").val("");
        $("#CableVGA").val("");
        $("#txtObservacionesVideoBeam").val("");
    }
    function ActualizarVideoBeam() {
        var formulario = {
            idVideoBeam: $("#idvideoBeam").val(),
            fabricante: $("#FabricanteVideoBeam").val(),
            cableUSB: $("#CableUSB").val(),
            cableHDMI: $("#CableHDMI").val(),
            cableVGA: $("#CableVGA").val(),
            observaciones: $("#txtObservacionesVideoBeam").val()
        };
        myJson.push(formulario);
        var myString = JSON.stringify(formulario);
        var url = "../Controlador/VideoBeam/ActualizarVideoBeam.php";
        var parametro = myString;
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
    function EliminarVideoBeam() {
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

    function BuscarVideoBeam() {
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
                var url = "../Controlador/VideoBeam/BuscarVideoBeam.php";
                var parametro = myString;
                var metodo = function (respuesta) {
                    var data = $.parseJSON(respuesta);
                    if (data.length > 0) {
                        $("#idvideoBeam").val("" + data[0]['idVideoBeam'] + "");
                        $("#FabricanteVideoBeam").val("" + data[0]['fabricante'] + "");
                        $("#CableUSB").val("b'" + data[0]['cableUSB'] + "'");
                        $("#CableHDMI").val("b'" + data[0]['cableHDMI'] + "'");
                        $("#CableVGA").val("b'" + data[0]['cableVGA'] + "'");
                        $("#txtObservacionesVideoBeam").val("" + data[0]['observaciones'] + "");
                    } else {
                        alert("el video beam no exite")
                    }
                };
                fajax(url, parametro, metodo);
            }
        });
    }
    function RegistrarComputador() {
        $("#registar_Computador").validate({
            rules: {
                SerialComputador: {
                    required: true,
                    number: true,
                    digits: true,
                    minlength: 1
                },
                FabricanteComputador: {
                    required: true,
                    minlength: 1
                },
                SerialCargado: {
                    required: true,
                    number: true,
                    digits: true,
                    minlength: 1
                },
                observacionesComputador: {
                    required: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                var formulario = {
                    idcomputador: $("#SerialComputador").val(),
                    fabricante: $("#FabricanteComputador").val(),
                    cargadorId: $("#SerialCargado").val(),
                    observaciones: $("#observacionesComputador").val()
                }
                myJson.push(formulario);
                var myString = JSON.stringify(formulario);
                var url = "../Controlador/Computador/RegistrarComputador.php";
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
        });
    }
    function ActualizaComputador() {
        var formulario = {
            idcomputador: $("#SerialComputador").val(),
            fabricante: $("#FabricanteComputador").val(),
            cargadorId: $("#SerialCargado").val(),
            observaciones: $("#observacionesComputador").val()
        }
        myJson.push(formulario);
        var myString = JSON.stringify(formulario);
        var url = "../Controlador/Computador/ActualizarComputador.php";
        var parametro = myString;
        console.log(myString)
        var metodo = function (respuesta) {
            console.log(respuesta);
            var data = $.parseJSON(respuesta);
            if (data.sucess == 'ok') {
                alert("se actualizo con exito");
                LimpiarVideoBeam();
            } else {
                alert("No se pude registar al usuario");
            }

        };
        fajax(url, parametro, metodo);
    }
    function LimpiarComputador() {
        $("#SerialComputador").val("");
        $("#FabricanteComputador").val("");
        $("#SerialCargado").val("");
        $("#estadoComputador").val("");
        $("#observacionesComputador").val("");
    }
    function buscarComputador() {
        $("#registar_Computador").validate({
            rules: {
                SerialComputador: {
                    required: true,
                    number: true,
                    digits: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                var formulario = {
                    idcomputador: $("#SerialComputador").val(),
                }
                myJson.push(formulario);
                var myString = JSON.stringify(formulario);
                var url = "../Controlador/Computador/BuscarComputador.php";
                var parametro = myString;
                console.log(myString)
                var metodo = function (respuesta) {
                    console.log(respuesta);
                    var data = $.parseJSON(respuesta);
                    if (data.length > 0) {
                        $("#SerialComputador").val("" + data[0]['idcomputador'] + "");
                        $("#FabricanteComputador").val("" + data[0]['fabricante'] + "");
                        $("#SerialCargado").val("" + data[0]['cargadorId'] + "'");
                        $("#observacionesComputador").val("" + data[0]['observaciones'] + "");
                    } else {
                        alert("el Computador no exite")
                    }

                };
                fajax(url, parametro, metodo);
            }
        });
    }
    function EliminarComputador() {
        $("#registar_Computador").validate({
            rules: {
                SerialComputador: {
                    required: true,
                    number: true,
                    digits: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                var formulario = {
                    idcomputador: $("#SerialComputador").val()
                }
                myJson.push(formulario);
                var myString = JSON.stringify(formulario);
                var url = "../Controlador/Computador/EliminarComputador.php";
                var parametro = myString;
                console.log(myString)
                var metodo = function (respuesta) {
                    console.log(respuesta);
                    var data = $.parseJSON(respuesta);
                    if (data.sucess == 'ok') {
                        alert("el usuario se registro con exito");
                        LimpiarVideoBeam();
                    } else {
                        alert("El computador no exite");
                    }
                };
                fajax(url, parametro, metodo);
            }
        });
    }
    function EliminarTema() {
        $("#registar_Tema").validate({
            rules: {
                NombreTema: {
                    required: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                var formulario = {
                    nombreTema: $("#NombreTema").val()
                };
                myJson.push(formulario);
                var myString = JSON.stringify(formulario);
                var url = "../Controlador/Libro/EliminarTema.php";
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
    function RegistrarTema() {
        $("#registar_Tema").validate({
            rules: {
                NombreTema: {
                    required: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                var formulario = {
                    nombreTema: $("#NombreTema").val(),
                    Descricion: $("#observacionesTema").val()
                }
                myJson.push(formulario);
                var myString = JSON.stringify(formulario);
                var url = "../Controlador/Libro/CrearTema.php";
                var parametro = myString;
                console.log(myString)
                var metodo = function (respuesta) {
                    console.log(respuesta);
                    var data = $.parseJSON(respuesta);
                    if (data.sucess == 'ok') {
                        alert("el Tema se registro con exito");
                        LimpiarTema();
                    } else {
                        alert("No se pude registar al usuario");
                    }

                };
                fajax(url, parametro, metodo);
            }
        });
    }
    function LimpiarTema() {
        $("#NombreTema").val("");
        $("#observacionesTema").val("");
    }
    function RegistrarAutor() {
        $("#registar_Autor").validate({
            rules: {
                NombreAutor: {
                    required: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                var formulario = {
                    NombreAutor: $("#NombreAutor").val(),
                    NotaAutor: $("#observacionesAutor").val()
                }
                myJson.push(formulario);
                var myString = JSON.stringify(formulario);
                var url = "../Controlador/Libro/CrearAutor.php";
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
        });
    }
    function EliminarAutor() {
        $("#registar_Autor").validate({
            rules: {
                NombreAutor: {
                    required: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                var formulario = {
                    NombreAutor: $("#NombreAutor").val()
                }

                myJson.push(formulario);
                var myString = JSON.stringify(formulario);
                var url = "../Controlador/Libro/EliminarAutor.php";
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
        });
    }
    function LimpiarAutor() {
        $("#NombreAutor").val("");
        $("#observacionesAutor").val("");
    }
    function RegistrarEditorial() {
        $("#registar_Editorial").validate({
            rules: {
                NombreEditorial: {
                    required: true,
                    minlength: 1
                },
                DireccionEditoriaal: {
                    required: true,
                    minlength: 1
                },
                TelEditorial: {
                    required: true,
                    minlength: 1
                },
                fechaEditorial: {
                    required: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                var formulario = {
                    nombreEditorial: $("#NombreEditorial").val(),
                    direccionEditorial: $("#DireccionEditoriaal").val(),
                    telefonoEditorial: $("#TelEditorial").val(),
                    anoPublicacion: $("#fechaEditorial").val()}
                myJson.push(formulario);
                var myString = JSON.stringify(formulario);
                var url = "../Controlador/Libro/CrearEditorial.php";
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
        });
    }
    function LimpiarEditorial() {
        $("#NombreEditorial").val("");
        $("#DireccionEditoriaal").val("");
        $("#TelEditorial").val("");
        $("#fechaEditorial").val("");
    }
    function EliminarEditorial() {
        $("#registar_Editorial").validate({
            rules: {
                NombreEditorial: {
                    required: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                var formulario = {
                    nombreEditorial: $("#NombreEditorial").val()
                }
                myJson.push(formulario);
                var myString = JSON.stringify(formulario);
                var url = "../Controlador/Libro/EliminarEditorial.php";
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
        });
    }
    function ActualizarTema() {
        var formulario = {
            nombreTema: $("#NombreTema").val(),
            Descricion: $("#observacionesTema").val()
        };
        myJson.push(formulario);
        var myString = JSON.stringify(formulario);
        var url = "../Controlador/Libro/ModificarTema.php";
        var parametro = myString;
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
    function BuscarTema() {
        $("#registar_Tema").validate({
            rules: {
                NombreTema: {
                    required: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                var formulario = {
                    nombreTema: $("#NombreTema").val()
                };
                myJson.push(formulario);
                var myString = JSON.stringify(formulario);
                var url = "../Controlador/Libro/BuscarTema.php";
                var parametro = myString;
                var metodo = function (respuesta) {
                    console.log(respuesta);
                    var data = $.parseJSON(respuesta);
                    console.log(data);
                    if (data.length != 0) {
                        console.log(data.nombreTema);
                        $("#NombreTema").val("" + data.nombreTema + "");
                        $("#observacionesTema").val("" + data.Descricion + "");
                    } else {
                        alert("el video beam no exite")
                    }
                };
                fajax(url, parametro, metodo);
            }
        });
    }
    function BuscarEditorial() {
        $("#registar_Editorial").validate({
            rules: {
                NombreEditorial: {
                    required: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                var formulario = {
                    nombreEditorial: $("#NombreEditorial").val()
                };
                myJson.push(formulario);
                var myString = JSON.stringify(formulario);
                var url = "../Controlador/Libro/BuscarEditorial.php";
                var parametro = myString;
                var metodo = function (respuesta) {
                    var data = $.parseJSON(respuesta);
                    if (data.length != 0) {
                        $("#NombreEditorial").val(data.nombreEditorial);
                        $("#DireccionEditoriaal").val(data.direccionEditorial);
                        $("#TelEditorial").val(data.telefonoEditorial);
                        $("#fechaEditorial").val(data.anoPublicacion);
                    } else {
                        alert("el video beam no exite")
                    }
                };
                fajax(url, parametro, metodo);
            }
        });
    }
    function BuscarAutor() {
        var formulario = {
            NombreAutor: $("#NombreAutor").val()
        };
        myJson.push(formulario);
        var myString = JSON.stringify(formulario);
        var url = "../Controlador/Libro/BuscarAutor.php";
        var parametro = myString;
        var metodo = function (respuesta) {
            var data = $.parseJSON(respuesta);
            if (data.length != 0) {
                $("#NombreAutor").val(data.NombreAutor);
                $("#observacionesAutor").val(data.Nota);
            } else {
                alert("el autor no exite");
            }
        };
        fajax(url, parametro, metodo);
    }
//---------------
// botones
    $("#tabla").click(function () {
        alert("mesaje");
    });
    $("#BTNIngresar").click(function () {
        login();
    });
    $("#CerrarSesion").click(function () {
        location.href = "cerrarSesion.php";
    });
    $("#Enviar_correo").click(function () {
        Correo();
    });
    $("#btnRegistrar").click(function () {
        registarUsuario();
    });
    $("#btnLimpiar").click(function () {
        LimpiarUsuario()
    });
    $("#login_lost_btn").click(function () {
        modalAnimate($formLogin, $formLost);
    });
    $("#lost_login_btn").click(function () {
        modalAnimate($formLost, $formLogin);
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
    $("#btnRegistrarVideoBeam").click(function () {
        RegistrarVideoBeam();
    });
    $("#btnLimpiarVideoBeam").click(function () {
        LimpiarVideoBeam()
    });
    $("#btnActualizarVideoBeam").click(function () {
        ActualizarVideoBeam()
    });
    $("#btnEliminarVideoBeam").click(function () {
        EliminarVideoBeam();
    });
    $("#btnBuscarVideoBeam").click(function () {
        BuscarVideoBeam();
    });
    $("#btnRegistrarComputador").click(function () {
        RegistrarComputador()
    });
    $("#btnLimpiarComputador").click(function () {
        LimpiarComputador()
    });
    $("#btnActualizaComputador").click(function () {
        ActualizaComputador()
    });
    $("#btnBuscarComputador").click(function () {
        buscarComputador();
    });
    $("#btnEliminarComputador").click(function () {
        EliminarComputador();
    });
    $("#btnRegistrarTema").click(function () {
        RegistrarTema();
    });
    $("#btnLimpiarTema").click(function () {
        LimpiarTema();
    });
    $("#btnActualizaTema").click(function () {
        ActualizarTema()
    });
    $("#btnEliminarTema").click(function () {
        EliminarTema();
    });
    $("#btnBuscarTema").click(function () {
        BuscarTema();
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
    $("#btnRegistrarEditorial").click(function () {
        RegistrarEditorial();
    });
    $("#btnLimpiarEditorial").click(function () {
        LimpiarEditorial();
    });
    $("#btnActualizaEditorial").click(function () {
        ActualizarEditorial();
    });
    $("#btnEliminarEditorial").click(function () {
        EliminarEditorial();
    });
    $("#btnBuscarEditorial ").click(function () {
        BuscarEditorial();
    });
    $("#btnRegistrarAutor ").click(function () {
        RegistrarAutor();
    });
    $("#btnLimpiarAutor").click(function () {
        LimpiarAutor();
    });
    $("#btnActualizaAutor ").click(function () {
        ActualizarAutor()
    });
    $("#btnEliminarAutor ").click(function () {
        EliminarAutor();
    });
    $("#btnBuscarAutor ").click(function () {
        BuscarAutor();
    });
    function ActualizarEditorial() {
        var formulario = {
            nombreEditorial: $("#NombreEditorial").val(),
            direccionEditorial: $("#DireccionEditoriaal").val(),
            telefonoEditorial: $("#TelEditorial").val(),
            anoPublicacion: $("#fechaEditorial").val()
        };
        myJson.push(formulario);
        var myString = JSON.stringify(formulario);
        var url = "../Controlador/Libro/ModificarEditorial.php";
        var parametro = myString;
        console.log(myString)
        var metodo = function (respuesta) {
            console.log(respuesta);
            var data = $.parseJSON(respuesta);
            if (data.sucess == 'ok') {
                alert("el usuario se registro con exito");
            } else {
                alert("No se pude registar al usuario");
            }
        };
        fajax(url, parametro, metodo);
    }
    function ActualizarAutor() {
        $("#registar_Autor").validate({
            rules: {
                NombreAutor: {
                    required: true,
                    minlength: 1
                }
            }, submitHandler: function () {
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
        });
    }
    function RegistrarLibro() {
        var formulario = {
            isbn: $("#Risbn").val(),
            titulo: $("#RTituo").val(),
            categoriaLibro: $("#RCategoria").val(),
            resena: $("#resenaLibro").val(),
            autor: $("#Autores").val(),
            editorial: $("#ListaEditores").val()
        }
        myJson.push(formulario);
        var myString = JSON.stringify(formulario);
        var url = "../Controlador/Libro/CrearLibro.php";
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
                console.log(respuesta)
            
//                var data = $.parseJSON(respuesta);
//                location.href = "ReservarLibro.php?isbn=" + data[0]['isbn'] + "&titulo=" + data[0]['titulo'] + "&autor=" + data[0]['autor'] +
//                        "&tema=" + data[0]['tema'] + "&editorial=" + data[0]['editorial'] + "&facultad=" + data[0]['facultad'] + "&resena=" + data[0]['resena']
//                        + "&imagen=" + data[0]['imagen'];
           };
            fajax(url, parametro, metodo);
        });
    }
    $("#btnBuscarPrestamo").click(function () {
        BuscarLibroPrestamo();
    });


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
            estado:2
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
});