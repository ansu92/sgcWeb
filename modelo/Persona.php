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
