<?php

/**
 * Long Desc 
 * */

/**
 * Esta clase almacena la información de los autores como es
 * el nombre del autor y alguna observaciòn del autor 
 *
 * 
 * @package VO
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * * */
class AutorVO {

    private $idAutor;
    private $nombreAutor;
    private $notaAutor;

    function getIdAutor() {
        return $this->idAutor;
    }

    function getNombreAutor() {
        return $this->nombreAutor;
    }

    function getNotaAutor() {
        return $this->notaAutor;
    }

    function setIdAutor($idAutor) {
        $this->idAutor = $idAutor;
    }

    function setNombreAutor($nombreAutor) {
        $this->nombreAutor = $nombreAutor;
    }

    function setNotaAutor($notaAutor) {
        $this->notaAutor = $notaAutor;
    }

}
