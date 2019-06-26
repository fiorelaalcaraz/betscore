<?php
require '../../config/conexion.php';
require '../../class/sesion.php';
$cn = new conexion();
$cn->conectar();
$button_editar = "<button data-toggle='modal' data-target='#myModaleditar' type='button' class='btn btn-success editar' title='Editar'><i class='icon-pencil'></i></button>";
$button_borrar = "<button data-toggle='modal' data-target='#myModaleliminar' type='button' class='btn btn-danger eliminar' id='eliminar' name='eliminar' title='Eliminar'><i class='eicon-cancel'></i></button>";
$usu = $_SESSION["id"];

$sql = ('select * 
           from torneos tor, participaciones part, ligas lig
          where tor.id_torneo = part.id_torneo
            and tor.id_liga = lig.id_liga
            and part.id_rol = 1
            and part.id_usuario = '.$usu.' order by tor.id_torneo');

$query = pg_query($sql);
while ($value = pg_fetch_assoc($query)){
    $button = $button_editar."  ".$button_borrar;
    $array[] = array('codigo' => $value["id_torneo"],'descripcion' => $value["nombre_tor"],'costo' => $value["costo_tor"],'fec_ini' => $value["fec_ini_tor"],'id_liga' => $value["descrip_liga"], 'acciones' => $button);
}
$data = array('data' => $array);
$json = json_encode($data);
print_r(utf8_encode($json));
?>