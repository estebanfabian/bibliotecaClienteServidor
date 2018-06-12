<?php
session_start();
echo $_SESSION["usuario"]["perfil"];
?>
<div  id ="cabezara" class ="container">
    <div class="row justify-content-end">
        <div class="col-4">
            <img src="../img/usuario/icono_foto.png" class="rounded float-left" alt=""  width="40" height="40"/>
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
        <img src="../img/recurso/cur.png">
    </div>
    <div class="col-4">
        <img src="../img/recurso/mensaje.png">
    </div>
    <div class="col-4">
        <img src="../img/recurso/escudo.png">
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
                <?php if ($_SESSION["usuario"]["perfil"] == "administrador") { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administraciòn
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="view/registrarUsuario.php">Registrar Usuario</a>
                            <a class="dropdown-item" href="#">Video Beam</a>
                            <a class="dropdown-item" href="#">Material audiovisual</a>
                        </div>
                    <?php } ?>
            </ul>
        </div>
    </nav>
</div>


<div id ="pie" class = "container-fluid">
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

<?php
//} else {
//    header("location: ../index.php");
//}
?>