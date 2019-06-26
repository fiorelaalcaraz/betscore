<?php
require "../../config/funciones.php";
require "../../class/sesion.php";
verifico();
$fecha = date("d-m-Y");

$data = file_get_contents('datos.php');

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
       
        <!--Inicio de la pagina contenido -->
        <div class="row-fluid">
            <div class="span5">
                <section class="widget" type="hidden">
                    <header>
                        <h4>
                            <i class="icon-align-left"></i>
                            Actualizar datos
                        </h4>
                    </header>
                    <div class="body">
                        <form class="form" method="post">
                            <fieldset>
                                <div class="well">
                                  <p>Actualizar tabla fixture</p>  
                                  <input id = "data" name = "data" type="hidden" value="<?php echo ($data) ?>">
                                </div>
                                <div>
                                    <button id="btnactu" name="btnactu" class="btn btn-primary span12">Actualizar</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </section>
            </div>
          
        <!--Fin de la pagina de contenido -->
       
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