<?php

class LibrosTemaVO {

    private $idLibroTema;
    private $Isbn;
    private $idTema;

    function getIdLibroTema() {
        return $this->idLibroTema;
    }

    function getIsbn() {
        return $this->Isbn;
    }

    function getIdTema() {
        return $this->idTema;
    }

    function setIdLibroTema($idLibroTema) {
        $this->idLibroTema = $idLibroTema;
    }

    function setIsbn($Isbn) {
        $this->Isbn = $Isbn;
    }

    function setIdTema($idTema) {
        $this->idTema = $idTema;
    }

}
