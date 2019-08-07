<?php

/**
 * Long Desc 
 * */
/**
 * Cotrolador del acceso que lleva es encargado de servir de puente de comunicacion 
 * entre la capa de interface y la capa de datos para poder subir un archivo cvs y realizar el registro de la informacion
 *
 * 
 * @package VO
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * @return array() devuelve el numero de filas que fueron  exitosas , fallidas y registros duplcados encontrado al momento de realizar el registro de la informaciòn
 * * */
header('Access-Control-Allow-Origin: *');
require '../../CLASES/BD/MySql.php';
require '../../CLASES/BD/datosbd.php';
require '../../CLASES/VO/ComputadorVO.php';
require '../../CLASES/DAO/ComputadorDAO.php';
$array;
$Exitoso = 0;
$Fallido = 0;
$Duplicado = 0;
$numeroFila = 0;

$Fallido_n = "";
$Duplicado_n = "";
if ($_FILES['csv']['size'] > 0) {
    $csv = $_FILES['csv']['tmp_name'];
    $file = fopen($csv, 'r');
    while (($column = fgetcsv($file, 10000, ";")) !== FALSE) {
        if ($numeroFila > 0) {

            $array = array("idcomputador" => $column[0],
                "fabricante" => $column[1],
                "cargadorId" => $column[2],
                "observaciones" => $column[3],
            );

            $object = json_decode(json_encode((object) $array), FALSE);
            $ComputadorDAO = new ComputadorDAO();
            $respuesta = $ComputadorDAO->SMCrearComputador($object);

            if ($respuesta == "ok") {
                $Exitoso++;
            } elseif ($respuesta == 'no') {
                $Fallido++;
                $Fallido_n = $Fallido_n . " " . $numeroFila;
            } else {
                $Duplicado++;
                $Duplicado_n = $Duplicado_n . " " . $numeroFila;
            }
        }
        $numeroFila++;
    }
//    echo "Exitoso " . $Exitoso;
//    echo "Fallido " . $Fallido . " numero de las lineas" . $Fallido_n;
//    echo "Duplicado " . $Duplicado . " numero de lineas" . $Duplicado_n;


    $array = array("Exitoso" => $Exitoso,
        "Fallido" => $Fallido,
        "Duplicado" => $Duplicado);
    echo json_encode((object) $array);
}
