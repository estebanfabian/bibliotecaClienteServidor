<?php

header('Access-Control-Allow-Origin: *');
require '../../CLASES/BD/MySql.php';
require '../../CLASES/BD/datosbd.php';
require '../../CLASES/VO/VideoBeamVO.php';
require '../../CLASES/DAO/VideoBeamDAO.php';
$json = file_get_contents("php://input");
$local = json_decode($json);
$LibroDAO = new VideoBeamDAO();
$LibroDAO->EliminarVideoBeam($local);