<?php

class TipoUnidad {
    
    private $id;
    private $nombre;
    private $area;
    
    public function toArray() {
        $array['id'] = $this->id;
        $array['nombre'] = $this->nombre;
        $array['area'] = $this->area;
        return $array;
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getArea() {
        return $this->area;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setArea($area) {
        $this->area = $area;
    }

}
