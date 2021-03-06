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

    /**
     * Este metodo permite registrar un nuevo autor con toda la información
     * nesesaria como es nombre y alguna obsevacion sobre el autor
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene la informacion a registrar del autor 
     * @return array() Se envia la respuesta del registro donde se indica si fue exitosa o no 
     * */
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

    /**
     * Este metodo permite modificar informacíon sobre autor como
     * son observsaciones del autor.
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene la informacion a registrar del computador 
     * @return array() Se envia la respuesta del registro donde se indica si fue exitosa o no la modificación 
     * */
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

    /**
     * Este metodo permite eliminar el registro del autor
     * de la base de datos..
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene la informacion a registrar del computador 
     * @return array() Se envia la respuesta del registro donde se indica si fue exitosa o no la eliminación del autor 
     * */
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

    /**
     * Este metodo permite modificar informacíon sobre autor como
     * son observsaciones del autor.
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene la informacion a registrar del computador 
     * @return array() Se envia la respuesta del registro donde se indica si fue exitosa o no la modificación 
     * */
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

    /**
     * Este metodo permite buscar el autor 
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene el numero de serial del video beam que desea buscar.
     * @return array() Se envia la respuesta toda la informaciòn del autor
     * */
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

    /**
     * Este metodo permite mostrar todos los usuario
     * nesesaria como es nombre y alguna obsevacion sobre el autor
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene la informacion a registrar del autor 
     * @return array() Se envia la respuesta del registro de los autores
     * */
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

    /**
     * Este metodo valida si el autor ya esta registrado en la base de datos
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene el numero de serial del video beam que desea validar su existencia en la base de datos.
     * @return array() Se envia la respuesta si el video beam esta registrado o no.
     * */
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

    /**
     * Este metodo permite registrar mas de un nuevo autor con toda la información 
     * nesesaria como es nombre y alguna obsevacion sobre el autor
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene la informacion a registrar del autor 
     * @return array() Se envia la respuesta del registro donde se indica si fue exitosa o no 
     * */
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

    /**
     * Este metodo permite registrar un nuevo autor con toda la información
     * nesesaria como es nombre y alguna obsevacion sobre el autor
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene la informacion a registrar del autor 
     * @return array() Se envia la respuesta del registro donde se indica si fue exitosa o no 
     * */
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
