<?php
require '../config/conexion.php';
require 'sesion.php';
$cn = new conexion();
$cn->conectar();
$button_editar = "<button data-toggle='modal' data-target='#myModaleditar' type='button' class='btn btn-warning editar' title='Editar'><i class='icon-pencil'></i></button>";
$button_borrar = "<button data-toggle='modal' data-target='#myModaleliminar' type='button' class='btn btn-danger eliminar' id='eliminar' name='eliminar' title='Eliminar'><i class='eicon-cancel'></i></button>";


  $cod_torneo = $_GET["torneo"];


$sql = ('select * 
          from sp_trae_part_invi('.$cod_torneo.') 
            as (id_torneo integer,  nombre character varying ,  email character varying);');

$query = pg_query($sql);
while ($value = pg_fetch_assoc($query)){
    $button = $button_editar."  ".$button_borrar;
    $array[] = array('nombre' => $value["nombre"],'email' => $value["email"],'acciones' => $button);
}
$data = array('data' => $array);
$json = json_encode($data);
print_r(utf8_encode($json));

?>