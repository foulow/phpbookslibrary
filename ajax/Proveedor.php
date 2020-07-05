<?php
header('Access-Control-Allow-Origin: *; Content-Type: application/json charset=UTF-8');
require_once "../configuraciones/configuracion.php";
require_once "../configuraciones/funciones.php";
require_once '../servicios/AdministradorBD.php';
require_once '../servicios/Libreria.php';            
$_libreria = new Libreria();

$aResult = array();

if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

if( !isset($aResult['error']) ) {

    switch($_POST['functionname']) {
        case 'obtenerDatosLibro':
            if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) {
                $aResult['error'] = 'Error in arguments!';
            }
            else {
                $aResult['result'] = $_libreria->obtenerDatosLibro($_POST['arguments'][0]);
            }
            break;

        case 'obtenerDatosAutor':
            if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) {
                $aResult['error'] = 'Error in arguments!';
            }
            else {
                $aResult['result'] = $_libreria->obtenerDatosAutor($_POST['arguments'][0]);
            }
            break;

        default:
            $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
            break;
    }

    echo json_encode($aResult);
}

?>