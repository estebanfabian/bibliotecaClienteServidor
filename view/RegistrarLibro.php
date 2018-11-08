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
        <link href= "../css/login.css" rel="stylesheet" type="text/css" style="display:none;visibility:hidden"https://www.googletagmanager.com/ns.html?id=GTM-MWD3VXM" height="0" width="0">
              <link href= "../css/pantilla.css" rel="stylesheet" type="text/css" style="display:none;visibility:hidden"https://www.googletagmanager.com/ns.html?id=GTM-MWD3VXM" height="0" width="0">

        <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script>
        <script src="../js/additional-methods.js" type="text/javascript"></script>
        <script src="../js/localization/messages_es.js" type="text/javascript"></script>
        <script src="" type="text/javascript"></script>
        <script src="../js/MiLogica.js" type="text/javascript"></script>


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
                        <?php if ($_SESSION) { ?>
                            <button type="button" id="CerrarSesion1" class="btn btn-secondary" data-toggle="modal" data-target="#login-modal"> Cerrar sesión </button>
                        <?php } else { ?>
                            <button type="button"   class="btn btn-secondary" data-toggle="modal" data-target="#login-modal"> Iniciar sesión </button>
                        <?php } ?>
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
                    <form id="registar_Libro" name ="registar_Libro" method="POST" enctype=" multipart/form-data">
                        <fieldset class="border p-1">
                            <legend  class="w-auto">Registrar Libro</legend>
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
                                    <label for="inputEmail4">Categoria (*)</label>
                                    <input type="tetx" class="form-control" id="RCategoria" name="RCategoria" placeholder="Categoria" >
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Reseña  (*)</label>               
                                    <textarea name="comment" form="usrform" placeholder="Reseña del libro" id="resenaLibro"></textarea>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Autor  (*)</label>
                                    <select name="CableUSB" class="form-control" id="Autores">
                                        <option value="" disabled selected>Autores</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Editorial (*)</label>
                                    <select name="CableUSB" class="form-control" id="ListaEditores">
                                        <option value="" disabled selected>Editorial</option>
                                    </select>
                                </div>    

                            </div>
                        </fieldset>
                        <button  class="btn btn-primary" id="btnRegistrarLibro">Registrar</button>
                        <button  class="btn btn-primary" id="btnLimpiarLibro">Limpiar</button>
                        <button  class="btn btn-primary" id="btnActualizaLibro">Actualizar</button>
                        <button  class="btn btn-primary" id="btnEliminarLibro">Eliminar</button>
                        <button  class="btn btn-primary" id="btnBuscarLibro">Buscar</button>
                    </form>
                    <br>
                    <form id="registar_Editorial" name ="registar_Editorial" method="POST" enctype=" multipart/form-data">
                        <fieldset class="border p-1">
                            <legend  class="w-auto">Registrar Editorial</legend>
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
                                    <label for="inputPassword4">año de la editorial   (*)</label>               
                                    <input type="date" class="form-control"   id="fechaEditorial" name="fechaEditorial" placeholder="Fecha de Publicacion" >
                                </div>                               
                            </div>
                        </fieldset>
                        <button  class="btn btn-primary" id="btnRegistrarEditorial">Registrar</button>
                        <button  class="btn btn-primary" id="btnLimpiarEditorial">Limpiar</button>
                        <button  class="btn btn-primary" id="btnActualizaEditorial">Actualizar</button>
                        <button  class="btn btn-primary" id="btnEliminarEditorial">Eliminar</button>
                        <button  class="btn btn-primary" id="btnBuscarEditorial">Buscar</button>
                    </form>
                    <br>
                    <form id="registar_Autor" name ="registar_VideoBeam" method="POST" enctype=" multipart/form-data">
                        <fieldset class="border p-1">
                            <legend  class="w-auto">Registrar Autor</legend>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Nombre del autor (*)</label>
                                    <input type="tetx" class="form-control" id="NombreAutor" name ="NombreAutor" placeholder="Nombre del autor">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Nota autor (*)</label>     
                                    <textarea name="comment" form="usrform" placeholder="Observaciones sobre el Tema"  id="observacionesAutor"  ></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <button  class="btn btn-primary" id="btnRegistrarAutor">Registrar</button>
                        <button  class="btn btn-primary" id="btnLimpiarAutor">Limpiar</button>
                        <button  class="btn btn-primary" id="btnActualizaAutor">Actualizar</button>
                        <button  class="btn btn-primary" id="btnEliminarAutor">Eliminar</button>
                        <button  class="btn btn-primary" id="btnBuscarAutor">Buscar</button>
                    </form>
                    <br>
                    <!--                    <form id="registar_Tema" name ="registar_Tema" method="POST" enctype=" multipart/form-data">
                                            <fieldset class="border p-1">
                                                <legend  class="w-auto">Nombre del tema</legend>
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
                    
                                            
                                            <button  class="btn btn-primary" id="btnRegistrarTema">Registrar</button>
                                            <button  class="btn btn-primary" id="btnLimpiarTema">Limpiar</button>
                                            <button  class="btn btn-primary" id="btnActualizaTema">Actualizar</button>
                                            <button  class="btn btn-primary" id="btnEliminarTema">Eliminar</button>
                                            <button  class="btn btn-primary" id="btnBuscarTema">Buscar</button>
                                        </form>-->
                </div>
            </section>
        </div>
        <footer> 
            <div id = "pie">
            </div>
        </footer> 
        <a href=""></a>
        <script src="../js/Libro.js" type="text/javascript"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>