<?php
require '../../config/conexion.php';
require '../../class/sesion.php';
$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
$fec_ini = $_POST["fec_ini"];
$fec_fin = date("Y-m-d");
$liga = $_POST["liga"];
$costo = $_POST["costo"];
$obs = $_POST["obs"];
$ope = $_POST["ope"];
$primero = $_POST["pri"];
$segundo = $_POST["seg"];
$tercero = $_POST["ter"];
$cuarto = $_POST["cuar"];
$usu = $_SESSION["id"];
$con = new conexion();
$con->conectar();
$sql = pg_query("select sp_torneos($codigo,'$nombre',$costo,'$fec_ini','$fec_fin',$liga,'$obs',$primero,$segundo,$tercero,$cuarto,$usu,'$ope')");
$noticia = pg_last_notice($con->url);
echo str_replace("NOTICE: ","",$noticia);
?>