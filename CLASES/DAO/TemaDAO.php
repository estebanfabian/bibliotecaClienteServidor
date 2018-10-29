<?php

class TemaDAO {

    function CrearTema($array) {
        $sql = "INSERT INTO `tbl_temas`( `nombreTema`, `descripcion`) VALUES (?,?);";
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

    function ModificarTema($array) {
        $TemaVo = new TemaVO();
        $TemaVo->setIdTema($array->idTema);
        $TemaVo->setNombreTema($array->nombreTema);
        $TemaVo->setDescricion($array->Descricion);

        $sql = 'UPDATE `tbl_temas` SET `Descricion`=? WHERE `nombreTema`=?;';
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
        $TemaVo->setIdTema($array->nombreTema);

        $sql = 'DELETE FROM `tbl_temas` WHERE `idTema`=?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idTema = $TemaVo->getNombreTema();

        $stmp->bind_param("s", $idTema);
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

    function BuscarTema($array) {
        $sql = "SELECT `descripcion` FROM `tbl_temas` WHERE `nombreTema` = ?";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $TemaVo = new TemaVO();
        $TemaVo->setNombreTema($array->nombreTema);

        $nombreTema = $TemaVo->getNombreTema();

        $stmp->bind_param("s", $nombreTema);
        $stmp->execute();
        
        $stmp->bind_result( $Descricion);
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

}
