<?php

/**
 * Long Desc 
 * */

/**
 * Esta clase ejecuta las conusltas relacionadas con el prestamo
 * 
 *
 * 
 * @package VO
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * * */
class PrestamoDAO {

    function CrearPrestamo($array) {
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();

        $PrestamoVo = new PrestamoVO();
        $PrestamoVo->setEstadoLibro($array->observaciones);
        $PrestamoVo->setDiaPrestamo($array->diaPrestamo);
        $PrestamoVo->setIsbn($array->Isbn);
        $PrestamoVo->setActividad($array->proceso);
        $PrestamoVo->setCod_empleado($array->codigo);
        $PrestamoVo->setCodigo($array->codigoU);

        $Isbn = $PrestamoVo->getIsbn();
        $estadoLibro = $PrestamoVo->getEstadoLibro();
        $diaPrestamo = $PrestamoVo->getDiaPrestamo();
        $estado = $PrestamoVo->getEstadoLibro();
        $actividad = $PrestamoVo->getActividad();
        $CodigoEmpleado = $PrestamoVo->getCod_empleado();
        $codigo = $PrestamoVo->getCodigo();
        $sql = 'call prestamos (1,?,?,?,?,?,?)';
        $stmp = $conn->prepare($sql);
        $stmp->bind_param("iisiis", $Isbn, $CodigoEmpleado, $estadoLibro, $actividad, $codigo, $diaPrestamo);
        $this->Respuesta($conn, $stmp);
    }

    function CrearPrestamoVideoBeam($array) {
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();

        $PrestamoVo = new PrestamoVO();
        $PrestamoVo->setEstadoLibro($array->observaciones);
        $PrestamoVo->setDiaPrestamo($array->Fprestamo);
        $PrestamoVo->setDiaEntrega($array->Fentrega);
        $PrestamoVo->setIdcomputador($array->Ncomputador);
        $PrestamoVo->setIdVideoBeam($array->NvideoBeam);
        $PrestamoVo->setCod_empleado($array->codigo);
        $PrestamoVo->setCodigo($array->codigoU);


        $estadoLibro = $PrestamoVo->getEstadoLibro();
        $diaPrestamo = $PrestamoVo->getDiaPrestamo();
        $diaEntrega = $PrestamoVo->getDiaEntrega();
        $Nvideo = $PrestamoVo->getIdVideoBeam();
        $Ncomputador = $PrestamoVo->getIdcomputador();
        $CodigoEmpleado = $PrestamoVo->getCod_empleado();
        $codigo = $PrestamoVo->getCodigo();
        $diaPrestamo[10] = " ";
        $diaEntrega[10] = " ";
        $sql = 'INSERT INTO `tbl_prestamo`( `estadoLibro`, `actividad`, `diaEntrega`, `diaPrestamo`, `codigo`, `cod_empleado`, `idVideoBeam`, `idcomputador`, `id`) VALUES (?,2,?,?,?,?,?,?,(SELECT `id` FROM `tbl_usuario` WHERE `codigo` = ?))';
        $stmp = $conn->prepare($sql);
        $stmp->bind_param("ssssssss", $estadoLibro, $diaPrestamo, $diaEntrega, $codigo, $CodigoEmpleado, $Nvideo, $Ncomputador, $codigo);
        $this->Respuesta($conn, $stmp);
    }

