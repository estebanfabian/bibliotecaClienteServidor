<?php
/**
 * Long Desc 
 * */

/**
 * Esta clase ejecuta las conusltas relacionadas con el autor
 * realizando 
 *
 * 
 * @package VO
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * * */

class AutorDao {

    function CrearAutor($array) {
        if ($this->Filtro($array) == "ok") {
            $respuesta = array();
            $respuesta["sucess"] = "Reguistro duplicado";
            echo json_encode($respuesta);
        } else {
            $sql = 'call tema(3, ?,?);';

            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $this->respuesta($conn, $this->insert($array, $stmp));
        }
    }

    function ModificarAutor($array) {

        $sql = 'call tema(4, ?,?) ;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $Autorvo = new AutorVO();
        $Autorvo->setNombreAutor($array->NombreAutor);
        $Autorvo->setNotaAutor($array->NotaAutor);

        $nomAutor = $Autorvo->getNombreAutor();
        $notaAutor = $Autorvo->getNotaAutor();
        $stmp->bind_param("ss", $nomAutor, $notaAutor);
        $this->Respuesta($conn, $stmp);
    }

    function EliminarAutor($array) {
        $sql = 'call miprocesos1 (10,?);';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $Autorvo = new AutorVO();
        $Autorvo->setNombreAutor($array->NombreAutor);

        $idAutor = $Autorvo->setNombreAutor();

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
        $sql = "call miprocesos1 (11,?);";

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

    function ListarAutor() {
        $sql = "SELECT * FROM listarautor";

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

    function Filtro($array) {

        $sql = 'call miprocesos1 (12,?)';

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $TemaVo = new TemaVO();
        $TemaVo->setNombreTema($array->nombreTema);

        $nombreTema = $TemaVo->getNombreTema();

        $stmp->bind_param("s", $nombreTema);

        $respuesta = array();
        if ($stmp->execute() == 1) {
            $stmp->bind_result($codigo);
            while ($stmp->fetch()) {
                $respuesta = $codigo;
            }

            if ($codigo != "") {
                $respuesta = "ok";
            } else {
                $respuesta = "no";
            }
        } else {
            $respuesta = "no";
        }
        $stmp->close();
        $conn->close();
        return ($respuesta);
    }

    function SMCrearAutor($array) {
        if ($this->Filtro($array) == "ok") {
            $respuesta = array();
            $respuesta["sucess"] = "Reguistro duplicado";
            echo json_encode($respuesta);
        } else {
             $sql = 'call tema(3, ?,?);';

            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $respuesta = array();
            if ($this->insert($array, $stmp)->execute() == 1) {
                $respuesta = "ok";
            } else {
                $respuesta = "no";
            }
            $stmp->close();
            $conn->close();
            return $respuesta;
        }
    }

    function insert($array, $stmp) {


        $Autorvo = new AutorVO();
        $Autorvo->setNombreAutor($array->NombreAutor);
        $Autorvo->setNotaAutor($array->NotaAutor);

        $nomAutor = $Autorvo->getNombreAutor();
        $notaAutor = $Autorvo->getNotaAutor();

        $stmp->bind_param("ss", $nomAutor, $notaAutor);
        return $stmp;
    }

}
