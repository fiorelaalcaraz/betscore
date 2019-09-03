<?php
require '../config/conexion.php';
require 'sesion.php';
$cn = new conexion();
$cn->conectar();

$jor = $_REQUEST["jornada"];

$jornada = substr($jor,8,1);

$sql = ("select 
                (select nombre_equipo from equipos eq where eq.id_api_equipo  = fix.id_equipo_local) as equipo_local,
                (select nombre_equipo from equipos eq where eq.id_api_equipo  = fix.id_equipo_visitante) as equipo_visi,
                goles_local||' - '||goles_visi as resultado
                from fixtures fix where fix.jornada = $jornada and id_partido > 190000 order by fix.id_partido;");

$query = pg_query($sql);

while ($value = pg_fetch_assoc($query)){
    
    $img_local = "<img src='/source/img/".$value['id_equipo_local'].".png' width='35px' alt=''>";
    $img_visi = "<img src='/source/img/".$value['id_equipo_visitante'].".png' width='35px' alt=''>";

    $array[] = array(
    'equipo_local' => $value["equipo_local"],
    'equipo_visi' => $value["equipo_visi"], 
    'resultados' => $value["resultado"]);
}
//$data = array('data' => $array);
$json = json_encode($array);
print_r(utf8_encode($json));
?>