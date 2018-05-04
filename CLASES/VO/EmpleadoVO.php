<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmpleadoVO
 *
 * @author esteban
 */
class EmpleadoVO {

    //put your code here
    private $codigoEmpleado;
    private $nombreEmpleado;
    private $puesto;
    function getCodigoEmpleado() {
        return $this->codigoEmpleado;
    }

    function getNombreEmpleado() {
        return $this->nombreEmpleado;
    }

    function getPuesto() {
        return $this->puesto;
    }

    function setCodigoEmpleado($codigoEmpleado) {
        $this->codigoEmpleado = $codigoEmpleado;
    }

    function setNombreEmpleado($nombreEmpleado) {
        $this->nombreEmpleado = $nombreEmpleado;
    }

    function setPuesto($puesto) {
        $this->puesto = $puesto;
    }



}
