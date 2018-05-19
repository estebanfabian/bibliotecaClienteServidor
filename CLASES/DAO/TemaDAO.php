<?php

class TemaDAO {

    function CrearTema($array) {
        $TemaVo = new TemaVO();
        $TemaVo->setIdTema($array->idTema);
        $TemaVo->setNombreTema($array->nombreTema);
        $TemaVo->setDescricion($array->Descricion);

        if ($TemaVo->setIdTema() != "null") {
            $this->ModificarTema($TemaVo);
        } else {
            $sql = 'INSERT INTO `tbl_temas`(`idTema`, `nombreTema`, `Descricion`) VALUES (?,?,?);';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $idLibroTema = $TemaVo->getIdLibroTema();
            $idTema = $TemaVo->getIdTema();
            $nombreTema = $TemaVo->getNombreTema();
            $Descricion = $TemaVo->getDescricion();

            $stmp->bind_param("iss", $idTema, $nombreTema, $Descricion);
        }
    }

    function ModificarTema($array) {
        $TemaVo = new TemaVO();
        $TemaVo->setIdTema($array->idTema);
        $TemaVo->setNombreTema($array->nombreTema);
        $TemaVo->setDescricion($array->Descricion);

        $sql = 'UPDATE `tbl_temas` SET `nombreTema`=?,`Descricion`=? WHERE `idTema`=?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idTema = $TemaVo->getIdTema();
        $nombreTema = $TemaVo->getNombreTema();
        $Descricion = $TemaVo->getDescricion();

        $stmp->bind_param("sis", $nombreTema, $Descricion, $idTema);
    }

    function EliminarTema($array) {
        $TemaVo = new TemaVO();
        $TemaVo->setIdTema($array->idTema);

        $sql = 'DELETE FROM `tbl_temas` WHERE `idTema`=?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idTema = $TemaVo->getIdTema();

        $stmp->bind_param("i", $idTema);
    }

    function respuesta($conn, $stmp) {
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
