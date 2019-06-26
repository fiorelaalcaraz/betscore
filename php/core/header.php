
<header class="page-header">
    <div class="navbar">
        <div class="navbar-inner">
            <ul class="nav pull-right">
                <li class="visible-phone-landscape">
                    <a href="#" id="search-toggle">
                        <i class="icon-search"></i>
                    </a>
                </li>
                <li class="divider"></li>
                <li class="hidden-phone dropdown">
                    <a href="#" title="Account" id="account" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-user"></i>
                    </a>
                    <ul id="account-menu" class="dropdown-menu account" role="menu">
                        <li role="presentation" class="account-picture">
                            <?php echo $_SESSION["nombre"]." ".$_SESSION["apell"]; ?>
                        </li>
                        <li role="presentation">
                            <a href="#" class="link">
                                <i class="icon-user"></i>
                                Perfil
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="visible-phone">
                    <a href="#" class="btn-navbar" data-toggle="collapse" data-target=".sidebar" title="">
                        <i class="icon-reorder"></i>
                    </a>
                </li>
                <li class="hidden-phone"><a href="/betscore/php/class/cerrar_sesion.php"><i class="icon-signout"></i></a></li>
            </ul>
        </div>
    </div>
</header>
