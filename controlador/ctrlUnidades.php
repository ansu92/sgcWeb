<?php

require_once '../modelo/Propietario.php';
require_once '../modelo/Unidad.php';

class ctrlUnidades {

    public function cargarUnidades() {
        $propietario = new Propietario($_SESSION['cedula']);
        $numUnidades = $propietario->buscarUnidades();

        for ($i = 0, $col = 1; $i < $numUnidades; $i++) {


            if ($col == 3) {
                echo '
        <! -- ROW OF PANELS -->
        <div class="row">
        ';
            }
            echo '
            <div class="col-md-4 col-sm-4 mb">
                <a href="habitantes.php?unidad=' . $propietario->getUnidades()[$i]->getNumero() . '">
                    <div class="darkblue-panel pn">
                        <div class="darkblue-header">
                            <h5>' . $propietario->getUnidades()[$i]->getNumero() . '</h5>
                        </div>
                        <h1 class="mt"><i class="fa fa-home fa-3x"></i></h1>
                        <footer>
                            <div class="centered">
                                <h5><i class="fa fa-user"></i> ' . $propietario->getUnidades()[$i]->getNumHabitantes() . ' Habitante(s)</h5>
                            </div>
                        </footer>
                    </div><! -- /darkblue panel -->
                </a>
            </div><!-- /col-md-4 -->
';
        }

        if ($col == 0) {
            echo '
        </div><!-- /END ROW OF PANELS -->
        ';
            $col = 1;
        }
    }

}
