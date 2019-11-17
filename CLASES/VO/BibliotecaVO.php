<?php

/**
 * Long Desc 
 * */

/**
 * Esta clase almacena la información de las biblioteca como es
 * nombre de la biblioteca , direccion telefono , persona responsable y observaciones
 *
 * 
 * @package VO
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * * */
class BibliotecaVO {

    private $idBiblioteca;
    private $nombreBiblioteca;
    private $direccionBiblioteca;
    private $telefonoBiblioteca;
    private $personaResponsabe;
    private $obervacionBiblioteca;

    function getIdBiblioteca() {
        return $this->idBiblioteca;
    }

    function getNombreBiblioteca() {
        return $this->nombreBiblioteca;
    }

    function getDireccionBiblioteca() {
        return $this->direccionBiblioteca;
    }

    function getTelefonoBiblioteca() {
        return $this->telefonoBiblioteca;
    }

    function getPersonaResponsabe() {
        return $this->personaResponsabe;
    }

    function getObervacionBiblioteca() {
        return $this->obervacionBiblioteca;
    }

    function setIdBiblioteca($idBiblioteca) {
        $this->idBiblioteca = $idBiblioteca;
    }

    function setNombreBiblioteca($nombreBiblioteca) {
        $this->nombreBiblioteca = $nombreBiblioteca;
    }

    function setDireccionBiblioteca($direccionBiblioteca) {
        $this->direccionBiblioteca = $direccionBiblioteca;
    }

    function setTelefonoBiblioteca($telefonoBiblioteca) {
        $this->telefonoBiblioteca = $telefonoBiblioteca;
    }

    function setPersonaResponsabe($personaResponsabe) {
        $this->personaResponsabe = $personaResponsabe;
    }

    function setObervacionBiblioteca($obervacionBiblioteca) {
        $this->obervacionBiblioteca = $obervacionBiblioteca;
    }

}
