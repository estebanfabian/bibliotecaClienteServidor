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
                </aside>

                <div class = "col-md-9">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="inputEmail4">codigo</label>
                                <input type="tetx" class="form-control" id="inputEmail4" placeholder="Codigo">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputEmail4">nombres</label>
                                <input type="tetx" class="form-control" id="inputEmail4" placeholder="Codigo">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputEmail4">apelldos</label>
                                <input type="tetx" class="form-control" id="inputEmail4" placeholder="Codigo">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Fecha de nacimiento</label>               
                                <input type="date" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1">Sexo</label>
                                <select class="form-control" id="exampleSelect1">
                                    <option>Masculino</option>
                                    <option>Femenino</option>
                                </select>
                            </div>  
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Direcicion</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Direccion 2</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        
                        
                          <div class="form-group">
                            <label for="inputAddress">telefono</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">telefono 2</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                         <div class="form-group">
                            <label for="inputAddress2">telefono otro</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        
                         <div class="form-group">
                            <label for="inputAddress2">email</label>
                            <input type="email" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        
                        <div class="form-group">
                            <label for="inputAddress2">nombre contacto</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        
                        <div class="form-group">
                            <label for="inputAddress2">apellido contacto</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                       
                         <div class="form-group">
                            <label for="inputAddress2">direcion contacto</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        
                         <div class="form-group">
                            <label for="inputAddress2">direcion 2 contacto</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        
                            <div class="form-group">
                            <label for="inputAddress2">telefono contacto</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        
                         <div class="form-group">
                            <label for="inputAddress2">contrasena</label>
                            <input type="password" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script></body>
</html>