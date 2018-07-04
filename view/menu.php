<?php
if ($_POST) {
    session_start();
    ?>
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
        <div class="row justify-content-end">
            <div class="col-4">
                <img src="img/usuario/icono_foto.png" class="rounded float-left" alt=""  width="40" height="40"/>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION["usuario"]["nombre"]; ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Configuración</a>
                        <a class="dropdown-item" href="cerrarSesion.php">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <img src="img/recurso/cur.png">
        </div>
        <div class="col-4">
            <img src="img/recurso/mensaje.png">
        </div>
        <div class="col-4">
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
                        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Quiénes somos 
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Misión</a>
                            <a class="dropdown-item" href="#">Visión</a>
                            <a class="dropdown-item" href="#">Acerca de BilioCur</a>
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
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contactanos</a>
                    </li>
                    <?php if ($_SESSION["usuario"]["perfil"] == "administrador") { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Gestion
                            </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                     <a class="dropdown-item" href="view/registrarUsuario.php">Registrar Usuario</a>
                                        <a class="dropdown-item" href="#">Video Beam</a>
                                        <a class="dropdown-item" href="#">Material audiovisual</a>
                                    </div>
                        </li>
                </div>
                <div>


                </div>
            <?php } ?>
            </ul>
    </div>
   

    <?php
} else {
    header("location: ../index.php");
}
?>