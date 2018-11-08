<?php

header('Access-Control-Allow-Origin: *');
require '../../CLASES/BD/MySql.php';
require '../../CLASES/BD/datosbd.php';
require '../../CLASES/VO/EditorialVO.php';
require '../../CLASES/DAO/EditorialDAO.php';
$json = file_get_contents("php://input");
$local = json_decode($json);
$LibroDAO = new EditorialDAO();
$LibroDAO->BuscarEditoriala($local);