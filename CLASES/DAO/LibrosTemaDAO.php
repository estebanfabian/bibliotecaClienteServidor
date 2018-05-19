<?php

class LibrosTemaDAO {

    function CrearLibrosTema($array) {
        $LibrosTemaVo = new LibrosTemaVO();
        $LibrosTemaVo->setIdAutorLibro($array->idAutorLibro);
        $LibrosTemaVo->setIsbn($array->Isbn);
        $LibrosTemaVo->setIdTema($array->idTema);

        if ($LibrosTemaVo->setIdAutorLibro() != "null") {
            $this->ModificarLibrosTema($LibrosTemaVo);
        } else {
            $sql = 'INSERT INTO `tbl_libro_temas` (`idLibroTema`,`Isbn`, `idTema`) VALUES (?,?,?);';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $idLibroTema = $LibrosTemaVo->getIdLibroTema();
            $Isbn = $LibrosTemaVo->getIsbn();
            $idTema = $LibrosTemaVo->getIdTema();

            $stmp->bind_param("isis", $idLibroTema, $Isbn, $idTema);

            $this->respuesta($conn, $stmp);
        }
    }

    function ModificarLibrosTema($param) {
        $LibrosTemaVo = new LibrosTemaVO();
        $LibrosTemaVo->setIdAutorLibro($array->idAutorLibro);
        $LibrosTemaVo->setIsbn($array->Isbn);
        $LibrosTemaVo->setIdTema($array->idTema);

        if ($LibrosTemaVo->setIdAutorLibro() != "null") {
            $this->ModificarLibrosTema($LibrosTemaVo);
        } else {
            $sql = 'UPDATE `tbl_libro_temas` SET  `Isbn`=?, `idTema`=? WHERE `tbl_libro_temas`.`idLibroTema` =? ;';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $idLibroTema = $LibrosTemaVo->getIdLibroTema();
            $Isbn = $LibrosTemaVo->getIsbn();
            $idTema = $LibrosTemaVo->getIdTema();

            $stmp->bind_param("sii", $idLibroTema, $Isbn, $idTema);

            $this->respuesta($conn, $stmp);
        }
    }

    function EliminarrLibrosTema($array) {
        $LibrosTemaVo = new LibrosTemaVO();
        $LibrosTemaVo->setIdAutorLibro($array->idAutorLibro);

        $sql = 'DELETE FROM `tbl_computador` WHERE `tbl_libro_temas`.`idLibroTema` =?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idLibroTema = $LibrosTemaVo->getIdLibroTema();

        $stmp->bind_param("i", $idLibroTema);

        $this->respuesta($conn, $stmp);
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