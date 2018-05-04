<?php

class EmpleadoDAO {

    function CrearEmpleado($array) {
        $Empleadovo = new EmpleadoVO();
        $Empleadovo->setNombreEmpleado($array->NombreAutor);
        $Empleadovo->setPuesto($array->NotaAutor);


        if ($Empleadovo->getCodigoEmpleado() != "null") {
            $this->modificarEmpleado($Empleadovo);
        } else {
            $sql = 'INSERT INTO `tbl_empleado` (`CodigoEmpleado`, `nombre`, `puesto`) VALUES (?,?,?);';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $codigoEmpleado = $Empleadovo->getCodigoEmpleado();
            $nombreEmpleado = $Empleadovo->getNombreEmpleado();
            $puestoEmpleado = $Empleadovo->getPuesto();

            $stmp->bind_param("iss", $codigoEmpleado, $nombreEmpleado, $puestoEmpleado);
            // $this->respuesta($conn, $stmp);
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

    function modificarEmpleado($array) {
        $Empleadovo = new EmpleadoVO();
        $Empleadovo->setCodigoEmpleado($array->codigoEmpleado);
        $Empleadovo->setNombreEmpleado($array->NombreAutor);
        $Empleadovo->setPuesto($array->NotaAutor);
        $sql = 'UPDATE `tbl_empleado` SET `nombre` = ? , `puesto` = ? WHERE `tbl_empleado`.`CodigoEmpleado` = ?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $codigoEmpleado = $Empleadovo->getCodigoEmpleado();
        $nombreEmpleado = $Empleadovo->getNombreEmpleado();
        $puestoEmpleado = $Empleadovo->getPuesto();

        $stmp->bind_param("ssi", $nombreEmpleado,$puestoEmpleado,$codigoEmpleado);
        if ($stmp->execute() == 1) {
            $respuesta["sucess"] = "ok";
        } else {
            $respuesta["sucess"] = "no";
        }

        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function elminarEmpleado($array) {

        $Empleadovo = new EmpleadoVO();
        $Empleadovo->setCodigoEmpleado($array->codigoEmpleado);

        $sql = 'DELETE FROM `tbl_empleado` WHERE `codigo`=?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);
        $codigo = $Empleadovo->getCodigoEmpleado();
        $stmp->bind_param("i", $codigo);
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
