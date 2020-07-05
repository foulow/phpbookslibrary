<?php

class Libreria extends AdministradorBD {

    function __construct() {
        $this->conectarse();
    }

    public function obtenerLibrosMasVendidos($cantidad) {
        $consulta = $this->seleccionar("SELECT * FROM titulos ORDER BY total_ventas DESC");
        if ($consulta == false) return $consulta;
        $numeroRegistros = $consulta->rowCount();
        $limite = ($cantidad > $numeroRegistros)? $numeroRegistros : $cantidad;
        $libros = array();

        for ($i=0; $i < $limite; $i++) { 
            
            $registro = $consulta->fetch();
            $campos = array();
            array_push($campos, $registro['total_ventas']);
            array_push($campos, $registro['titulo']);
            array_push($libros, $campos);
        }

        return $libros;
    }

    public function obtenerTodosLosLibros() {
        $consulta = $this->seleccionar("SELECT * FROM titulos ORDER BY titulo");
        if ($consulta == false) return $consulta;
        $numeroRegistros = $consulta->rowCount();
        $libros = array();

        for ($i=0; $i < $numeroRegistros; $i++) { 
            
            $registro = $consulta->fetch();
            $campos = array();
            array_push($campos, $registro['id_titulo']);
            array_push($campos, $registro['titulo']);
            array_push($libros, $campos);
        }

        return $libros;
    }

    public function obtenerDatosLibro($idLibro) {
        $consulta = $this->seleccionar("SELECT * FROM titulos WHERE id_titulo = '$idLibro'");
        if ($consulta == false) return $consulta;
        $registro = $consulta->fetch();
        $datosLibro = array();
        
        array_push($datosLibro, $registro['titulo']);
        array_push($datosLibro, $registro['notas']);
        array_push($datosLibro, $registro['tipo']);
        array_push($datosLibro, $registro['fecha_pub']);
        array_push($datosLibro, $registro['total_ventas']);
        array_push($datosLibro, $registro['precio']);

        return $datosLibro;
    }

    public function obtenerTodosLosAutores() {
        $consulta = $this->seleccionar("SELECT * FROM autores ORDER BY nombre");
        if ($consulta == false) return $consulta;
        $numeroRegistros = $consulta->rowCount();
        $autores = array();

        for ($i=0; $i < $numeroRegistros; $i++) { 
            
            $registro = $consulta->fetch();
            $campos = array();
            array_push($campos, $registro['id_autor']);
            array_push($campos, $registro['nombre']);
            array_push($campos, $registro['apellido']);
            array_push($autores, $campos);
        }

        return $autores;
    }

    public function obtenerDatosAutor($idAutor) {
        $consulta1 = $this->seleccionar("SELECT * FROM autores WHERE id_autor = '$idAutor'");
        if ($consulta1 == false) return $consulta;
        $registro = $consulta1->fetch();
        $datosAutor = array();

        array_push($datosAutor, $registro['nombre']);
        array_push($datosAutor, $registro['apellido']);

        $consulta2 = $this->seleccionar("SELECT titulo FROM titulos as l INNER JOIN titulo_autor as t ON l.id_titulo = t.id_titulo INNER JOIN autores as a ON t.id_autor = a.id_autor WHERE a.id_autor = '$idAutor'");
        $librosAutor = "";
        while( $libro = $consulta2->fetch() ) {
            $librosAutor .= $libro['titulo'].'<br />';
        }
        if (!empty($librosAutor)) {
            array_push($datosAutor, $librosAutor);
        } else {
            array_push($datosAutor, "No tiene libros registrados.");
        }

        return $datosAutor;
    }
}
?>