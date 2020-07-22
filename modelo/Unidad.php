<?php

require_once 'Conexion.php';
require_once 'TipoUnidad.php';
require_once 'Habitante.php';

class Unidad {

    private $id;
    private $numero;
    private $documento;
    private $direccion;
    private $alicuota;
    private $tipo;
    private $habitantes;
    private $numHabitantes;

    function __construct() {

        $this->tipo = new TipoUnidad();
        $this->buscarUnidad();
    }

    public function buscarUnidad(): bool {

        $sql = "SELECT u.id, n_unidad, n_documento, direccion, alicuota, tu.id AS id_tipo, tu.tipo, tu.area, (SELECT COUNT(*) FROM habitante WHERE id_unidad = u.id) AS num_habitantes FROM unidad AS u INNER JOIN tipo_unidad AS tu ON tu.id = u.id_tipo WHERE u.activo = true AND n_unidad = ?;";
        $con = Conexion::conectar();
        $st = $con->prepare($sql);
        $st->bindParam(1, $this->numero);
        $st->execute();
        Conexion::desconectar();

        if ($rs = $st->fetch()) {

            $this->id = $rs['id'];
            $this->numero = $rs['n_unidad'];
            $this->documento = $rs['n_documento'];
            $this->direccion = $rs['direccion'];
            $this->alicuota = $rs['alicuota'];
            $this->tipo->setId($rs['id_tipo']);
            $this->tipo->setNombre($rs['tipo']);
            $this->tipo->setArea($rs['area']);
            $this->numHabitantes = $rs['num_habitantes'];
            return true;
        } else {

            return false;
        }
    }

    public function buscarHabitantes() : int {
        $sql = "SELECT h.ci_persona AS cedula, pe.p_nombre, pe.s_nombre, pe.p_apellido, pe.s_apellido, pe.telefono, pe.correo, ph.parentesco FROM habitante AS h INNER JOIN persona AS pe ON pe.cedula = h.ci_persona INNER JOIN puente_propietario_habitante AS ph ON ph.ci_habitante = h.ci_persona WHERE h.activo = true AND h.id_unidad = (SELECT id FROM unidad WHERE n_unidad = ?);";
        $con = Conexion::conectar();
        $st = $con->prepare($sql);
        $st->bindParam(1, $this->numero);
        $st->execute();
        Conexion::desconectar();

        $i = 0;

        while ($rs = $st->fetch()) {

            $habitante = new Habitante();
            $habitante->setCedula($rs['cedula']);
            $habitante->setNombre($rs['p_nombre']);
            $habitante->setSNombre($rs['s_nombre']);
            $habitante->setApellido($rs['p_apellido']);
            $habitante->setSApellido($rs['s_apellido']);
            $habitante->setTelefono($rs['telefono']);
            $habitante->setCorreo($rs['correo']);
            $habitante->setParentesco($rs['parentesco']);

            $this->habitantes[$i++] = $habitante;
        }

        return $i;
    }

    public function toArray() {
        $array['id'] = $this->id;
        $array['id'] = $this->numero;
        $array['id'] = $this->documento;
        $array['id'] = $this->direccion;
        $array['id'] = $this->alicuota;
        $array['id'] = $this->tipo->toArray();
    }

    function getId() {
        return $this->id;
    }

    function getNumero() {
        return $this->numero;
    }

    function getDocumento() {
        return $this->documento;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getAlicuota() {
        return $this->alicuota;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getHabitantes() {
        return $this->habitantes;
    }

    function getNumHabitantes() {
        return $this->numHabitantes;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setDocumento($documento) {
        $this->documento = $documento;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setAlicuota($alicuota) {
        $this->alicuota = $alicuota;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setHabitantes($habitantes) {
        $this->habitantes = $habitantes;
    }

    function setNumHabitantes($numHabitantes) {
        $this->numHabitantes = $numHabitantes;
    }

}
