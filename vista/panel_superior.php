
<!--header start-->
<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a href="inicio.php" class="logo"><b>SGC Web</b></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">

            <!-- inbox dropdown start-->
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-theme"><?php echo '0'; //Aquí va el número de mensajes  ?></span>
                </a>
                <ul class="dropdown-menu extended inbox">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                        <p class="green">You have <?php echo '0'; ?> new messages</p>
                    </li>
                    <li>
                        <a href="index.html#">
                            <span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
                            <span class="subject">
                                <span class="from">Zac Snider</span>
                                <span class="time">Just now</span>
                            </span>
                            <span class="message">
                                Hi mate, how is everything?
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="index.html#">
                            <span class="photo"><img alt="avatar" src="assets/img/ui-divya.jpg"></span>
                            <span class="subject">
                                <span class="from">Divya Manian</span>
                                <span class="time">40 mins.</span>
                            </span>
                            <span class="message">
                                Hi, I need your help with this.
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="index.html#">See all messages</a>
                    </li>
                </ul>
            </li>
            <!-- inbox dropdown end -->
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li><a class="logout" href="login.html">Cerrar sesión</a></li>
        </ul>
    </div>
</header>
<!--header end-->
