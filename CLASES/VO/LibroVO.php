<?php

class LibroVO {

    private $Isbn;
    private $idEditorial;
    private $titulo;
    private $editorial;
    private $categoriaLibro;
    private $resena;



function getIsbn() {
    return $this->Isbn;
}

 function getIdEditorial() {
    return $this->idEditorial;
}

 function getTitulo() {
    return $this->titulo;
}

 function getEditorial() {
    return $this->editorial;
}

 function getCategoriaLibro() {
    return $this->categoriaLibro;
}

 function getResena() {
    return $this->resena;
}

 function setIsbn($Isbn) {
    $this->Isbn = $Isbn;
}

 function setIdEditorial($idEditorial) {
    $this->idEditorial = $idEditorial;
}

 function setTitulo($titulo) {
    $this->titulo = $titulo;
}

 function setEditorial($editorial) {
    $this->editorial = $editorial;
}

 function setCategoriaLibro($categoriaLibro) {
    $this->categoriaLibro = $categoriaLibro;
}

 function setResena($resena) {
    $this->resena = $resena;
}


}