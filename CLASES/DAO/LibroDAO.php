<?php

class LibroDAO {

    function CrearLibro($array) {
        $libroVo = new LibroVO;
        $libroVo->setIsbn($array->Isbn);
        $libroVo->setIdEditorial($array->editorial);
        $libroVo->setTitulo($array->titulo);
        $libroVo->setEditorial($array->editorial);
        $libroVo->setCategoriaLibro($array->categoriaLibro);
        $libroVo->setResena($array->resena);
        $libroVo->setImagen($array->imagen);

        if ($libroVo->setIdAutorLibro() != "null") {
            $this->ModificarLibro($libroVo);
        } else {
            $sql = 'INSERT INTO `tbl_libro` (`Isbn`, `idEditorial`, `titulo`, `editorial`, `categoriaLibro`, `resena`,imagen) VALUES (?, ?, ?, ?, ?,?,?, ?)';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);


            $Isbn = $libroVo->getIsbn();
            $idEditorial = $libroVo->getIdEditorial();
            $titulo = $libroVo->getTitulo();
            $editorial = $libroVo->getEditorial();
            $categoriaLibro = $libroVo->getCategoriaLibro();
            $resena = $libroVo->getResena();
            $imagen = $libroVo->getImagen();

            $stmp->bind_param("sissss", $Isbn, $idEditorial, $titulo, $editorial, $categoriaLibro, $resena, $imagen);

            $respuesta = array();
            if ($stmp->execute() == 1) {
                $respuesta["sucess"];
                $respuesta["sucess"] = "ok";
            } else {
                $respuesta["sucess"] = "no";
            }
            $stmp->close();
            $conn->close();
            echo json_encode($respuesta);
        }
    }

    function ModificarLibro($array) {
        $libroVo = new LibroVO;
        $libroVo->setIsbn($array->Isbn);
        $libroVo->setIdEditorial($array->editorial);
        $libroVo->setTitulo($array->titulo);
        $libroVo->setEditorial($array->editorial);
        $libroVo->setCategoriaLibro($array->categoriaLibro);
        $libroVo->setResena($array->resena);
        $libroVo->setImagen($array->imagen);

        $sql = 'UPDATE `tbl_libro` SET `idEditorial` = ?, `titulo` = ?, `editorial` = ?, `categoriaLibro` = ?, `resena` = ?,imagen=? WHERE `tbl_libro`.`Isbn` = ?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $Isbn = $libroVo->getIsbn();
        $idEditorial = $libroVo->getIdEditorial();
        $titulo = $libroVo->getTitulo();
        $editorial = $libroVo->getEditorial();
        $categoriaLibro = $libroVo->getCategoriaLibro();
        $resena = $libroVo->getResena();
        $imagen = $libroVo->getImagen();

        $stmp->bind_param("sisi", $idEditorial, $titulo, $editorial, $categoriaLibro, $resena, $imagen, $Isbn);

        $respuesta = array();
        if ($stmp->execute() == 1) {
            $respuesta["sucess"];
            $respuesta["sucess"] = "ok";
        } else {
            $respuesta["sucess"] = "no";
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function EliminarLibro($array) {

        $libroVo = new LibroVO;
        $libroVo->setIsbn($array->Isbn);

        $sql = 'DELETE FROM `tbl_computador` WHERE `tbl_libro`.`Isbn` =?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $Isbn = $libroVo->getIsbn();
        $stmp->bind_param("i", $Isbn);

        $respuesta = array();
        if ($stmp->execute() == 1) {
            $respuesta["sucess"];
            $respuesta["sucess"] = "ok";
        } else {
            $respuesta["sucess"] = "no";
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    public function listarXid($array) {
        $sql = 'SELECT tbl_libro.Isbn AS Isbn,tbl_libro.titulo AS titulo,tbl_autor.nombreAutor AS autor,tbl_temas.nombreTema AS tema,tbl_editorial.nombreEditorial AS editorial,tbl_libroautor.listaLibro AS facultad, tbl_libro.estado AS estado
                FROM  tbl_libro INNER JOIN  tbl_editorial INNER JOIN  tbl_libroautor INNER JOIN tbl_autor INNER JOIN  tbl_temas INNER JOIN  tbl_libro_temas 
                WHERE tbl_libro.idEditorial =tbl_editorial.idEditorial AND  tbl_libro.Isbn=tbl_libroautor.Isbn=tbl_libro_temas.Isbn AND tbl_libroautor.idautor=tbl_autor.idautor AND tbl_libro_temas.idTema=tbl_temas.idTema AND
                tbl_libro.Isbn=? ;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $LibroVO = new LibroVO();
        $LibroVO->setIsbn($array->Consulta);

        $Consulta = $LibroVO->getIsbn();

        $stmp->bind_param("i", $Consulta);
        $stmp->execute();
        $stmp->bind_result($Isbn, $titulo, $autor, $tema, $editorial, $facultad, $estado);

        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["Isbn"] = $Isbn;
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

    public function listarXtitulo($array) {
        $sql = 'SELECT tbl_libro.Isbn AS Isbn,tbl_libro.titulo AS titulo,tbl_autor.nombreAutor AS autor,tbl_temas.nombreTema AS tema,tbl_editorial.nombreEditorial AS editorial,tbl_libroautor.listaLibro AS facultad, tbl_libro.estado AS estado
                FROM  tbl_libro INNER JOIN  tbl_editorial INNER JOIN  tbl_libroautor INNER JOIN tbl_autor INNER JOIN  tbl_temas INNER JOIN  tbl_libro_temas 
                WHERE tbl_libro.idEditorial =tbl_editorial.idEditorial AND  tbl_libro.Isbn=tbl_libroautor.Isbn=tbl_libro_temas.Isbn AND tbl_libroautor.idautor=tbl_autor.idautor AND tbl_libro_temas.idTema=tbl_temas.idTema AND
                tbl_libro.titulo=? ;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $LibroVO = new LibroVO();
        $LibroVO->setTitulo($array->Consulta);

        $Consulta = $LibroVO->getTitulo();

        $stmp->bind_param("s", $Consulta);
        $stmp->execute();
        $stmp->bind_result($Isbn, $titulo, $autor, $tema, $editorial, $facultad, $estado);

        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["Isbn"] = $Isbn;
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

    public function listarXautor($array) {
        $sql = 'SELECT tbl_libro.Isbn AS Isbn,tbl_libro.titulo AS titulo,tbl_autor.nombreAutor AS autor,tbl_temas.nombreTema AS tema,tbl_editorial.nombreEditorial AS editorial,tbl_libroautor.listaLibro AS facultad, tbl_libro.estado AS estado
                FROM  tbl_libro INNER JOIN  tbl_editorial INNER JOIN  tbl_libroautor INNER JOIN tbl_autor INNER JOIN  tbl_temas INNER JOIN  tbl_libro_temas 
                WHERE tbl_libro.idEditorial =tbl_editorial.idEditorial AND  tbl_libro.Isbn=tbl_libroautor.Isbn=tbl_libro_temas.Isbn AND tbl_libroautor.idautor=tbl_autor.idautor AND tbl_libro_temas.idTema=tbl_temas.idTema AND
                tbl_autor.nombreAutor=? ;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $AutorVO = new AutorVO();
        $AutorVO->setNombreAutor($array->Consulta);

        $Consulta = $AutorVO->getNombreAutor();

        $stmp->bind_param("s", $Consulta);
        $stmp->execute();
        $stmp->bind_result($Isbn, $titulo, $autor, $tema, $editorial, $facultad, $estado);

        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["Isbn"] = $Isbn;
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

    public function listarXtema($array) {
        $sql = 'SELECT tbl_libro.Isbn AS Isbn,tbl_libro.titulo AS titulo,tbl_autor.nombreAutor AS autor,tbl_temas.nombreTema AS tema,tbl_editorial.nombreEditorial AS editorial,tbl_libroautor.listaLibro AS facultad, tbl_libro.estado AS estado
                FROM  tbl_libro INNER JOIN  tbl_editorial INNER JOIN  tbl_libroautor INNER JOIN tbl_autor INNER JOIN  tbl_temas INNER JOIN  tbl_libro_temas 
                WHERE tbl_libro.idEditorial =tbl_editorial.idEditorial AND  tbl_libro.Isbn=tbl_libroautor.Isbn=tbl_libro_temas.Isbn AND tbl_libroautor.idautor=tbl_autor.idautor AND tbl_libro_temas.idTema=tbl_temas.idTema AND
                tbl_temas.nombreTema=? ;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $TemaVO = new TemaVO();
        $TemaVO->setNombreTema($array->Consulta);

        $Consulta = $TemaVO->getNombreTema();

        $stmp->bind_param("s", $Consulta);
        $stmp->execute();
        $stmp->bind_result($Isbn, $titulo, $autor, $tema, $editorial, $facultad, $estado);

        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["Isbn"] = $Isbn;
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

    public function listarXeditorial($array) {
        $sql = 'SELECT tbl_libro.Isbn AS Isbn,tbl_libro.titulo AS titulo,tbl_autor.nombreAutor AS autor,tbl_temas.nombreTema AS tema,tbl_editorial.nombreEditorial AS editorial,tbl_libroautor.listaLibro AS facultad, tbl_libro.estado AS estado
                FROM  tbl_libro INNER JOIN  tbl_editorial INNER JOIN  tbl_libroautor INNER JOIN tbl_autor INNER JOIN  tbl_temas INNER JOIN  tbl_libro_temas 
                WHERE tbl_libro.idEditorial =tbl_editorial.idEditorial AND  tbl_libro.Isbn=tbl_libroautor.Isbn=tbl_libro_temas.Isbn AND tbl_libroautor.idautor=tbl_autor.idautor AND tbl_libro_temas.idTema=tbl_temas.idTema AND
                tbl_editorial.nombreEditorial=? ;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $EditorialVO = new EditorialVO();
        $EditorialVO->setNombreEditorial($array->Consulta);

        $Consulta = $EditorialVO->getNombreEditorial();

        $stmp->bind_param("s", $Consulta);
        $stmp->execute();
        $stmp->bind_result($Isbn, $titulo, $autor, $tema, $editorial, $facultad, $estado);

        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["Isbn"] = $Isbn;
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

    public function listarXfacultad($array) {
        $sql = 'SELECT tbl_libro.Isbn AS Isbn,tbl_libro.titulo AS titulo,tbl_autor.nombreAutor AS autor,tbl_temas.nombreTema AS tema,tbl_editorial.nombreEditorial AS editorial,tbl_libroautor.listaLibro AS facultad, tbl_libro.estado AS estado
                FROM  tbl_libro INNER JOIN  tbl_editorial INNER JOIN  tbl_libroautor INNER JOIN tbl_autor INNER JOIN  tbl_temas INNER JOIN  tbl_libro_temas 
                WHERE tbl_libro.idEditorial =tbl_editorial.idEditorial AND  tbl_libro.Isbn=tbl_libroautor.Isbn=tbl_libro_temas.Isbn AND tbl_libroautor.idautor=tbl_autor.idautor AND tbl_libro_temas.idTema=tbl_temas.idTema AND
                tbl_libroautor.listaLibro=? ;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $LibroAutorVO = new LibroAutorVO();
        $LibroAutorVO->setListaLibro($array->Consulta);

        $Consulta = $LibroAutorVO->getListaLibro();

        $stmp->bind_param("s", $Consulta);
        $stmp->execute();
        $stmp->bind_result($Isbn, $titulo, $autor, $tema, $editorial, $facultad, $estado);

        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["Isbn"] = $Isbn;
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

    public function listarXPortada($array) {
        $sql = 'SELECT `resena`,`imagen` FROM `tbl_libro` WHERE `Isbn`=?';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);
        $LibroVO = new LibroVO();
        $LibroVO->setIsbn($array->Isbn);
        $Isbn = $LibroVO->getIsbn();
        $stmp->bind_param("i", $Isbn);
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

}
