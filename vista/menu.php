<?php
session_start();
?>

<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="perfil.php"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
            <h5 class="centered">
                <?php
                echo $_SESSION['nombre'];
                ?>
            </h5>

            <li class="mt">
                <a class="active" href="inicio.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Inicio</span>
                </a>
            </li>

            <li class="sub">
                <a href="deudas.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Deudas</span>
                </a>
            </li>

            <li class="sub">
                <a href="unidad.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Unidad</span>
                </a>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
