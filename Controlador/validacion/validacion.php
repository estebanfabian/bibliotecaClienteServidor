<?php
/**
 * Long Desc 
 * */
/**
 * Control encargado de validar que las imagenes tengan el mismo nombre que el isbn del libro correpondiente
 *en caso que no corresponda re nombra la imagen y la mueve a la carpeta destino , además de actualizar el nuevo 
 *nombre en la base de datos.
 *
 * 
 * @package Controlador
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * @return array() devuelve si fue exitos el cambio del nombre de la iamgen y en la base de datos o no.
 * * */
header('Access-Control-Allow-Origin: *');
require '../../CLASES/BD/MySql.php';
require '../../CLASES/BD/datosbd.php';
require '../../CLASES/VO/LibroVO.php';
require '../../CLASES/DAO/LibroDAO.php';

$LibroDAO = new LibroDAO();
$resultado = $LibroDAO->validacion($local);


for ($index = 0; $index < count($resultado); $index++) {
 echo $resultado[$index][0];
 echo $resultado[$index][1];
 if (file_exists("C:/xampp/htdocs/ejemplo/assets/img/img/tmp/" . $resultado[$index][1] . "") == true) {
 echo "<p>El archivo existe</p>";
 rename("C:/xampp/htdocs/ejemplo/assets/img/img/tmp/" . $resultado[$index][0] . ".jpg", "C:/xampp/htdocs/ejemplo/assets/img/img/libro/" . $resultado[$index][1] . "");
 $LibroDAO->ModificarImagen($resultado[$index][0],$resultado[$index][1]);
 } else {
 echo "<p>El archivo no se ha encontrado</p>";
 }
}
