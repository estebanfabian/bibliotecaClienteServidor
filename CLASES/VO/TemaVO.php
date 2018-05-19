<?php

class TemaVO {

    private $idTema;
    private $nombreTema;
    private $descripcion;

    function getIdTema() {
        return $this->idTema;
    }

    function getNombreTema() {
        return $this->nombreTema;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setIdTema($idTema) {
        $this->idTema = $idTema;
    }

    function setNombreTema($nombreTema) {
        $this->nombreTema = $nombreTema;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

}
