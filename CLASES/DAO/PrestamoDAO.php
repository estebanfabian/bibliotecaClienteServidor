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

        $sql = 'INSERT INTO `tbl_prestamo` (`diaPrestamo`,  `isbn`,  `codigo`, `diaReserva`,actividad) VALUES (?, ?, ?, ?,?);'; // cambiar dia de prestamo por dia de reserva
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
        $actividad = 1;

        $stmp->bind_param("siisi", $diaPrestamo, $isbn, $codigo, $diaEntrega, $actividad);
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

    public function Mostrar_tarjeta($array) {
        $sql = "SELECT l.isbn , l.titulo , l.resena , l.imagen , p.diaPrestamo ,p.diaReserva, p.diaEntrega , p.idPrestamo , p.actividad, u.foto , p.renovacion FROM tbl_prestamo p INNER JOIN tbl_libro l ON p.isbn=l.isbn INNER JOIN tbl_usuario u on u.codigo=p.codigo WHERE p.codigo = ? and (p.actividad=1 or p.actividad=2)";

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $PrestamoVO = new PrestamoVO();
        $PrestamoVO->setCodigo($array->codigo);
        $codigo = $PrestamoVO->getCodigo();
        $stmp->bind_param("i", $codigo);
        $stmp->execute();
        $stmp->bind_result($isbn, $titulo, $resena, $imagen, $diaPrestamo,$diaReserva, $diaEntrega, $idPrestamo, $actividad, $foto, $renovacion);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["isbn"] = $isbn;
            $tmp["titulo"] = $titulo;
            $tmp["resena"] = $resena;
            $tmp["imagen"] = $imagen;
            $tmp["diaPrestamo"] = $diaPrestamo;
            $tmp["diaReserva"] = $diaReserva;
            $tmp["diaEntrega"] = $diaEntrega;
            $tmp["idPrestamo"] = $idPrestamo;
            $tmp["actividad"] = $actividad;
            $tmp["foto"] = $foto;
            $tmp["renovacion"] = $renovacion;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    public function Cancelar($array) {
        $sql = "UPDATE  `tbl_prestamo` SET `actividad` = '0' WHERE `idPrestamo`=?";

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
        $sql = "UPDATE `tbl_prestamo` SET `renovacion` = b'0' , diaEntrega = ? WHERE `tbl_prestamo`.`idPrestamo` =?";

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $PrestamoVO = new PrestamoVO();
        $PrestamoVO->setIdPrestamo($array->idPrestamo);
        $PrestamoVO->setDiaEntrega($array->diaEntrega);                              

        $idPrestamo = $PrestamoVO->getIdPrestamo();
        $diaEntrega = $PrestamoVO->getDiaPrestamo();

        $stmp->bind_param("si", $diaEntrega,$idPrestamo);
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

}
