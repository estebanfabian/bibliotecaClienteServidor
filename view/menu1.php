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
    <input type="hidden" size="15" maxlength="30" value="<?php echo $_SESSION["usuario"]["codigo"]; ?>" name="nombre" id="codigo">
    <div  id ="cabezara1" class ="container">
        <div class="row justify-content-end">
            <div class="col-4">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION["usuario"]["nombre"]; ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#" id="btnmultas" name ="btnmultas">Multa programada</a> 
                        <script>
                            $(document).ready(function () {
                                var myJson = new Array();
                                function fajax(URL, parametros, metodo) {
                                    $.ajax({
                                        url: URL,
                                        data: parametros,
                                        type: 'post',
                                        cache: false,
                                        dataType: 'html', success: function (ZZx) {
                                            metodo(ZZx);
                                        },
                                        error: function (xhr, status) {
                                            alert("Existe un problema");
                                        }
                                    });
                                }
                                function envio1() {
                                    var formulario = {
                                        codigo: $("#codigo").val()
                                    };
                                    myJson.push(formulario);
                                    var myString = JSON.stringify(formulario);
                                    var url = "../Controlador/Usuario/Mostrar_multa.php";
                                    var parameto = myString;
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
                                $("#btnmultas").click(function () {
                                    envio1();
                                });
                            });
                        </script>
                        <a class="dropdown-item" href="CambiarClave.php">Cambiar Contraseña</a>
                        <a class="dropdown-item" href="../cerrarSesion.php">Cerrar Sesión</a>
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
                            <a class="nav-link" href="../index.php">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Quiénes somos 
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="misionYvision.php">Misión y Visión </a>
                                <a class="dropdown-item" href="AcercaBiblioCur.php">Acerca de BilioCur</a>
                                <a class="dropdown-item" href="http://urepublicana.edu.co">Cur</a>
                                  <a class="dropdown-item" href="OtroServicios.php">Otros Servicios</a>
                            </div>
                        </li>
                        <?php if (($_SESSION["usuario"]["perfil"] == "empleado" ) || ($_SESSION["usuario"]["perfil"] == "administrador")) { ?>
                            <li class = "nav-item dropdown">
                                <a class = "nav-link dropdown-toggle" href = "#" id = "navbarDropdownMenuLink" data-toggle = "dropdown" aria-haspopup = "true" aria-expanded = "false">
                                    Prestamo
                                </a>
                                <div class = "dropdown-menu" aria-labelledby = "navbarDropdownMenuLink">
                                    <a class = "dropdown-item" href = "Catalogo.php">Libro</a>
                                    <a class = "dropdown-item" href = "videoBeam.php">Video Beam</a>
                                </div>
                            </li>
                        <?php } ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Reserva
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="view/PrestamoLibro.php">Libro</a>
                                <a class="dropdown-item" href="view/videoBeam.php">Video Beam</a>
                            </div>
                        </li>
                        <?php if ($_SESSION["usuario"]["perfil"] == "administrador") { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Gestion
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="registrarUsuario.php">Registrar Usuario</a>
                                    <a class="dropdown-item" href="videoBeam.php">Video Beam</a>
                                    <a class="dropdown-item" href="view/RegistrarLibro.php">Material audiovisual</a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <?php
} else {
    header("location: ../index.php");
}
?>