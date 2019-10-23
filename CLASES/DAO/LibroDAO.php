<?php

class LibroDAO {

    function CrearLibro($array) {

        if ($this->Filtro($array) == "ok") {
            $respuesta = array();
            $respuesta["sucess"] = "Reguistro duplicado";
            echo json_encode($respuesta);
        } else {

            $sql = 'call libro (2,?,?,?,?,?);';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $libroVo = new LibroVO;
            $autorVo = new AutorVO;
            $editorialVo = new EditorialVO;
            $temaVo = new TemaVO;
            $lpulica = new LpublicaVo;
            $categoriaVo = new CategoriaVO();

            $libroVo->setIsbn($array->isbn);
            $libroVo->setTitulo($array->titulo);
            $libroVo->setResena($array->resena);
            $autorVo->setIdAutor($array->autor);
            $editorialVo->setIdEditorial($array->editorial);
            $temaVo->setIdTema($array->tema);
            $lpulica->setId_lista($array->lPublica);
            $categoriaVo->setIdCategoria($array->lCategoria);
            $libroVo->setImagen($array->imagen);

            $isbn = $libroVo->getIsbn();
            $titulo = $libroVo->getTitulo();
            $resena = $libroVo->getResena();
            $autor = $autorVo->getIdAutor();
            $editorial = $editorialVo->getIdEditorial();
            $tema = $temaVo->getIdTema();
            $lPublica = $lpulica->getId_lista();
            $lCategoria = $categoriaVo->getIdCategoria();
            $imagen = $libroVo->getImagen();

            $stmp->bind_param("iisss", $isbn, $editorial, $titulo, $resena, $imagen);
            $this->InsertListaAutores($isbn, $conn, $editorial, $autor);
            $this->InsertListaTema($isbn, $conn, $tema);
            $this->InsertListaPublica($isbn, $conn, $lPublica);
            $this->InsertListaCategoria($isbn, $conn, $lCategoria);

            $this->respuesta($conn, $stmp);
        }
    }

