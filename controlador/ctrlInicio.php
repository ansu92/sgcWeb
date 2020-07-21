<?php

session_start();

require_once '../modelo/Usuario.php';
require_once '../modelo/Propietario.php';

$usuario = new Usuario();
$usuario->setUsuario($_SESSION['usuario']);
$usuario->buscarPerfil();

$propietario = new Propietario();
$propietario->setCedula($usuario->getCedula());
$propietario->buscarUnidades();

$_SESSION['unidades'] = $propietario->getUnidades();

header('Location: ../vista/inicio.php');
