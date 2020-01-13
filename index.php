<?php
require 'php/config/conexion.php';
require 'php/config/funciones.php';
require 'php/class/sesion.php';

if(!empty($_GET["l_id_torneo_"])){
    $cod_torneo =  $_GET["l_id_torneo_"]; 

}else{
    $cod_torneo = 0;  
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Betscore</title>
    <link href="assets/css/application.min.css" rel="stylesheet" />
    <link href="source/css/style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="assets/img/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta charset="utf-8" />
    <script src="assets/lib/jquery/jquery.1.9.0.min.js"> </script>
    <script src="assets/lib/backbone/underscore-min.js"></script>
    <script src="assets/js/settings.js"> </script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script data-ad-client="ca-pub-3029581055740792" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    </head>
<body>
<div class="single-widget-container">
    <section class="widget login-widget">
        <header class="text-align-center">
            <h3>BETSCORE</h3>
        </header>
        <div class="body">
            <form class="no-margin" action="php/class/acceso.php" method="post">
                <fieldset>
                    <center><?php echo msg_sesion();?></center>
                    <div class="control-group no-margin">
                        <label class="control-label" for="usu">Usuario</label>
                        <div class="control">
                            <div class="input-prepend input-padding-increased">
                                <span class="add-on">
                                    <i class="eicon-user icon-large"></i>
                                </span>
                                <input class="span3" id="usu_id_torneo" name="usu_id_torneo" type="hidden" value="<?php echo $cod_torneo; ?>"  />
                                <input class="span3" id="usu" name="usu" type="text" value=""  placeholder="Usuario" />
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
                </fieldset>
                <div class="form-actions">
                    <button type="submit" class="btn btn-block btn-large btn-success">
                        <span class="small-circle"><i class="icon-caret-right"></i></span>
                        <small>Ingresar</small>
                    </button>                    
                </div>
            </form>
        </div>
        <div class="row-fluid non-responsive" >
            <section>
                <br>   
                <fieldset>
                        <div class="row-fluid non-responsive">
                            <div class="span12">
                                <div class="control-group controls-row">                      
                                        <button id="btn_regis" name="btn_regis" class="btn btn-block btn-large btn-primary" onclick="ir_regis();">Registrarme</button>                                                                                                
                                </div>  
                            </div>
                        </div>
                </fieldset>                                
                    <br>
            </section>
        </div>        
</div>
    </section>
</div>
<script>
    function ir_regis(){
        var l_id_torneo_ = $("#usu_id_torneo").val();
        
        location.href = "php/core/reg_usu/reg_usu.php?l_id_torneo_=" +l_id_torneo_;
    }
</script>
</body>
</html>
