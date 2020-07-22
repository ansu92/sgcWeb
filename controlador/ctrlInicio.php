<?php

session_start();

require_once '../modelo/Usuario.php';
require_once '../modelo/Propietario.php';

$usuario = new Usuario();
$usuario->setUsuario($_SESSION['usuario']);
$usuario->buscarPerfil();

header('Location: ../vista/inicio.php');
