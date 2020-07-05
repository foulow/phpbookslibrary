<?php

class AdministradorBD {

    private $nombreServidor;
    private $pueroServidor;
    private $nombreBD;
    private $nombreUsuario;
    private $contraseña;
    private $juegoCaracteres;
    private $administrador;

    public function conectarse() {
        global $_nombreServidor, $_nombreUsuario, $_contraseña, $_nombreBD, $_juegoCaracteres;
        $this->nombreServidor = $_nombreServidor;
        $this->nombreUsuario = $_nombreUsuario;
        $this->contraseña = $_contraseña;
        $this->nombreBD = $_nombreBD;
        $this->juegoCaracteres = $_juegoCaracteres;

        try {
            $dsn = "mysql:host=". $this->nombreServidor .";dbname=". $this->nombreBD .";charset=". $this->juegoCaracteres;
            $pdo = new PDO($dsn, $this->nombreUsuario, $this->contraseña);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->administrador = $pdo;
        } catch (PDOException $e) {
            echo "Error de Conección: ".$e->getMessage();
            die();
        }
    }

    public function seleccionar($consulta) {
        if (!isset($this->administrador)) return false;
        try {
            $resultadoConsulta = $this->administrador->query($consulta);
            return $resultadoConsulta;
        } catch (PDOException $e) {
            echo "Error de Consulta: ".$e->getMessage();
            die();
        }
    }
}

?>