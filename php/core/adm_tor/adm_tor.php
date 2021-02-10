<?php 
require "php/config/funciones.php";
require "php/class/sesion.php";
require "php/class/torneo.php";
require "php/class/liga.php";


//verifica session
verifico();

$fecha = date("d-m-Y");
?>
<html>
<head>
    <title>Administrador de torneos</title>
    <link href="../../../assets/css/application.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../../../assets/img/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Fiorela Alcaraz fiorellalcaraz@gmail.com" />
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body class="background-dark">
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
                <h2 class="page-title">Administrar Torneos</h2>
            </div>
        </div>
        <!--Fin Titulo Contenido -->
        <!--Inicio de la pagina contenido -->
        <div class="row-fluid">
            <div class="span6">
                <section class="widget">
                    <header>
                        <h4>
                            <i class="icon-align-left"></i>
                            Crear Torneo
                        </h4>
                    </header>
                    <div class="body">
                        <form class="form" method="post">
                            <fieldset>
                                <div class="well">
                                    <div class="row-fluid non-responsive">
                                        <div class="span12">
                                            <div class="control-group controls-row">
                                                
                                                <label class="control-label" for="descrip">Nombre</label>
                                                <div class="controls">
                                                    <input type="text" id="descri" name="descri" class="span12" placeholder="torneo" required="required"/>
                                                </div>
                                                
                                                <label class="control-label" for="descrip">Liga</label>
												<div class="controls">
                                                    <select id="liga" required="required" data-placeholder="Select Liga" class="select-block-level chzn-select">
                                                        <option value="1">"descrip"</option>
                                                        <?php
                                                        //Liga::get_ligas();
                                                        ?>
                                                    </select>       
                                                </div>
                                               <br> 	
												<label class="control-label" for="descrip">Fecha de inicio</label>
												<div class="controls">
													<input type="date" id="fec_ini" name="fec_ini" class="span12" placeholder="fecha de inicio del torneo" required="required"/>
                                                </div>	

												<label class="control-label" for="descrip">Costo de inscripción</label>
												<div class="controls">
													<input type="number" id="costo" name="costo" class="span12" placeholder="costo de ingreso al torneo" required="required"/>
                                                </div>

                                                <label class="span3" for="descrip">1er Puesto</label>
												<div class="controls">
													<input type="number" id="primero" name="primero" class="span3" placeholder="%" required="required"/>
                                                </div>

                                                <label class="span3" for="descrip">2do Puesto</label>
												<div class="controls">
													<input type="number" id="segundo" name="segundo" class="span3" placeholder="%" />
                                                </div>

                                                <label class="span3" for="descrip">3er Puesto</label>
												<div class="controls">
													<input type="number" id="tercero" name="tercero" class="span3" placeholder="%"/>
                                                </div>

                                                <label class="span3" for="descrip">4to Puesto</label>
												<div class="controls">
													<input type="number" id="cuarto" name="cuarto" class="span3" placeholder="%" />
                                                </div>
                                                
                                                
                                                <label class="control-label" for="descrip">Observaciones</label>
												<div class="controls">
                                                    <textarea type="text" id="obs" name="obs" cols="30" rows="5" class="span12" placeholder="obs" required="required"></textarea>
                                                </div>
                                            </div>
                                            <div>
                                                <button id="btnsave" name="btnsave" class="btn btn-success span12">Agregar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </fieldset>
                        </form>
                    </div>
                </section>
            </div>
                                                        
            <div class="span11" >
                <section class="widget">
                    <header>
                        <h4>
                            <i class="icon-file-alt"></i>
                            Torneos administrados
                        </h4>
                    </header>
                    <div class="body">
                        <table id="referencial" class="table text-align-center" style="color: #ffffff;">
                            <thead>
                            <tr>
                                <th class="span1">Id</th>
                                <th class="span3">Nombre</th>
								<th class="span2">Costo inscri.</th>
								<th class="span3">Fec. inicio</th>
								<th class="span3">Liga</th>
                                <th class="span3">Detalles</th>
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
                    <!--Inicio de Modal Agregar -->
                    <div id="myModalagregar" class="modal hide fade" tabindex="-1" role="dialog">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 id="myModalLabel2">Agregar Participantes</h4>
                    </div>
                    <div class="modal-body">
                        <div class="control-group controls-row">
                            <label class="control-label" for="participantes">Nombre</label>
                            <div class="controls">
                                <input type="hidden" id="cod_torneo">
                                <input type="text" id="nombre" class="span12" required/>
                            </div>
                            <label class="control-label" for="participantes">Email</label>
                            <div class="controls">
                                <input type="hidden" id="cod_tor">
                                <input type="text" id="email" class="span12" required/>
                            </div>  
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn cerrar" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary btn_add" id="btn_add">Agregar</button>
                    </div>
                </div>
                <!--Fin de Modal Editar -->                                                        
                <!--Inicio de Modal Editar -->
                <div id="myModaleditar" class="modal hide fade" tabindex="-1" role="dialog">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 id="myModalLabel2">Editar Torneo</h4>
                    </div>
                    <div class="modal-body">
                        <div class="control-group controls-row">
                            <label class="control-label">Descripcion</label>
                            <div class="controls">
                                <input type="hidden" id="cod_torneo_edit">
                                <input type="text" id="descri_edit" class="span12" required/>
                            </div>
							<label class="control-label" >Costo</label>
                            <div class="controls">
                                <input type="text" id="costo_edit" class="span12" required/>
                            </div>
							<label class="control-label" >Fecha de incio</label>
                            <div class="controls">
                                <input type="text" id="fec_ini_edit" class="span12" required/>
                            </div>
							<label class="control-label" >Liga</label>
                            <div class="controls">
                                <input type="text" id="liga_edit" class="span12" required/>
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
                        <h4 id="myModalLabel2">Eliminar torneo</h4>
                    </div>
                        <div class="modal-body">
                            Estas seguro de eliminar el torneo?
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
<script src="../../../assets/lib/jquery.autogrow-textarea.js"></script>
<!--<script src="../../../assets/lib/sparkline/jquery.sparkline.js"></script>
<script src="../../../assets/lib/jquery-ui-1.10.1.custom.js"></script>-->
<script src="../../../assets/lib/jquery.slimscroll.js"></script>
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

<!-- bootstrap custom plugins -->
<script src="../../../assets/lib/bootstrap-datepicker.js"></script>
<script src="../../../assets/lib/bootstrap-select/bootstrap-select.js"></script>
<script src="../../../assets/lib/wysihtml5/wysihtml5-0.3.0_rc2.js"></script>
<script src="../../../assets/lib/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script src="../../../assets/lib/bootstrap-switch.js"></script>
<script src="../../../assets/lib/bootstrap-colorpicker.js"></script>

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