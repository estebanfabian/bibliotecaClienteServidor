<?php

class AutorVO {

    private $idautor;
    private $nombreAutor;
    private $notaAutor;

    function getIdautor() {
        return $this->idautor;
    }

    function getNombreAutor() {
        return $this->nombreAutor;
    }

    function getNotaAutor() {
        return $this->notaAutor;
    }

    function setIdautor($idautor) {
        $this->idautor = $idautor;
    }

    function setNombreAutor($nombreAutor) {
        $this->nombreAutor = $nombreAutor;
    }

    function setNotaAutor($notaAutor) {
        $this->notaAutor = $notaAutor;
    }

}
