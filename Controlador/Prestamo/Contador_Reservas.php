<?php

header('Access-Control-Allow-Origin: *');
require '../../CLASES/BD/MySql.php';
require '../../CLASES/BD/datosbd.php';
require '../../CLASES/DAO/PrestamoDAO.php';
require '../../CLASES/VO/PrestamoVO.php';

$json = file_get_contents("php://input");
$local = json_decode($json);
$PrestamoDAO = new PrestamoDAO();
$PrestamoDAO->Contador($local);
