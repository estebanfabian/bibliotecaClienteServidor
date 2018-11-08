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
                    <form id="registar_VideoBeam" name ="registar_VideoBeam" method="POST" enctype=" multipart/form-data">
                        <fieldset class="border p-1">
                            <legend  class="w-auto">Registrar Video Beam</legend>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Id video Beam (*)</label>
                                    <input type="tel" class="form-control" id="idvideoBeam" name ="idvideoBeam" placeholder="Numero de video beam">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Fabrica (*)</label>
                                    <input type="tetx" class="form-control" id="FabricanteVideoBeam" name="FabricanteVideoBeam" placeholder="Fabricante" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Cable USB (*)</label>
                                    <select name="CableUSB" class="form-control" id="CableUSB">
                                        <option value="" disabled selected>Tiene cable USB</option>
                                        <option value="b'1'">si</option>
                                        <option value="b'0'">no</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Cable HDMI  (*)</label>  
                                    <select name="CableHDMI" class="form-control" id="CableHDMI">
                                        <option value="" disabled selected>Tiene cable HDMI</option>
                                        <option value="b'1'">si</option>
                                        <option value="b'0'">no</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleSelect1">cable VGA</label>
                                    <select name="CableVGA" class="form-control" id="CableVGA">
                                        <option value="" disabled selected>Tiene cable VGA</option>
                                        <option value="b'1'">si</option>
                                        <option value="b'0'">no</option>
                                    </select>
                                </div>  
                                <div class="form-group col-md-12 ">
                                    <label for="inputAddress">Observaciones(*)</label><br>
                                    <textarea name="comment" form="usrform" placeholder="Observaciones sobre el equipo" id ="txtObservacionesVideoBeam"></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <button  class="btn btn-primary" id="btnRegistrarVideoBeam">Registrar</button>
                        <button  class="btn btn-primary" id="btnLimpiarVideoBeam">Limpiar</button>
                        <button  class="btn btn-primary" id="btnActualizarVideoBeam">Actualizar</button>
                        <button  class="btn btn-primary" id="btnEliminarVideoBeam">Eliminar</button>
                        <button  class="btn btn-primary" id="btnBuscarVideoBeam">Buscar</button>
                    </form>
                    <br>
                    <form id="registar_Computador" name ="registar_Computador" method="POST" enctype=" multipart/form-data">
                        <fieldset class="border p-1">
                            <legend  class="w-auto">Registrar Computador</legend>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4"># del computador  (*)</label>
                                    <input type="tetx" class="form-control" id="SerialComputador" name ="SerialComputador" placeholder="Numero de serial">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4">Fabrica (*)</label>
                                    <input type="tetx" class="form-control" id="FabricanteComputador" name="FabricanteComputador" placeholder="Fabricante del equipo" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4"># de Cargador   (*)</label>               
                                    <input type="text" class="form-control"   id="SerialCargado" name="SerialCargado" placeholder="Numero de cargador" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4">Observaciones  (*)</label>
                                    <textarea name="comment" form="usrform" placeholder="Observaciones sobre el equipo" id="observacionesComputador"></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <button  class="btn btn-primary" id="btnRegistrarComputador">Registrar</button>
                        <button  class="btn btn-primary" id="btnLimpiarComputador">Limpiar</button>
                        <button  class="btn btn-primary" id="btnActualizaComputador">Actualizar</button>
                        <button  class="btn btn-primary" id="btnEliminarComputador">Eliminar</button>
                        <button  class="btn btn-primary" id="btnBuscarComputador">Buscar</button>
                    </form>
                </div>
            </section>
        </div>
        <footer > 
            <div id = "pie">
            </div>
        </footer
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>