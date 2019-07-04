<?php
require "../../config/funciones.php";
require "../../class/sesion.php";
verifico();
$fecha = date("d-m-Y");
$cod_torneo = $_GET["l_id_torneo_"];
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
                <h2 class="page-title">Jornada <small></small></h2>
            </div>
        </div>
        <!--Fin Titulo Contenido -->
        <!--Inicio de la pagina contenido -->
        <div class="row-fluid">
            <div class="span11">
                <section class="widget">
                    <header>
                        <h4>
                            <i class="icon-file-alt"></i>
                            Lista jornada
                            <img src="/source/img/147.png" width="50px" alt="">
                        </h4>
                    </header>
                    <div class="body">
                        <table id="fixture_table" class="display responsive no-wrap" style="color: #ffffff;">
                            <thead>
                            <tr> 
                                
                                <th class="span1">Fecha</th>
                                <th class="span1">Hora</th>                        
                                <th class="span1">Local</th>
                                <th class="span1">Local</th>
                                <th class="span1">Acciones</th>
                                <th class="span1">Visitante</th>
                                <th class="span1">Visitante</th>
    
                                <th class="span1">Partido</th>
                                <th class="span1">id_Local</th> 
                                <th >id equipo visi</th>     

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
        <div class="span6" >
                <section class="widget">
                    <header>
                        <h4>
                        </h4>
                    </header>
                    <div class="body">
                    <fieldset>
                                <div class="well">
                                    <div class="row-fluid non-responsive">
                                        <div class="span12">
                                            <div class="control-group controls-row">      
                                                    
                                            <button id="btnresultados" name="btnresultados"class="btn btn-large btn-warning btn-block">Resultados</button>  
                                                                                                             
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                
                            </fieldset>                                
                        <br>
                    </div>
                </section>
            </div>
        <!--Fin de la pagina de contenido -->
        <div class="row-fluid">
                <!--Inicio de Modal Confirmar -->
                <div id="myModalapuesta" class="modal hide fade" tabindex="-1" role="dialog">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 id="myModalLabel2">Confirmar apuesta</h4>
                    </div>
                        <div class="modal-body">
                            <p id = "mensaje_modal">Estas seguro?</p>
                            <input type="hidden" id="id_partido" value="">
                            <input type="hidden" id="eleccion" value="">
                            <input type="hidden" id="cod_torneo" value="<?php echo $cod_torneo?>">
                            
                        </div>
                        <div class="modal-footer">
                            <button class="btn cerrar" data-dismiss="modal">Cancelar</button>
                            <button class="btn btn-primary saveapuesta">Confirmar</button>
                        </div>
                </div>
                <!--Fin de Modal Confirmar -->
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
    $('#menu').addClass('active')
    $('#components-collapse').addClass('adm_tor');

</script>

</body>
</html>