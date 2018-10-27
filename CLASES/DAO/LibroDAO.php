<?php

class LibroDAO {

    function CrearLibro($array) {

        $libroVo = new LibroVO;
        $libroVo->setIsbn($array->isbn);
        $libroVo->setIdEditorial($array->editorial);
        $libroVo->setTitulo($array->titulo);
        $libroVo->setEditorial($array->editorial);
        $libroVo->setCategoriaLibro($array->categoriaLibro);
        $libroVo->setResena($array->resena);
        $libroVo->setImagen($array->imagen);

        if ($libroVo->setIdAutorLibro() != "null") {
            $this->ModificarLibro($libroVo);
        } else {
            $sql = 'INSERT INTO `tbl_libro` (`isbn`, `idEditorial`, `titulo`, `editorial`, `categoriaLibro`, `resena`,imagen) VALUES (?, ?, ?, ?, ?,?,?, ?)';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $isbn = $libroVo->getIsbn();
            $idEditorial = $libroVo->getIdEditorial();
            $titulo = $libroVo->getTitulo();
            $editorial = $libroVo->getEditorial();
            $categoriaLibro = $libroVo->getCategoriaLibro();
            $resena = $libroVo->getResena();
            $imagen = $libroVo->getImagen();

            $stmp->bind_param("sissss", $isbn, $idEditorial, $titulo, $editorial, $categoriaLibro, $resena, $imagen);

            $this->Respuesta($conn, $stmp);
        }
    }

    function ModificarLibro($array) {

        $libroVo = new LibroVO;
        $libroVo->setIsbn($array->isbn);
        $libroVo->setIdEditorial($array->editorial);
        $libroVo->setTitulo($array->titulo);
        $libroVo->setEditorial($array->editorial);
        $libroVo->setCategoriaLibro($array->categoriaLibro);
        $libroVo->setResena($array->resena);
        $libroVo->setImagen($array->imagen);

        $sql = 'UPDATE `tbl_libro` SET `idEditorial` = ?, `titulo` = ?, `editorial` = ?, `categoriaLibro` = ?, `resena` = ?,imagen=? WHERE `tbl_libro`.`isbn` = ?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $isbn = $libroVo->getisbn();
        $idEditorial = $libroVo->getIdEditorial();
        $titulo = $libroVo->getTitulo();
        $editorial = $libroVo->getEditorial();
        $categoriaLibro = $libroVo->getCategoriaLibro();
        $resena = $libroVo->getResena();
        $imagen = $libroVo->getImagen();

        $stmp->bind_param("sisi", $idEditorial, $titulo, $editorial, $categoriaLibro, $resena, $imagen, $isbn);

        $this->Respuesta($conn, $stmp);
    }

    function EliminarLibro($array) {

        $libroVo = new LibroVO;
        $libroVo->setIsbn($array->isbn);

        $sql = 'DELETE FROM `tbl_computador` WHERE `tbl_libro`.`isbn` =?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $isbn = $libroVo->getIsbn();
        $stmp->bind_param("i", $isbn);

        $this->Respuesta($conn, $stmp);
    }