    function ModificarLibro($array) {

        $sql = 'call libro (1,?,?,?,?,?);';

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $libroVo = new LibroVO;
        $autorVo = new AutorVO;
        $editorialVo = new EditorialVO;
        $temaVo = new TemaVO;
        $lpulica = new LpublicaVo;
        $categoriaVo = new CategoriaVO();

        $libroVo->setIsbn($array->isbn);
        $libroVo->setTitulo($array->titulo);
        $libroVo->setResena($array->resena);
        $autorVo->setIdAutor($array->autor);
        $editorialVo->setIdEditorial($array->editorial);
        $temaVo->setIdTema($array->tema);
        $lpulica->setId_lista($array->lPublica);
        $categoriaVo->setIdCategoria($array->lCategoria);
        $libroVo->setImagen($array->imagen);

        $isbn = $libroVo->getIsbn();
        $titulo = $libroVo->getTitulo();
        $resena = $libroVo->getResena();
        $autor = $autorVo->getIdAutor();
        $editorial = $editorialVo->getIdEditorial();
        $tema = $temaVo->getIdTema();
        $lPublica = $lpulica->getId_lista();
        $lCategoria = $categoriaVo->getIdCategoria();
        $imagen = $libroVo->getImagen();

        $stmp->bind_param("iisss", $isbn, $editorial, $titulo, $resena, $imagen);


        $respuesta = array();
        if ($stmp->execute() == 1) {
            $this->InsertListaAutores($isbn, $conn, $autor);
            $this->InsertListaTema($isbn, $conn, $tema);
            $this->InsertListaPublica($isbn, $conn, $lPublica);
            $this->InsertListaCategoria($isbn, $conn, $lCategoria);
            $respuesta["sucess"] = "ok";
        } else {
            $respuesta["sucess"] = "no";
        }

        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function InsertListaAutores($array, $conn, $autor) {
        $sql = 'call tema (8,?,?)';
        $stmp = $conn->prepare($sql);
        for ($i = 0; $i < count($autor); $i++) {
            $stmp->bind_param("ii", $autor[$i], $array);
            if ($stmp->execute() == 1) {
                
            }
        }
    }

    function InsertListaTema($array, $conn, $tema) {
        $sql = 'call tema (9,?,?)';
        $stmp = $conn->prepare($sql);
        for ($i = 0; $i < count($tema); $i++) {
            $stmp->bind_param("ii", $tema[$i], $array);
            if ($stmp->execute() == 1) {
                
            }
        }
    }

    function InsertListaPublica($array, $conn, $lPublica) {
        $sql = 'call tema (10,?,?)';
        $stmp = $conn->prepare($sql);
        for ($i = 0; $i < count($lPublica); $i++) {
            $stmp->bind_param("ii", $lPublica[$i], $array);
            if ($stmp->execute() == 1) {
                
            }
        }
    }

    function InsertListaCategoria($array, $conn, $lCategoria) {
        $sql = 'call tema (11,?,?)';
        $stmp = $conn->prepare($sql);
        for ($i = 0; $i < count($lCategoria); $i++) {
            $stmp->bind_param("ii", $lCategoria[$i], $array);
            if ($stmp->execute() == 1) {
                
            }
        }
    }

    function EliminarLibro($array) {

        $libroVo = new LibroVO;
        $libroVo->setIsbn($array->isbn);

        $sql = 'call miprocesos1 (20,?);';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $isbn = $libroVo->getIsbn();
        $stmp->bind_param("i", $isbn);

        $this->Respuesta($conn, $stmp);
    }

    public function ListarXid($array) {
        $sql = 'call miprocesos1 (25,?);';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $LibroVo = new LibroVO();
        $LibroVo->setIsbn($array->Consulta);

        $Consulta = $LibroVo->getIsbn();

        $Consulta = $Consulta . "%";

        $stmp->bind_param("i", $Consulta);

        $stmp->execute();
        $stmp->bind_result($isbn1, $isbn, $titulo, $autor, $tema, $editorial, $facultad, $estado, $resena, $imagen);

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
        $sql = 'call miprocesos1 (4,?) ;';
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
        $sql = "SELECT * FROM `lomasbuscadolibro`;";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $stmp->execute();
        $stmp->bind_result($isbn, $titulo, $imagen, $nombreAutor, $editorial);

        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["isbn"] = $isbn;
            $tmp["autor"] = $nombreAutor;
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
        $sql = 'call miprocesos1 (2,?);';
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
        $sql = 'call miprocesos1 (5,?);';
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
        $sql = 'call miprocesos1 (3,?);';
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
        $sql = 'call miprocesos1 (6,?;)';
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
        $sql = 'call miprocesos1 (26,?);';
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

    function SMCrearLibro($array) {

        if ($this->Filtro($array) == "ok") {
            $respuesta = array();
            $respuesta["sucess"] = "Reguistro duplicado";
            echo json_encode($respuesta);
        } else {

            $sql = 'call libro (3,?,?,?,?,?);';
            $BD = new ConectarBD();
            $conn = $BD->getMysqli();
            $stmp = $conn->prepare($sql);

            $libroVo = new LibroVO;
            $autorVo = new AutorVO;
            $editorialVo = new EditorialVO;
            $temaVo = new TemaVO;
            $lpulica = new LpublicaVo;
            $categoriaVo = new CategoriaVO();

            $libroVo->setIsbn($array->isbn);
            $libroVo->setTitulo($array->titulo);
            $libroVo->setResena($array->resena);
            $autorVo->setIdAutor($array->autor);
            $editorialVo->setIdEditorial($array->editorial);
            $temaVo->setIdTema($array->tema);
            $lpulica->setId_lista($array->lPublica);
            $categoriaVo->setIdCategoria($array->lCategoria);
            $libroVo->setImagen($array->imagen);

            $isbn = $libroVo->getIsbn();
            $titulo = $libroVo->getTitulo();
            $resena = $libroVo->getResena();
            $autor = $autorVo->getIdAutor();
            $editorial = $editorialVo->getIdEditorial();
            $tema = $temaVo->getIdTema();
            $lPublica = $lpulica->getId_lista();
            $lCategoria = $categoriaVo->getIdCategoria();
            $imagen = $libroVo->getImagen();

            $stmp->bind_param("sssss", $isbn, $editorial, $titulo, $resena, $imagen);


            $respuesta = array();
            if ($stmp->execute() == 1) {
                $this->SbInsertListaAutores($isbn, $conn, $autor);
                $this->SbInsertListaTema($isbn, $conn, $tema);
                $this->SbInsertListaPublica($isbn, $conn, $lPublica);
                $this->SbInsertListaCategoria($isbn, $conn, $lCategoria);
                $respuesta = "ok";
            } else {
                $respuesta = "no";
            }
            $stmp->close();
            $conn->close();
            return $respuesta;
        }
    }

    function Filtro($array) {
        $sql = "call miprocesos1 (29,?);";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $libroVo = new LibroVO;
        $libroVo->setIsbn($array->isbn);
        $isbn = $libroVo->getIsbn();
        $stmp->bind_param("i", $isbn);

        $respuesta = array();
        if ($stmp->execute() == 1) {
            $stmp->bind_result($codigo);
            while ($stmp->fetch()) {
                $respuesta = $codigo;
            }

            if ($codigo != "") {
                $respuesta = "ok";
            } else {
                $respuesta = "no";
            }
        } else {
            $respuesta = "no";
        }
        $stmp->close();
        $conn->close();
        return ($respuesta);
    }

    function ListarCatalogo() {
        $sql = "SELECT * FROM `listacategoria`";

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $stmp->execute();

        $stmp->bind_result($NombreAutor, $Nota);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["NombreAutor"] = $NombreAutor;
            $tmp["Nota"] = $Nota;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function ListarPublida() {
        $sql = "SELECT * FROM `lista publica`";

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $stmp->execute();

        $stmp->bind_result($NombreAutor, $Nota);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["NombreAutor"] = $NombreAutor;
            $tmp["Nota"] = $Nota;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function BuscarLibro($array) {
        $tmp = array();
        $respuesta = array();
        $autor = array();
        $lpublica = array();
        $lcategoria = array();
        $ltema = array();

        $i = 0;
        $sql = "call miprocesos1 (28,?);";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $libroVo = new LibroVO;
        $libroVo->setIsbn($array->isbn);
        $isbn = $libroVo->getIsbn();
        $stmp->bind_param("i", $isbn);

        $stmp->execute();

        $stmp->bind_result($isbn, $idEditorial, $titulo, $resena, $imagen);

        while ($stmp->fetch()) {

            $tmp["isbn"] = $isbn;
            $tmp["titulo"] = $titulo;
            $tmp["resena"] = $resena;
            $tmp["idEditorial"] = $idEditorial;
            $tmp["imagen"] = $imagen;
        }
        $i = 0;
        $sql1 = "call miprocesos1(27,?);";
        $stmp1 = $conn->prepare($sql1);
        $stmp1->bind_param("i", $isbn);
        $stmp1->execute();

        $stmp1->bind_result($autor1);

        while ($stmp1->fetch()) {

            $autor[$i] = $autor1;
            $i++;
        }
        $tmp["autor"] = $autor;

        $i = 0;
        $sql2 = "call miprocesos1 (23,?);";
        $stmp2 = $conn->prepare($sql2);
        $stmp2->bind_param("i", $isbn);
        $stmp2->execute();

        $stmp2->bind_result($autor2);

        while ($stmp2->fetch()) {

            $lpublica[$i] = $autor2;
            $i++;
        }
        $tmp["lpublica"] = $lpublica;

        $i = 0;
        $sql3 = "call miprocesos1 (22,?);";
        $stmp3 = $conn->prepare($sql3);
        $stmp3->bind_param("i", $isbn);
        $stmp3->execute();

        $stmp3->bind_result($autor3);

        while ($stmp3->fetch()) {

            $lcategoria[$i] = $autor3;
            $i++;
        }
        $tmp["lcategoria"] = $lcategoria;

        $i = 0;
        $sql4 = "call miprocesos1 (21,?)";
        $stmp4 = $conn->prepare($sql4);
        $stmp4->bind_param("i", $isbn);
        $stmp4->execute();

        $stmp4->bind_result($autor4);

        while ($stmp4->fetch()) {

            $ltema[$i] = $autor4;
            $i++;
        }
        $tmp["ltema"] = $ltema;
        $respuesta[sizeof($respuesta)] = $tmp;

        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function SbInsertListaAutores($array, $conn, $autor) {
        $sql = 'call tema (12,?,?)';
        $stmp = $conn->prepare($sql);
        for ($i = 0; $i < count($autor); $i++) {
            $stmp->bind_param("ii", $autor[$i], $array);
            if ($stmp->execute() == 1) {
                
            }
        }
    }

    function SbInsertListaTema($array, $conn, $tema) {
        $sql = 'call tema (13,?,?)';
        $stmp = $conn->prepare($sql);
        for ($i = 0; $i < count($tema); $i++) {
            $stmp->bind_param("ii", $tema[$i], $array);
            if ($stmp->execute() == 1) {
                
            }
        }
    }

    function SbInsertListaPublica($array, $conn, $lPublica) {
        $sql = 'call tema (13,?,?)';
        $stmp = $conn->prepare($sql);
        for ($i = 0; $i < count($lPublica); $i++) {
            $stmp->bind_param("ii", $lPublica[$i], $array);
            if ($stmp->execute() == 1) {
                
            }
        }
    }

    function SbInsertListaCategoria($array, $conn, $lCategoria) {
        $sql = 'call tema (15,?,?)';
        $stmp = $conn->prepare($sql);
        for ($i = 0; $i < count($lCategoria); $i++) {
            $stmp->bind_param("ii", $lCategoria[$i], $array);
            if ($stmp->execute() == 1) {
                
            }
        }
    }

    function validacion() {
        $i = 0;
        $sql = "SELECT * FROM validarimagen";

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);

        $stmp->execute();

        $stmp->bind_result($NombreAutor, $Nota);
        $tmp = array();
        while ($stmp->fetch()) {
            $tmp[$i][0] = $NombreAutor;
            $tmp[$i][1] = $Nota;
            $i++;
        }
        $stmp->close();
        $conn->close();
        return $tmp;
    }

    function ModificarImagen($array, $array1) {

        $sql = 'call tema (16,?,?);';

        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);
        $stmp->bind_param("ss", $array, $array1);

        $respuesta = array();
        if ($stmp->execute() == 1) {

            $respuesta = "ok";
        } else {
            $respuesta = "no";
        }

        $stmp->close();
        $conn->close();
    }

    function catalogo() {
        $sql = 'SET @row_number := 0;';
        $sql1 = 'SELECT 
    isbn,titulo,estado,imagen,autor,editorial
FROM
    (SELECT 
        @row_number:=CASE
                WHEN @customer_no = tbl_libro.isbn THEN @row_number + 1
                ELSE 1
            END AS num,
            @customer_no:=tbl_libro.isbn  as isbn,
            tbl_libro.titulo as titulo,
            tbl_libro.estado as estado,
            tbl_libro.imagen as imagen,
            tbl_autor.nombreAutor as autor ,
   		    tbl_editorial.nombreEditorial as editorial
    FROM
        tbl_libro
    INNER JOIN tbl_libro_autor ON tbl_libro.isbn = tbl_libro_autor.isbn
    INNER JOIN tbl_editorial ON tbl_editorial.idEditorial = tbl_libro.idEditorial
    INNER JOIN tbl_autor ON tbl_libro_autor.idAutor = tbl_autor.idAutor
        AND tbl_libro.isbn = tbl_libro_autor.isbn) AS ejemplo
WHERE
    num = 1';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);
        $stmp->execute();
        $stmp = $conn->prepare($sql1);
        $stmp->execute();
        $stmp->bind_result($isbn, $titulo, $estdo, $imagen, $autor, $editorial);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp["isbn"] = $isbn;
            $tmp["estado"] = $estdo;
            $tmp["titulo"] = $titulo;
            $tmp["iamgen"] = $imagen;
            $tmp["autor"] = $autor;
            $tmp["editorial"] = $editorial;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    function reservar_libro($array) {
        $sql = "SELECT `nombreAutor` FROM `tbl_autor` inner join tbl_libro_autor on tbl_libro_autor.idAutor = tbl_autor.idAutor where tbl_libro_autor.isbn = ?";
        $sql1 = "SELECT tbl_temas.nombreTema FROM `tbl_temas`inner join tbl_libro_temas on tbl_libro_temas.idTema= tbl_temas.idTema where tbl_libro_temas.isbn=?";
        $sql2 = "SELECT tbl_categoria.categoria FROM `tbl_categoria` inner join tbl_libro_categoria on tbl_libro_categoria.idCategoria=tbl_categoria.idCategoria WHERE tbl_libro_categoria.isbn = ?";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
      
        $libroVo = new LibroVO;
        $libroVo->setIsbn($array->isbn);
        $isbn = $libroVo->getIsbn();
        $stmp = $conn->prepare($sql);
        $stmp->bind_param("i", $isbn);
        $stmp->execute();


        $stmp->bind_result($autor);
        $aux = "";
        while ($stmp->fetch()) {

            $aux = ";" . $autor . $aux;
        }
        $aux[0] = " ";
        $respuesta = array();
        $tmp["autor"] = $aux;



        $stmp = $conn->prepare($sql1);
        $stmp->bind_param("i", $isbn);
        $stmp->execute();


        $stmp->bind_result($temas);
        $aux = "";
        while ($stmp->fetch()) {

            $aux = ";" . $temas . $aux;
        }
           $aux[0] = " ";
        $tmp["temas"] = $aux;
        $respuesta[sizeof($respuesta)] = $tmp;
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

}
