<?php

class LibroPrestamoDAO {

    function CrearLibro($array) {
        $libroVo = new LibroPrestamoVO;
        $libroVo->setIsbnPrestamoInt($array->Isbn);
        $libroVo->setIdEditorial($array->editorial);
        $libroVo->setTitulo($array->titulo);
        $libroVo->setEditorial($array->editorial);
        $libroVo->setCategoriaLibro($array->categoriaLibro);
        $libroVo->setResena($array->resena);

        if ($libroVo->setIdAutorLibro() != "null") {
            $this->ModificarLibro($libroVo);
        } else {
            $sql = 'INSERT INTO `tbl_libro` (`IsbnPrestamoInt`, `idEditorial`, `titulo`, `editorial`, `categoriaLibro`, `resena`) VALUES (?, ?, ?, ?, ?, ?)';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $IsbnPrestamoInt = $libroVo->getIsbnPrestamoInt();
            $idEditorial = $libroVo->getIdEditorial();
            $titulo = $libroVo->getTitulo();
            $editorial = $libroVo->getEditorial();
            $categoriaLibro = $libroVo->getCategoriaLibro();
            $resena = $libroVo->getResena();

            $stmp->bind_param("isis", $IsbnPrestamoInt, $idEditorial, $titulo, $editorial, $categoriaLibro, $resena);

            $this->respuesta($conn, $stmp);
        }
    }

    function ModificarLibro($array) {
        $libroVo = new LibroVO;
        $libroVo->setIsbnPrestamoInt($array->Isbn);
        $libroVo->setIdEditorial($array->editorial);
        $libroVo->setTitulo($array->titulo);
        $libroVo->setEditorial($array->editorial);
        $libroVo->setCategoriaLibro($array->categoriaLibro);
        $libroVo->setResena($array->resena);

        $sql = 'UPDATE `tbl_libro` SET `idEditorial` = ?, `titulo` = ?, `editorial` = ?, `categoriaLibro` = ?, `resena` = ? WHERE `tbl_libro`.`IsbnPrestamoInt` = ?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $IsbnPrestamoInt = $libroVo->getIsbnPrestamoInt();
        $idEditorial = $libroVo->getIdEditorial();
        $titulo = $libroVo->getTitulo();
        $editorial = $libroVo->getEditorial();
        $categoriaLibro = $libroVo->getCategoriaLibro();
        $resena = $libroVo->getResena();

        $stmp->bind_param("sisi", $idEditorial, $titulo, $editorial, $categoriaLibro, $resena, $IsbnPrestamoInt);

        $this->respuesta($conn, $stmp);
    }

    function EliminarLibro($array) {

        $libroVo = new LibroVO;
        $libroVo->setIsbnPrestamoInt($array->IsbnPrestamoInt);

        $sql = 'DELETE FROM `tbl_computador` WHERE `tbl_libro`.`IsbnPrestamoInt` =?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $IsbnPrestamoInt = $libroVo->getIsbnPrestamoInt();
        $stmp->bind_param("i", $IsbnPrestamoInt);

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
