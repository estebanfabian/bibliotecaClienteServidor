<?php

/**
 * Long Desc 
 * */
/**
 * Página encargada de realizar el manejo creacion de la sesión y almacenar los datos del usuario.
 *
 * 
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * */
session_start();
$json = file_get_contents("php://input");
$array = json_decode($json);
$_SESSION["usuario"] = array(
    "codigo" => $array[0]->codigo,
    "nombre" => $array[0]->nombre,
    "perfil" => $array[0]->perfil,
);
?>