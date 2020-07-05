<?php
    require_once "configuraciones/configuracion.php";
    require_once "configuraciones/funciones.php";
    require_once 'servicios/AdministradorBD.php';
    require_once 'servicios/Libreria.php';            
    $_libreria = new Libreria();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Libreria - Proyecto Final Web</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilo.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <?php require_once "vistas/cabecera.php"; ?>
        <div class="container-fluid">
                <div class="row ml-n1 mr-n1">
                <?php
                    if ($p == "principal") require_once "vistas/topVentas.php";
                    if (file_exists("vistas/".$p.".php")){
                        require_once "vistas/".$p.".php";
                    }else{
                        echo "<i>No se ha encontrado el modulo <b>".$p."</b> <a href='./?p=principal'>Regresar</a></i>";
                    }
                ?>
                </div>
        </div>
        <?php require_once "vistas/pie_pagina.php"; ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>