<?php

require_once 'Conexion.php';

class Persona {

    protected $cedula;
    protected $nombre;
    protected $sNombre;
    protected $apellido;
    protected $sApellido;
    protected $telefono;
    protected $correo;

    public function existePersona() {

        $sql = 'SELECT cedula FROM persona WHERE cedula = ?;';
        $con = Conexion::conectar();
        $st = $con->prepare($sql);

        $st->bindParam(1, $this->cedula);
        $st->execute();
        Conexion::desconectar();

        if ($st->fetch()) {
            return true;
        
        } else {
            return false;
        }

    }
    
    public function toArray() {
        $array['cedula'] = $this->cedula;
        $array['nombre'] = $this->nombre;
        $array['s_nombre'] = $this->sNombre;
        $array['apellido'] = $this->apellido;
        $array['s_apellido'] = $this->sApellido;
        $array['telefono'] = $this->telefono;
        $array['correo'] = $this->correo;
        return $array;
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
