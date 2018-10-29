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
    <body>
        <header > <?php if ($_SESSION) { ?>
                <div id = "cabezara1"></div>
                <script src="../js/loginNormal.js" type="text/javascript"></script>
            <?php } else { ?>
                <div id = "cabezara"></div>
                <script src="../js/loginNormal.js" type="text/javascript"></script>
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
                <div class = "col-md-9">
                    <div id="serv_otros" class="content_inter mostrar">
                        <p>	
                        </p><h4>Otros Servicios</h4>
                        <h5> Cartas de Presentación</h5>
                        Las cartas de presentación permiten a la comunidad republicana el acceso a otras bibliotecas de la ciudad.
                        <br>El servicio puede solicitarse en la biblioteca o diligenciando el formato que encontrará en el sistema académico en la sección de Biblioteca, <a target="_blank" href="https://academiaurepublicana.org/ArKa/test/new_login.php">aquí</a>
                        <h5> Elaboración de Bibliografías</h5>
                        Recopilación de las reseñas bibliográficas sobre un tema específico, a solicitud del usuario, a partir de las colecciones de la Biblioteca de la Corporación.
                        <br>El servicio puede solicitarse en la biblioteca o diligenciando el formato que encontrará en el sistema académico en la sección de Biblioteca, <a target="_blank" href="https://academiaurepublicana.org/ArKa/test/new_login.php">aquí</a>
                        <h5> Formación de Usuarios</h5>
                        Inducciones y capacitaciones sobre el uso y el manejo de los servicios y recursos de la Biblioteca.
                        <br>Las inducciones están dirigidas a los docentes y los estudiantes nuevos y consiste en una revisión general de los servicios presenciales y en línea que ofrece la Biblioteca.
                        <br>Mediante las capacitaciones se ofrece a estudiantes y docentes la posibilidad de aprender a utilizar el Catálogo en línea y las bases de datos. Las capacitaciones se pueden solicitar personalmente en la Biblioteca.
                        <h5> Servicio de Referencia</h5>
                        Es el servicio de asesoría que el personal de la Biblioteca presta de forma individualizada a un usuario, para la búsqueda y recuperación de información.
                        <h5> Préstamo de equipos audiovisuales</h5>
                        La Biblioteca cuenta con herramientas como video beam y computadores portátiles, disponibles para apoyar las actividades académicas de la comunidad republicana. La reserva de estos equipos debe hacerse directamente en la Biblioteca, con mínimo 3 días de anticipación a la actividad.
                        <h5> Red Inalámbrica</h5>
                        Contamos con red inalámbrica en todos los espacios de la Biblioteca para la conexión de equipos móviles.
                        <p></p>
                    </div>
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