ce<?php
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


        <link rel="stylesheet" href="../css/jquery.fileupload.css">
        <link rel="stylesheet" href="../css/jquery.fileupload-ui.css">


        <script src="../js/jquery.fileupload-image.js" type="text/javascript"></script>
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
                        <button type="button" id="../CerrarSesion"   class="btn btn-secondary" data-toggle="modal" data-target="#login-modal"> Cerrar sesión </button>
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
                    <form id="registar_usuario" name ="registar_usuario" method="POST" enctype=" multipart/form-data">
                        <fieldset class="border p-1">
                            <legend  class="w-auto">Datos de Usuario</legend>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Cedula (*)</label>
                                    <input type="tetx" class="form-control" id="cedula" name ="cedula" placeholder="Cedulad">
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Código (*)</label>
                                    <input type="tetx" class="form-control" id="codigo" name ="codigo" placeholder="Codigo">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4">Nombres (*)</label>
                                    <input type="tetx" class="form-control" id="nombre" name="nombre" placeholder="Nombres" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4">Apellidos (*)</label>
                                    <input type="tetx" class="form-control" id="apellido" name="apellido" placeholder="Apellidos" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Fecha de nacimiento (*)</label>               
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
                                    <div class = "form-group col-md-3">
                                        <label for = "exampleSelect1">Perfil</label>
                                        <select class = "form-control" name = "Perfil" id = "Perfil" >
                                            <option value = "usario" selected disabled>Perfil</option>
                                            <option value = "administradir">Administrador</option>
                                            <option value = "empleado">Empleado</option>
                                            <option value = "estudiante">Estudiante</option>
                                            <option value = "profesor">Profesor</option>
                                        </select>
                                    </div>
                  
                                <div class="form-group col-md-6 ">
                                    <label for="inputAddress">Dirección(*)</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputAddress2">Dirección 2</label>
                                    <input type="text" class="form-control" id="direccion2" name="direccion2" placeholder="Dirección">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputAddress">Teléfono(*)</label>
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
                                    <label for="inputAddress2">Correo(*)</label>
                                    <input type="email" class="form-control" id="coreeo" name="coreeo" placeholder="Correo" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputAddress2">Contraseña(*)</label>
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
            <div id = "pie">
            </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>