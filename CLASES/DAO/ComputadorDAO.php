<?php

/**
 * Long Desc 
 * */

/**
 *Esta clase permite reunir los datos que serán enviados en una query para poder realizar consultas , insertar , actualizar o eliminar información como se requiera de los computadores.
 * 
 * @package DAO
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * */
class ComputadorDAO {

    /**
     * Este metodo permite registrar un nuevo computador con toda la información
     * nesesaria como es el fabricante y el numero del cargador que corresponde al computador, además 
     * de contar con sus observsaciones
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene la informacion a registrar del computador 
     * @return array() Se envia la respuesta del registro donde se indica si fue exitosa o no 
     * */
    function CrearComputador($array) {
        if ($this->Filtro($array) == "ok") {
            $respuesta = array();
            $respuesta["sucess"] = "Reguistro duplicado";
            echo json_encode($respuesta);
        } else {
            $sql = 'call computador (2,?,?,?,?);';

            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $this->respuesta($conn, $this->insert($array, $stmp));
        }
    }

    /**
     * Este metodo permite registrar un nuevo computador con toda la información
     * nesesaria como es el fabricante y el numero del cargador que corresponde al computador, además 
     * de contar con sus observsaciones
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene la informacion a registrar del computador 
     * @return array() Se envia la respuesta del registro donde se indica si fue exitosa o no 
     * */
    function ModificarComputador($array) {

        $computadorVo = new ComputadorVO();
        $computadorVo->setIdcomputador($array->idcomputador);
        $computadorVo->setFabricante($array->fabricante);
        $computadorVo->setObservaciones($array->observaciones);
        $computadorVo->setCargadorId($array->cargadorId);

        $sql = 'call computador (1,?,?,?,?);';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idcomputador = $computadorVo->getIdcomputador();
        $fabricante = $computadorVo->getFabricante();
        $observaciones = $computadorVo->getObservaciones();
        $cargadorId = $computadorVo->getCargadorId();

        $stmp->bind_param("ssii", $fabricante, $observaciones, $cargadorId, $idcomputador);

        $this->Respuesta($conn, $stmp);
    }

    /**
     * Este metodo permite eliminar el computador
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene el numero de serial que desea eliminar  del computador
     * @return array() Se envia la respuesta si la eliminacion del computador si fue exitosa o no 
     * */
    function EliminarComputador($array) {
        if ($this->Filtro($array) == "no") {
            $respuesta = array();
            $respuesta["sucess"] = "no";
            echo json_encode($respuesta);
        } else {

            $computadorVo = new ComputadorVO();
            $computadorVo->setIdcomputador($array->idcomputador);

            $sql = 'call miprocesos (8,?);';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $idcomputador = $computadorVo->getIdcomputador();

            $stmp->bind_param("s", $idcomputador);

            $this->Respuesta($conn, $stmp);
        }
    }

    /**
     * Este metodo permite cerrar la conexiòn con la base de datos y retornar si la query fue exitosa o no
     * @param array() $conn Variable que establece el driver de conexión 
     * @param array() $stmp prepara la ejecucion de la sentencia 
     * @return array() Se envia la respuesta de la actualización donde se indica si fue exitosa o no 
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
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
     * Este metodo permite buscar el computador a travès del  nùmero de serial del computador
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene el numero de serial del computador que desea buscar.
     * @return array() Se envia la respuesta  toda la informaciòn del computador como  fabricante , estado y observaciones 
     * */
    function buscar($array) {
        $sql = "call miprocesos (11,?);";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $computadorVo = new ComputadorVO();
        $computadorVo->setIdcomputador($array->idcomputador);

        $idcomputador = $computadorVo->getIdcomputador();
        $stmp->bind_param("i", $idcomputador);
        $stmp->execute();

        $stmp->bind_result($idcomputador, $fabricante, $observaciones, $cargadorId);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["idcomputador"] = $idcomputador;
            $tmp["fabricante"] = $fabricante;
            $tmp["cargadorId"] = $cargadorId;
            $tmp["idcomputador"] = $idcomputador;
            $tmp["observaciones"] = $observaciones;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function Filtro($array) {

        $computadorVo = new ComputadorVO();
        $computadorVo->setIdcomputador($array->idcomputador);

        $sql = "call miprocesos (3,?);";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idcomputador = $computadorVo->getIdcomputador();
        $stmp->bind_param("i", $idcomputador);
        $respuesta = array();
        if ($stmp->execute() == 1) {
            $stmp->bind_result($idcomputador);
            while ($stmp->fetch()) {
                $respuesta = $idcomputador;
            }

            if ($idcomputador != "") {
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

    function SMCrearComputador($array) {
        if ($this->Filtro($array) == "ok") {
            $respuesta = array();
            $respuesta["sucess"] = "Reguistro duplicado";
            echo json_encode($respuesta);
        } else {
            $sql = 'call computador (2,?,?,?,?);';

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

        $computadorVo = new ComputadorVO();
        $computadorVo->setIdcomputador($array->idcomputador);
        $computadorVo->setFabricante($array->fabricante);
        $computadorVo->setObservaciones($array->observaciones);
        $computadorVo->setCargadorId($array->cargadorId);

        $idcomputador = $computadorVo->getIdcomputador();
        $fabricante = $computadorVo->getFabricante();
        $observaciones = $computadorVo->getObservaciones();
        $cargadorId = $computadorVo->getCargadorId();

        $stmp->bind_param("issi", $idcomputador, $fabricante, $observaciones, $cargadorId);

        return $stmp;
    }

}
