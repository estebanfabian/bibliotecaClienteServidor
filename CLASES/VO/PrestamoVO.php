<?php

class PrestamoVO {

    private $idPrestamo;
    private $estadoLibro;
    private $diaPrestamo;
    private $preInterBibliotecarios;
    private $Isbn;
    private $idVideoBeam;
    private $idcomputador;
    private $codigo;
    private $CodigoEmpleado;
    private $diaEntraga;

    function getIdPrestamo() {
        return $this->idPrestamo;
    }

    function getEstadoLibro() {
        return $this->estadoLibro;
    }

    function getDiaPrestamo() {
        return $this->diaPrestamo;
    }

    function getPreInterBibliotecarios() {
        return $this->preInterBibliotecarios;
    }

    function getIsbn() {
        return $this->Isbn;
    }

    function getIdVideoBeam() {
        return $this->idVideoBeam;
    }

    function getIdcomputador() {
        return $this->idcomputador;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getCodigoEmpleado() {
        return $this->CodigoEmpleado;
    }

    function getDiaEntraga() {
        return $this->diaEntraga;
    }

    function setIdPrestamo($idPrestamo) {
        $this->idPrestamo = $idPrestamo;
    }

    function setEstadoLibro($estadoLibro) {
        $this->estadoLibro = $estadoLibro;
    }

    function setDiaPrestamo($diaPrestamo) {
        $this->diaPrestamo = $diaPrestamo;
    }

    function setPreInterBibliotecarios($preInterBibliotecarios) {
        $this->preInterBibliotecarios = $preInterBibliotecarios;
    }

    function setIsbn($Isbn) {
        $this->Isbn = $Isbn;
    }

    function setIdVideoBeam($idVideoBeam) {
        $this->idVideoBeam = $idVideoBeam;
    }

    function setIdcomputador($idcomputador) {
        $this->idcomputador = $idcomputador;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setCodigoEmpleado($CodigoEmpleado) {
        $this->CodigoEmpleado = $CodigoEmpleado;
    }

    function setDiaEntraga($diaEntraga) {
        $this->diaEntraga = $diaEntraga;
    }


}
