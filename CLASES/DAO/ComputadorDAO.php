<?php

class ComputadorDAO {

    function CrearComputador($array) {
        $computadorVo = new ComputadorVO();
        $computadorVo->setIdcomputador($array->idcomputador);
        $computadorVo->setFabricante($array->fabricante);
        $computadorVo->setObservaciones($array->observaciones);
        $computadorVo->setCargadorId($array->cargadorId);

        if ($computadorVo->getIdcomputador() != "null") {
            $this->ModificarComputador($computadorVo);
        } else {
            $sql = 'INSERT INTO `tbl_computador` (`idcomputador`, `fabricante`, `observaciones`, `cargadorId`) VALUES (?,?,?,?);';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);



            $idcomputador = $computadorVo->getIdcomputador();
            $fabricante = $computadorVo->getFabricante();
            $observaciones = $computadorVo->getObservaciones();
            $cargadorId = $computadorVo->getCargadorId();

            $stmp->bind_param("ssss", $idcomputador, $fabricante, $observaciones, $cargadorId);

            $respuesta = array();
            if ($stmp->execute() == 1) {
                $respuesta["sucess"];
                $respuesta["sucess"] = "ok";
            } else {
                $respuesta["sucess"] = "no";
            }
            $stmp->close();
            $conn->close();
            echo json_encode($respuesta);
        }
    }

    function ModificarComputador($array) {

        $computadorVo = new ComputadorVO();
        $computadorVo->setIdcomputador($array->idcomputador);
        $computadorVo->setFabricante($array->fabricante);
        $computadorVo->setObservaciones($array->observaciones);
        $computadorVo->setCargadorId($array->cargadorId);

        if ($computadorVo->getIdcomputador() != "null") {
            $this->ModificarComputador($computadorVo);
        } else {
            $sql = 'UPDATE `tbl_computador` SET `fabricante` = ?, `observaciones` =?, `cargadorId` = ? WHERE `tbl_computador`.`idcomputador` = ?;';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);



            $idcomputador = $computadorVo->getIdcomputador();
            $fabricante = $computadorVo->getFabricante();
            $observaciones = $computadorVo->getObservaciones();
            $cargadorId = $computadorVo->getCargadorId();

            $stmp->bind_param("ssss", $fabricante, $observaciones, $cargadorId, $idcomputador);

            $respuesta = array();
            if ($stmp->execute() == 1) {
                $respuesta["sucess"];
                $respuesta["sucess"] = "ok";
            } else {
                $respuesta["sucess"] = "no";
            }
            $stmp->close();
            $conn->close();
            echo json_encode($respuesta);
        }
    }

    function EliminarComputador($array) {

        $computadorVo = new ComputadorVO();
        $computadorVo->setIdcomputador($array->idcomputador);
        
        $sql = 'DELETE FROM `tbl_computador` WHERE `tbl_computador`.`idcomputador` =?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idcomputador = $computadorVo->getIdcomputador();

        $stmp->bind_param("s", $idcomputador);

        $respuesta = array();
        if ($stmp->execute() == 1) {
            $respuesta["sucess"];
            $respuesta["sucess"] = "ok";
        } else {
            $respuesta["sucess"] = "no";
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

}
