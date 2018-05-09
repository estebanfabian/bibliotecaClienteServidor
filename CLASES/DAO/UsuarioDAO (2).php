<?php

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

}
