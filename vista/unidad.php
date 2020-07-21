<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Unidades - SGC Web</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <section id="container" >

            <?php
            include 'panel_superior.php';
            include 'menu.php';
            ?>

            <!-- **********************************************************************************************************************************************************
            MAIN CONTENT
            *********************************************************************************************************************************************************** -->
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <h3><i class="fa fa-angle-right"></i> Unidades</h3>

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
                                        <tr>
                                            <td>Company Ltd</td>
                                            <td class="hidden-phone">Lorem Ipsum dolor</td>
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
                                    </tbody>

                                </table>
                            </div><!-- /content-panel -->
                        </div><!-- /col-md-12 -->
                    </div><!-- /row -->
                    <!-- Fin Tabla Integrantes -->

                    <!-- Formulario -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Registrar Habitante</h4>
                                </div>
                                <form class="form-horizontal style-form" action="../controlador/CtrlHabitante.php?accion=registrar" method="POST">
                                    <div class="modal-body">

                                        <div class="form-panel">
                                            <h4 class="mb"><i class="fa fa-angle-right"></i> Habitante</h4>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Cédula</label>
                                                <div class="col-sm-10">
                                                    <select name="letra_cedula" class="form-control">
                                                        <option value="V-">V</option>
                                                        <option value="E-">E</option>
                                                    </select>
                                                    <input type="text" name="cedula" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Nombre</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nombre" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Segundo Nombre</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="s_nombre" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Apellido</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="apellido" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Segundo Apellido</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="s_apellido" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Teléfono</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="telefono" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Correo</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="correo" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>                      
                    <!-- Fin Formulario -->

                </section><! --/wrapper -->
            </section><!-- /MAIN CONTENT -->

            <!--main content end-->

            <?php
            include 'panel_inferior.php';
            ?>

        </section>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


        <!--common script for all pages-->
        <script src="assets/js/common-scripts.js"></script>

        <!--script for this page-->

        <script>
            //custom select box

            $(function () {
                $('select.styled').customSelect();
            });

        </script>

    </body>
</html>
