<?php

class ComputadorVO {

    private $idcomputador;
    private $fabricante;
    private $observaciones;
    private $cargadorId;

}

function getIdcomputador() {
    return $this->idcomputador;
}

 function getFabricante() {
    return $this->fabricante;
}

 function getObservaciones() {
    return $this->observaciones;
}

 function getCargadorId() {
    return $this->cargadorId;
}

 function setIdcomputador($idcomputador) {
    $this->idcomputador = $idcomputador;
}

 function setFabricante($fabricante) {
    $this->fabricante = $fabricante;
}

 function setObservaciones($observaciones) {
    $this->observaciones = $observaciones;
}

 function setCargadorId($cargadorId) {
    $this->cargadorId = $cargadorId;
}


