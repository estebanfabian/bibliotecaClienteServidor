<?php

class UsuarioVO {

    private $codigo;
    private $nombre;
    private $apellido;
    private $fechaNacimiento;
    private $sexo;
    private $direccion;
    private $direccion2;
    private $telefonoPrincipal;
    private $telefonoSecundario;
    private $telefonoOtro;
    private $emailPrincipal;
    private $contactoNombre;
    private $contactoApellido;
    private $contactoDireccion;
    private $contactoDireccion2;
    private $contactoTelefono;
    private $CodigoEmpleado;
    private $contrasena;
    private $multa;

    function getCodigo() {
        return $this->codigo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getDireccion2() {
        return $this->direccion2;
    }

    function getTelefonoPrincipal() {
        return $this->telefonoPrincipal;
    }

    function getTelefonoSecundario() {
        return $this->telefonoSecundario;
    }

    function getTelefonoOtro() {
        return $this->telefonoOtro;
    }

    function getEmailPrincipal() {
        return $this->emailPrincipal;
    }

    function getContactoNombre() {
        return $this->contactoNombre;
    }

    function getContactoApellido() {
        return $this->contactoApellido;
    }

    function getContactoDireccion() {
        return $this->contactoDireccion;
    }

    function getContactoDireccion2() {
        return $this->contactoDireccion2;
    }

    function getContactoTelefono() {
        return $this->contactoTelefono;
    }

    function getCodigoEmpleado() {
        return $this->CodigoEmpleado;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getMulta() {
        return $this->multa;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setDireccion2($direccion2) {
        $this->direccion2 = $direccion2;
    }

    function setTelefonoPrincipal($telefonoPrincipal) {
        $this->telefonoPrincipal = $telefonoPrincipal;
    }

    function setTelefonoSecundario($telefonoSecundario) {
        $this->telefonoSecundario = $telefonoSecundario;
    }

    function setTelefonoOtro($telefonoOtro) {
        $this->telefonoOtro = $telefonoOtro;
    }

    function setEmailPrincipal($emailPrincipal) {
        $this->emailPrincipal = $emailPrincipal;
    }

    function setContactoNombre($contactoNombre) {
        $this->contactoNombre = $contactoNombre;
    }

    function setContactoApellido($contactoApellido) {
        $this->contactoApellido = $contactoApellido;
    }

    function setContactoDireccion($contactoDireccion) {
        $this->contactoDireccion = $contactoDireccion;
    }

    function setContactoDireccion2($contactoDireccion2) {
        $this->contactoDireccion2 = $contactoDireccion2;
    }

    function setContactoTelefono($contactoTelefono) {
        $this->contactoTelefono = $contactoTelefono;
    }

    function setCodigoEmpleado($CodigoEmpleado) {
        $this->CodigoEmpleado = $CodigoEmpleado;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function setMulta($multa) {
        $this->multa = $multa;
    }

}
