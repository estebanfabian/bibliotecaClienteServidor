<?php

header('Access-Control-Allow-Origin: *');
require '../../CLASES/BD/MySql.php';
require '../../CLASES/BD/datosbd.php';
require '../../CLASES/DAO/UsuarioDAO.php';
require '../../CLASES/VO/UsuarioVO.php';

$json= file_get_contents("php://input");
echo '45678';
$local= json_decode($json);
$UsuarioDAO=new UsuarioDAO;
$UsuarioDAO->correo($local);

