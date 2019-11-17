<?php

/**
 * Long Desc 
 * */
/**
 * Página encargada de realizar el cierre de sesión destruyendo la sesion
 * creada en php y realizando una redirección al index del proyecto.
 *
 * 
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * */
session_start();
session_destroy();
session_unset();
header("location: ./");
?>