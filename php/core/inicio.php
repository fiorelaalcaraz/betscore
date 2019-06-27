<?php

require "../config/funciones.php";
require "../class/sesion.php";

//verifico session
verifico();

$fecha = date("d-m-Y");

?>
<html>
<head>
    <title>Inicio</title>
    <link href="../../assets/css/application.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../../assets/img/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Sistema v.1" />
    <meta name="author" content="Fiorela Alcaraz fiorellalcaraz@gmail.com" />
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body class="background-dark">

<!-- Inicio Barra de menu -->
<?php
include "menubar.php";
?>
<!--Fin Barra de menu -->
<!-- Inicio del body -->
<div class="wrap">
    <!--Inicio de la Cabecera -->
    <?php
    include "header.php";
    ?>
    <!--Fin de la cabecera -->
    <!--Inicio del contenido -->
    <div class="content container-fluid">
        <!--Inicio Titulo del Contenido -->
        <div class="row-fluid">
            <div class="span12">
                <h2 class="page-title">Inicio <small>Bienvenido <?php echo $_SESSION["nombre"]; ?></small></h2>
            </div>
        </div>
        <!--Fin Titulo Contenido -->
        <!--Inicio de la pagina contenido -->
        <div class="row-fluid">
            <img src="http://thttp://betscore.herokuapp.com/source/img/banner_futbol.jpg" height="276">
        </div>
        <div class="row-fluid" style="color: #ffffff;">
            <div class="row-fluid box-row">
                <div class="span2">
                    <div class="box">
                        <div class="icon">
                            <i class="icon-calendar"></i>
                        </div>
                        <div class="description">
                            Fecha: <strong><?php echo $fecha ; ?></strong>
                        </div>
                    </div>
                </div>
                <div class="span2">
                <a href="../core/adm_tor/det_tor.php">       
                    <div class="box">
                        <div class="icon">
                            <i class="eicon-trophy"></i>
                        </div>
                        <div class="description">
                            <strong>TORNEOS</strong>

                        </div>
                        </a>       
                    </div>
                </div>
               
                <div class="span2">
                <a href="../core/jornada/prueba.php">               
                    <div class="box">
                        <div class="icon">
                            <i class="icon-time"></i>
                        </div>
                        <div class="description">

                           <strong>JORNADA</strong>
                
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        <!--Fin de la pagina de contenido -->
    </div>
    <!--Fin del Contenido -->
</div>
<!--Fin del body -->

<!-- jquery and friends -->
<script src="../../assets/lib/jquery/jquery.1.9.0.min.js"> </script>
<script src="../../assets/lib/jquery/jquery-migrate-1.1.0.min.js"> </script>

<!-- jquery plugins -->
<script src="../../assets/lib/jquery-maskedinput/jquery.maskedinput.js"></script>
<script src="../../assets/lib/parsley/parsley.js"> </script>
<script src="../../assets/lib/uniform/js/jquery.uniform.js"></script>
<script src="../../assets/lib/select2.js"></script>
<script src="../../assets/lib/jquery.dataTables.min.js"></script>

<!--backbone and friends -->
<script src="../../assets/lib/backbone/underscore-min.js"></script>
<script src="../../assets/lib/backbone/backbone-min.js"></script>
<script src="../../assets/lib/backbone/backbone-pageable.js"></script>
<script src="../../assets/lib/backgrid/backgrid.js"></script>
<script src="../../assets/lib/backgrid/backgrid-paginator.js"></script>

<!-- bootstrap default plugins -->
<script src="../../assets/js/bootstrap/bootstrap-transition.js"></script>
<script src="../../assets/js/bootstrap/bootstrap-collapse.js"></script>
<script src="../../assets/js/bootstrap/bootstrap-alert.js"></script>
<script src="../../assets/js/bootstrap/bootstrap-tooltip.js"></script>
<script src="../../assets/js/bootstrap/bootstrap-popover.js"></script>
<script src="../../assets/js/bootstrap/bootstrap-button.js"></script>
<script src="../../assets/js/bootstrap/bootstrap-dropdown.js"></script>
<script src="../../assets/js/bootstrap/bootstrap-modal.js"></script>
<script src="../../assets/js/bootstrap/bootstrap-tab.js"> </script>

<script>
    $(function(){
        $('#inicio').addClass('active');
    });
</script>

</body>
</html>
