<?php

class AutorDao {

    function CrearAutor($array) {
        $Autorvo = new AutorVO();
        $Autorvo->setNombreAutor($array->NombreAutor);
        $Autorvo->setNotaAutor($array->NotaAutor);

        if ($Autorvo->getIdautor() != "null") {
            $this->modificarProveedor($Autorvo);
        } else {
            $sql = 'INSERT INTO `tbl_autor` ( `nombreAutor`, `notaAutor`) VALUES ( ?,?);';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $nomAutor = $Autorvo->getNombreAutor();
            $notaAutor = $Autorvo->getNotaAutor();

            $stmp->bind_param("ss", $nomAutor, $notaAutor);

            $this->Respuesta($conn, $stmp);
        }
    }

    private function ModificarAutor($array) {
        $Autorvo = new AutorVO();
        $Autorvo->setIdautor($array->idAutor);
        $Autorvo->setNombreAutor($array->NombreAutor);
        $Autorvo->setNotaAutor($array->NotaAutor);
        $sql = 'UPDATE `tbl_autor` SET `nombreAutor` = ?, `notaAutor` = ? WHERE `tbl_autor`.`idautor` = ?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idAutor = $Autorvo->getIdautor();
        $nomAutor = $Autorvo->getNombreAutor();
        $notaAutor = $Autorvo->getNotaAutor();
        $stmp->bind_param("ssi", $nomAutor, $notaAutor, $idAutor);
        $this->respuesta($stmp);

        $this->Respuesta($conn, $stmp);
    }

    function EliminarBiblioteca($array) {
        $Autorvo = new AutorVO();
        $Autorvo->setIdautor($array->idAutor);

        $sql = 'DELETE FROM `tbl_autor` WHERE `tbl_autor`.`idautor`=?';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idAutor = $Autorvo->getIdautor();

        $stmp->bind_param("i", $idAutor);
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

}
