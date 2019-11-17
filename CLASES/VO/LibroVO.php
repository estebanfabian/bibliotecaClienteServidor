<?php

/**
 * Long Desc 
 * */

/**
 * Esta clase almacena la información de la editoriales como es
 * nombre de la editorial , direccion , telefono 
 * 
 * @package VO
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * * */
class LibroVO {

    /**
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @var int Almacena el número del isbn del libro
     * */
    private $isbn;

    /**
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @var int Almacena el número de identificion de la editorial.
     * */
    private $idEditorial;
    private $titulo;
    private $categoriaLibro;
    private $resena;
    private $estado;
    private $imagen;
    private $listaPublica;
    private $anoPublicacion;

    function getIsbn() {
        return $this->isbn;
    }

    function getIdEditorial() {
        return $this->idEditorial;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getCategoriaLibro() {
        return $this->categoriaLibro;
    }

    function getResena() {
        return $this->resena;
    }

    function getEstado() {
        return $this->estado;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getListaPublica() {
        return $this->listaPublica;
    }

    function getAnoPublicacion() {
        return $this->anoPublicacion;
    }

    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    function setIdEditorial($idEditorial) {
        $this->idEditorial = $idEditorial;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setCategoriaLibro($categoriaLibro) {
        $this->categoriaLibro = $categoriaLibro;
    }

    function setResena($resena) {
        $this->resena = $resena;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setListaPublica($listaPublica) {
        $this->listaPublica = $listaPublica;
    }

    function setAnoPublicacion($anoPublicacion) {
        $this->anoPublicacion = $anoPublicacion;
    }

}
