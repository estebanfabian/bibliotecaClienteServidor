<?php

class LibroPrestamo {

    private $IsbnPrestamoInt;
    private $titulo;
    private $editorial;
    private $categoriaLibro;
    private $resena;
    private $autor;

}

function getIsbnPrestamoInt() {
    return $this->IsbnPrestamoInt;
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

 function getAutor() {
    return $this->autor;
}

 function setIsbnPrestamoInt($IsbnPrestamoInt) {
    $this->IsbnPrestamoInt = $IsbnPrestamoInt;
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

 function setAutor($autor) {
    $this->autor = $autor;
}


