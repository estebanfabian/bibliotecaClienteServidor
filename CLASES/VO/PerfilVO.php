<?php

class Perfil {


private $CodigoEmpleado;
 private $perfil;
 private $descricion;

 function getCodigoEmpleado() {
     return $this->CodigoEmpleado;
 }

 function getPerfil() {
     return $this->perfil;
 }

 function getDescricion() {
     return $this->descricion;
 }

 function setCodigoEmpleado($CodigoEmpleado) {
     $this->CodigoEmpleado = $CodigoEmpleado;
 }

 function setPerfil($perfil) {
     $this->perfil = $perfil;
 }

 function setDescricion($descricion) {
     $this->descricion = $descricion;
 }


}