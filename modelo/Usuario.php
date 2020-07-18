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
        echo $sql;
        $con = Conexion::getConexion();
        foreach ($con->query($sql) as $rs){
        $bool = $rs['login'];
        echo "conecta<br>";
        }
        echo $bool;

        if ($bool) {
            echo 'poli sep';
        } else {
            echo 'poli nope';
        }
//
//        $st = $con->prepare($sql);
//        $rs = $st->execute();
//        echo "<br>".$rs;
//        $result = $rs->fetchAll();
//        return $result['login'];

//        pg_prepare("", $sql);
//        $result = pg_query_params($sql, array($this->usuario, $this->password));
//        pg_fetch_result($result, "login");
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
