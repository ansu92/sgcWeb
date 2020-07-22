<?php

require_once 'Persona.php';

class Propietario extends Persona {

    private $unidades;

    public function __construct($cedula) {
        $this->cedula = $cedula;
        $this->buscarPropietario();
    }

    public function buscarPropietario(): bool {

        $sql = 'SELECT * FROM v_propietario WHERE ci_persona = ?;';
        $con = Conexion::conectar();
        $st = $con->prepare($sql);
        $st->bindParam(1, $this->cedula);
        $st->execute();
        Conexion::desconectar();

        if ($rs = $st->fetch()) {

            $this->nombre = $rs['p_nombre'];
            $this->sNombre = $rs['s_nombre'];
            $this->apellido = $rs['p_apellido'];
            $this->sApellido = $rs['s_apellido'];
            $this->telefono = $rs['telefono'];
            $this->correo = $rs['correo'];
            return true;
        } else {

            return false;
        }
    }

    public function buscarUnidades() : int {
        $sql = "SELECT u.id, u.n_unidad, u.n_documento, u.direccion, u.alicuota, id_tipo, tu.tipo, tu.area, (SELECT COUNT(*) FROM habitante WHERE id_unidad = u.id) AS num_habitantes FROM unidad AS u INNER JOIN tipo_unidad AS tu ON tu.id = u.id_tipo INNER JOIN puente_unidad_propietarios AS up ON up.id_unidad = u.id WHERE u.activo = true AND up.activo = true AND up.ci_propietario = ?;";
        $con = Conexion::conectar();
        $st = $con->prepare($sql);
        $st->bindParam(1, $this->cedula);
        $st->execute();
        Conexion::desconectar();

        $i = 0;

        while ($rs = $st->fetch()) {

            $unidad = new Unidad();
            $unidad->setId($rs['id']);
            $unidad->setNumero($rs['n_unidad']);
            $unidad->setDocumento($rs['n_documento']);
            $unidad->setDireccion($rs['direccion']);
            $unidad->setAlicuota($rs['alicuota']);
            $unidad->getTipo()->setId($rs['id_tipo']);
            $unidad->getTipo()->setNombre($rs['tipo']);
            $unidad->getTipo()->setArea($rs['area']);
            $unidad->setNumHabitantes($rs['num_habitantes']);

            $this->unidades[$i++] = $unidad;
        }

        return $i;
    }

    function getUnidades() {
        return $this->unidades;
    }

    function setUnidades($unidades) {
        $this->unidades = $unidades;
    }

}
