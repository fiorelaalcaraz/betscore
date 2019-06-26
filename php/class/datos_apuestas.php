<?php
require '../config/conexion.php';
require 'sesion.php';
$cn = new conexion();
$cn->conectar();

$button_disable = "<button type='button' title='apostado' class='btn btn-danger' disabled='disabled'><i class='icon-stop'></i></button>";
$usu = $_SESSION["id"];
$cod_torneo = $_GET["torneo"];
$round = '5';


$sql = ('select fix.id_partido, 
                id_equipo_local,
                (select nombre_equipo from equipos eq where eq.id_api_equipo  = fix.id_equipo_local) as equipo_local,
                id_equipo_visitante,
                (select nombre_equipo from equipos eq where eq.id_api_equipo  = fix.id_equipo_visitante) as equipo_visi,
                fec_partido,
                hora,
                (select prediccion from predicciones pre where pre.id_partido = fix.id_partido and pre.id_usuario = '.$usu.' and pre.id_torneo = '.$cod_torneo.' ) as apuesta,
				(select id_torneo from predicciones pre where pre.id_partido = fix.id_partido and pre.id_usuario = '.$usu.' and pre.id_torneo = '.$cod_torneo.') as id_torneo
                from fixtures fix where fix.jornada = '.$round.' order by fix.id_partido;');

$query = pg_query($sql);

while ($value = pg_fetch_assoc($query)){

    if ($value['apuesta'] == null || $value['id_torneo'] != $cod_torneo){

        $button_local = "<button data-toggle='modal' data-target='#myModalapuesta' type='button' class='btn btn-success local' id='local' name='local' title='local'><i class='icon-ok'></i></button>";
        $button_visi = "<button data-toggle='modal' data-target='#myModalapuesta' type='button' class='btn btn-success visi' id='visi' name='visi' title='visi'><i class='icon-ok'></i></button>";
        $button_emp = "<button data-toggle='modal' data-target='#myModalapuesta' type='button' class='btn btn-danger empate' id='empate' name='empate' title='empate'><i class='eicon-switch'></i></button>";
    
    }else{
        $button_local = "<button data-toggle='modal' data-target='#myModalapuesta' type='button' disabled='disabled' class='btn btn-success local' id='local' name='local' title='partido apostado'><i class='icon-ok'></i></button>";
        $button_visi = "<button data-toggle='modal' data-target='#myModalapuesta' type='button' disabled='disabled' class='btn btn-success visi' id='visi' name='visi' title='partido apostado'><i class='icon-ok'></i></button>";
        $button_emp = "<button data-toggle='modal' data-target='#myModalapuesta' type='button' disabled='disabled' class='btn btn-danger empate' id='empate' name='empate' title='partido apostado'><i class='eicon-switch'></i></button>";
    
    }
    
    $button = $button_local."  ".$button_emp."  ".$button_visi;       
    $img_local = "<img src='/betscore/source/img/".$value['id_equipo_local'].".png' width='35px' alt=''>";
    $img_visi = "<img src='/betscore/source/img/".$value['id_equipo_visitante'].".png' width='35px' alt=''>";

    $array[] = array('id_partido' => $value["id_partido"],'id_equipo_local' => $value["id_equipo_local"],'img_local' => $img_local,
    'equipo_local' => $value["equipo_local"],'id_equipo_visi' => $value["id_equipo_visitante"],'img_visi' => $img_visi,
    'equipo_visi' => $value["equipo_visi"],'fec_partido' => $value["fec_partido"],'hora' => $value["hora"], 'acciones' => $button);
}
$data = array('data' => $array);
$json = json_encode($data);
print_r(utf8_encode($json));
?>