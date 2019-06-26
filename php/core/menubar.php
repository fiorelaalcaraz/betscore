<?php

date_default_timezone_set('America/Asuncion');
$fecha = date("d-m-Y");

?>
<nav id="sidebar" class="sidebar nav-collapse collapse">
    <ul id="side-nav" class="side-nav">
        <li id="inicio">
            <a href="/php/core/inicio.php"><i class="icon-desktop"></i> <span class="name">Inicio</span></a>
        </li>
        <li class="accordion-group" id = "menu">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="#forms-collapse">
                <i class="icon-edit"></i> <span class="name">Menu</span></a>
            <ul id="forms-collapse" class="accordion-body collapse">
            
                <li id = "adm_tor"><a href="/php/core/adm_tor/adm_tor.php">Administrar Torneos</a></li>
                <li><a href="/php/core/adm_tor/det_tor.php">Mis torneos</a></li>
                <!--<li><a href="/betscore/php/core/jornada/prueba.php">Pruebas</a></li>-->
                <li><a href="/php/core/premios/premios.php">Premios</a></li>
                <li><a href="/php/core/apuestas/apuestas.php">Jornada</a></li>                   				
            </ul>
        </li>
        <li class="visible-phone">
            <a href="/php/class/cerrar_sesion.php"><i class="icon-signout"></i> <span class="name">Cerrar Sesión</span></a>
        </li>
    </ul>
</nav>
