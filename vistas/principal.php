<div class="col-sm">
    <div class="row">
        <article id="libros">
            <header>
                <h3 class="text-center">Libros disponibles</h3>
            </header>
            <div class="row">
                <?php
                    $libros = $_libreria->obtenerTodosLosLibros();
                    if($libros === false) die();
                    foreach ($libros as $libro) {
                        $id_libro = $libro[0];
                        $nombre = $libro[1];
                        $imagen = (file_exists("imagenes/libros/".$id_libro.".jpg"))? "imagenes/libros/".$id_libro.".jpg" : "imagenes/libros/no-product-image.png";
                ?>
                <div class="col-sm-3">
                    <figure class="figure" style="width:200px">
                        <input type="image" src="<?php echo $imagen; ?>" data-toggle="modal" data-target="#modalLibro" onclick="mostrarDatosLibro('<?php echo $id_libro; ?>')" class="w-100 figure-img img-fluid rounded img-thumbnail" alt="Portada Libro">
                        <figcaption class="figure-caption"><?php echo $nombre; ?></figcaption>
                    </figure>
                </div>
                <?php
                    }
                ?>
            </div>
        </article>
    </div>
    <div class="row">
        <article id="autores">
            <header>
                <h3 class="text-center">Autores registrados</h3>
            </header>
            <div class="row">
                <?php
                    $autores = $_libreria->obtenerTodosLosAutores();
                    if ($autores === false) die();
                    foreach ($autores as $autor) {
                        $id_autor = $autor[0];
                        $nombre = $autor[1];
                        $apellido = $autor[2];
                        $imagen = (file_exists("imagenes/autores/".$id_autor.".jpg"))? "imagenes/autores/".$id_autor.".jpg" : "imagenes/autores/no-avatar-image.png";
                ?>
                <div class="col-sm-3">
                    <figure class="figure">
                        <input type="image" src="<?php echo $imagen; ?>" data-toggle="modal" data-target="#modalAutor" onclick="mostrarDatosAutor('<?php echo $id_autor; ?>')" class="figure-img img-fluid rounded img-thumbnail" alt="Portada Libro">
                        <figcaption class="figure-caption"><?php echo $nombre ." ". $apellido; ?></figcaption>
                    </figure>
                </div>
                <?php
                    }
                ?>
            </div>
        </article>
    </div>
</div>

<!-- Modal Datos Libro -->
<div id="modalLibro" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Más sobre el libro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table id="tablaDatosLibro" class="table table-striped"></table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
</div>

<!-- Modal Datos Autor-->
<div id="modalAutor" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Más sobre el Autor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table id="tablaDatosAutor" class="table table-striped"></table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
</div>

<script src="js/funciones.js"></script>