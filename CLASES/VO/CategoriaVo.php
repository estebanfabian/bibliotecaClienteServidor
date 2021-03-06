<?php

/**
 * Long Desc 
 * */

/**
 * Esta clase almacena la información de la categoria como es
 * el nombre de la categoria y desciciones de la categorias
 *
 * 
 * @package VO
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * * */
class CategoriaVO {

    private $categoria;
    private $descriccion;

    function getCategoria() {
        return $this->categoria;
    }

    function getDescriccion() {
        return $this->descriccion;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setDescriccion($descriccion) {
        $this->descriccion = $descriccion;
    }

}
