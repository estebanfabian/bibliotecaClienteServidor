$(document).ready(function () {
    var cambio = 0;
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
                    if (data.length == 0) {
                        alert("El código o clave esta errada ");
                        $('#login-modal').modal('hide');
                        var url1 = "IntentoFallido";
                        var metodo1 = function (respuesta) {};
                        fajax(url1, parametro, metodo1);
                    } else {
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        iniciarSeccion(respuesta);
                        var url1 = "IntentoExitoso";
                        var metodo1 = function (respuesta) {};
                        fajax(url1, parametro, metodo1);
                    }
                };
                fajax(url, parametro, metodo);
            }
        });
    }
    function multa() {
        var formulario = {
            codigo: $("#codigo").val()
        };
        var url = "Multas";
        var parameto = myjson(formulario);
        var metodo = function (respuesta) {
            var data = $.parseJSON(respuesta);
            if (data[0]['multa'] == 0)
            {
                alert("no tiene multa");
            } else {
                alert("usted tiene multa" + data[0]['multa']);
            }
        };
        fajax(url, parameto, metodo);
    }
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
                var url = "../Controlador/Usuario/Insertar_Usuario.php";
                var parametro = myjson(formulario);
                var metodo = function (respuesta) {
                    var data = $.parseJSON(respuesta);
                    if (data.sucess == 'ok') {
                        alert("el usuario se registro con exito");
                        LimpiarUsuario();
                    } else {
                        alert("No se pude registar al usuario");
                    }
                };
                fajax(url, parametro, metodo);
            }
        });
    }
    function iniciarSeccion(respusta) {
        var url = "inicioSesion.php";
        var parameto = respusta;
        var metodo = function (ssw) {
        };
        fajax(url, parameto, metodo);
        location.href = "index.php";
    }
    function Correo() {
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

                var url = "Correo";
                var parametro = myjson(formulario);
                var metodo = function (respuesta) {
                    $("#lost_codigo").val("");
                    $("#lost_email").val("");
                    var data = $.parseJSON(respuesta);
                    if (data == "no") {
                        alert("El código o clave esta errada ")
                    } else {
                        $('#login-modal').modal('hide');
                    }
                };
                fajax(url, parametro, metodo);
            }
        });
    }
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
        } else {
            alert("ingrese los valores en los campos ");
            $("#password1").val("");
            $("#password2").val("");
        }
    });
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
                var url = "../Controlador/VideoBeam/RegistrarVideoBeam.php";
                var parametro = myjson(formulario);
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
        var url = "../Controlador/VideoBeam/ActualizarVideoBeam.php";
        var parametro = myjson(formulario);
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
                var url = "../Controlador/VideoBeam/EliminarVideoBeam.php";
                var parametro = myjson(formulario);

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
                var url = "../Controlador/VideoBeam/BuscarVideoBeam.php";
                var parametro = myjson(formulario);
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
                };
                var url = "../Controlador/Computador/RegistrarComputador.php";
                var parametro = myjson(formulario);
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
        };
        var url = "../Controlador/Computador/ActualizarComputador.php";
        var parametro = myjson(formulario);
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
                };
                var url = "../Controlador/Computador/BuscarComputador.php";
                var parametro = myjson(formulario);
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
                };
                var url = "../Controlador/Computador/EliminarComputador.php";
                var parametro = myjson(formulario);
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
    function myjson(formulario) {
        myJson.push(formulario);
        var myString = JSON.stringify(formulario);
        return myString;
    }
//--------------------------botones---------------------//
    $("#BTNIngresar").click(function () {
        login();
    });

    $("#CerrarSesion").click(function () {
        location.href = "cerrarSesion.php";
    });

    $("#Enviar_correo").click(function () {
        Correo();
    });

    $("#btnmultas").click(function () {
        multa();
    });
});