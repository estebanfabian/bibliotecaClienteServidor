<?php
/**
 * Long Desc 
 * */
/**
 * Capa de presentación de para Registrar ,buscar modificar y eliminar ;
 * los libros , categoria, temas y autores
 * 
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * */
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="../assets/img/img/recurso/escudo1.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>BiblioCur</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/script.min.js?h=fedf14a447758dc0b3c6f999b9fc334b"></script>
       <!-- <script src="../assets/js/localization/messages_es.js" type="text/javascript"></script>-->
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.js"></script> 
        <link rel="stylesheet" href="../assets/css/styles.min.css?h=313b471bd9c649213fb455372265f1e2">
        <link rel="stylesheet" href="../docs/css/prettify.min.css" type="text/css">
        <script type="text/javascript" src="../docs/js/prettify.min.js"></script>
        <script src="https://kit.fontawesome.com/5bfd358a3c.js"></script>

        <link rel="stylesheet" href="../dist/css/bootstrap-multiselect.css" type="text/css">
        <script type="text/javascript" src="../dist/js/bootstrap-multiselect.js"></script>


    </head> 
    <body>.bg{background-color:red}<!-- Navigation -->
        <div id = cabecera>
            <input type="hidden" size="15" maxlength="30" value="<?php echo $_SESSION["usuario"]["codigo"]; ?>" name="nombre" id="codigo">
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#A2121C;margin-left: 5px;margin-right: 5px;">
                <div class="container">
                    <a class="navbar-brand" href="http://127.0.0.1/ejemplo/Presentacion/index.php">BibloCur</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <?php if ($_SESSION) { ?>
                                    <div class="col-4">
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php echo $_SESSION["usuario"]["nombre"]; ?>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color:#A2121C;">
                                                <a class="dropdown-item menu" id="btnmultas">Multa</a> 
                                                <a class="dropdown-item menu" href="view/CambiarClave.php">Cambiar Contraseña</a>
                                                <a class="dropdown-item menu" href="cerrarSesion.php">Cerrar Sesión</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Iniciar sesión</button>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--login-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <img src="../assets/img/img/recurso/escudo.png?h=eee25ba9f90f85fbd39b9f9cc373043d" class="logo_urep"> <h5 class="modal-title" id="exampleModalLabel"> Iniciar sesión</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Begin # DIV Form -->
                            <div id="div-forms">
                                <!-- Begin # Login Form -->
                                <form id="login-form" name ="login-form" >
                                    <div class="modal-body">
                                        Código
                                        <input id="login_username" name ="codigo" class="form-control" type="text" placeholder="Código" >
                                        <br>				
                                        Clave
                                        <input id="login_password" name ="contrasena" class="form-control" type="password" placeholder="Clave" >
                                        <br> <div class="checkbox">
                                            <label>
                                                <input type="checkbox">Recuerdame
                                            </label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div >
                                            <button id="BTNIngresar" type="submit" class="btn btn-secondary" style = "width:100%">Ingresar</button>
                                            <button id="login_lost_btn" type="reset" class="btn btn-secondary" style = "width:100%">¿Olvidó su contraseña?</button>

                                        </div>
                                    </div>
                                </form>
                                <!-- End # Login Form -->
                                <!-- Begin | Lost Password Form -->
                                <form id="lost-form" style="display:none;">
                                    <div class="modal-body">
                                        Código
                                        <input id="lost_codigo" class="form-control" type="text" placeholder="Código" required>
                                        Correo
                                        <input id="lost_email" class="form-control" type="text" placeholder="Correo" required>
                                    </div>
                                    <div class="modal-footer">
                                        <div>
                                            <button type="submit" class="btn btn-secondary" >Recordar clave</button>
                                        </div>
                                        <div>
                                            <button id="lost_login_btn" type="button" class="btn btn-secondary" >Iniciar sesión</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- End | Lost Password Form -->
                            </div>
                            <!-- End # DIV Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!--fin de login-->
            <!-- Modal -->
            <div class="modal fade" id="alerta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="alertaMensaje">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id = "alertaCuerpo"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header -->
            <header class="bg pt-5 mb-5" style="margin-left: 5px;margin-right: 5px;">
                <script src="../assets/js/logica.js" type="text/javascript"></script>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-12"> 								
                            <!-- LOGO - DESCRIPCION -->
                            <div class="col s4 m2 l2 right-align menu_nav">
                                <a href=""> <img src="../assets/img/img/recurso/escudo.png?h=eee25ba9f90f85fbd39b9f9cc373043d" class="logo_urep"> </a>
                            </div>
                            <div class="col s6 m9 l4 left-align menu_nav">
                                <div style="display:inline-block;">
                                    <h1 class="tipo_urep" style="width: 100%; " >Corporación Universitaria Republicana</h1>
                                </div>
                            </div>
                            <!-- FIN - LOGO DESCRIPCION -->
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #0B675D;">
                    <div class="container">
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
                                        <a class="dropdown-item" href="AcercaBiblioCur.php">Acerca de BilioCur</a>
                                        <a class="dropdown-item" href="OtroServicios.php">Otros Servicios</a>
                                        <a class="dropdown-item" href="http://urepublicana.edu.co/">Corporacion Universitaria Republicana</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Reserva
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="http://127.0.0.1/ejemplo/Presentacion/catalogo.php">Libro</a>
                                        <a class="dropdown-item" href="resevavideoBeam.php">Video Beam</a>
                                        <a class="dropdown-item" href="view/videoBeam.php"></a>
                                    </div>
                                </li>
                                <?php if ($_SESSION) { ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Prestamo
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="http://127.0.0.1/ejemplo/Presentacion/catalogo.php">Libro</a>
                                            <a class="dropdown-item" href="resevavideoBeam.php">Video Beam</a>
                                            <a class="dropdown-item" href="http://127.0.0.1/ejemplo/Presentacion/PrestamoInter.php">Prestamo Interbibliotecario</a>
                                        </div>
                                    </li>
                                    <?php if ($_SESSION["usuario"]["perfil"] == "administrador") { ?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Gestion
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="registrarUsuario.php">Usuario</a>
                                                <a class="dropdown-item" href="RegistrarLibro.php">Libro</a>
                                                <a class="dropdown-item" href="registrarVideoBeam.php">Video Beam</a>
                                                <a class="dropdown-item" href="SubidaMasiva.php">Subida masiva</a><a class="dropdown-item" href="Plantilla.php">Formato</a>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="view/noticias.php">Noticias</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="view/Contactanos.php">Contactanos</a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0">
                                <select name="Filtro" class="form-control" id="filtro">
                                    <option value="" disabled selected>Buscar por:</option>
                                    <option value="Isbn">Isbn</option>
                                    <option value="Autor">Autor</option>
                                    <option value="Titulo">Titulo</option>
                                    <option value="Editorial">Editorial</option>

                                </select>
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="txtBuscarEncabezado" name="txtBuscarEncabezado">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="btnBuscarLibroCabezera">Buscar</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <form id="registar_Libro" name ="registar_Libro" method="POST" enctype=" multipart/form-data">
                        <fieldset class="border p-1">
                            <legend class="w-auto">Registrar Libro</legend>
                            <div class="form-row">

                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Isbn (*)</label>
                                    <input type="tetx" class="form-control" id="Risbn" name ="Risbn" placeholder="Isbn">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Titulo (*)</label>
                                    <input type="tetx" class="form-control" id="RTituo" name="RTituo" placeholder="Titulo" >
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Editorial (*)</label>
                                    <select class="form-control" id="ListaEditores" name ="ListaEditores" >
                                        <option value="" disabled selected>Editorial</option>
                                    </select>
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Lista Publica (*)</label>
                                    <br>
                                    <select id="ListaPublica" name ="ListaPublica" multiple="multiple">
                                    </select>
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Lista Categoria (*)</label>
                                    <br>
                                    <select id="ListaCategoria" name ="ListaCategoria" multiple="multiple">
                                    </select>
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Autor (*)</label>
                                    <br>
                                    <select id="ListaAutores" name ="ListaAutores" multiple="multiple">
                                    </select>
                                </div> 

                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Tema (*)</label>
                                    <br>
                                    <select id="ListaTema" name="ListaTema" multiple="multiple">
                                    </select> 
                                </div> 

                                <div class="form-group col-md-3">
                                    <label for="exampleInputFile">Seleccion un archivo</label>
                                    <input type="file" id="fileToUpload" >
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Reseña (*)</label> 
                                    <textarea name="comment" form="usrform" placeholder="Reseña del libro" id="resenaLibro"></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <button class="btn btn-primary" id="btnRegistrarLibro">Registrar</button>
                        <button class="btn btn-primary" id="btnLimpiarLibro">Limpiar</button>
                        <button class="btn btn-primary" id="btnActualizaLibro">Actualizar</button>
                        <button class="btn btn-primary" id="btnEliminarLibro">Eliminar</button>
                        <button class="btn btn-primary" id="btnBuscarLibro">Buscar</button>
                    </form>
                    <br>
                    <form id="registar_Editorial" name ="registar_Editorial" method="POST" enctype=" multipart/form-data">
                        <fieldset class="border p-1">
                            <legend class="w-auto">Registrar Editorial</legend>
                            <div class="form-row">

                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Nombre de la editorial (*)</label>
                                    <input type="tetx" class="form-control" id="NombreEditorial" name ="NombreEditorial" placeholder="Nombre Editorial">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Direccion de la Editorial (*)</label>
                                    <input type="tetx" class="form-control" id="DireccionEditoriaal" name="DireccionEditoriaal" placeholder="Dirrecion" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Telefono de la Editorial (*)</label>
                                    <input type="tel" class="form-control" id="TelEditorial" name="TelEditorial" placeholder="Telefono" >
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">año de la editorial (*)</label> 
                                    <input type="date" class="form-control" id="fechaEditorial" name="fechaEditorial" placeholder="Fecha de Publicacion" >
                                </div> 
                            </div>
                        </fieldset>
                        <button class="btn btn-primary" id="btnRegistrarEditorial">Registrar</button>
                        <button class="btn btn-primary" id="btnLimpiarEditorial">Limpiar</button>
                        <button class="btn btn-primary" id="btnActualizaEditorial">Actualizar</button>
                        <button class="btn btn-primary" id="btnEliminarEditorial">Eliminar</button>
                        <button class="btn btn-primary" id="btnBuscarEditorial">Buscar</button>
                    </form>
                    <br>
                    <form id="registar_Autor" name ="registar_VideoBeam" method="POST" enctype=" multipart/form-data">
                        <fieldset class="border p-1">
                            <legend class="w-auto">Registrar Autor</legend>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Nombre del autor (*)</label>
                                    <input type="tetx" class="form-control" id="NombreAutor" name ="nombreAutor" placeholder="Nombre del autor">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Nota autor </label> 
                                    <textarea name="comment" form="usrform" placeholder="Observaciones sobre el Tema" id="observacionesAutor" ></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <button class="btn btn-primary" id="btnRegistrarAutor">Registrar</button>
                        <button class="btn btn-primary" id="btnLimpiarAutor">Limpiar</button>
                        <button class="btn btn-primary" id="btnActualizaAutor">Actualizar</button>
                        <button class="btn btn-primary" id="btnEliminarAutor">Eliminar</button>
                        <button class="btn btn-primary" id="btnBuscarAutor">Buscar</button>
                    </form>
                    <br>
                    <form id="registar_Tema" name ="registar_Tema" method="POST" enctype=" multipart/form-data">
                        <fieldset class="border p-1">
                            <legend class="w-auto">Nombre del tema</legend>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4">Nombre del tema (*)</label>
                                    <input type="tetx" class="form-control" id="NombreTema" name ="NombreTema" placeholder="Nombre del tema">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Descricion (*)</label>
                                    <textarea name="comment" form="usrform" placeholder="Observaciones sobre el Tema" id="observacionesTema"></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <button class="btn btn-primary" id="btnRegistrarTema">Registrar</button>
                        <button class="btn btn-primary" id="btnLimpiarTema">Limpiar</button>
                        <button class="btn btn-primary" id="btnActualizaTema">Actualizar</button>
                        <button class="btn btn-primary" id="btnEliminarTema">Eliminar</button>
                        <button class="btn btn-primary" id="btnBuscarTema">Buscar</button>
                    </form> 
                </div>
                <div class="col-md-3">
                    <div class="btn-group-vertical" role="group" aria-label="Basic example">
                        <button type="button" id="btnCatalogoLinea" class="btn btn-secondary">Catalogo en línea</button>
                        <button type="button" id="btnHistorial" class="btn btn-secondary">Préstamos, consulta y renovación </button> 
                        <button type="button" class="btn btn-secondary">Sugerir títulos </button>
                        <?php if ($_SESSION) { ?>
                            <button type="button" id="CerrarSesion" class="btn btn-secondary" data-toggle="modal" data-target="#login-modal"> Cerrar sesión </button>
                        <?php } else { ?>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat"> Iniciar sesión </button>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        <!-- Footer -->
        <footer id="piePagina" class="py-1">
        </footer>
    </body>
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
            function ListarAutores() {
                var url = "ListarAutores";
                var parametro = "";
                var metodo = function (respuesta) {
                    var data = $.parseJSON(respuesta);
                    var limite = data.length;
                    for (var i = 0; i < limite; i++) {
                        var local = data[i];
                        item(local, i);
                    }
                    $('#ListaAutores').multiselect('destroy');
                    $('#ListaAutores').multiselect({
                        enableFiltering: true,
                        includeSelectAllOption: true,
                        maxHeight: 400,
                        dropUp: true
                    });
                    $("#ListaAutores").multiselect('refresh');
                };
                fajax(url, parametro, metodo);
            }

            function ListarEditorial() {
                var url = "ListarEditorial";
                var parametro = "";
                var metodo = function (respuesta) {
                    var data = $.parseJSON(respuesta);
                    var limite = data.length;
                    for (var i = 0; i < limite; i++) {
                        var local = data[i];
                        item1(local, i);
                    }
                };
                fajax(url, parametro, metodo);
            }


            function ListarPublica() {
                var url = "ListarPublica";
                var parametro = "";
                var metodo = function (respuesta) {
                    var data = $.parseJSON(respuesta);
                    var limite = data.length;
                    for (var i = 0; i < limite; i++) {
                        var local = data[i];
                        item4(local, i);
                    }
                    $('#ListaPublica').multiselect('destroy');
                    $('#ListaPublica').multiselect({
                        enableFiltering: true,
                        includeSelectAllOption: true,
                        maxHeight: 400,
                        dropUp: true
                    });
                    $("#ListaPublica").multiselect('refresh');
                };
                fajax(url, parametro, metodo);
            }

            function ListarCatalogo() {
                var url = "ListarCategoria";
                var parametro = "";
                var metodo = function (respuesta) {
                    var data = $.parseJSON(respuesta);
                    var limite = data.length;
                    for (var i = 0; i < limite; i++) {
                        var local = data[i];
                        item3(local, i);
                    }
                    $('#ListaCategoria').multiselect('destroy');
                    $('#ListaCategoria').multiselect({
                        enableFiltering: true,
                        includeSelectAllOption: true,
                        maxHeight: 400,
                        dropUp: true
                    });
                    $("#ListaCategoria").multiselect('refresh');
                };
                fajax(url, parametro, metodo);
            }

            function ListarTema() {
                var url = "ListarTema";
                var parametro = "";
                var metodo = function (respuesta) {
                    var data = $.parseJSON(respuesta);
                    var limite = data.length;
                    for (var i = 0; i < limite; i++) {
                        var local = data[i];
                        item2(local, i);
                    }
                    $('#ListaTema').multiselect('destroy');
                    $('#ListaTema').multiselect({
                        enableFiltering: true,
                        includeSelectAllOption: true,
                        maxHeight: 400,
                        dropUp: true
                    });
                    $("#ListaTema").multiselect('refresh');
                };
                fajax(url, parametro, metodo);
            }
            function item(tmp) {
                $("#ListaAutores").append("<option value=" + tmp.NombreAutor + " id='1'>" + tmp.Nota + "</option>");
            }
            function item1(tmp) {
                $("#ListaEditores").append("<option value=" + tmp.NombreAutor1 + ">" + tmp.Nota1 + "</option>");
            }
            function item2(tmp) {
                $("#ListaTema").append("<option value=" + tmp.NombreAutor + ">" + tmp.Nota + "</option>");
            }
            function item3(tmp) {
                $("#ListaCategoria").append("<option value=" + tmp.NombreAutor + ">" + tmp.Nota + "</option>");
            }
            function item4(tmp) {
                $("#ListaPublica").append("<option value=" + tmp.NombreAutor + ">" + tmp.Nota + "</option>");
            }
            ListarEditorial();
            ListarAutores();
            ListarTema();
            ListarCatalogo();
            ListarPublica();
        });
    </script> 
    <style>
        .formulario{
            color: black;
            background-color: white;
        }
        .a{
            color: black;
        }
    </style> 
</html>