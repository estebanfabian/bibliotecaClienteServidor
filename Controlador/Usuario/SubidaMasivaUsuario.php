<?php

/**
 * Long Desc 
 * */
/**
 * Cotrolador del acceso que lleva es encargado de servir de puente de comunicacion 
 * entre la capa de interface y la capa de datos para poder subir un archivo cvs y realizar el registro de la informacion
 *
 * 
 * @package Controlador
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
require '../../CLASES/VO/UsuarioVO.php';
require '../../CLASES/DAO/UsuarioDAO.php';

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

            $array = array(
                "cedula" => $column[0],
                "codigo" => $column[1],
                "nombre" => $column[2],
                "apellido" => $column[3],
                "fechaNacimiento" => $column[4],
                "sexo" => $column[5],
                "direccion" => $column[6],
                "telefonoPrincipal" => $column[7],
                "emailPrincipal" => $column[8],
                "contrasena" => $column[9],
                "direccion2" => $column[10],
                "telefonoSecundario" => $column[11],
                "telefonoOtro" => $column[12],
                "contactoNombre" => $column[13],
                "contactoApellido" => $column[14],
                "contactoDireccion" => $column[15],
                "contactoDireccion2" => $column[16],
                "contactoTelefono" => $column[17],
                "perfil" => $column[18],
            );

            $object = json_decode(json_encode((object) $array), FALSE);

            $UsuarioDAO = new UsuarioDAO();

            $respuesta = $UsuarioDAO->SMCrearUsuario($object);

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

function cambio($param) {
    if ($param == "si") {
        return 1;
    } else {
        return 0;
    }
}
