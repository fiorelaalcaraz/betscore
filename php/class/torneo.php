<?php
require_once "../../config/conexion.php";
require_once "../../class/sesion.php";


class Torneo{

    public $id_torneo;
    public $nombre_tor;
    public $costo_tor;
    public $fec_ini_tor;
    public $fec_fin_tor;
    public $id_liga;
    public $obs;
    public $primero ;
    public $segundo;
    public $tercero;
    public $cuarto;

    const TABLA = 'torneos';

    public function __construct($nombre, $costo, $fec_ini, $id_liga, $obs,
    $primero, $segundo, $tercero, $cuarto,$id=null) {
        $this->id_torneo = $id;
        $this->nombre_tor = $nombre;
        $this->costo_tor = $costo;
        $this->fec_ini_tor = $fec_ini;
        $this->id_liga = $id_liga;
        $this->obs = $obs;
        $this->primero = $primero;
        $this->segundo = $segundo;
        $this->tercero = $tercero;
        $this->cuarto = $cuarto;

    }

 
      
    public function guardar_torneo(){
        echo $this->nombre_tor;
        
        if($this->id_torneo) /*Modifica*/ {
           $usu = 2;//$_SESSION["id"]; 
           $consulta = pg_query("select sp_torneos($id_torneo,'$nombre_tor',$costo_tor,'$fec_ini_tor',
           '$fec_fin_tor',$id_liga,'$obs',
           $primero,$segundo,$tercero,$cuarto,$usu,'modificacion')");
           
           
        }else /*Inserta*/ {
            $conexion = new Conexion();
            $usu = 2;//$_SESSION["id"]; 
            $consulta = pg_query("select sp_torneos(0,".$this->nombre_tor.",".$this->costo_tor.",".$this->fec_ini_tor.",".$this->fec_fin_tor.",".$this->id_liga.",".$this->obs.",".$this->primero.",".$this->segundo.",".$this->tercero.",".$this->cuarto.",$usu,'insercion')");
            $noticia = pg_last_notice($conexion->url);
            return str_replace("NOTICE: ","",$noticia);
        }
        $conexion = null;
     }

     public static function buscar_id($id_torneo){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE id_torneo = :id_torneo');
        $consulta->bindParam(':id_torneo', $id_torneo);
        $consulta->execute();
        $registro = $consulta->fetch();
        if($registro){
           return new self($registro['nombre_tor'], $registro['costo_tor'],$registro['fec_ini_tor'],$registro['fec_fin_tor'],
           $registro['id_liga'],$registro['observaciones'], $id);
        }else{
           return false;
        }
     }


    public static function list_torneos(){
        $con = new conexion();
        $con ->conectar();
        $usu = $_SESSION["id"]; 
        $consulta = pg_query('select *
                                from torneos tor, participaciones part, ligas lig
                            where tor.id_torneo = part.id_torneo
                                and tor.id_liga = lig.id_liga
                                and part.id_rol = 1
                                and part.id_usuario = '.$usu.' order by tor.id_torneo');
        
      
            while ($value = pg_fetch_assoc($consulta)){
                $array[] = array('id_torneo' => $value["id_torneo"],'nombre_tor' => $value["nombre_tor"],
                'costo_tor' => $value["costo_tor"],'fec_ini_tor' => $value["fec_ini_tor"],'descrip_liga' => $value["descrip_liga"]);
            }
            return $array;
            
      
     }








    function get_torneo($cod_torneo){

    $con = new conexion();
    $con->conectar();
    $det_tor = pg_query('select * 
        from sp_trae_torneo ('.$cod_torneo.') 
            as (des_tor character varying, 
                costo integer, 
                fec_ini date, 
                liga character varying, 
                creador text);');
    $l_det_tor = pg_fetch_assoc($det_tor);
    return $l_det_tor;
    $con->destruir();
    }


    function get_list_torneo(){
    $con = new conexion();
    $con ->conectar();
    $torneo = pg_query("select part.id_torneo, tor.nombre_tor 
            from participaciones part, torneos tor
            where part.id_torneo = tor.id_torneo 
                and part.id_usuario = ".$_SESSION['id']." order by 1;");
    while ($torn = pg_fetch_assoc($torneo)){
    echo "<option value='".$torn["id_torneo"]."'>".$torn["nombre_tor"]."</option>";
    }
    $con->destruir();
    }

}
?>    