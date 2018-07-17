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
                    </div>        </aside>
                <div class = "col-md-9">
                    <!--                    <form id="registar_usuario" name ="registar_usuario" method="POST" enctype=" multipart/form-data">
                    
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
                                                            <input type="photo" name="photo[]" multiple>
                                                                                                          <input type="file" accept="image/*" id ="photo" name="photo">
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
                                        <div class="navbar navbar-default navbar-fixed-top">
                                            <div class="container">
                                                <div class="navbar-header">
                                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-fixed-top .navbar-collapse">
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                    </button>
                                                    <a class="navbar-brand" href="https://github.com/blueimp/jQuery-File-Upload">jQuery File Upload</a>
                                                </div>
                                                <div class="navbar-collapse collapse">
                                                    <ul class="nav navbar-nav">
                                                        <li><a href="https://github.com/blueimp/jQuery-File-Upload/tags">Download</a></li>
                                                        <li><a href="https://github.com/blueimp/jQuery-File-Upload">Source Code</a></li>
                                                        <li><a href="https://github.com/blueimp/jQuery-File-Upload/wiki">Documentation</a></li>
                                                        <li><a href="https://blueimp.net">&copy; Sebastian Tschan</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>-->
                    <div class="container">
                        <form id="fileupload" action="https://jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
                            <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                            <div class="row fileupload-buttonbar">
                                <div class="col-lg-7">
                                    <span class="btn btn-success fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Add files...</span>
                                        <input type="file" name="files[]" multiple>
                                    </span>
                                    <button type="submit" class="btn btn-primary start">
                                        <i class="glyphicon glyphicon-upload"></i>
                                        <span>Start upload</span>
                                    </button>
                                    <button type="reset" class="btn btn-warning cancel">
                                        <i class="glyphicon glyphicon-ban-circle"></i>
                                        <span>Cancel upload</span>
                                    </button>
                                    <button type="button" class="btn btn-danger delete">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        <span>Delete</span>
                                    </button>
                                    <input type="checkbox" class="toggle">
                                    <span class="fileupload-process"></span>
                                </div>
                                <div class="col-lg-5 fileupload-progress fade">
                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                    </div>
                                    <div class="progress-extended">&nbsp;</div>
                                </div>
                            </div>
                            <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                        </form>
                        <br>
                    </div>
                    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                        <div class="slides"></div>
                        <h3 class="title"></h3>
                        <a class="prev">‹</a>
                        <a class="next">›</a>
                        <a class="close">×</a>
                        <a class="play-pause"></a>
                        <ol class="indicator"></ol>
                    </div>
                    <script id="template-upload" type="text/x-tmpl">
                        {% for (var i=0, file; file=o.files[i]; i++) { %}
                        <tr class="template-upload fade">
                        <td>
                        <span class="preview"></span>
                        </td>
                        <td>
                        <p class="name">{%=file.name%}</p>
                        <strong class="error text-danger"></strong>
                        </td>
                        <td>
                        <p class="size">Processing...</p>
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
                        </td>
                        <td>
                        {% if (!i && !o.options.autoUpload) { %}
                        <button class="btn btn-primary start" disabled>
                        <i class="glyphicon glyphicon-upload"></i>
                        <span>Start</span>
                        </button>
                        {% } %}
                        {% if (!i) { %}
                        <button class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                        </button>
                        {% } %}
                        </td>
                        </tr>
                        {% } %}
                    </script>
                    <script id="template-download" type="text/x-tmpl">
                        {% for (var i=0, file; file=o.files[i]; i++) { %}
                        <tr class="template-download fade">
                        <td>
                        <span class="preview">
                        {% if (file.thumbnailUrl) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                        {% } %}
                        </span>
                        </td>
                        <td>
                        <p class="name">
                        {% if (file.url) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                        {% } else { %}
                        <span>{%=file.name%}</span>
                        {% } %}
                        </p>
                        {% if (file.error) { %}
                        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                        {% } %}
                        </td>
                        <td>
                        <span class="size">{%=o.formatFileSize(file.size)%}</span>
                        </td>
                        <td>
                        {% if (file.deleteUrl) { %}
                        <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                        <i class="glyphicon glyphicon-trash"></i>
                        <span>Delete</span>
                        </button>
                        <input type="checkbox" name="delete" value="1" class="toggle">
                        {% } else { %}
                        <button class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                        </button>
                        {% } %}
                        </td>
                        </tr>
                        {% } %}
                    </script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src="../js/vendor/jquery.ui.widget.js"></script>
                    <script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
                    <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
                    <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                    <script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
                    <script src="../js/jquery.iframe-transport.js"></script>
                    <script src="../js/jquery.fileupload.js"></script>
                    <script src="../js/jquery.fileupload-process.js"></script>
                    <script src="../js/jquery.fileupload-image.js"></script>
                    <script src="../js/jquery.fileupload-audio.js"></script>
                    <script src="../js/jquery.fileupload-video.js"></script>
                    <script src="../js/jquery.fileupload-validate.js"></script>
                    <script src="../js/jquery.fileupload-ui.js"></script>
                    <script src="../js/main.js"></script> 
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