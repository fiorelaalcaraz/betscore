<?php
require "../../config/funciones.php";
require "../../class/sesion.php";
require "../../class/torneo.php";
verifico();
$fecha = date("d-m-Y");

if(!empty($_GET["l_id_torneo"])){
    $cod_torneo = $_GET["l_id_torneo"];
    $elige_torneo = "NO";
    }else{
    $cod_torneo = 0;    
    $elige_torneo = "SI";
}

$datos_torneo = Torneo::get_torneo($cod_torneo);
?>
<html>
<head>
    <title>Apuestas.</title>
    <link href="../../../assets/css/application.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../../../assets/img/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Jornada" />
    <meta name="author" content="Fiorela Alcaraz fiorellalcaraz@gmail.com" />
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body class="background-dark">
<div class="logo">
    <!--<h4><a href="../controles/inicio.php"><strong>Jornada</strong></a></h4>-->
</div>
<!-- Inicio Barra de menu -->
<?php
include "../menubar.php";
?>
<!--Fin Barra de menu -->
<!-- Inicio del body -->
<div class="wrap">
    <!--Inicio de la Cabecera -->
    <?php
    include "../header.php";
    ?>
    <!--Fin de la cabecera -->
    <!--Inicio del contenido -->
    <div class="content container-fluid">
        <!--Inicio Titulo del Contenido -->
        <div class="row-fluid">
            <div class="span12">
                <h2 class="page-title">Premios <small></small></h2>
            </div>
        </div>
        <!--Fin Titulo Contenido -->
        <!--Inicio de la pagina contenido -->
        <?php if ($elige_torneo == "SI"){?>
        <div class="row-fluid">
            <div class="span6">
                <div class="controls">
                    <select id="usu_torneo_pre" required="required" data-placeholder="Seleccionar torneo" class="select-block-level chzn-select">
                        <option value=""></option>
                        <?php
                        Torneo::get_list_torneo();
                        ?>
                    </select>       
                </div>
                <br> 
            </div>
        </div>
        <?php  }?>
        <div class="row-fluid">
            <div class="span11">
                <section class="widget">
                    <header>
                        <h4>
                            <i class="icon-file-alt"></i>
                            Tabla de premios actualizada
                            <img src="/source/img/147.png" width="50px" alt="">
                        </h4>
                    </header>
                    <div class="body">
                        <table id="premios_table" class="table text-align-center" style="color: #ffffff;">
                            <thead>
                            <tr> 
                                
                                <th class="span1">Puesto</th>
                                <th class="span1">Ganador</th>                        
                                <th class="span1">Premio</th>
        

                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </section>
            </div>
        </div>
        <!--Fin de la pagina de contenido -->
    </div>
    <!--Fin del Contenido -->
</div>
<!--Fin del body -->

<!-- jquery and friends -->
<script src="../../../assets/lib/jquery/jquery-1.11.2.min.js"> </script>
<script src="../../../assets/lib/jquery/jquery-migrate-1.1.0.min.js"> </script>
<!-- jquery plugins -->
<script src="../../../assets/lib/jquery-maskedinput/jquery.maskedinput.js"></script>
<script src="../../../assets/lib/parsley/parsley.js"> </script>
<script src="../../../assets/lib/uniform/js/jquery.uniform.js"></script>
<script src="../../../assets/lib/select2.js"></script>
<script src="../../../assets/lib/jquery.dataTables.min.js"></script>
<script src="../../../source/js/fnReloadAjax.js"></script>
<script src="../../../source/js/adm_tor.js"></script>
<!--backbone and friends -->
<script src="../../../assets/lib/backbone/underscore-min.js"></script>
<script src="../../../assets/lib/backbone/backbone-min.js"></script>
<script src="../../../assets/lib/backbone/backbone-pageable.js"></script>
<script src="../../../assets/lib/backgrid/backgrid.js"></script>
<script src="../../../assets/lib/backgrid/backgrid-paginator.js"></script>
<!-- bootstrap default plugins -->
<script src="../../../assets/js/bootstrap/bootstrap-transition.js"></script>
<script src="../../../assets/js/bootstrap/bootstrap-collapse.js"></script>
<script src="../../../assets/js/bootstrap/bootstrap-alert.js"></script>
<script src="../../../assets/js/bootstrap/bootstrap-tooltip.js"></script>
<script src="../../../assets/js/bootstrap/bootstrap-popover.js"></script>
<script src="../../../assets/js/bootstrap/bootstrap-button.js"></script>
<script src="../../../assets/js/bootstrap/bootstrap-dropdown.js"></script>
<script src="../../../assets/js/bootstrap/bootstrap-modal.js"></script>
<script src="../../../assets/js/bootstrap/bootstrap-tab.js"> </script>
<!-- basic application js-->
<script src="../../../assets/js/app.js"></script>
<script src="../../../assets/js/settings.js"></script>

<!-- page specific -->
<script src="../../../assets/js/forms-elemets.js"></script>
<script>
    $('#menu').addClass('active')
    $('#components-collapse').addClass('adm_tor');

</script>

</body>
</html>