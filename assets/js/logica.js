$(document).ready(function () {
    var op = 0;
    var cambio = 0;
    var myJson = new Array();
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
    function iniciarSeccion(respusta) {
        var url = "inicioSesion.php";
        var parameto = respusta;
        var metodo = function (ssw) {};
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
                    if (data === "no") {
                        alert("El código o clave esta errada ");
                    } else {
                        $('#login-modal').modal('hide');
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
            if (data[0]['multa'] === 0)
            {
                alert("no tiene multa");
            } else {
                alert("usted tiene multa" + data[0]['multa']);
            }
        };
        fajax(url, parameto, metodo);
    }
//--------------------- usuario---------------   
    function registarUsuario() {
        $("#registar_usuario").validate({
            rules: {
                cedula: {
                    required: true,
                    minlength: 1,
                    max: 13
                },
                codigoUsuario: {
                    required: true,
                    number: true,
                    digits: true,
                    minlength: 1,
                    max: 7
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
                    minlength: 1,
                    date: true
                },
                sexo: {
                    required: true
                },
                Perfil: {
                    required: true
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
                    minlength: 6
                }
            }, submitHandler: function () {
                usuario();
            }
        });
    }
    function LimpiarUsuario() {
        $("#cedula").val("");
        $("#codigoUsuario").val("");
        $("#nombre").val("");
        $("#apellido").val("");
        $("#fechaNacimiento").val("");
        $("#sexo").val("");
        $("#direccion").val("");
        $("#telefono").val("");
        $("#coreeo").val("");
        $("#clave").val("");
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
    function EliminarUsuario() {
        $("#registar_usuario").validate({
            rules: {
                codigoUsuario: {
                    required: true,
                    number: true,
                    digits: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                usuario();
            }
        });
    }
    function BuscarUsuario() {
        $("#registar_usuario").validate({
            rules: {
                codigoUsuario: {
                    required: true,
                    number: true,
                    digits: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                usuario();
            }
        });
    }
    function ActualizarUsuario() {
        var formulario = {
            cedula: $("#cedula").val(),
            codigo: $("#codigoUsuario").val(),
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
        var url = "Actualizar_user";
        var parametro = myjson(formulario);
        var metodo = function (respuesta) {
            var data = $.parseJSON(respuesta);
            if (data.sucess === 'ok') {
                alert("el usuario se actualizo con exito");
                LimpiarUsuario();
            } else {
                alert("No se pude actualizar al usuario");
            }
        };
        fajax(url, parametro, metodo);
    }
    function retricionUsuario() {
        try {
            $("#cedula").rules("remove");
            $("#nombre").rules("remove");
            $("#apellido").rules("remove");
            $("#fechaNacimiento").rules("remove");
            $("#sexo").rules("remove");
            $("#direccion").rules("remove");
            $("#telefono").rules("remove");
            $("#coreeo").rules("remove");
            $("#clave").rules("remove");
            $("#validatedCustomFile").rules("remove");
            $("#direccion2").rules("remove");
            $("#telefono2").rules("remove");
            $("#telefonoOtro").rules("remove");
            $("#nombreContacto").rules("remove");
            $("#apellidoContacto").rules("remove");
            $("#dirrecionContacto").rules("remove");
            $("#dirrecionContacto2").rules("remove");
            $("#telefonoContacto").rules("remove");
            $("#Perfil").rules("remove");
        } catch (e) {
        }
    }
    function usuario() {
        var formulario = {
            cedula: $("#cedula").val(),
            codigo: $("#codigoUsuario").val(),
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
        switch (op) {
            case 1:
                var url = "Insert_user";
                var parametro = myjson(formulario);
                var metodo = function (respuesta) {
                    var data = $.parseJSON(respuesta);
                    if (data.sucess === 'ok') {
                        alert("el usuario se registro con exito");
                        LimpiarUsuario();
                    } else if (data.sucess === 'no') {
                        alert("No se pude registar al usuario");
                    } else {
                        alert("El usuario ya se encuentra registrado");
                    }
                };
                fajax(url, parametro, metodo);
                break;
            case 2:
                var url = "Buscar_user";
                var parametro = myjson(formulario);
                var metodo = function (respuesta) {
                    var data = $.parseJSON(respuesta);
                    if (data.length > 0) {
                        $("#cedula").val("" + data[0]['cedula'] + "");
                        $("#codigoUsuario").val("" + data[0]['codigo'] + "");
                        $("#nombre").val("" + data[0]['nombre'] + "");
                        $("#apellido").val("" + data[0]['apellido'] + "");
                        $("#fechaNacimiento").val("" + data[0]['fechaNacimiento'] + "");
                        $("#sexo").val("" + data[0]['sexo'] + "");
                        $("#direccion").val("" + data[0]['direccion'] + "");
                        $("#telefono").val("" + data[0]['telefonoPrincipal'] + "");
                        $("#coreeo").val("" + data[0]['emailPrincipal'] + "");
                        $("#clave").val("" + data[0]['contrasena'] + "");
                        $("#direccion2").val("" + data[0]['direccion2'] + "");
                        $("#telefono2").val("" + data[0]['telefonoSecundario'] + "");
                        $("#telefonoOtro").val("" + data[0]['telefonoOtro'] + "");
                        $("#nombreContacto").val("" + data[0]['contactoNombre'] + "");
                        $("#apellidoContacto").val("" + data[0]['contactoApellido'] + "");
                        $("#dirrecionContacto").val("" + data[0]['contactoDireccion'] + "");
                        $("#dirrecionContacto2").val("" + data[0]['contactoDireccion2'] + "");
                        $("#telefonoContacto").val("" + data[0]['contactoTelefono'] + "");
                        $("#Perfil").val("" + data[0]['perfil'] + "");
                    } else {
                        alert("el usuario no exite");
                    }
                };
                fajax(url, parametro, metodo);
                break;
            case 3:
                var url = "Eliminar_user";
                var parametro = myjson(formulario);
                var metodo = function (respuesta) {
                    var data = $.parseJSON(respuesta);
                    console.log(respuesta);
                    if (data.sucess === 'ok') {
                        alert("el usuario se elimino con exito");
                        LimpiarUsuario();
                    } else {
                        alert("No se pude eliminar al usuario");
                    }
                };
                fajax(url, parametro, metodo);
                break;
            default:
                alert("error");
                break;
        }
    }
//------------------Cambio de clave-----------
    $("#CambioClave").click(function () {
        if (cambio === 10) {
            var formulario = {
                codigo: $("#codigo").val(),
                contrasena: $("#password1").val()
            };
            var url1 = "CambioClave";
            var parametro1 = myjson(formulario);
            var metodo1 = function (respuesta) {
                var data = $.parseJSON(respuesta);
                if (data.sucess === "ok") {
                    alert("Se cambio el la contraseña con exito ");
                    location.href = "index.php";
                } else {
                    alert("No secambio el la contraseña con exito ");
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

        if ($("#password1").val() === $("#password2").val()) {
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
    //--------------video beam -----------------------
    function retricionVideoBeam() {
        try {
            $("#idvideoBeam").rules("remove");
            $("#FabricanteVideoBeam").rules("remove");
            $("#CableUSB").rules("remove");
            $("#CableHDMI").rules("remove");
            $("#CableVGA").rules("remove");
            $("#txtObservacionesVideoBeam").rules("remove");
        } catch (e) {
        }
    }
    function videoBem() {
        var formulario = {
            idVideoBeam: $("#idvideoBeam").val(),
            fabricante: $("#FabricanteVideoBeam").val(),
            cableUSB: $("#CableUSB").val(),
            cableHDMI: $("#CableHDMI").val(),
            cableVGA: $("#CableVGA").val(),
            observaciones: $("#txtObservacionesVideoBeam").val()
        };
        switch (op) {
            case 1:
                var url = "RegistrarVideoBeam";
                var parametro = myjson(formulario);
                var metodo = function (respuesta) {
                    console.log(respuesta);
                    var data = $.parseJSON(respuesta);
                    if (data.sucess === 'ok') {
                        alert("el usuario se registro con exito");
                        LimpiarVideoBeam();
                    } else if (data.sucess === 'no') {
                        alert("No se pude registar al usuario");
                    } else {
                        alert("el video beam ya se encuentra registrado");
                    }
                };
                fajax(url, parametro, metodo);
                break;
            case 2:
                var url = "BuscarVideoBeam";
                var parametro = myjson(formulario);
                var metodo = function (respuesta) {
                    var data = $.parseJSON(respuesta);
                    if (data.length > 0) {
                        $("#idvideoBeam").val("" + data[0]['idVideoBeam'] + "");
                        $("#FabricanteVideoBeam").val("" + data[0]['fabricante'] + "");
                        $("#CableUSB").val("" + data[0]['cableUSB'] + "");
                        $("#CableHDMI").val("" + data[0]['cableHDMI'] + "");
                        $("#CableVGA").val("" + data[0]['cableVGA'] + "");
                        $("#txtObservacionesVideoBeam").val("" + data[0]['observaciones'] + "");
                    } else {
                        alert("el video beam no exite");
                    }
                };
                fajax(url, parametro, metodo);
                break;
            case 3:
                var url = "EliminarVideoBeam";
                var parametro = myjson(formulario);
                var metodo = function (respuesta) {
                    console.log(respuesta);
                    var data = $.parseJSON(respuesta);
                    if (data.sucess === 'ok') {
                        alert("se elimino con exito");
                        LimpiarVideoBeam();
                    } else {
                        alert("El video Beam no existe");
                    }
                };
                fajax(url, parametro, metodo);
                break;
            default:
                alert("error");
                break;
        }
    }
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
                videoBem();
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
        var url = "ActualizarVideoBeam";
        var parametro = myjson(formulario);
        var metodo = function (respuesta) {
            console.log(respuesta);
            var data = $.parseJSON(respuesta);
            if (data.sucess === 'ok') {
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
                videoBem();
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
                videoBem();
            }
        });
    }
    //----------------- computador----------------------
    function retricionComputador() {
        try {
            $("#idvideoBeam").rules("remove");
            $("#FabricanteVideoBeam").rules("remove");
            $("#CableUSB").rules("remove");
            $("#CableHDMI").rules("remove");
            $("#CableVGA").rules("remove");
            $("#txtObservacionesVideoBeam").rules("remove");
        } catch (e) {
        }
    }
    function computador() {
        var formulario = {
            idcomputador: $("#SerialComputador").val(),
            fabricante: $("#FabricanteComputador").val(),
            cargadorId: $("#SerialCargado").val(),
            observaciones: $("#observacionesComputador").val()
        };
        switch (op) {
            case 1:
                var url = "RegistrarComputador";
                var parametro = myjson(formulario);
                var metodo = function (respuesta) {
                    console.log(respuesta);
                    var data = $.parseJSON(respuesta);
                    if (data.sucess === 'ok') {
                        alert("el computador se registro con exito");
                        LimpiarVideoBeam();
                    } else if (data.sucess === 'no') {
                        alert("No se pude registar el computador");
                    } else {
                        alert("el computador ya se encuentra registrado");
                    }
                };
                fajax(url, parametro, metodo);
                break;
            case 2:
                var url = "BuscarComputador";
                var parametro = myjson(formulario);
                var metodo = function (respuesta) {
                    console.log(respuesta);
                    var data = $.parseJSON(respuesta);
                    if (data.length > 0) {
                        $("#SerialComputador").val("" + data[0]['idcomputador'] + "");
                        $("#FabricanteComputador").val("" + data[0]['fabricante'] + "");
                        $("#SerialCargado").val("" + data[0]['cargadorId'] + "");
                        $("#observacionesComputador").val("" + data[0]['observaciones'] + "");
                    } else {
                        alert("el Computador no exite");
                    }
                };
                fajax(url, parametro, metodo);
                break;
            case 3:
                var url = "EliminarComputador";
                var parametro = myjson(formulario);
                var metodo = function (respuesta) {
                    console.log(respuesta);
                    var data = $.parseJSON(respuesta);
                    if (data.sucess === 'ok') {
                        alert("el usuario se registro con exito");
                        LimpiarVideoBeam();
                    } else {
                        alert("El computador no exite");
                    }
                };
                fajax(url, parametro, metodo);
                break;
            default:
                alert("error");
                break;
        }
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
                computador();
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
        var url = "ActualizarComputador";
        var parametro = myjson(formulario);
        var metodo = function (respuesta) {
            console.log(respuesta);
            var data = $.parseJSON(respuesta);
            if (data.sucess === 'ok') {
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
                computador();
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
                computador();
            }
        });
    }
    //------ mi funciones-------------
    function myjson(formulario) {
        myJson.push(formulario);
        var myString = JSON.stringify(formulario);
        return myString;
    }
    function pie() {
        var url = "PiePagina.php";
        var parameto = "ejemplo";
        var metodo = function (ssw) {
            $("#piePagina").html(ssw);
        };
        fajax(url, parameto, metodo);
    }
    pie();
    //---------------- tema--------------------------
    function Tema() {
        var formulario = {
            nombreTema: $("#NombreTema").val(),
            Descricion: $("#observacionesTema").val()
        };
        alert(op);
        switch (op) {
            case 1:
                var url = "CrearTema";
                var parametro = myjson(formulario);
                var metodo = function (respuesta) {
                    var data = $.parseJSON(respuesta);
                    if (data.sucess === 'ok') {
                        alert("el Tema se registro con exito");
                        LimpiarTema();
                    } else {
                        alert("No se pude registar el tema");
                    }
                };
                fajax(url, parametro, metodo);
                break;
            case 2 :
                var url = "EliminarTema";
                var parametro = myjson(formulario);
                var metodo = function (respuesta) {
                    var data = $.parseJSON(respuesta);
                    if (data.sucess === 'ok') {
                        alert("se elimino con exito");
                        LimpiarVideoBeam();
                    } else {
                        alert("El tema noexiste");
                    }
                };
                fajax(url, parametro, metodo);
                break;
            case 3 :
                var url = "BuscarTema";
                var parametro = myjson(formulario);
                var metodo = function (respuesta) {
                    console.log(respuesta);
                    var data = $.parseJSON(respuesta);
                    if (data.length != 0) {
                        $("#NombreTema").val("" + data.nombreTema + "");
                        $("#observacionesTema").val("" + data.Descricion + "");
                    } else {
                        alert("el tema no exite")
                    }
                };
                fajax(url, parametro, metodo);
                break;
            default:
                alert("Error");
                break;
        }
    }
    function RegistrarTema() {
        alert("a");
        $("#registar_Tema").validate({
            rules: {
                NombreTema: {
                    required: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                Tema();
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
                Tema();
            }
        });
    }
    function ActualizarTema() {
        var formulario = {
            nombreTema: $("#NombreTema").val(),
            Descricion: $("#observacionesTema").val()
        };
        var url = "ModificarTema";
        var parametro = myjson(formulario);
        var metodo = function (respuesta) {
            console.log(respuesta);
            var data = $.parseJSON(respuesta);
            if (data.sucess === 'ok') {
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
                Tema();
            }
        });
    }
    function LimpiarTema() {
        $("#NombreTema").val("");
        $("#observacionesTema").val("");
    }
    //--------- autor----------------
    function LimpiarAutor() {
        $("#NombreAutor").val("");
        $("#observacionesAutor").val("");
    }
    function EliminarAutor() {
        $("#registar_Autor").validate({
            rules: {
                nombreAutor: {
                    required: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                Autor();
            }
        });
    }
    function ActualizarAutor() {

        $("#registar_Autor").validate({
            rules: {
                nombreAutor: {
                    required: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                var formulario = {
                    NombreAutor: $("#NombreAutor").val(),
                    NotaAutor: $("#observacionesAutor").val()
                };
                var url = "ModificarAutor";
                var parametro = myjson(formulario);
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
        });
    }
    function RegistrarAutor() {
        $("#registar_Autor").validate({
            rules: {
                nombreAutor: {
                    required: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                Autor();
            }
        });
    }
    function BuscarAutor() {
        $("#registar_Autor").validate({
            rules: {
                nombreAutor: {
                    required: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                Autor();
            }
        });
    }
    function Autor() {
        var formulario = {
            NombreAutor: $("#NombreAutor").val(),
            NotaAutor: $("#observacionesAutor").val()
        };
        switch (op) {
            case 1:
                var url = "CrearAutor";
                var parametro = myjson(formulario);
                var metodo = function (respuesta) {
                    var data = $.parseJSON(respuesta);
                    if (data.sucess === 'ok') {
                        alert("el usuario se registro con exito");
                        LimpiarVideoBeam();
                    } else {
                        alert("No se pude registar al usuario");
                    }
                };
                fajax(url, parametro, metodo);
                break;
            case 2 :
                var url = "BuscarAutor";
                var parametro = myjson(formulario);
                var metodo = function (respuesta) {
                    console.log(respuesta);
                    var data = $.parseJSON(respuesta);
                    if (data.length != 0) {
                        $("#NombreAutor").val(data[0]['NombreAutor']);
                        $("#observacionesAutor").val(data[0]['Nota']);
                    } else {
                        alert("el autor no exite");
                    }
                };
                fajax(url, parametro, metodo);
                break;
            case 3 :
                var url = "EliminarAutor";
                var parametro = myjson();
                var metodo = function (respuesta) {
                    console.log(respuesta);
                    var data = $.parseJSON(respuesta);
                    if (data.sucess === 'ok') {
                        alert("el usuario se registro con exito");
                        LimpiarVideoBeam();
                    } else {
                        alert("No se pude registar al usuario");
                    }
                };
                fajax(url, parametro, metodo);
                break;
            default:
                alert("Error");
                break;
        }
    }
    function editorial() {
        var formulario = {
            nombreEditorial: $("#NombreEditorial").val(),
            direccionEditorial: $("#DireccionEditoriaal").val(),
            telefonoEditorial: $("#TelEditorial").val(),
            anoPublicacion: $("#fechaEditorial").val()
        };
        switch (op) {
            case 1:
                var url = "CrearEditorial";
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
                break;
            case 2:
                var url = "BuscarEditorial";
                var parametro = myjson(formulario);
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
                break;
            case 3:
                var url = "EliminarEditorial";
                var parametro = myjson(formulario);
                var metodo = function (respuesta) {
                    console.log(respuesta);
                    var data = $.parseJSON(respuesta);
                    if (data.sucess === 'ok') {
                        alert("el usuario se registro con exito");
                        LimpiarVideoBeam();
                    } else {
                        alert("No se pude registar al usuario");
                    }
                };
                fajax(url, parametro, metodo);
                break;
            default:
                alert("Error");
                break;
        }
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
                editorial();
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
                editorial();
            }
        });
    }
    function ActualizarEditorial() {
        alert("ingresa");
        var formulario = {
            nombreEditorial: $("#NombreEditorial").val(),
            direccionEditorial: $("#DireccionEditoriaal").val(),
            telefonoEditorial: $("#TelEditorial").val(),
            anoPublicacion: $("#fechaEditorial").val()
        };
        var url = "ModificarEditorial";
        var parametro = myjson(formulario);
        alert("va bn");
        console.log(parametro);
        var metodo = function (respuesta) {
            console.log(respuesta);
            var data = $.parseJSON(respuesta);
            if (data.sucess === 'ok') {
                alert("el usuario se registro con exito");
            } else {
                alert("No se pude registar al usuario");
            }
        };
        fajax(url, parametro, metodo);
    }
    function BuscarEditorial() {
        $("#registar_Editorial").validate({
            rules: {
                NombreEditorial: {
                    required: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                editorial();
            }
        });
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
    $("#btnRegistrarUsuario").click(function () {
        op = 1;
        registarUsuario();
    });
    $("#btnEliminarUsuario").click(function () {
        op = 3;
        retricionUsuario();
        EliminarUsuario();
    });
    $("#btnBuscarUsuario").click(function () {
        op = 2;
        retricionUsuario();
        BuscarUsuario();
    });
    $("#btnActualizarUsuario").click(function () {
        ActualizarUsuario();
    });
    $("#btnLimpiarUsuario").click(function () {
        LimpiarUsuario();
    });
    $("#btnRegistrarVideoBeam").click(function () {
        op = 1;
        RegistrarVideoBeam();
    });
    $("#btnLimpiarVideoBeam").click(function () {
        LimpiarVideoBeam();
    });
    $("#btnActualizarVideoBeam").click(function () {
        ActualizarVideoBeam();
    });
    $("#btnEliminarVideoBeam").click(function () {
        op = 3;
        EliminarVideoBeam();
        retricionVideoBeam();
    });
    $("#btnBuscarVideoBeam").click(function () {
        op = 2;
        BuscarVideoBeam();
        retricionVideoBeam();
    });
    $("#btnRegistrarComputador").click(function () {
        RegistrarComputador();
        op = 1;
    });
    $("#btnLimpiarComputador").click(function () {
        LimpiarComputador();
    });
    $("#btnActualizaComputador").click(function () {
        ActualizaComputador();
    });
    $("#btnBuscarComputador").click(function () {
        op = 2;
        buscarComputador();
        retricionComputador();
    });
    $("#btnEliminarComputador").click(function () {
        op = 3;
        EliminarComputador();
        retricionComputador();
    });
    $("#btnRegistrarTema").click(function () {
        op = 1;
        RegistrarTema();
    });
    $("#btnLimpiarTema").click(function () {
        LimpiarTema();
    });
    $("#btnActualizaTema").click(function () {
        ActualizarTema();
    });
    $("#btnEliminarTema").click(function () {
        op = 2;
        EliminarTema();
    });
    $("#btnBuscarTema").click(function () {
        op = 3;
        BuscarTema();
    });
    $("#btnRegistrarAutor").click(function () {
        op = 1;
        RegistrarAutor();
    });
    $("#btnBuscarAutor").click(function () {
        op = 2;
        BuscarAutor();
    });
    $("#btnEliminarAutor").click(function () {
        op = 3;
        EliminarAutor();
    });
    $("#btnLimpiarAutor").click(function () {
        LimpiarAutor();
    });
    $("#btnActualizaAutor ").click(function () {
        ActualizarAutor();
    });
    $("#btnRegistrarEditorial").click(function () {
        op = 1;
        RegistrarEditorial();
    });
    $("#btnLimpiarEditorial").click(function () {
        LimpiarEditorial();
    });
    $("#btnActualizaEditorial").click(function () {
        ActualizarEditorial();
    });
    $("#btnEliminarEditorial").click(function () {
        op = 3;
        EliminarEditorial();
    });
    $("#btnBuscarEditorial ").click(function () {
        op = 2;
        BuscarEditorial();
    });
    $("#btnRegistrarLibro").click(function () {
        ////        var selected = $("#ListaTema").val();
////        alert(selected);
//
//        //  var inputFileImage = document.getElementById("fileToUpload");
//        //var file = $("#fileToUpload")[0].files[0];
//        //var file = inputFileImage.files[0];
//
//        $("#registar_Libro").validate({
//            rules: {
//                Risbn: {
//                    required: true,
//                    minlength: 1
//                },
//                RTituo: {
//                    required: true,
//                    minlength: 1
//                },
//                ListaEditores: {
//                    required: true,
//                    minlength: 1
//                },
//                ListaPublica: {
//                    required: true,
//                    minlength: 1
//                },
//                ListaCategoria: {
//                    required: true,
//                    minlength: 1
//                },
//                ListaAutores: {
//                    required: true,
//                    minlength: 1
//                },
//                ListaTema: {
//                    required: true,
//                    minlength: 1
//                }
//            }, submitHandler: function () {
        try {
            var filename = $("#fileToUpload")[0].files[0].name;
        } catch (e) {
            var filename = null;
        }
        var formulario = {
            isbn: $("#Risbn").val(),
            titulo: $("#RTituo").val(),
            resena: $("#resenaLibro").val(),
            autor: $("#ListaAutores").val(),
            editorial: $("#ListaEditores").val(),
            tema: $("#ListaTema").val(),
            lPublica: $("#ListaPublica").val(),
            lCategoria: $("#ListaCategoria").val(),
            imagen: filename

        };
        var url = "CrearLibro";
        var parametro = myjson(formulario);
        var metodo = function (respuesta) {
            console.log(respuesta);
            var data = $.parseJSON(respuesta);
            if (data.sucess === 'ok') {
                console.log(respuesta);
                var file = $('#fileToUpload').prop('files')[0];
                var data = new FormData();
                data.append('fileToUpload', file);
                if (filename != null) {
                    var url = "SubirPortada";
                    var parametro1 = data;
                    var metodo = function (respuesta) {
                        console.log(respuesta);
                    };
                    fajax(url, parametro1, metodo);
                }
            } else {

                var url = "CrearLibro";
                var metodo = function (respuesta) {
                    console.log(respuesta);
                };
                fajax(url, parametro, metodo);
            }

        };
        fajax(url, parametro, metodo);
        console.log(parametro);
//            }
//        });
    });
    function LimpiarLibro() {
        $("#Risbn").val("");
        $("#RTituo").val("");
        $("#resenaLibro").val("");
        $("#ListaAutores").val("");
        $("#ListaEditores").val("");
        $("#ListaTema").val("");
        $("#ListaPublica").val("");
        $("#ListaCategoria").val("");
        $("#fileToUpload").val("");
    }
    $("#btnRegistrarLibro").click(function () {
        LimpiarLibro();
    });

    function ActualizarLibro() {
        var formulario = {

        };
        var url = "../Controlador/Libro/ModificarAutor.php";
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
    function EliminarLibro() {
        $("#registar_VideoBeam").validate({
            rules: {
                Risbn: {
                    required: true,
                    number: true,
                    digits: true,
                    minlength: 1
                }
            }, submitHandler: function () {
                var formulario = {
                    isbn: $("#Risbn").val()
					};
                var url = "../Controlador/Libro/EliminarLibro.php";
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
    $("#btnBuscarLibro ").click(function () {
        BuscarLibro();
    });
    function BuscarLibro() {
        var formulario = {
            isbn: $("#Risbn").val()
        };
        var url = "../Controlador/Libro/ModificarAutor.php";
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
//----------------------------------------------------------//

//function RegistrarLibro() {
//var formulario = {
//isbn: $("#Risbn").val(),
//        titulo: $("#RTituo").val(),
//        categoriaLibro: $("#RCategoria").val(),
//        resena: $("#resenaLibro").val(),
//        autor: $("#Autores").val(),
//        editorial: $("#ListaEditores").val()
//};
//        var url = "CrearLibro";
//        var parametro = myjson(formulario);
//        var metodo = function (respuesta) {
//        console.log(respuesta);
//                var data = $.parseJSON(respuesta);
//                if (data.sucess == 'ok') {
//        alert("el usuario se registro con exito");
//                LimpiarVideoBeam();
//        } else {
//        alert("No se pude registar al usuario");
//        }
//        };
//        fajax(url, parametro, metodo);
//}

//function BuscarLibroPrestamo() {
//
//$("#btnBuscarPrestamo").click(function () {
//
//var formulario = {
//Consulta: $("#PrestamoIsbn").val()
//};
//        var url = "../tablaXid";
//        var parametro = myjson(formulario);
//        var metodo = function (respuesta) {
//        console.log(respuesta);
//                var data = $.parseJSON(respuesta);
//                var limite = data.length;
//                console.log(data);
//                for (var i = 0; i < limite; i++) {
//        var local = data[i];
//                item(local, i);
//        }
//        noDispo();
//                prestarLibro();
//        };
//        fajax(url, parametro, metodo);
//});
//}
//function item(tmp, i) {
//if (i == 0) {
//$("#PrestamoTabla").empty();
//        tabla(tmp);
//} else {
//tabla(tmp);
//}
//}
//functiontabla(tmp) {
//var estr = $("<tr></tr>");
//        estr.append("<td>" + tmp.isbn + "</td>"
//                + "<td><img src=" + tmp.imagen + " width=100 height=100></td>"
//                + "<td><p> Titulo :" + tmp.titulo + "<br> Autor:" + tmp.autor + " Editorial:" + tmp.editorial + "</p></td>"
//                + validacionEstado(tmp));
//        $("#PrestamoTabla").append(estr);
//}
//function validacionEstado(tmp) {
//if (tmp.estado == 'libre') {
//return "<td class ='prestar' post ='" + tmp.isbn + "' >Libre</td>";
//} else {
//return "<td class ='no_diponible' post ='" + tmp.isbn + "' >No disponible</td>";
//}
//}
//functionnoDispo() {
//$(".no_diponible").click(function () {
//alert("materia no disponoble");
//        var lo = prompt("ejemplo", "");
//        console.log(lo);
//})
//}
//function prestarLibro() {
//$(".prestar").click(function () {
//
//var lo = prompt("Codigo del estudiante que solicita el libro", "");
//        if (lo == null || lo == "") {
//alert("No hay codigo de estudiante");
//} else
//{
//var formulario = {
//codigo: $("#codigoPrestamo").val()
//};
//        var url = "../Conta_res";
//        var parameto = myjson(formulario);
//        var metodo = function (respuesta) {
//        var data = $.parseJSON(respuesta);
//                if (data[0]['count'] < 4) {
//        Prestamo1();
//        } else {
//        alert("tiene el numero maximo de reservas o prestamos")
//        }
//        };
//        fajax(url, parameto, metodo);
//}
//
//})
//}
//function Pretamo() {
//var fecha = $("#datetimepicker1").val();
//        var ejemplo = fecha.split(":T11:");
//        var formulario = {
//        codigo: $("#codigo").val()
//        };
//        var url = "../Conta_res";
//        var parameto = myjson(formulario);
//        var metodo = function (respuesta) {
//        var data = $.parseJSON(respuesta);
//                if (data[0]['count'] < 4) {
//        Prestamo1();
//        } else {
//        alert("tiene el numero maximo de reservas o prestamos")
//        }
//        };
//        fajax(url, parameto, metodo);
//}
//function Prestamo1() {
//if (moment().format("dddd") == "Sunday") {
//var fechaReserva = moment().add(2, "days").format('YYYY/MM/DD hh:mm:ss');
//} else {
//var fechaReserva = moment().add(1, "days").format('YYYY/MM/DD hh:mm:ss');
//}
//var txt = document.getElementById("isbnReserva");
//        txt = (txt.innerHTML);
//        var formulario = {
//        diaPrestamo: moment().format('YYYY/MM/DD hh:mm:ss'),
//                isbn: txt,
//                codigo: $("#codigo").val(),
//                diaEntrega: fechaReserva,
//                estado: 2
//        };
//        var url = "../reserva";
//        var parameto = myjson(formulario);
//        var metodo = function (respuesta) {
//        console.log(respuesta);
//                var data = $.parseJSON(respuesta);
//                if (data.sucess == "ok") {
//        alert("La reserva del libro fue un éxito");
//                location.href = "../index.php"
//        } else {
//        alert("Hubo un problema con la reserva intentolo mas tarde");
//        }
//        };
//        fajax(url, parameto, metodo);
//        alert(parameto);
//}
////-------------------------------------------------------
//// botones
////$("#tabla").click(function () {
////alert("mesaje");
////        });
////        $("#btnCatalogoLinea").click(function () {
////// Catalogo();
////location.href = "view/Catalogo.php";
////        });
////        $("#btnResercarLibro").click(function () {
////reserva();
////        });
////        $("#btnVolverCatalogo").click(function () {
////location.href = "Catalogo.php";
////        });
////        $("#btnRegistrarLibro ").click(function () {
////RegistrarLibro();
////        });
////        $("#btnLimpiarLibro ").click(function () {
////LimpiarLibro();
////        });
////        $("#btnActualizaLibro ").click(function () {
////ActualizarLibro();
////        });
////        $("#btnEliminarLibro ").click(function () {
////EliminarLibro();
////        });
////        
//        $("#btnBuscarPrestamo").click(function () {
//BuscarLibroPrestamo();
//        });   
});