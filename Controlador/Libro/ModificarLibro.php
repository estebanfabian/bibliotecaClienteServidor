<?php

/**
 * Long Desc 
 * */
/**
 * Cotrolador del acceso que lleva es encargado de servir de puente de comunicacion 
 * entre la capa de interface y la capa de datos para poder modificar la informaacion de los libros
 *
 * 
 * @package Controlador
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * @return array() devuelve si fue exitosa la modificación o no.
 * * */
header('Access-Control-Allow-Origin: *');
require '../../CLASES/BD/MySql.php';
require '../../CLASES/BD/datosbd.php';
require '../../CLASES/VO/LibroVO.php';
require '../../CLASES/VO/AutorVO.php';
require '../../CLASES/VO/EditorialVO.php';
require '../../CLASES/VO/CategoriaVo.php';
require '../../CLASES/VO/LpublicaVo.php';
require '../../CLASES/VO/TemaVO.php';
require '../../CLASES/DAO/LibroDAO.php';
$json = file_get_contents("php://input");
$local = json_decode($json);
$LibroDAO = new LibroDAO();
$LibroDAO->ModificarLibro($local);
