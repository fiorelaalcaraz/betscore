<?php
require '../../config/conexion.php';
$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
$fec_ini = $_POST["fec_ini"];
$fec_fin = "";
$liga = $_POST["liga"];
$costo = $_POST["costo"];
$obs = $_POST["obs"];
$primero = $_POST["primero"];
$segundo = $_POST["segundo"];
$tercero = $_POST["tercero"];
$cuarto = $_POST["cuarto"];
$con = new conexion();
$con->conectar();
$sql = pg_query("select sp_torneos(".$codigo.",'".$nombre."','".$fec_ini."','".$fec_fin."','".$liga."','".$costo."','".$obs."','".$ope."')");
$noticia = pg_last_notice($con->url);
echo str_replace("NOTICE: ","",$noticia);
?>