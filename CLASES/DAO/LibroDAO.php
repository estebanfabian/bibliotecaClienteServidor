<?php

class LibroDAO {

    function CrearLibro($array) {
        $libroVo = new LibroVO;
        $libroVo->setIsbn($array->Isbn);
        $libroVo->setIdEditorial($array->editorial);
        $libroVo->setTitulo($array->titulo);
        $libroVo->setEditorial($array->editorial);
        $libroVo->setCategoriaLibro($array->categoriaLibro);
        $libroVo->setResena($array->resena);

        if ($libroVo->setIdAutorLibro() != "null") {
            $this->ModificarLibro($libroVo);
        } else {
            $sql = 'INSERT INTO `tbl_libro` (`Isbn`, `idEditorial`, `titulo`, `editorial`, `categoriaLibro`, `resena`) VALUES (?, ?, ?, ?, ?, ?)';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);


            $Isbn = $libroVo->getIsbn();
            $idEditorial = $libroVo->getIdEditorial();
            $titulo = $libroVo->getTitulo();
            $editorial = $libroVo->getEditorial();
            $categoriaLibro = $libroVo->getCategoriaLibro();
            $resena = $libroVo->getResena();

            $stmp->bind_param("isis", $Isbn, $idEditorial, $titulo, $editorial, $categoriaLibro, $resena);

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

    function ModificarLibro($array) {
        $libroVo = new LibroVO;
        $libroVo->setIsbn($array->Isbn);
        $libroVo->setIdEditorial($array->editorial);
        $libroVo->setTitulo($array->titulo);
        $libroVo->setEditorial($array->editorial);
        $libroVo->setCategoriaLibro($array->categoriaLibro);
        $libroVo->setResena($array->resena);


        $sql = 'UPDATE `tbl_libro` SET `idEditorial` = ?, `titulo` = ?, `editorial` = ?, `categoriaLibro` = ?, `resena` = ? WHERE `tbl_libro`.`Isbn` = ?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $Isbn = $libroVo->getIsbn();
        $idEditorial = $libroVo->getIdEditorial();
        $titulo = $libroVo->getTitulo();
        $editorial = $libroVo->getEditorial();
        $categoriaLibro = $libroVo->getCategoriaLibro();
        $resena = $libroVo->getResena();

        $stmp->bind_param("sisi", $idEditorial, $titulo, $editorial, $categoriaLibro, $resena, $Isbn);

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

    function EliminarLibro($array) {

        $libroVo = new LibroVO;
        $libroVo->setIsbn($array->Isbn);

        $sql = 'DELETE FROM `tbl_computador` WHERE `tbl_libro`.`Isbn` =?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $Isbn = $libroVo->getIsbn();
        $stmp->bind_param("i", $Isbn);

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
