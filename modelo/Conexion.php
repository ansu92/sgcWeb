<?php

class Conexion {
    private $conn;
    private $host;
    private $port;
    private $bd;
    private $usuario;
    private $clave;
    
    function ini() {
        $bd = "localhost";
        $bd = "5432";
        $bd = "sgc";
        $usuario = "postgres";
        $clave = "1234";
    }
    
    function conectar() {
        return pg_connect("port="+$port+" dbname="+$bd+" user="+$usuario+" password="+$clave);
    }
    
    function desconectar() {
        pg_close();
    }
}
