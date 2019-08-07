<?php

/**
 * Long Desc 
 * */

/**
 * Esta clase almacena la informacíon de los video beams como es
 * el fabricante , que si tiene algun cable y las observaciones 
 *
 * 
 * @package VO
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * * */
class VideoBeamVO {

    /**
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @var int Almacena el número de serial de video beam 
     * */
    private $idVideoBeam;

    /**
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @var string Almacena el nombre de fabricante del video bem
     * */
    private $fabricante;

    /**
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @var boolean Almacena si el video beam tiene un cable USB
     * */
    private $cableUSB;

    /**
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @var boolean Almacena si el video beam tiene un cable HDMI
     * */
    private $cableHDMI;

    /**
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @var boolean Almacena si el video beam tiene un cable VGA
     * */
    private $cableVGA;

    /**
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @var string Almacena las observaciones del video beam
     * */
    private $observaciones;

    /**
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @var boolean Almacena el estado del video beam si esta en prestamo 
     * */
    private $estadoVideoBeam;

    /**
     * Este método permitre brindar información el número de serial del video beam
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @return self Retorna el valor que esta almacenado en la variable idVideoBeam
     * */
    function getIdVideoBeam() {
        return $this->idVideoBeam;
    }

    /**
     * Este método permitre brindar información el nombre del fabricante del video beam
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @return self Retorna el valor que esta almacenado en la variable fabricante
     * */
    function getFabricante() {
        return $this->fabricante;
    }

    /**
     * Este método permitre brindar información sobre el cable USB del video beam 
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @return self Retorna el valor que esta almacenado en la variable cableUSB
     * */
    function getCableUSB() {
        return $this->cableUSB;
    }

    /**
     * Este método permitre brindar información sobre el cable HDMI del video beam 
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @return self Retorna el valor que esta almacenado en la variable cableHDMI
     * */
    function getCableHDMI() {
        return $this->cableHDMI;
    }

    /**
     * Este método permitre brindar información sobre el cable VGA del video beam 
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @return self Retorna el valor que esta almacenado en la variable cableVGA
     * */
    function getCableVGA() {
        return $this->cableVGA;
    }

    /**
     * Este método permitre brindar información las observaciones del video beam 
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @return self Retorna el valor que esta almacenado en la variable observaciones
     * */
    function getObservaciones() {
        return $this->observaciones;
    }

    /**
     * Este método permitre brindar información sobre estado de prestamo del video beam
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @return self Retorna el valor que esta almacenado en la variable estadoVideoBeam
     * */
    function getEstadoVideoBeam() {
        return $this->estadoVideoBeam;
    }

    /**
     * Este método permite obtener información sobre el número de seria del video beam
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @param int $idVideoBeam Retorna el valor que esta almacenado en la variable idVideoBeam
     * */
    function setIdVideoBeam($idVideoBeam) {
        $this->idVideoBeam = $idVideoBeam;
    }

    /**
     * Este método permite obtener información sobre el nombre del fabricante del video beam
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @param string $fabricante Retorna el valor que esta almacenado en la variable fabricante
     * */
    function setFabricante($fabricante) {
        $this->fabricante = $fabricante;
    }

    /**
     * Este método permite obtener información sobre el el cable USB del video beam
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @param boolean $cableUSB Retorna el valor que esta almacenado en la variable cableUSB
     * */
    function setCableUSB($cableUSB) {
        $this->cableUSB = $cableUSB;
    }

    /**
     * Este método permite obtener información sobre el el cable cable HDMI del video beam
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @param boolean $cableHDMI Retorna el valor que esta almacenado en la variable cableHDMI
     * */
    function setCableHDMI($cableHDMI) {
        $this->cableHDMI = $cableHDMI;
    }

    /**
     * Este método permite obtener información sobre el el cable cable VGA del video beam
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @param boolean $cableVGA Retorna el valor que esta almacenado en la variable cableVGA
     * */
    function setCableVGA($cableVGA) {
        $this->cableVGA = $cableVGA;
    }

    /**
     * Este método permite obtener información sobre las observaciones de video beam
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @param string $observaciones Retorna el valor que esta almacenado en la variable observaciones
     * */
    function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    /**
     * Este método permite obtener información sobre el estado del video beam
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @param string $estadoVideoBeam Retorna el valor que esta almacenado en la variable estadoVideoBeam
     * */
    function setEstadoVideoBeam($estadoVideoBeam) {
        $this->estadoVideoBeam = $estadoVideoBeam;
    }

}
