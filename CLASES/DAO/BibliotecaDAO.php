<?php

/**
 * Long Desc 
 * */

/**
 * Esta clase permite reunir los datos que serán enviados en una query para poder realizar consultas , insertar , actualizar o eliminar información como se requiera de las biblioteca.
 * 
 * @package DAO
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * */
class BibliotecaDAO {

    /**
     * Este metodo permite mostrar todos las biblioteca 
     * nesesaria como es nombre y alguna obsevacion sobre el autor
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene la informacion a registrar del autor 
     * @return array() Se envia la respuesta las bibliotecas que esten registrado
     * */
    function CargaBiblioteca($array) {
        $sql = 'SELECT * FROM `biblioteca`';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $stmp->execute();

        $stmp->bind_result($id, $nombre);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["idBiblioteca"] = $id;
            $tmp["nombreBiblioteca"] = $nombre;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

}
