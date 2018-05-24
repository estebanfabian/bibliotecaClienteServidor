<?php

class PrestamoVO {

    private $idPrestamo;
    private $estadoLibro;
    private $diaPrestamo;
    private $preInterBibliotecarios;
    private $isbn;
    private $idVideoBeam;
    private $idcomputador;
    private $codigo;
    private $codigoEmpleado;
    private $diaEntrega;

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
        return $this->isbn;
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
        return $this->codigoEmpleado;
    }

    function getDiaEntrega() {
        return $this->diaEntrega;
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

    function setIsbn($isbn) {
        $this->isbn = $isbn;
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

    function setCodigoEmpleado($codigoEmpleado) {
        $this->codigoEmpleado = $codigoEmpleado;
    }

    function setDiaEntrega($diaEntrega) {
        $this->diaEntrega = $diaEntrega;
    }

}
