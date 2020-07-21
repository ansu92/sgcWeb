<?php

session_start();

require_once '../modelo/Habitante.php';

$habitante = new Habitante();

switch ($_REQUEST['accion']) {

	case 'registrar':
		$habitante->setCedula($_POST['letra_cedula'].$_POST['cedula']);
		$habitante->setNombre($_POST['nombre']);
		$habitante->setSNombre($_POST['s_nombre']);
		$habitante->setApellido($_POST['apellido']);
		$habitante->setSApellido($_POST['s_apellido']);
		$habitante->setTelefono($_POST['telefono']);
		$habitante->setCorreo($_POST['correo']);

		if ($habitante->existePersona()) {

			if ($habitante->registrar('true')) {
				
				//llenarTabla();
			}

		} else {

			if ($habitante->registrar('false')) {
				
				//llenarTabla();
			}			
		}

		break;
	
	default:
		break;
}

function llenarTabla() {
	?>
                <!-- Tabla Integrantes -->
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4><i class="fa fa-angle-right"></i> Habitantes</h4>
                              <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Cédula</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Nombre y Apellido</th>
                                  <th><i class=" fa fa-edit"></i> Parentesco</th>
                                  <th>
                                    <!-- Botón trigger Formulario -->
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-cog"></i> Añadir</button>
                                  </th>
                              </tr>
                              </thead>
                              <tbody>
                              	<?php

                              	for ($i=0; $i < $numFilas; $i++) { 

                              	?>
                              <tr>
                                  <td>Company Ltd</td>
                                  <td class="hidden-phone">Lorem Ipsum dolor</td>
                                  <td>12000.00$ </td>
                                  <td>
                                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                  </td>
                              </tr>
                              <?php
                          }
                              ?>
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
              <!-- Fin Tabla Integrantes -->
<?php
}

?>