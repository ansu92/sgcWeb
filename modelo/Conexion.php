<?php

class Conexion {

    public static $conn;

    public static function conectar() {

        if (!isset(self::$conn)) {

            try {

                include_once '../general/config.php';
                self::$conn = new PDO("pgsql:host=" . SERVIDOR . "; dbname=" . BD, USUARIO, CLAVE);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->exec("SET NAMES 'UTF8'");
            } catch (PDOException $ex) {

                print "ERROR" . $ex->getMessage() . "<BR>";
            }
        }
    }

    public static function desconectar() {

        if (isset(self::$conn)) {

            self::$conn = null;
        }
    }

    public static function getConexion() {

        if (!isset(self::$conn)) {

            conectar();
        }

        echo 'Conexión establecida';
        return self::$conn;
    }

}
