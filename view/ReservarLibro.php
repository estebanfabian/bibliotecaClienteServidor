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
                    </div>       
                </aside>
                <div class="col-md-9">
                    <form>
                        <div class="row right">

                            <div class="col-md-3">
                                <img src= "<?php echo $_GET['imagen']; ?>"  width=200 height=300 >
                                <input type="hidden"  id ="codigo" value="<?php echo $_SESSION['usuario']['codigo']; ?>" id="nombre"/>
                            </div>

                            <div class="col-md-6">
                                <div  class="form-group col-md-12" >
                                    <p>  Isbn: <samp id = "isbnReserva" > <?php echo $_GET['isbn']; ?></samp></p> 
                                </div>
                                <div  class="form-group col-md-12">
                                    <p> Titulo:  <?php echo $_GET['titulo']; ?></p>
                                </div>
                                <div  class="form-group col-md-12">
                                    <p> Autor:  <?php echo $_GET['autor']; ?></p>
                                </div>
                                <div  class="form-group col-md-12">
                                    <p> Tema:  <?php echo $_GET['tema']; ?></p>
                                </div>
                                <div  class="form-group col-md-12">
                                    <p> Editorial:  <?php echo $_GET['editorial']; ?></p>
                                </div>
                                <div  class="form-group col-md-12">
                                    <p> Faculta:  <?php echo $_GET['facultad']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div id = "isbnReserva" class="form-group col-md-12">
                            <p> Reseña:  <?php echo $_GET['resena']; ?></p>
                        </div> 
                        <input type="datetime-local" name="datetimepicker1" id="datetimepicker1" value="">    

                      
                        <button  class="btn btn-primary " id="btnResercarLibro">Reservar</button>
                        <button  class="btn btn-primary " id="btnVolverCatalogo">Volver</button>
                    </form>
                </div>
            </section>
        </div>
        <footer > 
            <div id = "pie">
            </div>
        </footer>
        <script src="../js/ejemplo.js" type="text/javascript"></script>
        <script src="../js/moment.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>