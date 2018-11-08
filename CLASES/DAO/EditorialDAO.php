<?php

class EditorialDAO {

    function CrearEditorial($array) {

        $editorialVo = new EditorialVO();

        $editorialVo->setNombreEditorial($array->nombreEditorial);
        $editorialVo->setDireccionEditorial($array->direccionEditorial);
        $editorialVo->setTelefonoEditorial($array->telefonoEditorial);
        $editorialVo->setAnoPublicacion($array->anoPublicacion);

        $sql = 'INSERT INTO `tbl_editorial` ( `nombreEditorial`, `direccionEditorial`, `telefonoEditorial`, `anoPublicacion`) VALUES ( ?,?, ?,?);';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);


        $nombreEditorial = $editorialVo->getNombreEditorial();
        $direccionEditorial = $editorialVo->getDireccionEditorial();
        $telefonoEditorial = $editorialVo->getTelefonoEditorial();
        $anoPublicacion = $editorialVo->getAnoPublicacion();

        $stmp->bind_param("ssss", $nombreEditorial, $direccionEditorial, $telefonoEditorial, $anoPublicacion);

        $this->Respuesta($conn, $stmp);
    }

    function ModificarEditorial($array) {

        $sql = 'UPDATE `tbl_editorial` SET ,`direccionEditorial`= ? ,`telefonoEditorial`=?,`anoPublicacion`= ? WHERE `nombreEditorial`= ?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $editorialVo = new EditorialVO();

        $editorialVo->setNombreEditorial($array->nombreEditorial);
        $editorialVo->setDireccionEditorial($array->direccionEditorial);
        $editorialVo->setTelefonoEditorial($array->telefonoEditorial);
        $editorialVo->setAnoPublicacion($array->anoPublicacion);

        $nombreEditorial = $editorialVo->getNombreEditorial();
        $direccionEditorial = $editorialVo->getDireccionEditorial();
        $telefonoEditorial = $editorialVo->getTelefonoEditorial();
        $anoPublicacion = $editorialVo->getAnoPublicacion();

        $stmp->bind_param("ssss", $nombreEditorial, $direccionEditorial, $telefonoEditorial, $anoPublicacion);

        $this->Respuesta($conn, $stmp);
    }

    function EliminarEditorial($array) {

        $editorialVo = new EditorialVO();
        $editorialVo->setNombreEditorial($array->nombreEditorial);

        $sql = 'DELETE FROM `tbl_editorial` WHERE `nombreEditorial`= ?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $editorialVo = new EditorialVO();

        $editorialVo->setNombreEditorial($array->nombreEditorial);

        $nombreEditorial = $editorialVo->getNombreEditorial();
        $stmp->bind_param("s", $nombreEditorial);

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

    function BuscarEditoriala($array) {
        $sql = "SELECT `nombreEditorial`,`direccionEditorial`,`telefonoEditorial`,`anoPublicacion` FROM `tbl_editorial` WHERE `nombreEditorial` = ?";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $editorialVo = new EditorialVO();

        $editorialVo->setNombreEditorial($array->nombreEditorial);

        $nombreEditorial = $editorialVo->getNombreEditorial();
        $stmp->bind_param("s", $nombreEditorial);
        $stmp->execute();
        $stmp->bind_result($nombreEditorial, $direccionEditorial, $telefonoEditorial, $anoPublicacion);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["nombreEditorial"] = $nombreEditorial;
            $tmp["direccionEditorial"] = $direccionEditorial;
            $tmp["telefonoEditorial"] = $telefonoEditorial;
            $tmp["anoPublicacion"] = $anoPublicacion;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($tmp);
    }

    function ListarAutor($array) {
       $sql = "SELECT `idEditorial`,`nombreEditorial` FROM `tbl_editorial`";

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);
      
        $stmp->execute();

        $stmp->bind_result($NombreAutor, $Nota);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["NombreAutor1"] = $NombreAutor;
            $tmp["Nota1"] = $Nota;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

}
