<?php


class TemaVO {
    private $idTema;
    private $nombreTema;
    private $Descricion;

    function getIdTema() {
        return $this->idTema;
    }

    function getNombreTema() {
        return $this->nombreTema;
    }

    function getDescricion() {
        return $this->Descricion;
    }

    function setIdTema($idTema) {
        $this->idTema = $idTema;
    }

    function setNombreTema($nombreTema) {
        $this->nombreTema = $nombreTema;
    }

    function setDescricion($Descricion) {
        $this->Descricion = $Descricion;
    }


}
