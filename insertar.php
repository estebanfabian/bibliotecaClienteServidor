<?php

include ('Conectar.php');

$cod = $_GET['cod'];
$apell = $_GET['apell'];
$nom = $_GET['nom'];
$tel = $_GET['tel'];
$email = $_GET['email'];
$password = $_GET['password'];



ejecutarSQLCommand("INSERT INTO  `tbl_usuario` (
    `codigo`,
    `apellido`, 
    `nombre`, 
    `telefonoPrincipal`,
    `emailPrincipal`, 
    `contrasena`)VALUES (
    '$cod' ,
    '$apell',
    '$nom',
    '$tel',
    '$email',
    '$password')
");
?>