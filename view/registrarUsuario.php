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
        <link href= "../css/pantilla.css" rel="stylesheet" type="text/css" style="display:none;visibility:hidden"https://www.googletagmanager.com/ns.html?id=GTM-MWD3VXM" height="0" width="0">

        <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script>
        <script src="../js/additional-methods.js" type="text/javascript"></script>
        <script src="../js/localization/messages_es.js" type="text/javascript"></script>
        <script src="" type="text/javascript"></script>
        <script src="../js/MiLogica.js" type="text/javascript"></script>
        <link href="../css/fileuploader.css" rel="stylesheet" type="text/css"/>
        <title>BiblioCur</title>
    </head>
    <body>   
        <header> 
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
                                    <a class="nav-link" href="../index.php">Inicio <span class="sr-only">(current)</span></a>
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

        </header>
        <div class ="container ">
            <section class ="main row">
                <aside class="col-md-3">
                    <div class="btn-group-vertical" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-secondary">Catalogo en línea   </button>
                        <button type="button" class="btn btn-secondary">Préstamos, consulta y renovación   </button>
                        <button type="button" class="btn btn-secondary">Sugerir títulos    </button>
                        <button type="button" id="CerrarSesion"   class="btn btn-secondary" data-toggle="modal" data-target="#login-modal"> Cerrar sesión </button>
                    </div>
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
                </aside>
                <div class = "col-md-9">
                    <form id="registar_usuario" name ="registar_usuario" method="POST">

                        <fieldset class="border p-1">
                            <legend  class="w-auto">Datos de Usuario</legend>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Código</label>
                                    <input type="tetx" class="form-control" id="codigo" name ="codigo" placeholder="Codigo">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Nombres</label>
                                    <input type="tetx" class="form-control" id="nombre" name="nombre" placeholder="Nombres" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Apellidos</label>
                                    <input type="tetx" class="form-control" id="apellido" name="apellido" placeholder="Apellidos" >
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="uploader" ondragover="return false">
                                        <i class="icon-upload icon"></i>
                                        <img src="" class="" id = "foto" name = "foto">
                                        <input type="file" accept="image/*" id ="file" name="file">
                                    </label>

                                    <script src="../js/FileUploader.js" type="text/javascript"></script>
                                    <script type="text/javascript">
                            new FileUploader('.uploader');
                                    </script> 
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Fecha de nacimiento</label>               
                                    <input type="date" class="form-control"   id="fechaNacimiento" name="fechaNacimiento" placeholder="Fecha de nacimeino" >
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="exampleSelect1">Sexo</label>
                                    <select class="form-control" name="sexo" id="sexo"  >
                                        <option value="" selected disabled>Sexo</option>
                                        <option value="1">Masculino</option>
                                        <option value="0">Femenino</option>
                                    </select>
                                </div>  
                                <div class="form-group col-md-3">
                                    <label for="exampleSelect1">Perfil</label>
                                    <select class="form-control" name="Perfil" id="Perfil"  >
                                        <option value="" selected disabled>Perfil</option>
                                        <option value="administradir">Administrador</option>
                                        <option value="usario">Usuario</option>
                                    </select>
                                </div>  
                                <div class="form-group col-md-6 ">
                                    <label for="inputAddress">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputAddress2">Dirección 2</label>
                                    <input type="text" class="form-control" id="direccion2" name="direccion2" placeholder="Dirección">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputAddress">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputAddress2">Teléfono 2</label>
                                    <input type="text" class="form-control" id="telefono2" name="telefono2" placeholder="Teléfono">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputAddress2">Teléfono otro</label>
                                    <input type="text" class="form-control" id="telefonoOtro" name="telefonoOtro" placeholder="Teléfono">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputAddress2">Correo</label>
                                    <input type="email" class="form-control" id="coreeo" name="coreeo" placeholder="Correo" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputAddress2">Contraseña</label>
                                    <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña" >
                                </div>
                               

                            </div>
                        </fieldset>
                        <fieldset class="border p-1">
                            <legend  class="w-auto">Datos de Contactos</legend>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputAddress2">Nombre de contacto</label>
                                    <input type="text" class="form-control" id="nombreContacto" name="nombreContacto" placeholder="Nombre">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputAddress2">Apellido contacto</label>
                                    <input type="text" class="form-control" id="apellidoContacto" name="apellidoContacto" placeholder="Apellido contacto">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputAddress2">Dirección contacto</label>
                                    <input type="text" class="form-control" id="dirrecionContacto" name="dirrecionContacto" placeholder="Dirección contacto">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputAddress2">Dirección 2 contacto</label>
                                    <input type="text" class="form-control" id="dirrecionContacto2" name="dirrecionContacto2" placeholder="Direccion contacot">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputAddress2">Teléfono contacto</label>
                                    <input type="text" class="form-control" id="telefonoContacto" name="telefonoContacto" placeholder="Telefono">
                                </div>
                            </div>
                        </fieldset>
                        <button  class="btn btn-primary" id="btnRegistrar">Registrar</button>
                        <button  class="btn btn-primary" id="btnLimpiar">Limpiar</button>
                    </form>
                </div>
            </section>
        </div>
        <footer >
            <div class = "container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <address>
                            <img src="../img/recurso/if_building-o_1608589.png" width="16" height="16" class="d-inline-block align-top" alt=""> Sede Administrativa: Cr 7 No 19-38 <br>
                            <img src="../img/recurso/if_f095_213074.png" width="11" height="16" class="d-inline-block align-top" alt=""> Teléfono :
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
                        <img src="../img/recurso/if_Facebook_194929.png" class="rounded float-left ejemplo" alt="...">
                        <img src="../img/recurso/if_Twitter_194909.png" class="rounded float-left ejemplo" alt="...">
                        <img src="../img/recurso/if_Intsagram_194923.png" class="rounded float-left ejemplo" alt="...">
                        <img src="../img/recurso/if_YouTube_194904.png" class="rounded float-left ejemplo" alt="...">
                        <img src="../img/recurso/if_LinkedIn_194920.png" class="rounded float-left ejemplo" alt="...">
                        <img src="../img/recurso/if_whatsapp_115679.png" class="rounded float-left ejemplo" alt="...">
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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>