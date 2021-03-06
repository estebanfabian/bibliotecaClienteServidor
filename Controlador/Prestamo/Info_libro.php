<?php

/**
 * Long Desc 
 * */
/**
 * Cotrolador del acceso que lleva es encargado de servir de puente de comunicacion 
 * entre la capa de interface y la capa de datos para poder obtener informacion sobre el libro y sus autores, temas, y categorias.
 *
 * 
 * @package Controlador
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * @return array() devuelve el numero de filas que fueron exitosas , fallidas y registros duplcados encontrado al momento de realizar el registro de la informaciòn
 * * */
header('Access-Control-Allow-Origin: *');
require '../../CLASES/BD/MySql.php';
require '../../CLASES/BD/datosbd.php';
require '../../CLASES/VO/LibroVO.php';
require '../../CLASES/DAO/LibroDAO.php';

$json = file_get_contents("php://input");
$local = json_decode($json);
$PrestamoDAO = new LibroDAO();
$PrestamoDAO->info_libro($local);
