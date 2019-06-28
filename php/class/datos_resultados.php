<?php
require '../config/conexion.php';
require 'sesion.php';
$cn = new conexion();
$cn->conectar();



$sql = ("select fix.id_partido, 
                id_equipo_local,
                (select nombre_equipo from equipos eq where eq.id_api_equipo  = fix.id_equipo_local) as equipo_local,
                id_equipo_visitante,
                (select nombre_equipo from equipos eq where eq.id_api_equipo  = fix.id_equipo_visitante) as equipo_visi,
                fec_partido,
                hora,
                goles_local||' - '||goles_visi as resultado
                from fixtures fix where fix.jornada = 22 order by fix.id_partido;");

$query = pg_query($sql);

while ($value = pg_fetch_assoc($query)){
    
    $img_local = "<img src='/source/img/".$value['id_equipo_local'].".png' width='35px' alt=''>";
    $img_visi = "<img src='/source/img/".$value['id_equipo_visitante'].".png' width='35px' alt=''>";

    $array[] = array('id_partido' => $value["id_partido"],'id_equipo_local' => $value["id_equipo_local"],'img_local' => $img_local,
    'equipo_local' => $value["equipo_local"],'id_equipo_visi' => $value["id_equipo_visitante"],'img_visi' => $img_visi,
    'equipo_visi' => $value["equipo_visi"],'fec_partido' => $value["fec_partido"],'hora' => $value["hora"], 'resultados' => $value["resultado"]);
}
$data = array('data' => $array);
$json = json_encode($data);
print_r(utf8_encode($json));
?>