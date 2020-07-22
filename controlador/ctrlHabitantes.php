<?php

require_once '../modelo/Unidad.php';
require_once '../modelo/Parentesco.php';

class ctrlHabitantes {

    public function llenarTabla() {
        $unidad = new Unidad();
        $unidad->setNumero($_GET['unidad']);
        $unidad->buscarUnidad();
        $unidad->buscarHabitantes();

        for ($i = 0; $i < $unidad->getNumHabitantes(); $i++) {
            $habitante = $unidad->getHabitantes()[$i];
            echo '
            <tr>
                <td>' . $habitante->getCedula() . '</td>
                <td class="hidden-phone">' . $habitante->getNombre() . ' ' . $habitante->getApellido() . '</td>
                <td>';
            switch ($habitante->getParentesco()) {
                case Parentesco::MADRE:
                    echo 'Madre';
                    break;
                case Parentesco::PADRE:
                    echo 'Padre';
                    break;
                case Parentesco::HIJO:
                    echo 'Hijo/Hija';
                    break;
                case Parentesco::HERMANO:
                    echo 'Hermano/Hermana';
                    break;
                case Parentesco::ABUELO:
                    echo 'Abuelo/Abuela';
                    break;
                case Parentesco::NIETO:
                    echo 'Nieto/Nieta';
                    break;
                case Parentesco::TIO:
                    echo 'Tío/Tía';
                    break;
                case Parentesco::SOBRINO:
                    echo 'Sobrino/Sobrina';
                    break;
                case Parentesco::PRIMO:
                    echo 'Primo/Prima';
                    break;
                default:
                    break;
            }
            echo '</td>
                <td>
                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                </td>
            </tr>
            ';
        }
    }

}
