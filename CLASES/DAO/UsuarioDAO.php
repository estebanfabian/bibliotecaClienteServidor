<?php

require("../../PHPMailer-master/src/PHPMailer.php");
require("../../PHPMailer-master/src/SMTP.php");
require("../../PHPMailer-master/src/Exception.php");

class UsuarioDAO {

    public function CrearUsuario($array) {


        $sql = 'INSERT INTO `tbl_usuario` (`codigo`, `nombre`, `apellido`, `fechaNacimiento`, `sexo`, `direccion`, `telefonoPrincipal`, `emailPrincipal`,  `contrasena`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $UsuarioVO = new UsuarioVO();
        $UsuarioVO->setCodigo($array->Codigo);
        $UsuarioVO->setApellido($array->apellido);
        $UsuarioVO->setNombre($array->nombre);
        $UsuarioVO->setTelefonoPrincipal($array->telefonoPrincipal);
        $UsuarioVO->setFechaNacimiento($array->FechaNacimiento);
        $UsuarioVO->setSexo($array->sexo);
        $UsuarioVO->setDireccion($array->direccion);
        $UsuarioVO->setEmailPrincipal($array->emailPrincipal);
        $UsuarioVO->setContrasena($array->contrasena);


        $codigo = $UsuarioVO->getCodigo();
        $nombre = $UsuarioVO->getNombre();
        $apellido = $UsuarioVO->getApellido();
        $fechaNacimiento = $UsuarioVO->getFechaNacimiento();
        $sexo = $UsuarioVO->getSexo();
        $direccion = $UsuarioVO->getDireccion();
        $telefonoPrincipal = $UsuarioVO->getTelefonoPrincipal();
        $emailPrincipal = $UsuarioVO->getEmailPrincipal();
        $contrasena = $UsuarioVO->getContrasena();

        $stmp->bind_param("issssssss", $codigo, $nombre, $apellido, $fechaNacimiento, $sexo, $direccion, $telefonoPrincipal, $emailPrincipal, $contrasena);

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

    public function Login($array) {
        
        
        $sql = 'SELECT `codigo`,`contrasena`FROM `tbl_usuario`  WHERE `codigo`= ?  and `contrasena` like binary ? ;';

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);
        $UsuarioVO = new UsuarioVO();
        
        $UsuarioVO->setCodigo($array->codigo);
        $UsuarioVO->setContrasena($array->contrasena);

        $codigo = $UsuarioVO->getCodigo();
        $contrasena = $UsuarioVO->getContrasena();

        $stmp->bind_param("is", $codigo, $contrasena);

       $stmp->execute();
            $stmp->bind_result($codigo, $contrasena);
            $respuesta = array();
            while ($stmp->fetch()) {
                $tmp = array();
                $tmp["codigo"] = $codigo;
                $tmp["contrasena"] = $contrasena;
                $respuesta[sizeof($respuesta)] = $tmp;
                
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

        $sql = 'SELECT `emailPrincipal`,`contrasena` FROM `tbl_usuario` WHERE `codigo`= ? and `emailPrincipal` =  ?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);


        $codigo = $Usuariovo->getCodigo();
        $emailPrincipal = $Usuariovo->getEmailPrincipal();

        $stmp->bind_param("is", $codigo, $emailPrincipal);
        $this->respuesta($conn, $stmp);

        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["emailPrincipal"] = $codigo;
            $tmp["contrasena"] = $contrasena;
            $respuesta[sizeof($respuesta)] = $tmp;
        }

        enviar($codigo, $contrasena);
        if ($stmp->execute() == 1) {
            $respuesta["sucess"] = "ok";
        } else {
            $respuesta["sucess"] = "no";
        }

        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function enviar($correo, $contrasena) {
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail->Host = 'smtp.gmail.com'; /* Specify main and backup SMTP servers */
        $mail->Port = 587;
        $mail->SMTPAuth = true; /* Enable SMTP authentication */
        $mail->Username = "biblocur@gmail.com"; /* SMTP username */
        $mail->Password = "Prueba12345"; /* SMTP password */
        $mail->SMTPSecure = 'tls';
        $mail->From = "biblocur@gmail.com";
        $mail->FromName = "esteban";
        $mail->addAddress($correo); /* Add a recipient */
        $mail->isHTML(true); /* Set email format to HTML (default = true) */
        $mail->Body = "Su contraseña es " . $contrasena;
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo "funciono";
        }
    }

}
