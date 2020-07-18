<?php

require_once("Conexion.php");

class Usuario {

    private $id;
    private $usuario;
    private $password;
    private $pregunta;
    private $respuesta;
    private $ci_persona;
    private $idTipoUsuario;

    public function iniciar() {
        $sql = "SELECT login('" . $this->usuario . "',md5('" . $this->password . "'));";
        $con = Conexion::getConexion();
        foreach ($con->query($sql) as $rs) {
            $bool = $rs['login'];
        }
        return $bool;
    }

    function getId() {
        return $this->id;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getPassword() {
        return $this->password;
    }

    function getPregunta() {
        return $this->pregunta;
    }

    function getRespuesta() {
        return $this->respuesta;
    }

    function getCi_persona() {
        return $this->ci_persona;
    }

    function getIdTipUsuario() {
        return $this->idTipoUsuario;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setUsuario($usuario): void {
        $this->usuario = $usuario;
    }

    function setPassword($password): void {
        $this->password = $password;
    }

    function setPregunta($pregunta): void {
        $this->pregunta = $pregunta;
    }

    function setRespuesta($respuesta): void {
        $this->respuesta = $respuesta;
    }

    function setCi_persona($ci_persona): void {
        $this->ci_persona = $ci_persona;
    }

    function setIdTipoUsuario($idTipoUsuario): void {
        $this->idTipoUsuario = $idTipoUsuario;
    }

}
