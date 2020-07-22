<?php

require_once 'Conexion.php';
require_once 'Persona.php';
require_once 'Unidad.php';

class Habitante extends Persona {

    private $unidad;
    private $parentesco;

    public function __construct() {

        $this->unidad = new Unidad();
    }

    public function registrar($existe): bool {

        $sql = 'SELECT agregar_habitante(?,?,?,?,?,?,?,?,?,?,?);';
        $con = Conexion::conectar();
        $st = $con->prepare($sql);

        $ind = 1;
        $st->bindParam($ind++, $this->cedula);
        $st->bindParam($ind++, $this->nombre);
        $st->bindParam($ind++, $this->sNombre);
        $st->bindParam($ind++, $this->apellido);
        $st->bindParam($ind++, $this->sApellido);
        $st->bindParam($ind++, $this->telefono);
        $st->bindParam($ind++, $this->correo);
        $st->bindParam($ind++, $_SESSION['unidad']);
        echo $_SESSION['unidad'];
        echo $_SESSION['cedula'];
        $st->bindParam($ind++, $_SESSION['cedula']);
        $st->bindParam($ind++, $this->parentesco);
        $st->bindParam($ind++, $existe);
        $st->execute();
        Conexion::desconectar();

        $rs = $st->fetch();
        $resul = $rs['agregar_habitante'];

        return $resul;
    }

    function getUnidad() {
        return $this->unidad;
    }

    function getParentesco() {
        return $this->parentesco;
    }

    function setUnidad($unidad) {
        $this->unidad = $unidad;
    }

    function setParentesco($parentesco) {
        $this->parentesco = $parentesco;
    }

}

?>