    public function ListarXid($array) {
        $sql = 'SELECT tbl_libro.isbn AS isbn,tbl_libro.titulo AS titulo,tbl_autor.nombreAutor AS autor,tbl_temas.nombreTema AS tema,tbl_editorial.nombreEditorial AS editorial,tbl_libroautor.listaLibro AS facultad, tbl_libro.estado AS estado,tbl_libro.resena,tbl_libro.imagen
                FROM  tbl_libro INNER JOIN  tbl_editorial INNER JOIN  tbl_libroautor INNER JOIN tbl_autor INNER JOIN  tbl_temas INNER JOIN  tbl_libro_temas 
                WHERE tbl_libro.idEditorial =tbl_editorial.idEditorial AND  tbl_libro.isbn=tbl_libroautor.isbn=tbl_libro_temas.isbn AND tbl_libroautor.idautor=tbl_autor.idautor AND tbl_libro_temas.idTema=tbl_temas.idTema AND
                tbl_libro.isbn=? ;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $LibroVo = new LibroVO();
        $LibroVo->setIsbn($array->Consulta);

        $Consulta = $LibroVo->getIsbn();

        $Consulta = $Consulta . "%";

        $stmp->bind_param("i", $Consulta);

        $stmp->execute();
        $stmp->bind_result($isbn, $titulo, $autor, $tema, $editorial, $facultad, $estado, $resena, $imagen);

        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["isbn"] = $isbn;
            $tmp["titulo"] = $titulo;
            $tmp["autor"] = $autor;
            $tmp["tema"] = $tema;
            $tmp["editorial"] = $editorial;
            $tmp["facultad"] = $facultad;
            $tmp["estado"] = $estado;
            $tmp["resena"] = $resena;
            $tmp["imagen"] = $imagen;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    public function ListarXtitulo($array) {
        $sql = 'SELECT tbl_libro.isbn AS isbn,tbl_libro.titulo AS titulo,tbl_autor.nombreAutor AS autor,tbl_temas.nombreTema AS tema,tbl_editorial.nombreEditorial AS editorial,tbl_libroautor.listaLibro AS facultad, tbl_libro.estado AS estado
                FROM  tbl_libro INNER JOIN  tbl_editorial INNER JOIN  tbl_libroautor INNER JOIN tbl_autor INNER JOIN  tbl_temas INNER JOIN  tbl_libro_temas 
                WHERE tbl_libro.idEditorial =tbl_editorial.idEditorial AND  tbl_libro.isbn=tbl_libroautor.isbn=tbl_libro_temas.isbn AND tbl_libroautor.idautor=tbl_autor.idautor AND tbl_libro_temas.idTema=tbl_temas.idTema AND
                tbl_libro.titulo LIKE ? ;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $LibroVO = new LibroVO();
        $LibroVO->setTitulo($array->Consulta);

        $Consulta = $LibroVO->getTitulo();
        $Consulta = "%" . $Consulta . "%";

        $stmp->bind_param("s", $Consulta);
        $this->RespuestaLibros($conn, $stmp);
    }

    public function LoMasBUscado($array) {
        $sql = "SELECT libro.isbn ,libro.titulo,libro.imagen ,autor.nombreAutor , editorial.nombreEditorial FROM ( tbl_libro libro INNER JOIN tbl_libroautor LAutor on libro.isbn =LAutor.isbn INNER JOIN tbl_autor autor on autor.idAutor = LAutor.idAutor INNER JOIN tbl_editorial editorial on editorial.idEditorial = libro.idEditorial ) WHERE libro.estado = 'libre'";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $stmp->execute();
        $stmp->bind_result($isbn, $titulo, $imagen, $nombreAutor,$editorial);

        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["isbn"] = $isbn;
            $tmp["nombreAutor"] = $nombreAutor;
            $tmp["titulo"] = $titulo;
            $tmp["imagen"] = $imagen;
                 $tmp["editorial"] = $editorial;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    public function ListarXautor($array) {
        $sql = 'SELECT tbl_libro.isbn AS isbn,tbl_libro.titulo AS titulo,tbl_autor.nombreAutor AS autor,tbl_temas.nombreTema AS tema,tbl_editorial.nombreEditorial AS editorial,tbl_libroautor.listaLibro AS facultad, tbl_libro.estado AS estado
                FROM  tbl_libro INNER JOIN  tbl_editorial INNER JOIN  tbl_libroautor INNER JOIN tbl_autor INNER JOIN  tbl_temas INNER JOIN  tbl_libro_temas 
                WHERE tbl_libro.idEditorial =tbl_editorial.idEditorial AND  tbl_libro.isbn=tbl_libroautor.isbn=tbl_libro_temas.isbn AND tbl_libroautor.idautor=tbl_autor.idautor AND tbl_libro_temas.idTema=tbl_temas.idTema AND
                tbl_autor.nombreAutor  LIKE ?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $AutorVO = new AutorVO();
        $AutorVO->setNombreAutor($array->Consulta);

        $Consulta = $AutorVO->getNombreAutor();
        $Consulta = "%" . $Consulta . "%";

        $stmp->bind_param("s", $Consulta);
        $this->RespuestaLibros($conn, $stmp);
    }

    public function ListarXtema($array) {
        $sql = 'SELECT tbl_libro.isbn AS isbn,tbl_libro.titulo AS titulo,tbl_autor.nombreAutor AS autor,tbl_temas.nombreTema AS tema,tbl_editorial.nombreEditorial AS editorial,tbl_libroautor.listaLibro AS facultad, tbl_libro.estado AS estado
                FROM  tbl_libro INNER JOIN  tbl_editorial INNER JOIN  tbl_libroautor INNER JOIN tbl_autor INNER JOIN  tbl_temas INNER JOIN  tbl_libro_temas 
                WHERE tbl_libro.idEditorial =tbl_editorial.idEditorial AND  tbl_libro.isbn=tbl_libroautor.isbn=tbl_libro_temas.isbn AND tbl_libroautor.idautor=tbl_autor.idautor AND tbl_libro_temas.idTema=tbl_temas.idTema AND
                tbl_temas.nombreTema LIKE ?;';
        $BD = new ConectarBD();

        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $TemaVO = new TemaVO();
        $TemaVO->setNombreTema($array->Consulta);

        $Consulta = $TemaVO->getNombreTema();

        $Consulta = "%" . $Consulta . "%";

        $stmp->bind_param("s", $Consulta);
        $this->RespuestaLibros($conn, $stmp);
    }

    public function ListarXeditorial($array) {
        $sql = 'SELECT tbl_libro.isbn AS isbn,tbl_libro.titulo AS titulo,tbl_autor.nombreAutor AS autor,tbl_temas.nombreTema AS tema,tbl_editorial.nombreEditorial AS editorial,tbl_libroautor.listaLibro AS facultad, tbl_libro.estado AS estado
                FROM  tbl_libro INNER JOIN  tbl_editorial INNER JOIN  tbl_libroautor INNER JOIN tbl_autor INNER JOIN  tbl_temas INNER JOIN  tbl_libro_temas 
                WHERE tbl_libro.idEditorial =tbl_editorial.idEditorial AND  tbl_libro.isbn=tbl_libroautor.isbn=tbl_libro_temas.isbn AND tbl_libroautor.idautor=tbl_autor.idautor AND tbl_libro_temas.idTema=tbl_temas.idTema AND
                tbl_editorial.nombreEditorial  LIKE ? ;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $EditorialVO = new EditorialVO();
        $EditorialVO->setNombreEditorial($array->Consulta);

        $Consulta = $EditorialVO->getNombreEditorial();
        $Consulta = "%" . $Consulta . "%";

        $stmp->bind_param("s", $Consulta);
        $this->RespuestaLibros($conn, $stmp);
    }

    public function ListarXfacultad($array) {
        $sql = 'SELECT tbl_libro.isbn AS isbn,tbl_libro.titulo AS titulo,tbl_autor.nombreAutor AS autor,tbl_temas.nombreTema AS tema,tbl_editorial.nombreEditorial AS editorial,tbl_libroautor.listaLibro AS facultad, tbl_libro.estado AS estado
                FROM  tbl_libro INNER JOIN  tbl_editorial INNER JOIN  tbl_libroautor INNER JOIN tbl_autor INNER JOIN  tbl_temas INNER JOIN  tbl_libro_temas 
                WHERE tbl_libro.idEditorial =tbl_editorial.idEditorial AND  tbl_libro.isbn=tbl_libroautor.isbn=tbl_libro_temas.isbn AND tbl_libroautor.idautor=tbl_autor.idautor AND tbl_libro_temas.idTema=tbl_temas.idTema AND
                tbl_libroautor.listaLibro  LIKE ? ;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $LibroAutorVO = new LibroAutorVO();
        $LibroAutorVO->setListaLibro($array->Consulta);

        $Consulta = $LibroAutorVO->getListaLibro();
        $Consulta = "%" . $Consulta . "%";

        $stmp->bind_param("s", $Consulta);
        $this->RespuestaLibros($conn, $stmp);
    }

    public function ListarXPortada($array) {
        $sql = 'SELECT `resena`,`imagen` FROM `tbl_libro` WHERE `isbn`=?';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);
        $LibroVO = new LibroVO();
        $LibroVO->setIsbn($array->isbn);
        $isbn = $LibroVO->getIsbn();
        $stmp->bind_param("i", $isbn);
        $stmp->execute();
        $stmp->bind_result($resena, $imagen);

        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["resena"] = $resena;
            $tmp["imagen"] = $imagen;
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

    function RespuestaLibros($conn, $stmp) {
        $stmp->execute();
        $stmp->bind_result($isbn, $titulo, $autor, $tema, $editorial, $facultad, $estado);

        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["isbn"] = $isbn;
            $tmp["titulo"] = $titulo;
            $tmp["autor"] = $autor;
            $tmp["tema"] = $tema;
            $tmp["editorial"] = $editorial;
            $tmp["facultad"] = $facultad;
            $tmp["estado"] = $estado;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

}
