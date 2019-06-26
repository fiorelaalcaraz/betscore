<?php 
require '../config/conexion.php';
require '../class/sesion.php';
$id_partido = $_POST["id_partido"];
$eleccion = $_POST["eleccion"];
$cod_torneo = $_POST["cod_torneo"];
$usu = $_SESSION["id"];

$fec_fin = date("Y-m-d");

$con = new conexion();
$con->conectar();
$sql = pg_query("select sp_apuestas($usu, $cod_torneo, $id_partido,'$eleccion')");
$noticia = pg_last_notice($con->url);
echo str_replace("NOTICE: ","",$noticia);

?>