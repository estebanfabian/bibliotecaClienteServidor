<style>
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -1px;
    }
</style>

<div  id ="cabezara" class ="container">
    <script src="../js/inicio.js" type="text/javascript"></script>
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
                    <img class="img-circle" id="img_logo" src="../img/recurso/escudo.png">
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
        <div class="col-4">
            <img src="../img/recurso/cur.png">
        </div>
        <div class="col-4">
            <img src="../img/recurso/mensaje.png">
        </div>
        <div class="col-4">
            <img src="../img/recurso/escudo.png" width="100" height="100">
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
                            <a class="dropdown-item" href="misionYvision.php">Misión y Visión </a>
                            <a class="dropdown-item" href="AcercaBiblioCur.php">Acerca de BilioCur</a>
                            <a class="dropdown-item" href="http://urepublicana.edu.co">Cur</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Prestamo
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Libro</a>
                            <a class="dropdown-item" href="#">Video Beam</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="noticias.php">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contactanos</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>