<?php

/**
 * Long Desc 
 * */

/**
 * Esta clase maneja las credenciales de acceso a la base de datos realizado una 
 * independencia de la información para tener independencia de los datos.
 * 
 * 
 * @package BD
 * @category Educativo
 * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
 * @link https://github.com/estebanfabian/bibliotecaClienteServidor.git 
 * @version Revision: 1.0 
 * @access publico
 * */
class Datos {

    /**
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @var string Almacena el nombre de hots al que se conectara
     */
    private $hostname = 'localhost';

    /**
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @var string Almacena el usuario que tiene acceso a la base de datos
     */
    private $usuario = 'root';

    /**
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @var string Almacena la contraseña para el acceso a la base de datos
     */
    private $clave = 'root';

    /**
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @var string Almacena el nombre de la base de datos
     */
    private $db = 'biblioteca';

    /**
     * Este método permite obtener obtener el host a donde se realizara la conexion en la base para poder 
     * brindar esta información cuando el método sea utilizado
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com>
     * @since Revision: 1.0 
     * @return self 
     * * */
    public function get_hostname() {
        return $this->hostname;
    }

    /**
     * Este método permite obtener el nombre del usuario para establecer conexio con la base de datos para poder 
     * brindar esta información cuando el método sea utilizado
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @return self Retorna el nombre de usuario para la base de datos
     * * */
    public function get_usuario() {
        return $this->usuario;
    }

    /**
     * Este método permite obtener la clave para poder establecer la conexión a la base de datos para poder 
     * brindar esta información cuando el método sea utilizado
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @return self Retorna la clave
     * * */
    public function get_clave() {
        return $this->clave;
    }

    /**
     * Este método permite el nombre de la base de datos para poder 
     * brindar esta información cuando el método sea utilizado
     * @author Esteban fabian patiño montealegre <estebanfabianp@gmail.com> 
     * @since Revision: 1.0 
     * @return self Retorna el nombre de la base de datos
     * * */
    public function get_DB() {
        return $this->db;
    }

}
