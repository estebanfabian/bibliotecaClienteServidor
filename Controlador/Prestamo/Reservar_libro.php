<?php

header('Access-Control-Allow-Origin: *');
require '../../CLASES/BD/MySql.php';
require '../../CLASES/BD/datosbd.php';
require '../../CLASES/VO/LibroVO.php';
require '../../CLASES/DAO/LibroDAO.php';

$json= file_get_contents("php://input");
$local= json_decode($json);
//$PrestamoDAO=new PrestamoDAO();
$PrestamoDAO=new LibroDAO();
$PrestamoDAO->reservar_libro($local);
