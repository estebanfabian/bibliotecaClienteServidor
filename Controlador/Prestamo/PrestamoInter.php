<?php


header('Access-Control-Allow-Origin: *');
require '../../CLASES/BD/MySql.php';
require '../../CLASES/BD/datosbd.php';
require '../../CLASES/VO/PresInterBibliotecarioVO.php';
require '../../CLASES/DAO/PresInterBibliotecarioDAO.php';

$json= file_get_contents("php://input");
$local= json_decode($json);
$PrestamoDAO=new PresInterBibliotecarioDAO();
$PrestamoDAO->CrearPresInterBibliotecario($local);
