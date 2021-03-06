<?php

/**
 * Long Desc 
 * */

/**
 * Esta clase almacena la información del libro interbibliotecario
 *
 * 
 * @package VO
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * * */
class LibroPrestamointVO {

    private $IsbnPrestamoInt;
    private $titulo;
    private $editorial;
    private $categoriaLibro;
    private $resena;
    private $autor;

    function getIsbnPrestamoInt() {
        return $this->IsbnPrestamoInt;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getEditorial() {
        return $this->editorial;
    }

    function getCategoriaLibro() {
        return $this->categoriaLibro;
    }

    function getResena() {
        return $this->resena;
    }

    function getAutor() {
        return $this->autor;
    }

    function setIsbnPrestamoInt($IsbnPrestamoInt) {
        $this->IsbnPrestamoInt = $IsbnPrestamoInt;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setEditorial($editorial) {
        $this->editorial = $editorial;
    }

    function setCategoriaLibro($categoriaLibro) {
        $this->categoriaLibro = $categoriaLibro;
    }

    function setResena($resena) {
        $this->resena = $resena;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

}
