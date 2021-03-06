<?php

/**
 * Long Desc 
 * */

/**
 * Esta clase permite reunir los datos que serán enviados en una query para poder realizar consultas, insertar, actualizar o eliminar información como se requiera de los video beams.
 * 
 * @package DAO
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * */
class VideoBeamDAO {

    /**
     * Este metodo permite registrar un nuevo video beam con toda la información
     * nesesaria como es el fabricante y los cables que tiene, además 
     * de contar con sus observsaciones
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene la informacion a registrar del video beam 
     * @return array() Se envia la respuesta del registro donde se indica si fue exitosa , fallida o ya se encuentra duplicado 
     * */
    function CrearVideoBeam($array) {

        if ($this->Filtro($array) == "ok") {
            $respuesta = array();
            $respuesta["sucess"] = "Reguistro duplicado";
            echo json_encode($respuesta);
        } else {

            $sql = 'call videoBeam(2,?,?,?,?,?,?);';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $this->respuesta($conn, $this->insert($array, $stmp));
        }
    }

    /**
     * Este metodo permite modificar alguno de los elementos de video beam menos el numero de serial del video beam
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene la informacion que se modificara del video beam.
     * @return array() Se envia la respuesta de la modificacione si fue exitosa o no 
     * */
    function ModificarVideoBeam($array) {

        $sql = 'call videoBeam (1,?,?,?,?,?,?);';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $VideoBeamVo = new VideoBeamVO();
        $VideoBeamVo->setIdVideoBeam($array->idVideoBeam);
        $VideoBeamVo->setFabricante($array->fabricante);
        $VideoBeamVo->setCableUSB($array->cableUSB);
        $VideoBeamVo->setCableHDMI($array->cableHDMI);
        $VideoBeamVo->setCableVGA($array->cableVGA);
        $VideoBeamVo->setObservaciones($array->observaciones);

        $idVideoBeam = $VideoBeamVo->getIdVideoBeam();
        $fabricante = $VideoBeamVo->getFabricante();
        $cableUSB = $VideoBeamVo->getCableUSB();
        $cableHDMI = $VideoBeamVo->getCableHDMI();
        $cableVGA = $VideoBeamVo->getCableVGA();
        $observaciones = $VideoBeamVo->getObservaciones();

        $stmp->bind_param("siiisi", $fabricante, $cableUSB, $cableHDMI, $cableVGA, $observaciones, $idVideoBeam);
        $this->respuesta($conn, $stmp);
    }

    /**
     * Este metodo permite eliminar el video beam
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene el numero de serial que desea eliminar del video beam.
     * @return array() Se envia la respuesta si la eliminacion del video beam si fue exitosa o no 
     * */
    function EliminarVideoBeam($array) {
        if ($this->Filtro($array) == "no") {
            $respuesta = array();
            $respuesta["sucess"] = "no";
            echo json_encode($respuesta);
        } else {
            $VideoBeamVo = new VideoBeamVO();
            $VideoBeamVo->setIdVideoBeam($array->idVideoBeam);

            $sql = 'call miprocesos1 (18,?);';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $idVideoBeam = $VideoBeamVo->getIdVideoBeam();

            $stmp->bind_param("i", $idVideoBeam);
            $this->respuesta($conn, $stmp);
        }
    }

