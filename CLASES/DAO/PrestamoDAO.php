<?php

class PrestamoDAO {

    function CrearPrestamo($array) {
        $PrestamoVo = new PrestamoVO();
        $PrestamoVo->setIdPrestamo($array->idPrestamo);
        $PrestamoVo->setEstadoLibro($array->estadoLibro);
        $PrestamoVo->setDiaPrestamo($array->diaPrestamo);
        $PrestamoVo->setPreInterBibliotecarios($array->preInterBibliotecarios);
        $PrestamoVo->setIsbn($array->Isbn);
        $PrestamoVo->setIdVideoBeam($array->idVideoBeam);
        $PrestamoVo->setIdcomputador($array->idcomputador);
        $PrestamoVo->setCodigo($array->codigo);

        if ($PrestamoVo->setIdPrestamo() != "null") {
            $this->ModificarPrestamo($PrestamoVo);
        } else {
            $sql = 'INSERT INTO `tbl_prestamo`(`idPrestamo`, `estadoLibro`, `diaPrestamo`, `preInterBibliotecarios`, `Isbn`, `idVideoBeam`, `idcomputador`, `codigo`, `estado`, `CodigoEmpleado`) VALUES (?,?,?,?,?,?,?,?,?,?);';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $idPrestamo = $PrestamoVo->getIdPrestamo();
            $estadoLibro = $PrestamoVo->getEstadoLibro();
            $diaPrestamo = $PrestamoVo->getDiaPrestamo();
            $preInterBibliotecarios = $PrestamoVo->getPreInterBibliotecarios();
            $Isbn = $PrestamoVo->getIsbn();
            $idVideoBeam = $PrestamoVo->getIdVideoBeam();
            $idcomputador = $PrestamoVo->getIdcomputador();
            $codigo = $PrestamoVo->getCodigo();
            $estado = $PrestamoVo->getEstadoLibro();
            $CodigoEmpleado = $PrestamoVo->getCodigoEmpleado();
            $stmp->bind_param("sssssisisi", $idPrestamo, $estadoLibro, $diaPrestamo, $preInterBibliotecarios, $Isbn, $idVideoBeam, $idcomputador, $codigo, $estado, $CodigoEmpleado);

            $this->Respuesta($conn, $stmp);
        }
    }

    function ModificarPrestamo($array) {

        $PrestamoVo = new PrestamoVO();
        $PrestamoVo->setIdPrestamo($array->idPrestamo);
        $PrestamoVo->setEstadoLibro($array->estadoLibro);
        $PrestamoVo->setDiaPrestamo($array->diaPrestamo);
        $PrestamoVo->setPreInterBibliotecarios($array->preInterBibliotecarios);
        $PrestamoVo->setIsbn($array->Isbn);
        $PrestamoVo->setIdVideoBeam($array->idVideoBeam);
        $PrestamoVo->setIdcomputador($array->idcomputador);
        $PrestamoVo->setCodigo($array->codigo);

        $sql = 'UPDATE `tbl_prestamo` SET `estadoLibro`=?,`diaPrestamo`=?,`preInterBibliotecarios`=?,`Isbn`=?,`idVideoBeam`=?,`idcomputador`=?,`codigo`=?,`estado`=?,`CodigoEmpleado`=? WHERE `idPrestamo`=?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idPrestamo = $PrestamoVo->getIdPrestamo();
        $estadoLibro = $PrestamoVo->getEstadoLibro();
        $diaPrestamo = $PrestamoVo->getDiaPrestamo();
        $preInterBibliotecarios = $PrestamoVo->getPreInterBibliotecarios();
        $Isbn = $PrestamoVo->getIsbn();
        $idVideoBeam = $PrestamoVo->getIdVideoBeam();
        $idcomputador = $PrestamoVo->getIdcomputador();
        $codigo = $PrestamoVo->getCodigo();
        $estado = $PrestamoVo->getEstadoLibro();
        $CodigoEmpleado = $PrestamoVo->getCodigoEmpleado();
        $stmp->bind_param("ssssisisis", $estadoLibro, $diaPrestamo, $preInterBibliotecarios, $Isbn, $idVideoBeam, $idcomputador, $codigo, $estado, $CodigoEmpleado, $idPrestamo);

        $this->Respuesta($conn, $stmp);
    }

    function EliminarPrestamo($array) {
        $PrestamoVo = new PrestamoVO();
        $PrestamoVo->setIdPrestamo($array->idPrestamo);
        $sql = 'DELETE FROM `tbl_computador` WHERE `idPrestamo`=?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $idPrestamo = $PrestamoVo->getIdPrestamo();
        $stmp->bind_param("s", $idPrestamo);

        $this->Respuesta($conn, $stmp);
    }

    public function Reservar_libro($array) {

        $sql = 'INSERT INTO `tbl_prestamo` (`diaPrestamo`,  `isbn`,  `codigo`, `diaEntrega`) VALUES (?, ?, ?, ?);';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $PrestamoVO = new PrestamoVO();
        $PrestamoVO->setDiaPrestamo($array->diaPrestamo);
        $PrestamoVO->setIsbn($array->isbn);
        $PrestamoVO->setCodigo($array->codigo);
        $PrestamoVO->setDiaEntrega($array->diaEntrega);

        $diaPrestamo = $PrestamoVO->getDiaPrestamo();
        $isbn = $PrestamoVO->getIsbn();
        $codigo = $PrestamoVO->getCodigo();
        $diaEntrega = $PrestamoVO->getDiaEntrega();

        $this->validacionReserva($isbn);
//        if(respuesta de la funcion == "libre") {
//            $stmp->bind_param("siis", $diaPrestamo, $isbn, $codigo, $diaEntrega);
//            $this->respuesta($conn, $stmp);
//        }else
//        {
//            $respuesta["sucess"] = "no";
//        }
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
