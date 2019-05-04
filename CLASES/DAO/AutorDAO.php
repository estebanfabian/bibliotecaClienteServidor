<?php

class AutorDao {

    function CrearAutor($array) {
        $Autorvo = new AutorVO();
        $Autorvo->setNombreAutor($array->NombreAutor);
        $Autorvo->setNotaAutor($array->NotaAutor);


        $sql = 'INSERT INTO `tbl_autor` ( `nombreAutor`, `notaAutor`) VALUES ( ?,?);';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $nomAutor = $Autorvo->getNombreAutor();
        $notaAutor = $Autorvo->getNotaAutor();

        $stmp->bind_param("ss", $nomAutor, $notaAutor);

        $this->Respuesta($conn, $stmp);
    }

    function ModificarAutor($array) {
        $Autorvo = new AutorVO();

        $Autorvo->setNombreAutor($array->NombreAutor);
        $Autorvo->setNotaAutor($array->NotaAutor);
        $sql = 'UPDATE `tbl_autor` SET  `notaAutor` = ? WHERE `nombreAutor` = ? ;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $nomAutor = $Autorvo->getNombreAutor();
        $notaAutor = $Autorvo->getNotaAutor();
        $stmp->bind_param("ss", $nomAutor, $notaAutor);
        if ($stmp->execute() == 1) {
            $respuesta["sucess"] = "ok";
        } else {
            $respuesta["sucess"] = "no";
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function EliminarAutor($array) {
        $Autorvo = new AutorVO();
        $Autorvo->setIdautor($array->NombreAutor);

        $sql = 'DELETE FROM `tbl_autor` WHERE `nombreAutor`=?';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idAutor = $Autorvo->getIdautor();

        $stmp->bind_param("s", $idAutor);
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

    function buscarAutor($array) {
        $sql = "SELECT `nombreAutor`,`notaAutor` FROM `tbl_autor` WHERE `nombreAutor`= ?";

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $Autorvo = new AutorVO();
        $Autorvo->setNombreAutor($array->NombreAutor);

        $NombreAutor = $Autorvo->getNombreAutor();
        $stmp->bind_param("s", $NombreAutor);
        $stmp->execute();

        $stmp->bind_result($NombreAutor, $Nota);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["NombreAutor"] = $NombreAutor;
            $tmp["Nota"] = $Nota;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function ListarAutor($array) {
        $sql = "SELECT `idAutor`,`nombreAutor`FROM `tbl_autor`";

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $stmp->execute();

        $stmp->bind_result($NombreAutor, $Nota);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["NombreAutor"] = $NombreAutor;
            $tmp["Nota"] = $Nota;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

}
