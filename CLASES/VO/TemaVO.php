<?php

/**
 * Long Desc 
 * */

/**
 * Esta clase almacena la información de los temas de los libros
 *
 * 
 * @package VO
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * * */
class TemaVO {

    /**
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @var int Almacena el númeor unico para identificar cada tema
     * */
    private $idTema;

    /**
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @var string Almacena el nombre del tema
     * */
    private $nombreTema;

    /**
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @var string Almacena la descrición del tema
     * */
    private $descripcion;

    /**
     * Este método permitre brindar información sobre el número de identificacion de
     * cada tema
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @return self Reotrna el valor que esta almacenado en la cedula
     * */
    function getIdTema() {
        return $this->idTema;
    }

    /**
     * Este método permitre brindar información sobre 
     * el nombre de cada tema
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @return self Reotrna el valor que esta almacenado en la cedula
     * */
    function getNombreTema() {
        return $this->nombreTema;
    }

    /**
     * Este método permitre brindar información sobre la descrición de cada
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @return self Reotrna el valor que esta almacenado en la cedula
     * */
    function getDescripcion() {
        return $this->descripcion;
    }

    /**
     * Este método permite obtener informacipon sobre el número de identifiacion
     * de cada tema
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @param int $idTema Retorna el valor que esta almacenado en la variable idTema
     * */
    function setIdTema($idTema) {
        $this->idTema = $idTema;
    }

    /**
     * Este método permite obtener informacipon sobre el nombre
     * del tema
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @param int $nombreTema Retorna el valor que esta almacenado en la variable nombreTema
     * */
    function setNombreTema($nombreTema) {
        $this->nombreTema = $nombreTema;
    }

    /**
     * Este método permite obtener informacipon sobre la descrición
     * del tema
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @param int $descripcion Retorna el valor que esta almacenado en la variable descripcion
     * */
    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

}
