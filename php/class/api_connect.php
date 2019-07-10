<?php
// Disables SSL cert validation temporary
require '../../config/conexion.php';
require_once '../../../vendor/mashape/unirest-php/src/Unirest.php';
Unirest\Request::verifyPeer(false);
$headers = array('Accept' => 'aplication/json');

$response = Unirest\Request::get("https://api-football-v1.p.rapidapi.com/fixtures/league/714",
  array(
    "X-RapidAPI-Host" => "api-football-v1.p.rapidapi.com",
    "X-RapidAPI-Key" => "a48ab96a53msh2870b047f08e368p10a062jsn9fb04936b958"
  )
);

$jason = $response->raw_body; 

$array = json_decode($jason, true);
                                  

$jornada = $array['api']['fixtures']; 

$con = new conexion();
$con->conectar();

foreach($jornada as $stat => $value) {
 
  $partidos = $jornada[$stat];
  $array_par[] = $partidos;   

}

foreach($array_par as $row){
  $id_fixture = $row['fixture_id'];
  $round = $row['round'];
  $id_equipo_local = $row['homeTeam_id'];
  $id_equipo_visi = $row['awayTeam_id'];
  $goles_local = $row['goalsHomeTeam'];
  $goles_visi = $row['goalsAwayTeam'];
  $fec_partido = $row['event_date'];


  $fec = substr($fec_partido,0,10);
  $hor = substr($fec_partido,11,5);
  $jor = substr($round,17,17);

 // $data = '{'.$id_fixture.'}'.'{'.$round.'}'.'{'.$id_equipo_local.'}'.'{'.$id_equipo_visi.'}'.'{'.$goles_local.'}'.'{'.$goles_visi.'}'.'{'.$fec_partido.'}'.'<br/>';

$sql = pg_query("insert into fixtures values ($id_fixture,'',$id_equipo_local,$id_equipo_visi,'1',$goles_local,$goles_visi,'$fec',$jor,'$hor'); ");
$noticia = pg_last_notice($con->url);
echo str_replace("NOTICE: ","",$noticia);

}

  



/*$data = array('data' => $array_par);
$json = json_encode($data);
print_r(utf8_encode($json));*/

?>
