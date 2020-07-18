<?php

session_start();

require_once '../modelo/Usuario.php';

$usuario = new Usuario();

switch ($_REQUEST["accion"]) {

    case "iniciar":
        $usuario->setUsuario($_POST['usuario']);
        $usuario->setPassword($_POST['clave']);
        $resul = $usuario->iniciar();

        if ($resul) {
            $_SESSION["usuario"] = $usuario->getUsuario();
            $_SESSION["clave"] = $usuario->getPassword();
            header("Location: ../vista/inicio.html");
        }
}
