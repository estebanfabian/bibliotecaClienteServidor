<?php

/**
 * Long Desc 
 * */

/**
 * Esta clase almacena la información de los prestamos interbibliotecario
 *
 * 
 * @package VO
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * * */
class PresInterBibliotecarioVO {

    private $idPrestamoInterBiblio;
    private $idPrestamo;
    private $idbiblioteca;
    private $IsbnPrestamoInt;
    private $tituoloInter;
    private $AutorInter;
    private $codigoInter;

    function getIdPrestamoInterBiblio() {
        return $this->idPrestamoInterBiblio;
    }

    function getIdPrestamo() {
        return $this->idPrestamo;
    }

    function getIdbiblioteca() {
        return $this->idbiblioteca;
    }

    function getIsbnPrestamoInt() {
        return $this->IsbnPrestamoInt;
    }

    function getTituoloInter() {
        return $this->tituoloInter;
    }

    function getAutorInter() {
        return $this->AutorInter;
    }

    function getCodigoInter() {
        return $this->codigoInter;
    }

    function setIdPrestamoInterBiblio($idPrestamoInterBiblio) {
        $this->idPrestamoInterBiblio = $idPrestamoInterBiblio;
    }

    function setIdPrestamo($idPrestamo) {
        $this->idPrestamo = $idPrestamo;
    }

    function setIdbiblioteca($idbiblioteca) {
        $this->idbiblioteca = $idbiblioteca;
    }

    function setIsbnPrestamoInt($IsbnPrestamoInt) {
        $this->IsbnPrestamoInt = $IsbnPrestamoInt;
    }

    function setTituoloInter($tituoloInter) {
        $this->tituoloInter = $tituoloInter;
    }

    function setAutorInter($AutorInter) {
        $this->AutorInter = $AutorInter;
    }

    function setCodigoInter($codigoInter) {
        $this->codigoInter = $codigoInter;
    }

}
