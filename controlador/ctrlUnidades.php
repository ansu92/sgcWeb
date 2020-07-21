<?php
session_start();

require_once '../modelo/Unidad.php';

$unidades = $_SESSION[unidades];

function llenarUnidades() {

    foreach ($unidades as $item) {
        ?>
        <?php
    }
}

function llenarTabla() {
    foreach ($unidades as $item) {
        ?>
        <tr>
            <td>Company Ltd</td>
            <td class="hidden-phone"><?php $item->getN_unidad ?></td>
            <td>12000.00$ </td>
            <td>
                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
            </td>
        </tr>
        <tr>
            <td>Dashgum co</td>
            <td class="hidden-phone">Lorem Ipsum dolor</td>
            <td>17900.00$ </td>
            <td>
                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
            </td>
        </tr>
        <?php
    }
}
