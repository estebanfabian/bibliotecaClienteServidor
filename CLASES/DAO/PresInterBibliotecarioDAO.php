<?php

class PresInterBibliotecarioDAO {

    function CrearPresInterBibliotecario($array) {
        $PresInterBibliotecarioVo = new PresInterBibliotecarioVO();
        $PresInterBibliotecarioVo->setIdPrestamoInterBiblio($array->idPrestamoInterBiblio);
        $PresInterBibliotecarioVo->setIdPrestamo($array->idPrestamo);
        $PresInterBibliotecarioVo->setIdPrestemoInterBibliotecario($array->idPrestemoInterBibliotecario);
        $PresInterBibliotecarioVo->setIsbnPrestamoInt($array->IsbnPrestamoInt);


        if ($PresInterBibliotecarioVo->setIdPrestamoInterBiblio() != "null") {
            $this->ModificarPresInterBibliotecario($PresInterBibliotecarioVo);
        } else {
            $sql = 'INSERT INTO `tbl_pestemointerbibliotecario`(`idPrestamoInterBiblio`, `idPrestamo`, `idPrestemoInterBibliotecario`, `IsbnPrestamoInt`) VALUES (?,?,?,);';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);


            $Isbn = $PresInterBibliotecarioVo->getIsbn();
            $idPrestamoInterBiblio = $PresInterBibliotecarioVo->getIdPrestamoInterBiblio();
            $idPrestamo = $PresInterBibliotecarioVo->getIdPrestamo();
            $idPrestemoInterBibliotecario = $PresInterBibliotecarioVo->getIdPrestemoInterBibliotecario();
            $IsbnPrestamoInt = $PresInterBibliotecarioVo->getIsbnPrestamoInt();
            $stmp->bind_param("isis", $idPrestamoInterBiblio, $idPrestamo, $idPrestemoInterBibliotecario, $IsbnPrestamoInt);

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

    function ModificarPresInterBibliotecario($array) {
        $PresInterBibliotecarioVo = new PresInterBibliotecarioVO();
        $PresInterBibliotecarioVo->setIdPrestamoInterBiblio($array->idPrestamoInterBiblio);
        $PresInterBibliotecarioVo->setIdPrestamo($array->idPrestamo);
        $PresInterBibliotecarioVo->setIdPrestemoInterBibliotecario($array->idPrestemoInterBibliotecario);
        $PresInterBibliotecarioVo->setIsbnPrestamoInt($array->IsbnPrestamoInt);


        $sql = 'UPDATE `tbl_pestemointerbibliotecario` SET `idPrestamo`=?,`idPrestemoInterBibliotecario`=?,`IsbnPrestamoInt`=? WHERE `idPrestamoInterBiblio` = ?';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);


        $Isbn = $PresInterBibliotecarioVo->getIsbn();
        $idPrestamoInterBiblio = $PresInterBibliotecarioVo->getIdPrestamoInterBiblio();
        $idPrestamo = $PresInterBibliotecarioVo->getIdPrestamo();
        $idPrestemoInterBibliotecario = $PresInterBibliotecarioVo->getIdPrestemoInterBibliotecario();
        $IsbnPrestamoInt = $PresInterBibliotecarioVo->getIsbnPrestamoInt();
        $stmp->bind_param("sisi", $idPrestamo, $idPrestemoInterBibliotecario, $IsbnPrestamoInt, $idPrestamoInterBiblio);

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

    function EliminarPresInterBibliotecario($array) {
        $PresInterBibliotecarioVo = new PresInterBibliotecarioVO();
        $PresInterBibliotecarioVo->setIdPrestamoInterBiblio($array->idPrestamoInterBiblio);


        $sql = 'DELETE FROM `tbl_pestemointerbibliotecario` WHERE  WHERE `idPrestamoInterBiblio` = ?';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);


        $Isbn = $PresInterBibliotecarioVo->getIsbn();
        $idPrestamoInterBiblio = $PresInterBibliotecarioVo->getIdPrestamoInterBiblio();
        $stmp->bind_param("i", $idPrestamoInterBiblio);

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
