<?php

session_start();
$json = file_get_contents("php://input");
$array = json_decode($json);
$_SESSION["usuario"] = array(
    "codigo" => $array[0]->codigo,
    "nombre" => $array[0]->nombre,
    "perfil" => $array[0]->perfil,
);
?>