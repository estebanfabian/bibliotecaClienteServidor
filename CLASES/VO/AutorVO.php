<?php

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
