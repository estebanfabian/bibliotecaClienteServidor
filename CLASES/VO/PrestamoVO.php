<?php

/**
 * Long Desc 
 * */

/**
 * Esta clase almacena la información de los prestamos. 
 *
 * 
 * @package VO
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * * */
class PrestamoVO {

    private $idPrestamo;
    private $estadoLibro;
    private $preInterBibliotecarios;
    private $actividad;
    private $diaReserva;
    private $diaEntrega;
    private $diaPrestamo;
    private $renovacion;
    private $codigo;
    private $cod_empleado;
    private $idVideoBeam;
    private $idcomputador;
    private $isbn;

    function getIdPrestamo() {
        return $this->idPrestamo;
    }

    function getEstadoLibro() {
        return $this->estadoLibro;
    }

    function getPreInterBibliotecarios() {
        return $this->preInterBibliotecarios;
    }

    function getActividad() {
        return $this->actividad;
    }

    function getDiaReserva() {
        return $this->diaReserva;
    }

    function getDiaEntrega() {
        return $this->diaEntrega;
    }

    function getDiaPrestamo() {
        return $this->diaPrestamo;
    }

    function getRenovacion() {
        return $this->renovacion;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getCod_empleado() {
        return $this->cod_empleado;
    }

    function getIdVideoBeam() {
        return $this->idVideoBeam;
    }

    function getIdcomputador() {
        return $this->idcomputador;
    }

    function getIsbn() {
        return $this->isbn;
    }

    function setIdPrestamo($idPrestamo) {
        $this->idPrestamo = $idPrestamo;
    }

    function setEstadoLibro($estadoLibro) {
        $this->estadoLibro = $estadoLibro;
    }

    function setPreInterBibliotecarios($preInterBibliotecarios) {
        $this->preInterBibliotecarios = $preInterBibliotecarios;
    }

    function setActividad($actividad) {
        $this->actividad = $actividad;
    }

    function setDiaReserva($diaReserva) {
        $this->diaReserva = $diaReserva;
    }

    function setDiaEntrega($diaEntrega) {
        $this->diaEntrega = $diaEntrega;
    }

    function setDiaPrestamo($diaPrestamo) {
        $this->diaPrestamo = $diaPrestamo;
    }

    function setRenovacion($renovacion) {
        $this->renovacion = $renovacion;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setCod_empleado($cod_empleado) {
        $this->cod_empleado = $cod_empleado;
    }

    function setIdVideoBeam($idVideoBeam) {
        $this->idVideoBeam = $idVideoBeam;
    }

    function setIdcomputador($idcomputador) {
        $this->idcomputador = $idcomputador;
    }

    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

}
