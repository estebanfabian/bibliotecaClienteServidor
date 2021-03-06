<?php

/**
 * Long Desc 
 * */
/**
 * Cotrolador del acceso que lleva es encargado de servir de puente de comunicacion 
 * entre la capa de interface y la capa de datos para poder subir mas de 1 imagen de portada de los libros.
 *
 * 
 * @package Controlador
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * @return array() devuelve si fue exitosa la subidas de las imagenes o no.
 * * */
echo"entra";
if (isset($_FILES["file"])) {
    $reporte = null;
    for ($x = 0; $x < count($_FILES["file"]["name"]); $x++) {
        $file = $_FILES["file"];
        $nombre = $file["name"][$x];
        $tipo = $file["type"][$x];
        $ruta_provisional = $file["tmp_name"][$x];
        $size = $file["size"][$x];
        $dimensiones = getimagesize($ruta_provisional);
        $width = $dimensiones[0];
        $height = $dimensiones[1];
        $carpeta = "../../assets/img/img/libro/";

        if ($tipo != 'image/jpeg' && $tipo != 'image/jpg' && $tipo != 'image/png' && $tipo != 'image/gif') {
            $reporte .= "<p style='color: red'>Error $nombre, el archivo no es una imagen.</p>";
        } else if ($size > 1024 * 1024) {
            $reporte .= "<p style='color: red'>Error $nombre, el tamaño máximo permitido es 1mb</p>";
        } else if ($width > 500 || $height > 500) {
            $reporte .= "<p style='color: red'>Error $nombre, la anchura y la altura máxima permitida es de 500px</p>";
        } else if ($width < 60 || $height < 60) {
            $reporte .= "<p style='color: red'>Error $nombre, la anchura y la altura mínima permitida es de 60px</p>";
        } else {
            $src = $carpeta . $nombre;

            //Caragamos imagenes al servidor
            move_uploaded_file($ruta_provisional, $src);

            //Codigo para insertar imagenes a tu Base de datos.
            //Sentencia SQL

            echo "<p style='color: blue'>La imagen $nombre ha sido subida con éxito</p>";
        }
    }

    echo $reporte;
}