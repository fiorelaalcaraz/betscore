<?php 
require "../../config/funciones.php";
require "../../class/sesion.php";
require "../../class/torneo.php";


if(!empty($_SESSION["usu"])){
    $usu = "SI";
    $id_usu = $_SESSION["id"];
    }else{
    $usu = "NO";
    $id_usu = null;
}

if(!empty($_GET["l_id_torneo"])){
    $cod_torneo = $_GET["l_id_torneo"];
    $elige_torneo = "NO";
    }else{
    $cod_torneo = 0;    
    $elige_torneo = "SI";
}
$fecha = date("d-m-Y");

$datos_torneo = Torneo::get_torneo($cod_torneo);
?>

<html>
<head>
    <title>Detalles del torneo</title>
    
    <link href="../../../assets/css/application.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../../../assets/img/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Ejemplo" />
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
                <h2 class="page-title">Detalles del Torneo </h2>
            </div>
        </div>
        <!--Fin Titulo Contenido -->
        <!--Inicio de la pagina contenido -->
        <?php if ($elige_torneo == "SI"){?>
        <div class="row-fluid">
            <div class="span6">
                <div class="controls">
                    <select id="usu_torneo" required="required" data-placeholder="Seleccionar torneo" class="select-block-level chzn-select">
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
            <div class="span6">
                <section class="widget">
                    <header>
                        <h4>
                            <i class="icon-align-left"></i>
                            <?php echo $datos_torneo["des_tor"]; ?>
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
                                                    <input type="text" id="descri" name="descri"  class="span12"  value = "<?php echo $datos_torneo["des_tor"]; ?>" disabled/>
                                                </div>
                                                
                                                <label class="control-label" for="descrip">Liga</label>
                                                <div class="controls">
                                                    <input type="text" id="liga" name="liga" class="span12"  value = "<?php echo $datos_torneo["liga"]; ?>" disabled/>
                                                </div>
                                               <br> 	
												<label class="control-label" for="descrip">Fecha de inicio</label>
												<div class="controls">
													<input type="date" id="fec_ini" name="fec_ini" class="span12" value = "<?php echo $datos_torneo["fec_ini"]; ?>" disabled/>
                                                </div>	

												<label class="control-label" for="descrip">Costo de inscripción</label>
												<div class="controls">
													<input type="number" id="costo" name="costo" class="span12" value = "<?php echo $datos_torneo["costo"]; ?>" disabled/>
                                                </div>

                                                <label class="control-label" for="descrip">Creador</label>
												<div class="controls">
                                                    <input type="text" id="creador" name="creador" class="span12" value = "<?php echo $datos_torneo["creador"]; ?>" disabled>
                                                    <input type="hidden" id="id_torneo_" name= "id_torneo_" value = "<?php echo $cod_torneo ?>">
                                                    <input type="hidden" id="id_usu" name= "id_usu" value = "<?php echo $id_usu ?>">
                                                </div>
                                            </div>
                                            <div>
                                                    <?php if ($usu == "SI"){?>
                                            
                                                        <button data-toggle='modal' data-target='#myModalinvitar' id="btninvitar" name="btninvitar" class="btn btn-success span12">Invitar Participantes</button>
                                                       
                                                    <?php }?>                                                         
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                
                            </fieldset>
                        </form>
                    </div>
                </section>
            </div>
                                                                                                
            <div class="span6" >
                <section class="widget">
                    <header>
                        <h4>
                            <i class="icon-file-alt"></i>
                            Invitados
                        </h4>
                    </header>
                    <div class="body">
                        <table id="participantes" class="table text-align-center" style="color: #ffffff;">
                            <thead>
                            <tr>
                                <th class="span2">Nombre</th>
                                <th class="span3">email</th>

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
                            <i class="icon-file-alt"></i>
                            Tabla de posiciones
                        </h4>
                    </header>
                    <div class="body">
                        <table id="tabla_posiciones" class="table text-align-center" style="color: #ffffff;">
                            <thead>
                            <tr>
                                <th class="span2">Puesto</th>
                                <th class="span3">Nombre</th>
                                <th class="span2">Puntos</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </section>
        </div>
        <?php if ($usu == "SI"){?>
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
                                                    
                                            <button id="btnapostar" name="btnapostar"class="btn btn-large btn-warning btn-block">Apostar</button>  
                                                                                                             
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                
                            </fieldset>                                
                        <br>
                    </div>
                </section>
            </div>
        </div>
                                             
            <?php }?>        
        <?php if ($usu == "NO"){?>
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
                                                    
                                                    <button id="btnacept" name="btnacept" class="btn btn-large btn-success btn-block">Aceptar</button>
                                                    
                                                                                                             
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                
                            </fieldset>                                
                        <br>
                    </div>
                </section>
            </div>
        </div>
        <?php }?> 

        <!--Fin de la pagina de contenido -->
        <div class="row-fluid">
                    <!--Inicio de Modal Agregar -->
                    <div id="myModalinvitar" class="modal hide fade" tabindex="-1" role="dialog">
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
                        <button class="btn btn-primary btn_add" id="btn_add">Enviar</button>
                    </div>
                </div>
                <!--Fin de Modal Agregar -->                                                        
                <!--Inicio de Modal Editar -->
                <div id="myModaleditar" class="modal hide fade" tabindex="-1" role="dialog">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 id="myModalLabel2">Editar Torneo</h4>
                    </div>
                    <div class="modal-body">
                        <div class="control-group controls-row">
                            <label class="control-label" for="descri_edit">Descripcion</label>
                            <div class="controls">
                                <input type="hidden" id="cod_edit">
                                <input type="text" id="descri_edit" class="span12" required/>
                            </div>
							<label class="control-label" for="vruc_edit">Costo</label>
                            <div class="controls">
                                <input type="text" id="vruc_edit" class="span12" required/>
                            </div>
							<label class="control-label" for="vdirec_edit">Fecha de incio</label>
                            <div class="controls">
                                <input type="text" id="vdirec_edit" class="span12" required/>
                            </div>
							<label class="control-label" for="vtel_edit">Liga</label>
                            <div class="controls">
                                <input type="text" id="vtel_edit" class="span12" required/>
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
                        <h4 id="myModalLabel2">Eliminar Empresa</h4>
                    </div>
                        <div class="modal-body">
                            Estas seguro de eliminar la empresa
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