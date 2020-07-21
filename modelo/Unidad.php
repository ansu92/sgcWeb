<?php

class Unidad {

    private $id;
    private $numero;
    private $documento;
    private $direccion;
    private $alicuota;
    private $tipo;

    function __construct() {

        $this->tipo = new TipoUnidad();
    }

    public function buscarUnidad(): bool {

        $sql = "SELECT * FROM v_unidad WHERE id = ?;";
        $con = Conexion::conectar();
        $st = $con->prepare($sql);
        $st->bindParam(1, $this->id);
        $st->execute();
        Conexion::desconectar();

        if ($rs = $st->fetch()) {

            $this->numero = $rs['n_unidad'];
            $this->documento = $rs['n_documento'];
            $this->direccion = $rs['direccion'];
            $this->alicuota = $rs['alicuota'];
            $this->tipo->setId(rs['id_tipo']);
            $this->tipo->setNombre(rs['tipo']);
            $this->tipo->setArea(rs['area']);
            return true;
        } else {

            return false;
        }
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

}
