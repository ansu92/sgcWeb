<?php

require_once './Conexion.php';

class Persona {

    private $cedula;
    private $nombre;
    private $sNombre;
    private $apellido;
    private $sApellido;
    private $telefono;
    private $correo;

    public function buscarPersona() {
        $sql = "SELECT cedula, p_nombre, s_nombre, p_apellido, s_apellido, telefono, correo FROM persona WHERE cedula = ?";
        $con = Conexion::getConexion();
        $st = $con->prepare($sql);
        $rs = $st->execute([$this->cedula]);

        if ($rs->fetch()) {
            $this->nombre = rs['p_nombre'];
            $this->sNombre = rs['s_nombre'];
            $this->apellido = rs['p_apellido'];
            $this->s_apellido = rs['p_nombre'];
            $this->telefono = rs['telefono'];
            $this->correo = rs['correo'];
            return true;
        } else {
            return false;
        }
    }

    function getCedula() {
        return $this->cedula;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getSNombre() {
        return $this->sNombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getSApellido() {
        return $this->sApellido;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCorreo() {
        return $this->correo;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setSNombre($sNombre) {
        $this->sNombre = $sNombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setSApellido($sApellido) {
        $this->sApellido = $sApellido;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

}
