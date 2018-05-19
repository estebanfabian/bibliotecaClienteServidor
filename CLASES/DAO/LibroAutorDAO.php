<?php

class LibroAutorDAO {

    function CrearLibroAutor($array) {
        $libroAutorVo = new LibroAutorVO();
        $libroAutorVo->setIdAutorLibro($array->idAutorLibro);
        $libroAutorVo->setIsbn($array->Isbn);
        $libroAutorVo->setIdautor($array->idautor);
        $libroAutorVo->setListaLibro($array->listaLibro);
        if ($libroAutorVo->setIdAutorLibro() != "null") {
            $this->ModificarLibroAutor($libroAutorVo);
        } else {
            $sql = 'INSERT INTO `tbl_libroautor` (`idAutorLibro`, `Isbn`, `idautor`, `listaLibro`) VALUES (?,?,?,?);';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $idAutorLibro = $libroAutorVo->getIdAutorLibro();
            $Isbn = $libroAutorVo->getIsbn();
            $idautor = $libroAutorVo->getIdautor();
            $listaLibro = $libroAutorVo->getListaLibro();

            $stmp->bind_param("isis", $idAutorLibro, $Isbn, $idautor, $listaLibro);

            $this->respuesta($conn, $stmp);
        }
    }

    function ModificarLibroAutor($array) {
        $libroAutorVo = new LibroAutorVO();
        $libroAutorVo->setIdAutorLibro($array->idAutorLibro);
        $libroAutorVo->setIsbn($array->Isbn);
        $libroAutorVo->setIdautor($array->idautor);
        $libroAutorVo->setListaLibro($array->listaLibro);

        $sql = 'UPDATE `tbl_libroautor` SET `Isbn` = ?, `idautor` = ?, `idautor` =? WHERE `tbl_libroautor`.`idAutorLibro` = ?';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idAutorLibro = $libroAutorVo->getIdAutorLibro();
        $Isbn = $libroAutorVo->getIsbn();
        $idautor = $libroAutorVo->getIdautor();
        $listaLibro = $libroAutorVo->getListaLibro();

        $stmp->bind_param("isis", $idAutorLibro, $Isbn, $idautor, $listaLibro);

        $this->respuesta($conn, $stmp);
    }

    function EliminarLibroAutor($array) {
        $libroAutorVo = new LibroAutorVO();
        $libroAutorVo->setIdAutorLibro($array->idAutorLibro);

        $sql = 'DELETE FROM `tbl_computador` WHERE `tbl_libroautor`.`idAutorLibro` =?';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idAutorLibro = $libroAutorVo->getIdAutorLibro();

        $stmp->bind_param("i", $idAutorLibro);

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
