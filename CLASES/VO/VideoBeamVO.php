<?php

class VideoBeamVO {

    private $idVideoBeam;
    private $fabricante;
    private $cableUSB;
    private $cableHDMI;
    private $cableVGA;
    private $observaciones;
    private $estadoVideoBeam;

    function getIdVideoBeam() {
        return $this->idVideoBeam;
    }

    function getFabricante() {
        return $this->fabricante;
    }

    function getCableUSB() {
        return $this->cableUSB;
    }

    function getCableHDMI() {
        return $this->cableHDMI;
    }

    function getCableVGA() {
        return $this->cableVGA;
    }

    function getObservaciones() {
        return $this->observaciones;
    }

    function getEstadoVideoBeam() {
        return $this->estadoVideoBeam;
    }

    function setIdVideoBeam($idVideoBeam) {
        $this->idVideoBeam = $idVideoBeam;
    }

    function setFabricante($fabricante) {
        $this->fabricante = $fabricante;
    }

    function setCableUSB($cableUSB) {
        $this->cableUSB = $cableUSB;
    }

    function setCableHDMI($cableHDMI) {
        $this->cableHDMI = $cableHDMI;
    }

    function setCableVGA($cableVGA) {
        $this->cableVGA = $cableVGA;
    }

    function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    function setEstadoVideoBeam($estadoVideoBeam) {
        $this->estadoVideoBeam = $estadoVideoBeam;
    }

}
