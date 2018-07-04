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
                        console.log(respuesta);
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        envio(respuesta);
                    }
                };
                fajax(url1, parametro1, metodo1);
            }
        });
    }

    function registarUsuario() {
        $("#registar_usuario").validate({
            rules: {
//                codigo: {
//                    required: true,
//                    number: true,
//                    digits: true,
//                    minlength: 1
//                },
//                nombre: {
//                    required: true,
//                    minlength: 1
//                },
//                apellido: {
//                    required: true,
//                    minlength: 1
//                },
//                fechaNacimiento: {
//                    required: true,
//                    minlength: 1
//                },
//                sexo: {
//                    required: true,
//                },
//                Perfil: {
//                    required: true,
//                },
//                direccion: {
//                    required: true,
//                    minlength: 1
//                },
//                telefono: {required: true,
//                    minlength: 1
//                },
//                coreeo: {
//                    required: true,
//                    minlength: 1
//                },
//                contrasena: {
//                    required: true,
//                    minlength: 1
//                }
            },
            messages: {
                codigo: {
                    digits: "Este campo no puede tener ni comas, ni puntos",
                    number: "Este campo solo permite número"
                }
            }, submitHandler: function () {

                var NombreFoto = $("#file").val();
                NombreFoto = palabra(NombreFoto);
                var formulario = {
                    codigo: $("#codigo").val(),
                    nombre: $("#nombre").val(),
                    apellido: $("#apellido").val(),
                    fechaNacimiento: $("#fechaNacimiento").val(),
                    sexo: $("#sexo").val(),
                    direccion: $("#direccion").val(),
                    telefonoPrincipal: $("#telefono").val(),
                    emailPrincipal: $("#coreeo").val(),
                    contrasena: $("#clave").val(), foto: NombreFoto,
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
                console.log(formulario);
                myJson.push(formulario);
                var myString = JSON.stringify(formulario);
                var url1 = "../Controlador/Usuario/Insertar_Usuario.php";
                var parametro1 = myString;
                var metodo1 = function (respuesta) {
                    $("#codigo").val("");
                    $("#contrasena").val("");
                    var data = $.parseJSON(respuesta);
                    if (data.sucess == 'ok') {
                        alert("el usuario se registro con exito");
                        // LimpiarUsuario();
                        var url1 = "../Controlador/Usuario/Cargar_Foto.php";
                        var parametro1 = NombreFoto;
                        var metodo1 = function (respuesta) {
                        };
                        fajax(url1, parametro1, metodo1);
                    } else {
                        alert("No se pude registar al usuario");
                        console.log(respuesta);
                        console.log(data.sucess);
                    }
                };
                fajax(url1, parametro1, metodo1);
            }
        });
    }

    function envio(respusta) {
        var url = "inicioSesion.php";
        var parameto = respusta;
        var metodo = function (ssw) {
        };
        fajax(url, parameto, metodo);
        //alert(parameto);
        location.href = "index.php";
    }

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

    function LimpiarUsuario() {
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
        //registarUsuario();
        alert("entra");
        cargarFoto();

    });

    $("#btnLimpiar").click(function () {
                alert("entra");
        cargarFoto();
    });

    $("#login_lost_btn").click(function () {
        modalAnimate($formLogin, $formLost);
    });

    $("#lost_login_btn").click(function () {
        modalAnimate($formLost, $formLogin);
    });
});