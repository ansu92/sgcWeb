<?php

session_start();

require_once '../modelo/Habitante.php';

$habitante = new Habitante();

switch ($_REQUEST['accion']) {

    case 'registrar':
        $habitante->setCedula($_POST['letra_cedula'] . $_POST['cedula']);
        $habitante->setNombre($_POST['nombre']);
        $habitante->setSNombre($_POST['s_nombre']);
        $habitante->setApellido($_POST['apellido']);
        $habitante->setSApellido($_POST['s_apellido']);
        $habitante->setTelefono($_POST['telefono']);
        $habitante->setCorreo($_POST['correo']);
        $habitante->setParentesco($_POST['parentesco']);

        if ($habitante->existePersona()) {

            $habitante->registrar('true');
        } else {

            $habitante->registrar('false');
        }

        header("Location: ../vista/habitantes.php?unidad=" . $_SESSION['unidad'] . "");
        break;


    default:
        break;
}
?>