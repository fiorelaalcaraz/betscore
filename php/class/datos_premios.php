<?php
require '../config/conexion.php';
require 'sesion.php';
$cn = new conexion();
$cn->conectar();


  $cod_torneo = $_GET["torneo"];


$sql = ('select * from premios where id_torneo = '.$cod_torneo.' order by 3;');

$query = pg_query($sql);
while ($value = pg_fetch_assoc($query)){

    $array[] = array('puesto' => $value["puesto"],'participante' => $value["ganador"],'premio' => $value["premio"]);
}
$data = array('data' => $array);
$json = json_encode($data);
print_r(utf8_encode($json));

?>