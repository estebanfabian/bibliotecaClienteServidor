<?php

class EditorialDAO {

    function CrearEditorial($array) {

        $editorialVo = new EditorialVO();
        $editorialVo->setIdEditorial($array->idEditorial);
        $editorialVo->setNombreEditorial($array->nombreEditorial);
        $editorialVo->setDireccionEditorial($array->direccionEditorial);
        $editorialVo->setTelefonoEditorial($array->telefonoEditorial);
        $editorialVo->setAnoPublicacion($array->anoPublicacion);

        if ($editorialVo->getIdcomputador() != "null") {
            $this->ModificarEditorial($editorialVo);
        } else {
            $sql = 'INSERT INTO `tbl_editorial` (`idEditorial`, `nombreEditorial`, `direccionEditorial`, `telefonoEditorial`, `anoPublicacion`) VALUES (?, ?,?, ?,?);';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $idEditorial = $editorialVo->getIdEditorial();
            $nombreEditorial = $editorialVo->getNombreEditorial();
            $direccionEditorial = $editorialVo->getDireccionEditorial();
            $telefonoEditorial = $editorialVo->getTelefonoEditorial();
            $anoPublicacion = $editorialVo->getAnoPublicacion();

            $stmp->bind_param("isssss", $idEditorial, $nombreEditorial, $direccionEditorial, $telefonoEditorial, $anoPublicacion);

            $this->Respuesta($conn, $stmp);
        }
    }

    function ModificarEditorial($array) {

        $editorialVo = new EditorialVO();
        $editorialVo->setIdEditorial($array->idEditorial);
        $editorialVo->setNombreEditorial($array->nombreEditorial);
        $editorialVo->setDireccionEditorial($array->direccionEditorial);
        $editorialVo->setTelefonoEditorial($array->telefonoEditorial);
        $editorialVo->setAnoPublicacion($array->anoPublicacion);

        $sql = 'UPDATE `tbl_editorial` SET `nombreEditorial` = ?, `direccionEditorial` = ?, `telefonoEditorial` = ?, `anoPublicacion` = ? WHERE `tbl_editorial`.`idEditorial` = ?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idEditorial = $editorialVo->getIdEditorial();
        $nombreEditorial = $editorialVo->getNombreEditorial();
        $direccionEditorial = $editorialVo->getDireccionEditorial();
        $telefonoEditorial = $editorialVo->getTelefonoEditorial();
        $anoPublicacion = $editorialVo->getAnoPublicacion();

        $stmp->bind_param("sssssI", $nombreEditorial, $direccionEditorial, $telefonoEditorial, $anoPublicacion, $idEditorial);

        $this->Respuesta($conn, $stmp);
    }

    function EliminarEditorial($array) {

        $editorialVo = new EditorialVO();
        $editorialVo->setIdEditorial($array->idEditorial);

        $sql = 'DELETE FROM `tbl_editorial` WHERE ``tbl_editorial`.`idEditorial` = ?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idEditorial = $editorialVo->getIdEditorial();
        $nombreEditorial = $editorialVo->getNombreEditorial();
        $direccionEditorial = $editorialVo->getDireccionEditorial();
        $telefonoEditorial = $editorialVo->getTelefonoEditorial();
        $anoPublicacion = $editorialVo->getAnoPublicacion();

        $stmp->bind_param("isssss", $idEditorial, $nombreEditorial, $direccionEditorial, $telefonoEditorial, $anoPublicacion);

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

}
