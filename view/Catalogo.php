<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href= "../css/login.css" rel="stylesheet" type="text/css" style="display:none;visibility:hidden"https://www.googletagmanager.com/ns.html?id=GTM-MWD3VXM" height="0" width="0">
              <link href= "../css/pantilla.css" rel="stylesheet" type="text/css" style="display:none;visibility:hidden"https://www.googletagmanager.com/ns.html?id=GTM-MWD3VXM" height="0" width="0">

        <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script>
        <script src="../js/additional-methods.js" type="text/javascript"></script>
        <script src="../js/localization/messages_es.js" type="text/javascript"></script>
        <script src="" type="text/javascript"></script>
        <script src="../gato.jsp" type="text/javascript"></script>
        <title>BiblioCur</title>
    </head>
    <body >
        <header > <?php if ($_SESSION) { ?>
                <div id = "cabezara1"></div>
                <script src="../js/loginNormal.js" type="text/javascript"></script>
            <?php } else { ?>
                <div id = "cabezara"></div>
                <script src="../js/loginNormal.js" type="text/javascript"></script>
            <?php } ?> 
            <script>
                $(document).ready(function () {
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
                        var url = "../controlador/Libro/MasBuscado.php";
                        var parametro = "hola";
                        var metodo = function (respuesta) {
                            var data = $.parseJSON(respuesta);
                            console.log(data);
                            var limite = data.length;
                            for (var i = 0; i < limite; i++) {
                                var local = data[i];
                                item(local, i);
                            }
                        };
                        fajax(url, parametro, metodo);
                    }
                    function item(tmp, i) {
                        var ejemplo = boton();
                        console.log(ejemplo);
                        var estr = $("<tr></tr>");
                        estr.append("<td>" + i + "</td>"
                                + "<td><img src=" + tmp.imagen + "   width=100 height=100></td>"
                                + "<td><p> Titulo :" + tmp.titulo + " Autor:" + tmp.nombreAutor + "</p></td>"
                                + ejemplo);
                        $("#respuesta").append(estr);
                    }
                    window.onload = Catalogo();
                });</script>
            <?php if ($_SESSION) { ?>
                <script> function  boton() {
                        return "<td> <button type= \"button\" id=\"login-modal\" class=\"btn btn-success\">Reservas</button><button type= \"button\" class=\"btn btn-success\">Mas informacion</button></td>";
                    }
                </script> <?php } else {
                ?>
                <script> function  boton() {
                        return "<td>\n\
     <button type=\"button\" class=\"btn btn-dark\" data-toggle=\"modal\" data-target=\"#login-modal\">\n\
\n\
\n\
Reservas</button>\n\
    <button type= \"button\" class=\"btn btn-success\">Mas informacion</button></td>";
                    }
                </script>
            <?php } ?>
        </header>
        <div class ="container ">
            <section class ="main row">
                <aside class="col-md-3">
                    <div class="btn-group-vertical" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-secondary">Catalogo en línea   </button>
                        <button type="button" class="btn btn-secondary">Préstamos, consulta y renovación   </button>
                        <button type="button" class="btn btn-secondary">Sugerir títulos    </button>
                        <?php if ($_SESSION) { ?>
                            <button type="button" id="CerrarSesion1" class="btn btn-secondary" data-toggle="modal" data-target="#login-modal"> Cerrar sesión </button>
                        <?php } else { ?>
                            <button type="button"   class="btn btn-secondary" data-toggle="modal" data-target="#login-modal"> Iniciar sesión </button>
                        <?php } ?>
                    </div>
                    <div class="d-none d-lg-block">
                        <a class="twitter-timeline" data-width="220" data-height="220" href="https://twitter.com/fabi_die?ref_src=twsrc%5Etfw">Tweets by fabi_die</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        <!-- Load Facebook SDK for JavaScript -->
                        <div id="fb-root"></div>
                        <script>(function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id))
                        return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0';
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>

                        <!-- Your embedded comments code -->
                        <div class="fb-comment-embed" data-href="https://www.facebook.com/zuck/posts/10102577175875681?comment_id=1193531464007751&amp;reply_comment_id=654912701278942" data-width="220" data-include-parent="false"></div>
                    </div>
                </aside>
                <div class = "col-9 " >
                    <table class="table table-bordered table-dark" >
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Portada</th>
                                <th scope="col">Titulo y Autor</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tbody id="respuesta">
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <footer > 
            <div id = "pie">
            </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>