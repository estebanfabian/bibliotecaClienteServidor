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
        <link href= "css/login.css" rel="stylesheet" type="text/css" style="display:none;visibility:hidden"https://www.googletagmanager.com/ns.html?id=GTM-MWD3VXM" height="0" width="0">
              <link href= "css/pantilla.css" rel="stylesheet" type="text/css" style="display:none;visibility:hidden"https://www.googletagmanager.com/ns.html?id=GTM-MWD3VXM" height="0" width="0">

        <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="js/jquery.validate.js" type="text/javascript"></script>
        <script src="js/additional-methods.js" type="text/javascript"></script>
        <script src="js/localization/messages_es.js" type="text/javascript"></script>
        <script src="" type="text/javascript"></script>
        <script src="gato.jsp" type="text/javascript"></script>

        <title>BiblioCur</title>
    </head>
    <body>
        <header> <?php if ($_SESSION) {
    ?>
                <script src="js/login.js" type="text/javascript"></script>
                <div  id ="cabezara" class ="container"></div>
            <?php } else { ?>
                <div  id ="cabezara" class ="container">

                    <div class="row justify-content-end">

                        <div class="col-4">
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#login-modal">Login</button>
                        </div>
                    </div>
                    <!-- BEGIN # MODAL LOGIN -->
                    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" align="center">
                                    <img class="img-circle" id="img_logo" src="img/recurso/escudo.png">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </button>
                                </div>
                                <!-- Begin # DIV Form -->
                                <div id="div-forms">
                                    <!-- Begin # Login Form -->
                                    <form id="login-form" name ="login-form" method="POST" >
                                        <div class="modal-body">
                                            <div id="div-login-msg">
                                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                                <span id="text-login-msg">Ingrese su código y contraseña</span>
                                            </div>
                                            <input id="codigo" name = "codigo" class="form-control" type="text" placeholder="Código" required>
                                            <input id="contrasena" name =  "contrasena" class="form-control" type="password" placeholder="Contraseña" required>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Recuerdame
                                                </label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div>
                                                <button id ="BTNIngresar" type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
                                            </div>
                                            <div>
                                                <button id="login_lost_btn" type="reset" class="btn btn-link" >¿Olvidaste tu contraseña?</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End # Login Form -->
                                    <!-- Begin | Lost Password Form -->
                                    <form id="lost-form" style="display:none;">
                                        <div class="modal-body">
                                            <div id="div-lost-msg">
                                                <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                                                <span id="text-lost-msg">Ingrese su código y correo registrado</span>
                                            </div>
                                            <input id="lost_codigo" name = "lost_codigo" class="form-control" type="text" placeholder="Código" required>
                                            <input id="lost_email" name =  "lost_email" class="form-control" type="email" placeholder="Contraseña" required>
                                        </div>
                                        <div class="modal-footer">
                                            <div>
                                                <button id="Enviar_correo" class="btn btn-primary btn-lg btn-block">Eniviar Correo</button>
                                            </div>
                                            <div>
                                                <button id="lost_login_btn" type="button" class="btn btn-link">Login</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End | Lost Password Form -->
                                </div>
                                <!-- End # DIV Form -->
                            </div>
                        </div>
                    </div>
                    <!-- END # MODAL LOGIN -->
                    <div class="row">

                        <div class="col-xs-1 col-md-4 ">
                            <img src="img/recurso/cur.png">
                        </div>
                        <div class="col-4 d-none d-lg-block">
                            <img src="img/recurso/mensaje.png">
                        </div>
                        <div class="col-xs-4 col-md-4">
                            <img src="img/recurso/escudo.png" width="100" height="100">
                        </div>
                    </div>
                    <div class="row ejemplo">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Quiénes somos 
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="view/misionYvision.php">Misión y Visión</a>
                                            <a class="dropdown-item" href="view/AcercaBiblioCur.php">Acerca de BilioCur</a>
                                            <a class="dropdown-item" href="http://urepublicana.edu.co/">Cur</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Prestamo
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="view/Catalogo.php">Libro</a>
                                            <a class="dropdown-item" href="view/videoBeam.php">Video Beam</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="view/noticias.php">Noticias</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Contactanos</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            <?php } ?>  </header>
        <div class ="container ">
            <section class ="main row">
                <aside class="col-md-3">
                    <div class="btn-group-vertical" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-secondary">Catalogo en línea   </button>
                        <button type="button" class="btn btn-secondary">Préstamos, consulta y renovación   </button>
                        <button type="button" class="btn btn-secondary">Sugerir títulos    </button>
                        <?php if ($_SESSION) { ?>
                            <button type="button" id="CerrarSesion"   class="btn btn-secondary" data-toggle="modal" data-target="#login-modal"> Cerrar sesión </button>
                        <?php } else { ?>
                            <button type="button"   class="btn btn-secondary" data-toggle="modal" data-target="#login-modal"> Iniciar sesión </button>
                        <?php } ?>
                    </div>
                    <div class="d-none d-lg-block">
                        <br>
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
                    <div id="carouselExampleIndicators" class="carousel slide d-none d-lg-block" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="img/recurso/Welcome-wallpaper-9779294.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="img/recurso/Wild_Lion-wallpaper-10771164.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="img/recurso/Wolfie-wallpaper-10713295.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
                <div class="row">
                    <div class="col-9 offset-3">
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.  Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
                        </p>
                    </div>
                </div>
                <div class="col-9 offset-3">
                    <table class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <footer >
            <div class = "container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <address>
                            <img src="img/recurso/if_building-o_1608589.png" width="16" height="16" class="d-inline-block align-top" alt=""> Sede Administrativa: Cr 7 No 19-38 <br>
                            <img src="img/recurso/if_f095_213074.png" width="11" height="16" class="d-inline-block align-top" alt=""> Teléfono :
                            (57)(1) 2862384 Ext.110<br>
                            Bogotá, Colombia
                        </address>
                    </div>
                    <div class="col-md-4">
                        <address>
                            <strong>Horario de atención</strong><br><br>
                            <strong>Usuarios Internos:</strong><br>
                            Lunes a Viernes: 7:00 a.m.a 10:00 p.m.<br>
                            Sábados: 7:00 a.m. a 1:00 p.m.<br>
                            <strong>Usuarios Externos:</strong><br>
                            Lunes a Viernes: 8:00 a.m.a 8:00 p.m.<br>
                            Sábados: 9:00 a.m. a 1:00 p.m.  <br>
                        </address>
                    </div>
                    <div class="col-md-4">
                        <img src="img/recurso/if_Facebook_194929.png" class="rounded float-left ejemplo" alt="...">
                        <img src="img/recurso/if_Twitter_194909.png" class="rounded float-left ejemplo" alt="...">
                        <img src="img/recurso/if_Intsagram_194923.png" class="rounded float-left ejemplo" alt="...">
                        <img src="img/recurso/if_YouTube_194904.png" class="rounded float-left ejemplo" alt="...">
                        <img src="img/recurso/if_LinkedIn_194920.png" class="rounded float-left ejemplo" alt="...">
                        <img src="img/recurso/if_whatsapp_115679.png" class="rounded float-left ejemplo" alt="...">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p align ="center" style="font-size:11px;margin-bottom: 0px;">
                            © Corporación Universitaria Republicana 2017
                        </p>
                    </div> 
                </div>
            </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script></body>