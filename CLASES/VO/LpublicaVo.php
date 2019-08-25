<?php

class LpublicaVo {

    private $id_lista;
    private $nombre;

    function getId_lista() {
        return $this->id_lista;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId_lista($id_lista) {
        $this->id_lista = $id_lista;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}
