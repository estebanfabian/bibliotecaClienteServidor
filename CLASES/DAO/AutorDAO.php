<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProvvedorDAO
 *
 * @author TECH INSTITUTE PC8
 */
class AutorDao {

    function CrearAutor($array) {
        $Autorvo = new AutorVO();
        $Autorvo->setNombreAutor($array["NombreAutor"]);
        $Autorvo->setNotaAutor($array["NotaAutor"]);
//   $Autorvo->setIdautor($array["Idautor"]);

        if ($Autorvo->getIdautor() != "null") {
            $this->modificarProveedor($Autorvo);
        } else {
            $sql = 'INSERT INTO `tbl_autor` ( `nombreAutor`, `notaAutor`) VALUES ( ?,?);';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $notaAutor = $Autorvo->getNotaAutor();
            // $idAutor = $Autorvo->getIdautor();

            $stmp->bind_param("ss", $nomAutor, $notaAutor);
            $this->respuesta($conn, $stmp);
        }
    }

    private function modificarProveedor($Autorvo) {
        $sql = 'UPDATE `tbl_autor` SET `nombreAutor` = ?, `notaAutor` = ? WHERE `tbl_autor`.`idautor` = ?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);
        $idAutor = $Autorvo->getIdautor();
        $nomAutor = $Autorvo->getNombreAutor();
        $notaAutor = $Autorvo->getNotaAutor();
        $stmp->bind_param("ss", $nomAutor, $notaAutor,$idAutor);
        $this->respuesta($conn, $stmp);
    }

}

//
//
//    public function lista() {
//        $sql = "select * from proveedor order by nombre;";
//        $BD = new ConectarBD();
//        echo json_encode($BD->query($sql));
//    }
//
//    public function listaXID($array) {
//        $Proveedor = new ProveedorVO();
//        $Proveedor->setId($array["Id"]);
//        $sql = "select id, nit, nombre, direccion, tele, contacto, actividadEco from proveedor where id = ?;";
//        //$sql = "select * from proveedor where id = ".$Proveedor->getId().";";
//        $BD = new ConectarBD();
//        $conn = $BD->getMysqli();
//        $stmp = $conn->prepare($sql);
//        $id = $Proveedor->getId();
//        $stmp->bind_param("i", $id);
//        $stmp->execute();
//        $stmp->bind_result($id, $nit, $nombre, $direccion, $tele, $contacto, $actividadEco);
//        $respuesta = array();
//        while ($stmp->fetch()) {
//            $tmp = array();
//            $tmp["id"] = $id;
//            $tmp["nit"] = $nit;
//            $tmp["nombre"] = $nombre;
//            $tmp["direccion"] = $direccion;
//            $tmp["tele"] = $tele;
//            $tmp["contacto"] = $contacto;
//            $tmp["actividadEco"] = $actividadEco;
//            $respuesta[sizeof($respuesta)] = $tmp;
//        }
//        echo json_encode($respuesta);
//        $stmp->close();
//        $conn->close();
//    }
//
//    public function eliminar($array) {
//        $Autorvo = new ProveedorVO();
//        $Autorvo->setId($array["id"]);
//        $BD = new ConectarBD();
//        $conn = $BD->getMysqli();
//        $sql = "delete from proveedor where id = ?;";
//        $stmp = $conn->prepare($sql);
//        $id = $Autorvo->getId();
//        $stmp->bind_param("i", $id);
//        $this->respuesta($conn, $stmp);
//    }
//
//    function respuesta($conn, $stmp) {
//        $respuesta = array();
//        if ($stmp->execute() == 1) {
//            $respuesta["sucess"] = "ok";
//        } else {
//            $respuesta["sucess"] = "no";
//        }
//        $stmp->close();
//        $conn->close();
//        echo json_encode($respuesta);
//    }
//
//}