    function CrearVideoBeam($array) {
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();

        $PrestamoVo = new PrestamoVO();
        $PrestamoVo->setEstadoLibro($array->observaciones);
        $PrestamoVo->setDiaPrestamo($array->Fprestamo);
        $PrestamoVo->setDiaEntrega($array->Fentrega);
        $PrestamoVo->setIdcomputador($array->Ncomputador);
        $PrestamoVo->setIdVideoBeam($array->NvideoBeam);
        $PrestamoVo->setCod_empleado($array->codigo);
        $PrestamoVo->setCodigo($array->codigoU);


        $estadoLibro = $PrestamoVo->getEstadoLibro();
        $diaPrestamo = $PrestamoVo->getDiaPrestamo();
        $diaEntrega = $PrestamoVo->getDiaEntrega();
        $Nvideo = $PrestamoVo->getIdVideoBeam();
        $Ncomputador = $PrestamoVo->getIdcomputador();
        $CodigoEmpleado = $PrestamoVo->getCod_empleado();
        $codigo = $PrestamoVo->getCodigo();
        $diaPrestamo[10] = " ";
        $diaEntrega[10] = " ";
        if ($array->estado == 2) {
            $sql = 'INSERT INTO `tbl_prestamo`( `estadoLibro`, `actividad`, `diaEntrega`, `diaPrestamo`, `codigo`, `cod_empleado`, `idVideoBeam`, `idcomputador`, `id`) VALUES (?,2,?,?,?,?,?,?,(SELECT `id` FROM `tbl_usuario` WHERE `codigo` = ?))';
        } else {
            $sql = 'INSERT INTO `tbl_prestamo`( `estadoLibro`, `actividad`, `diaEntrega`, `diaPrestamo`, `codigo`, `cod_empleado`, `idVideoBeam`, `idcomputador`, `id`) VALUES (?,1,?,?,?,?,?,?,(SELECT `id` FROM `tbl_usuario` WHERE `codigo` = ?))';
        }
        $stmp = $conn->prepare($sql);
        $stmp->bind_param("ssssssss", $estadoLibro, $diaPrestamo, $diaEntrega, $codigo, $CodigoEmpleado, $Nvideo, $Ncomputador, $codigo);
        $this->Respuesta($conn, $stmp);
    }

    function CrearReserva($array) {
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();

        $PrestamoVo = new PrestamoVO();
        $PrestamoVo->setEstadoLibro($array->observaciones);
        $PrestamoVo->setDiaPrestamo($array->diaPrestamo);
        $PrestamoVo->setIsbn($array->Isbn);
        $PrestamoVo->setActividad($array->proceso);
        $PrestamoVo->setCod_empleado($array->codigo);
        $PrestamoVo->setCodigo($array->codigoU);

        $Isbn = $PrestamoVo->getIsbn();
        $estadoLibro = $PrestamoVo->getEstadoLibro();
        $diaPrestamo = $PrestamoVo->getDiaPrestamo();
        $estado = $PrestamoVo->getEstadoLibro();
        $actividad = $PrestamoVo->getActividad();
        $CodigoEmpleado = null;
        $codigo = $PrestamoVo->getCodigo();

        $sql = 'call prestamos (2,?,?,?,?,?,?)';
        $stmp = $conn->prepare($sql);
        $stmp->bind_param("iisiis", $Isbn, $CodigoEmpleado, $estadoLibro, $actividad, $codigo, $diaPrestamo);
        $this->Respuesta($conn, $stmp);
    }

