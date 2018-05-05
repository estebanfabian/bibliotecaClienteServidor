<?php

class VideoBeamDAO {

    function CrearVideoBeam($array) {

        $VideoBeamVo = new VideoBeamVO();
        $VideoBeamVo->setIdVideoBeam($array->idVideoBeam);
        $VideoBeamVo->setFabricante($array->fabricante);
        $VideoBeamVo->setCableUSB($array->cableUSB);
        $VideoBeamVo->setCableHDMI($array->cableHDMI);
        $VideoBeamVo->setCableVGA($array->cableVGA);
        $VideoBeamVo->setObservaciones($array->observaciones);



        if ($VideoBeamVo->getCodigo() != "null") {
            $this->ModificarVideoBeam($VideoBeamVo);
        } else {
            $sql = 'INSERT INTO `tbl_video_beam`(`idVideoBeam`, `fabricante`, `cableUSB`, `cableHDMI`, `cableVGA`, `observaciones`) VALUES (?,?,?,?,?,?);';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);



            $idVideoBeam = $VideoBeamVo->getIdVideoBeam();
            $fabricante = $VideoBeamVo->getFabricante();
            $cableUSB = $VideoBeamVo->getCableUSB();
            $cableHDMI = $VideoBeamVo->getCableHDMI();
            $cableVGA = $VideoBeamVo->getCableVGA();
            $observaciones = $VideoBeamVo->getObservaciones();

            $stmp->bind_param("isiiis", $idVideoBeam, $fabricante, $cableUSB, $cableHDMI, $cableVGA, $observaciones);
            $this->respuesta($conn, $stmp);

            if ($stmp->execute() == 1) {
                $respuesta["sucess"] = "ok";
            } else {
                $respuesta["sucess"] = "no";
            }
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function ModificarVideoBeam($array) {

        $VideoBeamVo = new VideoBeamVO();
        $VideoBeamVo->setIdVideoBeam($array->idVideoBeam);
        $VideoBeamVo->setFabricante($array->fabricante);
        $VideoBeamVo->setCableUSB($array->cableUSB);
        $VideoBeamVo->setCableHDMI($array->cableHDMI);
        $VideoBeamVo->setCableVGA($array->cableVGA);
        $VideoBeamVo->setObservaciones($array->observaciones);



        if ($VideoBeamVo->getCodigo() != "null") {
            $this->ModificarVideoBeam($VideoBeamVo);
        } else {
            $sql = 'UPDATE `tbl_video_beam` SET `fabricante`=?,`cableUSB`=?,`cableHDMI`=?,`cableVGA`=?,`observaciones`=?WHERE `idVideoBeam`=?;';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $idVideoBeam = $VideoBeamVo->getIdVideoBeam();
            $fabricante = $VideoBeamVo->getFabricante();
            $cableUSB = $VideoBeamVo->getCableUSB();
            $cableHDMI = $VideoBeamVo->getCableHDMI();
            $cableVGA = $VideoBeamVo->getCableVGA();
            $observaciones = $VideoBeamVo->getObservaciones();

            $stmp->bind_param("siiisi", $idVideoBeam, $fabricante, $cableUSB, $cableHDMI, $cableVGA, $observaciones);
            $this->respuesta($conn, $stmp);

            if ($stmp->execute() == 1) {
                $respuesta["sucess"] = "ok";
            } else {
                $respuesta["sucess"] = "no";
            }
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function EliminarVideoBeam($array) {

        $VideoBeamVo = new VideoBeamVO();
        $VideoBeamVo->setIdVideoBeam($array->idVideoBeam);


        $sql = 'DELETE FROM `tbl_video_beam` WHERE `idVideoBeam` = ?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idVideoBeam = $VideoBeamVo->getIdVideoBeam();


        $stmp->bind_param("i", $idVideoBeam);
        $this->respuesta($conn, $stmp);

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
