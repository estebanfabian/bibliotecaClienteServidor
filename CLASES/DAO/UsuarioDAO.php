<?php

class UsuarioDAO {

    function CrearUsuario($array) {
        $Usuariovo = new UsuarioVO();
        $Usuariovo->setCodigo($array->Codigo);
        $Usuariovo->setApellido($array->apellido);
        $Usuariovo->setNombre($array->nombre);
        $Usuariovo->setSexo($array->sexo);
        $Usuariovo->setDireccion($array->direccion);
        $Usuariovo->setDireccion2($array->direccion2);
        $Usuariovo->setTelefonoPrincipal($array->telefonoPrincipal);
        $Usuariovo->setTelefonoSecundario($array->telefonoSecundario);
        $Usuariovo->setTelefonoOtro($array->telefonoOtro);
        $Usuariovo->setEmailPrincipal($array->emailPrincipal);
        $Usuariovo->setContactoApellido($array->contactoApellido);
        $Usuariovo->setContactoNombre($array->contactoNombre);
        $Usuariovo->setContactoDireccion($array->contactoDireccion);
        $Usuariovo->setContactoDireccion2($array->contactoDireccion2);
        $Usuariovo->setContactoTelefono($array->contactoTelefono);
        $Usuariovo->setCodigoEmpleado($array->CodigoEmpleado);
        $Usuariovo->setContrasena($array->contrasena);

        if ($Usuariovo->getCodigo() != "null") {
            $this->ActualizarUsuario($Usuariovo);
        } else {
            $sql = 'INSERT INTO `tbl_usuario` (`codigo`, `nombre`, `apellido`, `fechaNacimiento`, `sexo`, `direccion`, `direccion2`, `telefonoPrincipal`, `telefonoSecundario`, `telefonoOtro`, `emailPrincipal`, `contactoNombre`, `contactoApellido`, `contactoDireccion`, `contactoDireccion2`, `contactoTelefono`, `contrasena`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $codigo = $Usuariovo->getCodigo();
            $nombre = $Usuariovo->getNombre();
            $apellido = $Usuariovo->getApellido();
            $fechaNacimiento = $Usuariovo->getFechaNacimiento();
            $sexo = $Usuariovo->getSexo();
            $direccion = $Usuariovo->getDireccion();
            $direccion2 = $Usuariovo->getDireccion2();
            $telefonoPrincipal = $Usuariovo->getTelefonoPrincipal();
            $telefonoSecundario = $Usuariovo->getTelefonoSecundario();
            $telefonoOtro = $Usuariovo->getTelefonoOtro();
            $emailPrincipal = $Usuariovo->getEmailPrincipal();
            $contactoNombre = $Usuariovo->getContactoNombre();
            $contactoApellido = $Usuariovo->getContactoApellido();
            $contactoDireccion = $Usuariovo->getContactoDireccion();
            $contactoDireccion2 = $Usuariovo->getContactoDireccion2();
            $contactoTelefono = $Usuariovo->getContactoTelefono();
            $contrasena = $Usuariovo->getContrasena();

            $stmp->bind_param("issssssssssssssss", $codigo, $nombre, $apellido, $fechaNacimiento, $sexo, $direccion, $direccion2, $telefonoPrincipal, $telefonoSecundario, $telefonoOtro, $emailPrincipal, $contactoNombre, $contactoApellido, $contactoDireccion, $contactoDireccion2, $contactoTelefono, $contrasena);
            $this->respuesta($conn, $stmp);

            if ($stmp->execute() == 1) {
                $respuesta["sucess"] = "ok";
            } else {
                $respuesta["sucess"] = "no";
            }
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function Login($Array) {
    $sql='SELECT `codigo`,`contrasena`FROM `tbl_usuario`  WHERE `codigo`= ?  and `contrasena` like binary ? ;';
        
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);
        
        $UsuarioVO = new UsuarioVO();
        $UsuarioVO->setCodigo($array->codigo);
        $UsuarioVO->setContrasena($array->password);
        
        
         $codigo = $UsuarioVO->getCodigo();
         $password=$UsuarioVO->getContrasena();
         

        $stmp->bind_param("is",$codigo,$password);
        
       $stmp->execute();
       $stmp->bind_result($codigo,$password);
       $respuesta=array();
       while ($stmp->fetch()){
           $tmp=array();
           $tmp["codigo"]=$codigo;
           $tmp["contrasena"]=$password;
       $respuesta[sizeof($respuesta)]=$tmp;
           
       }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
     }

    function elminarUsuario($array) {
        $Usuariovo = new UsuarioVO();
        $Usuariovo->setCodigo($array->Codigo);

        $sql = 'DELETE FROM `tbl_usuario` WHERE `codigo`=?';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);
        $codigo = $Usuariovo->getCodigo();
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

    function ActualizarUsuario($array) {
        $Usuariovo = new UsuarioVO();
        $Usuariovo->setCodigo($array->Codigo);
        $Usuariovo->setCodigo($array->apellido);
        $Usuariovo->setCodigo($array->nombre);
        $Usuariovo->setCodigo($array->sexo);
        $Usuariovo->setCodigo($array->direccion);
        $Usuariovo->setCodigo($array->direccion2);
        $Usuariovo->setCodigo($array->telefonoPrincipal);
        $Usuariovo->setCodigo($array->telefonoSecundario);
        $Usuariovo->setCodigo($array->telefonoOtro);
        $Usuariovo->setCodigo($array->emailPrincipal);
        $Usuariovo->setCodigo($array->contactoApellido);
        $Usuariovo->setCodigo($array->contactoNombre);
        $Usuariovo->setCodigo($array->contactoDireccion);
        $Usuariovo->setCodigo($array->contactoDireccion2);
        $Usuariovo->setCodigo($array->contactoTelefono);
        $Usuariovo->setCodigo($array->CodigoEmpleado);
        $Usuariovo->setCodigo($array->contrasena);

        if ($Usuariovo->getCodigo() != "null") {
            $this->modificarProveedor($Autorvo);
        } else {
            $sql = 'UPDATE `tbl_usuario` SET `nombre`=?,`apellido`=?,`fechaNacimiento`=?,`sexo`=?,`direccion`=?,`direccion2`=?,`telefonoPrincipal`=?,`telefonoSecundario`=?,`telefonoOtro`=?,`emailPrincipal`=?,`contactoNombre`=?,`contactoApellido`=?,`contactoDireccion`=?,`contactoDireccion2`=?,`contactoTelefono`=?,`contrasena`=? WHERE `codigo`=?;';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);


            $codigo = $Usuariovo->getCodigo();
            $nombre = $Usuariovo->getNombre();
            $apellido = $Usuariovo->getApellido();
            $fechaNacimiento = $Usuariovo->getFechaNacimiento();
            $sexo = $Usuariovo->getSexo();
            $direccion = $Usuariovo->getDireccion();
            $direccion2 = $Usuariovo->getDireccion2();
            $telefonoPrincipal = $Usuariovo->getTelefonoPrincipal();
            $telefonoSecundario = $Usuariovo->getTelefonoSecundario();
            $telefonoOtro = $Usuariovo->getTelefonoOtro();
            $emailPrincipal = $Usuariovo->getEmailPrincipal();
            $contactoNombre = $Usuariovo->getContactoNombre();
            $contactoApellido = $Usuariovo->getContactoApellido();
            $contactoDireccion = $Usuariovo->getContactoDireccion();
            $contactoDireccion2 = $Usuariovo->getContactoDireccion2();
            $contactoTelefono = $Usuariovo->getContactoTelefono();
            $contrasena = $Usuariovo->getContrasena();

            $stmp->bind_param("ssssssssssssssssi", $codigo, $nombre, $apellido, $fechaNacimiento, $sexo, $direccion, $direccion2, $telefonoPrincipal, $telefonoSecundario, $telefonoOtro, $emailPrincipal, $contactoNombre, $contactoApellido, $contactoDireccion, $contactoDireccion2, $contactoTelefono, $contrasena);
            $this->respuesta($conn, $stmp);

            if ($stmp->execute() == 1) {
                $respuesta["sucess"] = "ok";
            } else {
                $respuesta["sucess"] = "no";
            }
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function correo($array) {
        $Usuariovo = new UsuarioVO();
        $Usuariovo->setCodigo($array->Codigo);
        $Usuariovo->setEmailPrincipal($array->emailPrincipal);

        $sql = 'SELECT `emailPrincipal` FROM `tbl_usuario` WHERE `codigo`= ? and `emailPrincipal` =  ?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);


        $codigo = $Usuariovo->getCodigo();
        $emailPrincipal = $Usuariovo->getEmailPrincipal();

        $stmp->bind_param("is", $codigo, $emailPrincipal);
        $this->respuesta($conn, $stmp);

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
