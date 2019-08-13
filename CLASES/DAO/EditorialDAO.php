<?php

class EditorialDAO {

    function CrearEditorial($array) {
        if ($this->Filtro($array) == "ok") {
            $respuesta = array();
            $respuesta["sucess"] = "Reguistro duplicado";
            echo json_encode($respuesta);
        } else {
            $sql = 'INSERT INTO `tbl_editorial` ( `nombreEditorial`, `direccionEditorial`, `telefonoEditorial`, `anoPublicacion`) VALUES ( ?,?, ?,?);';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $this->respuesta($conn, $this->insert($array, $stmp));
        }
    }

    function ModificarEditorial($array) {

        $sql = 'UPDATE `tbl_editorial` SET ,`direccionEditorial`= ?,`telefonoEditorial`= ? ,`anoPublicacion`= ?  WHERE `nombreEditorial`= ? ;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $editorialVo = new EditorialVO();

        $editorialVo->setNombreEditorial($array->nombreEditorial);
        $editorialVo->setDireccionEditorial($array->direccionEditorial);
        $editorialVo->setTelefonoEditorial($array->telefonoEditorial);
        $editorialVo->setAnoPublicacion($array->anoPublicacion);

        $nombreEditorial = $editorialVo->getNombreEditorial();
        $direccionEditorial = $editorialVo->getDireccionEditorial();
        $telefonoEditorial = $editorialVo->getTelefonoEditorial();
        $anoPublicacion = $editorialVo->getAnoPublicacion();

        $stmp->bind_param("ssss", $direccionEditorial, $telefonoEditorial, $anoPublicacion, $nombreEditorial);

        $this->Respuesta($conn, $stmp);
    }

    function EliminarEditorial($array) {

        $sql = 'DELETE FROM `tbl_editorial` WHERE `nombreEditorial`= ?;';
  
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $editorialVo = new EditorialVO();

        $editorialVo->setNombreEditorial($array->nombreEditorial);

        $nombreEditorial = $editorialVo->getNombreEditorial();
        $stmp->bind_param("s", $nombreEditorial);

        $this->Respuesta($conn, $stmp);
    }

    function Respuesta($conn, $stmp) {
        $respuesta = array();
        if ($stmp->execute() == 1) {
            $respuesta["sucess"] = "ok";
        } else {
            $respuesta["sucess"] = "no";
        }

        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function BuscarEditorial($array) {
        $sql = "SELECT `nombreEditorial`,`direccionEditorial`,`telefonoEditorial`,`anoPublicacion` FROM `tbl_editorial` WHERE `nombreEditorial` = ?";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $editorialVo = new EditorialVO();

        $editorialVo->setNombreEditorial($array->nombreEditorial);

        $nombreEditorial = $editorialVo->getNombreEditorial();
        $stmp->bind_param("s", $nombreEditorial);
        $stmp->execute();
        $stmp->bind_result($nombreEditorial, $direccionEditorial, $telefonoEditorial, $anoPublicacion);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["nombreEditorial"] = $nombreEditorial;
            $tmp["direccionEditorial"] = $direccionEditorial;
            $tmp["telefonoEditorial"] = $telefonoEditorial;
            $tmp["anoPublicacion"] = $anoPublicacion;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($tmp);
    }

    function ListarEditorial() {
        $sql = "SELECT * FROM `listareditorial`";

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $stmp->execute();

        $stmp->bind_result($NombreAutor, $Nota);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["NombreAutor1"] = $NombreAutor;
            $tmp["Nota1"] = $Nota;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function SMCrearEditorial($array) {
        if ($this->Filtro($array) == "ok") {
            $respuesta = array();
            $respuesta["sucess"] = "Reguistro duplicado";
            echo json_encode($respuesta);
        } else {

            $sql = 'INSERT INTO `tbl_editorial` ( `nombreEditorial`, `direccionEditorial`, `telefonoEditorial`, `anoPublicacion`) VALUES ( ?,?, ?,?);';
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

    function insert($array, $stmp) {
        $editorialVo = new EditorialVO();

        $editorialVo->setNombreEditorial($array->nombreEditorial);
        $editorialVo->setDireccionEditorial($array->direccionEditorial);
        $editorialVo->setTelefonoEditorial($array->telefonoEditorial);
        $editorialVo->setAnoPublicacion($array->anoPublicacion);

        $nombreEditorial = $editorialVo->getNombreEditorial();
        $direccionEditorial = $editorialVo->getDireccionEditorial();
        $telefonoEditorial = $editorialVo->getTelefonoEditorial();
        $anoPublicacion = $editorialVo->getAnoPublicacion();

        $stmp->bind_param("ssss", $nombreEditorial, $direccionEditorial, $telefonoEditorial, $anoPublicacion);

        return $stmp;
    }

    function Filtro($array) {
        $sql = 'SELECT `idEditorial`  FROM `tbl_editorial` WHERE `nombreEditorial`  = ?;';

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $editorialVo = new EditorialVO();
        $editorialVo->setNombreEditorial($array->nombreEditorial);

        $nombreEditorial = $editorialVo->getNombreEditorial();
        $stmp->bind_param("i", $nombreEditorial);
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

}
