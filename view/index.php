<?php ?>

<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; char	set=utf-8" />
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href= "../css/login.css" rel="stylesheet" type="text/css" style="display:none;visibility:hidden"https://www.googletagmanager.com/ns.html?id=GTM-MWD3VXM" height="0" width="0">
              <link href= "../css/pantilla.css" rel="stylesheet" type="text/css" style="display:none;visibility:hidden"https://www.googletagmanager.com/ns.html?id=GTM-MWD3VXM" height="0" width="0">


        <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script>
        <script src="../js/additional-methods.js" type="text/javascript"></script>
        <script src="../js/localization/messages_es.js" type="text/javascript"></script>-->
        <script src="" type="text/javascript"></script>
        <script src="../js/MiLogica.js" type="text/javascript"></script>


        <title>Red Distrital de Bibliotecas Públicas - Biblored</title>
    </head>
    <body>
        <header> 
            <div class ="container">

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
                                <img class="img-circle" id="img_logo" src="../img/escudo.png">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                            </div>
                            <!-- Begin # DIV Form -->
                            <div id="div-forms">

                                <!-- Begin # Login Form -->
                                <form id="login-form" name ="login-form" >
                                    <div class="modal-body">
                                        <div id="div-login-msg">
                                            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                            <span id="text-login-msg">Ingrese su código y contraseña</span>
                                        </div>
                                        <input id="login_username" name = "login_username" class="form-control" type="text" placeholder="Código" required>
                                        <input id="login_password" name =  "login_password"class="form-control" type="password" placeholder="Contraseña" required>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Recuerdame
                                            </label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div>
                                            <button type="submit"  class="btn btn-primary btn-lg btn-block">Ingresar</button>
                                        </div>
                                        <div>
                                            <button id="login_lost_btn" type="button" class="btn btn-link">¿Olvidaste tu contraseña?</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- End # Login Form -->

                                <!-- Begin | Lost Password Form -->
                                <form id="lost-form" style="display:none;">
                                    <div class="modal-body">
                                        <div id="div-lost-msg">
                                            <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                                            <span id="text-lost-msg">Type your e-mail.</span>
                                        </div>
                                        <input id="lost_email" class="form-control" type="text" placeholder="E-Mail (type ERROR for error effect)" required>
                                    </div>
                                    <div class="modal-footer">
                                        <div>
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                                        </div>
                                        <div>
                                            <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                                            <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
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
                    <div class="col-4">
                        <img src="../img/cur.png">
                    </div>
                    <div class="col-4">
                        <img src="../img/mensaje.png">
                    </div>
                    <div class="col-4">
                        <img src="../img/escudo.png">
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
                                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Quiénes somos 
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Miscion</a>
                                        <a class="dropdown-item" href="#">Viscion action</a>
                                        <a class="dropdown-item" href="#">Acerca de XXX</a>
                                        <a class="dropdown-item" href="#">Cur</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Prestamo
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Libro</a>
                                        <a class="dropdown-item" href="#">Video Beam</a>
                                        <a class="dropdown-item" href="#">Material audiovisual</a>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">Noticias</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contactanos</a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            <!--
            
            -->
        </div>
    </header>
    <div class ="container ">
        <section class ="main row">
            <aside class="col-md-3">
                <div class="btn-group-vertical" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary">Catalogo en línea   </button>
                    <button type="button" class="btn btn-secondary">Préstamos, consulta y renovación   </button>
                    <button type="button" class="btn btn-secondary">Sugerir títulos    </button>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#login-modal"> Iniciar sesión </button>
                </div>
            </aside>

            <div class = "col-md-9">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="../img/Welcome-wallpaper-9779294.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="../img/Wild_Lion-wallpaper-10771164.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="../img/Wolfie-wallpaper-10713295.jpg" alt="Third slide">
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
                    <!--Institución de Educación Superior Sujeta a Inspección y Vigilancia por el Ministerio de Educación Nacional, con Personería jurídica reconocida mediante resolución No 3061 del 02 de diciembre de 1999, expedida por el Ministerio de Educación Nacional.
                    <br>
                    <br>
                    -->
                    <address>
                        <img src="../img/if_building-o_1608589.png" width="16" height="16" class="d-inline-block align-top" alt=""> Sede Administrativa: Cr 7 No 19-38 <br>
                        <img src="../img/if_f095_213074.png" width="11" height="16" class="d-inline-block align-top" alt=""> Teléfono :
                        (57)(1) 2862384 Ext.110<br>
                        Bogotá, Colombia
                    </address>

                    <!--
                    <address>
                    <strong>Full Name</strong><br>
                    <a href="mailto:#">first.last@example.com</a>
                    </address>-->
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
                    <img src="../img/if_Facebook_194929.png" class="rounded float-left ejemplo" alt="...">
                    <img src="../img/if_Twitter_194909.png" class="rounded float-left ejemplo" alt="...">
                    <img src="../img/if_Intsagram_194923.png" class="rounded float-left ejemplo" alt="...">
                    <img src="../img/if_YouTube_194904.png" class="rounded float-left ejemplo" alt="...">
                    <img src="../img/if_LinkedIn_194920.png" class="rounded float-left ejemplo" alt="...">
                    <img src="../img/if_whatsapp_115679.png" class="rounded float-left ejemplo" alt="...">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p align ="center" style="font-size:11px;margin-bottom: 0px;">
                        © Corporación Universitaria Republicana 2017
                    </p>
                </div> 
            </div>

    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script></body>

</html>