    function ValidacionReserva($param) {
        $sql = 'SELECT `estado` FROM `tbl_libro` WHERE `Isbn` = ?';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $isbn = $PrestamoVO->getIsbn();

        $stmp->bind_param("s", $isbn);

        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["estado"] = $resena;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
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

    public function Contador($array) {
        $sql = "SELECT COUNT(`codigo`) FROM tbl_prestamo WHERE (actividad=1||actividad=2) && `codigo`=?;";

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $PrestamoVO = new PrestamoVO();
        $PrestamoVO->setCodigo($array->codigo);
        $codigo = $PrestamoVO->getCodigo();

        $stmp->bind_param("i", $codigo);
        $stmp->execute();
        $stmp->bind_result($cont);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["count"] = $cont;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    public function Cancelar($array) {
        $sql = "UPDATE `tbl_prestamo` SET `actividad` = '5' WHERE `idPrestamo`=?";

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $PrestamoVO = new PrestamoVO();
        $PrestamoVO->setIdPrestamo($array->idPrestamo);
        $idPrestamo = $PrestamoVO->getIdPrestamo();

        $stmp->bind_param("i", $idPrestamo);
        $resultado = array();

        if ($stmp->execute()) {
            $respuesta["sucess"] = "ok";
        } else {
            $respuesta["sucess"] = "no";
        }

        $stmp->close();
        $conn->close();

        echo json_encode($respuesta);
    }

    public function Entrega($array) {
        $sql = "UPDATE `tbl_prestamo` SET `actividad` = '4' WHERE `idPrestamo`=?";

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $PrestamoVO = new PrestamoVO();
        $PrestamoVO->setIdPrestamo($array->idPrestamo);
        $idPrestamo = $PrestamoVO->getIdPrestamo();

        $stmp->bind_param("i", $idPrestamo);
        $resultado = array();

        if ($stmp->execute()) {
            $respuesta["sucess"] = "ok";
        } else {
            $respuesta["sucess"] = "no";
        }

        $stmp->close();
        $conn->close();

        echo json_encode($respuesta);
    }

    function Renovacion($array) {
        $sql = "UPDATE `tbl_prestamo` SET `renovacion` = '1' , diaEntrega = ? WHERE `tbl_prestamo`.`idPrestamo` =?";

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $PrestamoVO = new PrestamoVO();
        $PrestamoVO->setIdPrestamo($array->idPrestamo);
        $PrestamoVO->setDiaEntrega($array->diaEntrega);

        $idPrestamo = $PrestamoVO->getIdPrestamo();
        $diaEntrega = $PrestamoVO->getDiaPrestamo();

        $stmp->bind_param("si", $diaEntrega, $idPrestamo);
        $respuesta = array();


        if ($stmp->execute()) {
            $respuesta["sucess"] = "ok";
        } else {
            $respuesta["sucess"] = "no";
        }

        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function ValidarVideoBeam($array) {

        $sql = "select 'idVideoBeam' as computador, idVideoBeam as idcomputador FROM tbl_video_beam WHERE idVideoBeam not in (SELECT `idVideoBeam` FROM `tbl_prestamo` WHERE `isbn` IS NULL and ( diaPrestamo >= ? OR diaReserva >= ? ) AND diaEntrega <= ? and idVideoBeam is not null)";

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $PrestamoVO = new PrestamoVO();
        $PrestamoVO->setDiaPrestamo($array->Fprestamo);
        $PrestamoVO->setDiaEntrega($array->Fentrega);

        $diaPrestamo = $PrestamoVO->getDiaPrestamo();
        $diaEntrega = $PrestamoVO->getDiaEntrega();
        $diaPrestamo[10] = " ";
        $diaEntrega[10] = " ";

        $stmp->bind_param("sss", $diaPrestamo, $diaPrestamo, $diaEntrega);
        $stmp->execute();
        $stmp->bind_result($tipo, $isbn);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["computador"] = $tipo;
            $tmp["idcomputador"] = $isbn;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function ValidarComputador($array) {
        $sql = "call pvideo (2,?,?)";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $PrestamoVO = new PrestamoVO();
        $PrestamoVO->setDiaPrestamo($array->Fprestamo);
        $PrestamoVO->setDiaEntrega($array->Fentrega);

        $diaPrestamo = $PrestamoVO->getDiaPrestamo();
        $diaEntrega = $PrestamoVO->getDiaEntrega();
        $diaPrestamo[10] = " ";
        $diaEntrega[10] = " ";

        $stmp->bind_param("ss", $diaPrestamo, $diaEntrega);
        $stmp->execute();
        $stmp->bind_result($tipo, $isbn);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["computador"] = $tipo;
            $tmp["idcomputador"] = $isbn;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function CambioEstado($array) {

        $sql = 'SELECT * FROM `cambioestado`';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $stmp->execute();
        $stmp->bind_result($idPrestamo, $tipo, $actividad, $dReserva, $dEntrega, $dPrestamo, $id, $renovacion);
        $respuesta = array();
        while ($stmp->fetch()) {

            $tmp["idPrestamo"] = $idPrestamo;
            $tmp["tipo"] = $tipo;
            $tmp["actividad"] = $actividad;
            $tmp["diaReserva"] = $dReserva;
            $tmp["diaEntrega"] = $dEntrega;
            $tmp["diaPrestamo"] = $dPrestamo;
            $tmp["isbnPrestamoInt"] = $id;
            $tmp["renovacion"] = $renovacion;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

}
