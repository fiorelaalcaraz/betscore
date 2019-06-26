<?php 
require "../../config/funciones.php";
require "../../class/sesion.php";
require "../../config/conexion.php";

if(!empty($_GET["l_id_torneo_"])){
    $l_id_torneo = $_GET["l_id_torneo_"];
    }else{
    $l_id_torneo = 0;
}
echo $l_id_torneo;
$fecha = date("d-m-Y");
?>
<html>
<head>
    <title>Registro de Usuario</title>
    <link href="../../../assets/css/application.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../../../assets/img/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Ejemplo" />
    <meta name="author" content="Fiorela Alcaraz fiorellalcaraz@gmail.com" />
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body class="background-dark">
<!-- Inicio del body -->
<div class="single-widget-container">
    <section class="widget login-widget">
        <header class="text-align-center">
            <h3>BETSCORE</h3>
        </header>
        <div class="body">
            <form class="no-margin" action="../../class/registro.php" method="post">
                <fieldset>
                <center><?php echo msg_sesion();?></center>
                    <div class="control-group no-margin">
                        <label class="control-label" for="usu">Nombres</label>
                        <div class="control">
                            <div class="input-prepend input-padding-increased">
                                <span class="add-on">
                                    <i class="eicon-user icon-large"></i>
                                </span>
                                <input type="hidden" id="id_torneo_" name= "id_torneo_" value = "<?php echo $l_id_torneo ?>">
                                <input class="span3" id="nom" name="nom" type="text" value=""  placeholder="Nombres" />
                            </div>
                        </div>
                    </div>
                    <div class="control-group no-margin">
                        <label class="control-label" for="usu">Apellidos</label>
                        <div class="control">
                            <div class="input-prepend input-padding-increased">
                                <span class="add-on">
                                    <i class="eicon-user icon-large"></i>
                                </span>
                                <input class="span3" id="ape" name="ape" type="text" value=""  placeholder="Apellidos" />
                            </div>
                        </div>
                    </div>
                    <div class="control-group no-margin">
                        <label class="control-label" for="usu">Usuario</label>
                        <div class="control">
                            <div class="input-prepend input-padding-increased">
                                <span class="add-on">
                                    <i class="eicon-user icon-large"></i>
                                </span>
                                <input class="span3" id="usu" name="usu" type="text" value=""  placeholder="Usuario" />
                            </div>
                        </div>
                    </div>
                    <div class="control-group no-margin">
                        <label class="control-label" for="usu">Correo</label>
                        <div class="control">
                            <div class="input-prepend input-padding-increased">
                                <span class="add-on">
                                    <i class="eicon-mail icon-large"></i>
                                </span>
                                <input class="span3" id="correo" name="correo" type="email" value=""  placeholder="Correo" />
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="password">Contraseña</label>
                        <div class="control">
                            <div class="input-prepend input-padding-increased">
                                <span class="add-on">
                                    <i class="icon-lock icon-large"></i>
                                </span>
                                <input class="span3" id="pass" name="pass" type="password" placeholder="Contraseña" />
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="password">Repetir contraseña</label>
                        <div class="control">
                            <div class="input-prepend input-padding-increased">
                                <span class="add-on">
                                    <i class="icon-lock icon-large"></i>
                                </span>
                                <input class="span3" id="pass2" name="pass2" type="password" placeholder="Contraseña" />
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-actions">
                    <button type="submit" class="btn btn-block btn-large btn-success">
                        <span class="small-circle"><i class="icon-caret-right"></i></span>
                        <small>Ingresar</small>
                    </button>
                </div>
            </form>
        </div>
    </section>
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
    $('#refe').addClass('active');
    $('#name').addClass('active');
    $('#components-collapse').addClass('in');

</script>
</body>
</html>