<?php

class TemaDAO {

    function CrearTema($array) {

        if ($this->Filtro($array) == "ok") {
            $respuesta = array();
            $respuesta["sucess"] = "Reguistro duplicado";
            echo json_encode($respuesta);
        } else {

            $sql = "call tema (2,?,?);";
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $this->respuesta($conn, $this->insert($array, $stmp));
        }
    }

    function ModificarTema($array) {

        $sql = 'call tema (1,?,?);';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $TemaVo = new TemaVO();

        $TemaVo->setNombreTema($array->nombreTema);
        $TemaVo->setDescripcion($array->Descricion);

        $nombreTema = $TemaVo->getNombreTema();
        $Descricion = $TemaVo->getDescripcion();

        $stmp->bind_param("ss", $nombreTema, $Descricion);
        $this->Respuesta($conn, $stmp);
    }

    function EliminarTema($array) {
       if ($this->Filtro($array) == "no") {
            $respuesta = array();
            $respuesta["sucess"] = "no";
            echo json_encode($respuesta);
        } else {
            $sql = "call miprocesos1 (7,?);";

            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $TemaVo = new TemaVO();
            $TemaVo->setNombreTema($array->nombreTema);

            $idTema = $TemaVo->getNombreTema();

            $stmp->bind_param("s", $idTema);
             $this->respuesta($conn, $stmp);
        }
    }

     function Respuesta($conn, $stmp) {
        $respuesta = array();
        if ($stmp->execute() == 1) {
            $respuesta["sucess"] = "ok";
        } else {
            $respuesta["sucess"] = "no";
             echo json_encode($stmp);
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function BuscarTema($array) {
        $sql = "call miprocesos1 (8,?);";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $TemaVo = new TemaVO();
        $TemaVo->setNombreTema($array->nombreTema);

        $nombreTema = $TemaVo->getNombreTema();

        $stmp->bind_param("s", $nombreTema);
        $stmp->execute();

        $stmp->bind_result($Descricion);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["nombreTema"] = $nombreTema;
            $tmp["Descricion"] = $Descricion;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($tmp);
    }

    function insert($array, $stmp) {

        $TemaVo = new TemaVO();
        $TemaVo->setNombreTema($array->nombreTema);
        $TemaVo->setDescripcion($array->Descricion);

        $nombreTema = $TemaVo->getNombreTema();
        $Descricion = $TemaVo->getDescripcion();

        $stmp->bind_param("ss", $nombreTema, $Descricion);
        return $stmp;
    }

    function Filtro($array) {

        $sql = 'call miprocesos1 (1,?);';

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $TemaVo = new TemaVO();
        $TemaVo->setNombreTema($array->nombreTema);

        $nombreTema = $TemaVo->getNombreTema();

        $stmp->bind_param("s", $nombreTema);

        $respuesta = array();
        if ($stmp->execute() == 1) {
            $stmp->bind_result($codigo);
            while ($stmp->fetch()) {
                $respuesta = $codigo;
            }

            if ($codigo != "") {
                $respuesta = "ok";
            } else {
                $respuesta = "no";
            }
        } else {
            $respuesta = "no";
        }
        $stmp->close();
        $conn->close();
        return ($respuesta);
    }

    function SMCrearTema($array) {

        if ($this->Filtro($array) == "ok") {
            $respuesta = array();
            $respuesta["sucess"] = "Reguistro duplicado";
            echo json_encode($respuesta);
        } else {

            $sql = "call tema (2,?,?);";
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $respuesta = array();
            if ($this->insert($array, $stmp)->execute() == 1) {
                $respuesta = "ok";
            } else {
                $respuesta = "no";
            }
            $stmp->close();
            $conn->close();
            return $respuesta;
        }
    }
    
       function ListarTema() {
        $sql = "SELECT * FROM `listartema`";

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $stmp->execute();

        $stmp->bind_result($NombreAutor, $Nota);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["NombreAutor"] = $NombreAutor;
            $tmp["Nota"] = $Nota;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

}
