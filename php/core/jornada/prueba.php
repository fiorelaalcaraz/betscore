<?php
require "../../config/funciones.php";
require "../../class/sesion.php";
verifico();
$fecha = date("d-m-Y");
?>
<html>
<head>
    <title>Ejemplo.</title>
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
                <h2 class="page-title">Jornada <small>prueba api</small></h2>
            </div>
        </div>
        <!--Fin Titulo Contenido -->
        <!--Inicio de la pagina contenido -->
        <div class="row-fluid">
            <!--div class="span5">
                <section class="widget" type="hidden">
                    <header>
                        <h4>
                            <i class="icon-align-left"></i>
                            Agregar Estado Civil
                        </h4>
                    </header>
                    <div class="body">
                        <form class="form" method="post">
                            <fieldset>
                                <div class="well">
                                    <div class="row-fluid non-responsive">
                                        <div class="span12">
                                            <div class="control-group controls-row">
                                                <label class="control-label" for="descrip">Descripcion</label>
                                                <div class="controls">
                                                    <input type="text" id="descri" name="descri" class="span12" placeholder="Estado Civil" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button id="btnsave" name="btnsave" class="btn btn-primary span12">Agregar</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </section>
            </div-->
            <div class="span12">
                <section class="widget">
                    <header>
                        <h4>
                            <i class="icon-file-alt"></i>
                            Lista jornada
                            <img src="http://www.api-football.com/public/leagues/311.png" width="50px" alt="">
                        </h4>
                    </header>
                    <div class="body">
                        <table id="referencial" class="table text-align-center" style="color: #ffffff;">
                            <thead>
                            <tr>
                                <th class="span1">local</th>
                                <!--<th class="span1">id_local</th>-->
                                <!--<th class="span1">t de juego</th>-->
                                <th class="span1">fecha</th>
                                <!--<th class="span1">time_stap</th>-->
                                <th class="span1">final_score</th>
                                <!--<th class="span1">firstHalfStart</th>-->
                                <th class="span1">fixture_id</th>
                                <th class="span1">goalsAwayTeam</th>
                                <th class="span1">goalsHomeTeam</th>
                                <!--<th class="span1">halftime_score</th>-->
                                <th class="span1">homeTeam</th>
                                <!--<th class="span1">homeTeam_id</th>-->
                                <!--<th class="span1">league_id</th>-->
                                <!--<th class="span1">penalty</th>-->
                                <th class="span1">round</th>
                                <!--<th class="span1">secondHalfStart</th>-->
                                <th class="span1">status</th>
                                <!--<th class="span1">statusShort</th>-->
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
        <div class="row-fluid">
                <!--Inicio de Modal Editar -->
                <div id="myModaleditar" class="modal hide fade" tabindex="-1" role="dialog">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 id="myModalLabel2">Editar Estado Civil</h4>
                    </div>
                    <div class="modal-body">
                        <div class="control-group controls-row">
                            <label class="control-label" for="descri_edit">Descripcion</label>
                            <div class="controls">
                                <input type="hidden" id="cod_edit">
                                <input type="text" id="descri_edit" class="span12" required/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn cerrar" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary btn_edit" id="btn_edit">Editar</button>
                    </div>
                </div>
                <!--Fin de Modal Editar -->
                <!--Inicio de Modal Eliminar -->
                <div id="myModaleliminar" class="modal hide fade" tabindex="-1" role="dialog">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 id="myModalLabel2">Eliminar Estado Civil</h4>
                    </div>
                        <div class="modal-body">
                            Estas seguro de eliminar el estado civil
                            <input type="hidden" id="cod_eliminar" value="">
                        </div>
                        <div class="modal-footer">
                            <button class="btn cerrar" data-dismiss="modal">Cancelar</button>
                            <button class="btn btn-primary elimi">Eliminar</button>
                        </div>
                </div>
                <!--Fin de Modal Eliminar -->
        </div>
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
<script src="../../../source/js/ajax.js"></script>
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
<script>
    $('#refe').addClass('active');
    $('#estado').addClass('active');
    $('#components-collapse').addClass('in');

</script>
</body>
</html>