    /**
     * Este metodo permite buscar el video beam a travès del nùmero de serial del video beam
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene el numero de serial del video beam que desea buscar.
     * @return array() Se envia la respuesta toda la informaciòn del video beam como cables que tiene estado y observaciones 
     * */
    function BuscarVideoBean($array) {

        $VideoBeamVo = new VideoBeamVO();
        $VideoBeamVo->setIdVideoBeam($array->idVideoBeam);

        $sql = "call miprocesos1 (21,?);";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idVideoBeam = $VideoBeamVo->getIdVideoBeam();
        $stmp->bind_param("i", $idVideoBeam);
        $stmp->execute();

        $stmp->bind_result($idVideoBeam, $fabricante, $cableUSB, $cableHDMI, $cableVGA, $observaciones, $estadoVideoBeam);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["idVideoBeam"] = $idVideoBeam;
            $tmp["fabricante"] = $fabricante;
            $tmp["cableUSB"] = $cableUSB;
            $tmp["cableHDMI"] = $cableHDMI;
            $tmp["cableVGA"] = $cableVGA;
            $tmp["observaciones"] = $observaciones;
            $tmp["estadoVideoBeam"] = $estadoVideoBeam;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    /**
     * Este metodo valida si el video beam ya esta registrado en la base de datos
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene el numero de serial del video beam que desea validar su existencia en la base de datos.
     * @return array() Se envia la respuesta si el video beam esta registrado o no.
     * */
    function Filtro($array) {

        $VideoBeamVo = new VideoBeamVO();
        $VideoBeamVo->setIdVideoBeam($array->idVideoBeam);

        $sql = "call miprocesos1 (14,?);";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idVideoBeam = $VideoBeamVo->getIdVideoBeam();
        $stmp->bind_param("i", $idVideoBeam);
        $respuesta = array();
        if ($stmp->execute() == 1) {
            $stmp->bind_result($idVideoBeam);
            while ($stmp->fetch()) {
                $respuesta = $idVideoBeam;
            }

            if ($idVideoBeam != "") {
                $respuesta = "ok";
            } else {
                $respuesta = "no";
            }
        } else {
            $respuesta = "no";
        }

        $stmp->close();
        $conn->close();
        echo $respuesta;
        return ($respuesta);
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
     * Este metodo permite registrar varios nuevos video beams con toda la información
     * nesesaria como es el fabricante y los cables que tiene, además 
     * de contar con sus observsaciones
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene la informacion a registrar del video beam 
     * @return array() Se envia la respuesta del registro donde se indica si fue exitosa , fallida o ya se encuentra duplicado 
     * */
    function SMCrearVideoBeam($array) {
        if ($this->Filtro($array) == "ok") {
            $respuesta = "Reguistro duplicado";
            return $respuesta;
        } else {


            $sql = 'call videoBeam(2,?,?,?,?,?,?);';
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
     * Este metodo permite registrar varios nuevos video beams con toda la información
     * nesesaria como es el fabricante y los cables que tiene, además 
     * de contar con sus observsaciones
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene la informacion a registrar del video beam 
     * @return array() Se envia la respuesta del registro donde se indica si fue exitosa , fallida o ya se encuentra duplicado 
     * */
    function insert($array, $stmp) {

        $VideoBeamVo = new VideoBeamVO();
        $VideoBeamVo->setIdVideoBeam($array->idVideoBeam);
        $VideoBeamVo->setFabricante($array->fabricante);
        $VideoBeamVo->setCableUSB($array->cableUSB);
        $VideoBeamVo->setCableHDMI($array->cableHDMI);
        $VideoBeamVo->setCableVGA($array->cableVGA);
        $VideoBeamVo->setObservaciones($array->observaciones);

        $idVideoBeam = $VideoBeamVo->getIdVideoBeam();
        $fabricante = $VideoBeamVo->getFabricante();
        $cableUSB = $VideoBeamVo->getCableUSB();
        $cableHDMI = $VideoBeamVo->getCableHDMI();
        $cableVGA = $VideoBeamVo->getCableVGA();
        $observaciones = $VideoBeamVo->getObservaciones();

        $stmp->bind_param("isiiis", $idVideoBeam, $fabricante, $cableUSB, $cableHDMI, $cableVGA, $observaciones);
        return $stmp;
    }

    /**
     * Este metodo permite mostrar todos video beam
     * nesesaria como es nombre y alguna obsevacion sobre el autor
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @param array() $array datos de tipo json que contiene la informacion a registrar del autor 
     * @return array() Se envia la respuesta del registro de los video beam
     * */
    function CargarVideoBeam($array) {

        $sql = "SELECT `idVideoBeam` FROM `tbl_video_beam` ";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $stmp->execute();

        $stmp->bind_result($idVideoBeam);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["idVideoBeam"] = $idVideoBeam;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

}
