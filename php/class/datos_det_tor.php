<?php
require '../config/conexion.php';
require 'sesion.php';
$cn = new conexion();
$cn->conectar();

$cod_torneo = $_POST["torneo"];

$id_usu = $_POST["p_id_usu"];

$sql = ('select * 
          from sp_trae_torneo ('.$cod_torneo.','.$id_usu.') 
            as (des_tor character varying, 
                costo integer, 
                fec_ini date, 
                liga character varying, 
                creador text);');

$query = pg_query($sql);
while ($value = pg_fetch_assoc($query)){

    $array[] = array('des_tor' => $value["des_tor"],'costo' => $value["costo"],'fec_ini' => $value["fec_ini"],'liga' => $value["liga"],'creador' => $value["creador"]);
}
//$data = array('data' => $array);
$json = json_encode($array);
print_r(utf8_encode($json));

?>