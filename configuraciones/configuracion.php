<?php
	@session_start();
	@extract($_REQUEST);

    if(!isset($p)){
        $p = "principal";
    }else{
        $p = $p;
    }

    // variables glovales.
    $_cantidadL = 5; // Limite de libros a mostrar para el top de ventas.
    $_nombreServidor = "{el-nombre-de-tu-servidor}";
    $_nombreUsuario = "{el-nombre-de-tu-usuario}";
    $_contraseña = "{contraseña-de-tu-usuario}";
    $_nombreBD = "dblibreria";
    $_juegoCaracteres = "utf8mb4";
?>