<?php

require_once 'Conexion.php';
require_once 'TipoUsuario.php';
require_once 'Persona.php';

class Usuario {

    private $id;
    private $usuario;
    private $password;
    private $pregunta;
    private $respuesta;
    private $persona;
    private $tipo;

    public function __construct() {

        $this->persona = new Persona();
        $this->tipo = new TipoUsuario();
    }

    public function iniciar() : bool {

        $sql = "SELECT login(?,md5(?));";
        $con = Conexion::conectar();
        $st = $con->prepare($sql);

        $ind = 1;
        $st->bindParam($ind++, $this->usuario);
        $st->bindParam($ind++, $this->password);
        $st->execute();

        Conexion::desconectar();
        
        $rs = $st->fetch();
        $resul = $rs['login'];

        if($resul) {
            $this->buscarPerfil();
        }

        $this->password = null;

        return $resul;
    }

    public function buscarPerfil() : bool {
        $sql = "SELECT * FROM v_perfil WHERE usuario = ?;";
        $con = Conexion::conectar();
        $st = $con->prepare($sql);
        $st->bindParam(1, $this->usuario);
        $st->execute();
        Conexion::desconectar();

        if ($rs = $st->fetch()) {
            $this->persona->setNombre($rs['p_nombre']);
            $this->persona->setSNombre($rs['s_nombre']);
            $this->persona->setApellido($rs['p_apellido']);
            $this->persona->setSApellido($rs['s_apellido']);
            $this->persona->setTelefono($rs['telefono']);
            $this->persona->setCorreo($rs['correo']);
            return true;

        } else {
            return false;
        }
    }
    
    public function toArray() {
        $array['id'] = $this->id;
        $array['usuario'] = $this->usuario;
        $array['persona'] = $this->persona->toArray();
        $array['tipo'] = $this->tipo->toArray();
        return $array;
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

    function getPersona() {
        return $this->persona;
    }

    function getTipoUsuario() {
        return $this->tipoUsuario;
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

    function setPersona($persona): void {
        $this->persona = $persona;
    }

    function setTipoUsuario($tipoUsuario): void {
        $this->tipoUsuario = $tipoUsuario;
    }

}
