<?php

/**
 * Long Desc 
 * */

/**
 * Esta clase ejecuta las conusltas relacionadas con el prestamo inter bibliotecario
 *
 * 
 * @package VO
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * * */
class PresInterBibliotecarioDAO {

    function CrearPresInterBibliotecario($array) {

        $sql = 'set @a:= 0; SELECT @a:=`idPrestamo` as a from tbl_prestamo WHERE `actividad` = 0 LIMIT 1;';
        $sql2 = "call fa (@a,?,?,?,?,?)";

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->query($sql);
        $stmp1 = $conn->prepare($sql2);

        $PresInterBibliotecarioVo = new PresInterBibliotecarioVO();
        $PresInterBibliotecarioVo->setIdbiblioteca($array->Biblioteca);
        $PresInterBibliotecarioVo->setIsbnPrestamoInt($array->isbn);
        $PresInterBibliotecarioVo->setTituoloInter($array->titulo);
        $PresInterBibliotecarioVo->setAutorInter($array->autor);
        $PresInterBibliotecarioVo->setCodigoInter($array->codigoU);

        $biblioteca = $PresInterBibliotecarioVo->getIdbiblioteca();
        $isbn = $PresInterBibliotecarioVo->getIsbnPrestamoInt();
        $titulo = $PresInterBibliotecarioVo->getTituoloInter();
        $autor = $PresInterBibliotecarioVo->getAutorInter();
        $codigo = $PresInterBibliotecarioVo->getCodigoInter();

        $stmp1->bind_param("iissi", $biblioteca, $isbn, $titulo, $autor, $codigo);
        $this->Respuesta($conn, $stmp1);
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

}
