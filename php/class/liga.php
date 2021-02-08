<?php
require_once "/php/config/conexion.php";
//require "../../class/sesion.php";

class Liga{

    public $id_liga;
    public $descrip_liga;
    public $id_api_liga;
   

    const TABLA = 'ligas';

    public function __construct($id=null, $descrip, $id_api ) {
        $this->id_liga = $id;
        $this->descrip_liga = $descrip;
        $this->id_api_liga = $id_api;
        
     }
     
    // obtener ligas
    public function get_ligas(){
        $con = new conexion();
        $con ->conectar();
        $liga = pg_query("select * from ligas order by 1;");
        while ($lig = pg_fetch_assoc($liga)){
        echo "<option value='".$lig["id_liga"]."'>".$lig["descrip_liga"]."</option>";
        }
        $con->destruir();
        }
}
?>  