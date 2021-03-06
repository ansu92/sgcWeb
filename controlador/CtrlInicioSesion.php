<?php

session_start();

require_once '../modelo/Usuario.php';
require_once '../modelo/Propietario.php';
require_once '../modelo/Unidad.php';

$usuario = new Usuario();
$unidades;

switch ($_REQUEST["accion"]) {

    case "iniciar":
        $usuario->setUsuario($_POST['usuario']);
        $usuario->setPassword($_POST['clave']);

        if ($usuario->iniciar()) {

            $_SESSION['usuario'] = $usuario->getUsuario();
            $_SESSION['cedula'] = $usuario->getPersona()->getCedula();

            $propietario = new Propietario($_SESSION['cedula']);

            $nombre = $usuario->getPersona()->getNombre();
            $apellido = $usuario->getPersona()->getApellido();
            $_SESSION['nombre'] = $nombre . " " . $apellido;

            header("Location: ctrlInicio.php");
        } else {

            header("Location: ../vista/login.html");
        }

        break;

    default:
        break;
}
