<?php

class TipoUsuario {

    private $id;
    private $nombre;
    
    public function toArray() {
        $array['id'] = $this->id;
        $array['nombre'] = $this->nombre;
        return $array;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}
