
<?php
require "../config/conexion.php";
require '../config/funciones.php';
require 'sesion.php';

    $usu = isset($_POST["usu"])?$_POST["usu"]:"";
    $pass = isset($_POST["pass"])?$_POST["pass"]:"";
    $usu_id_torneo = isset($_POST["usu_id_torneo"])?$_POST["usu_id_torneo"]:"";

    //VERIFICA CAMPOS VACIOS
    if(empty($usu) || empty($pass)){
        msg_sesion("Todos los campos son necesarios");
        llevame_a("../../index.php");
    }

   $con= new conexion();
   $con->conectar();
   $sql="select * from usuarios where usuario='$usu'";
   $num = $con->contar($sql);


   //VERIFICA SI EXISTE EL USUARIO
   if($num == 1){
        $res = $con->select_array($sql);
        //COMPARA CONTRASENA
        if($res["pass"]==$pass){
            //CARGA VARIABLES DE SESSION
            $_SESSION["email"] = $usu;
            $_SESSION["pass"] = $pass;
            $_SESSION["id"] = $res["id_usuario"];
            $_SESSION["usu"] = $res["usuario"];
            $_SESSION["nombre"] = $res["nombre"];
            $_SESSION["apell"] = $res["apellido"];
            $_SESSION["email"] = $res["email"];
           
            if($usu_id_torneo > 0){
                
                $con= new conexion();
                $con->conectar();
                $sql1= "select id_invitacion 
			            from invitaciones 
			           where email_invi ='".$_SESSION['email']."' 
                        and id_torneo = $usu_id_torneo";

                $query = pg_query($sql1);
                $invitado = pg_fetch_assoc($query);
                
                if ($invitado > 0) {
                    $update= pg_query("update invitaciones set estado = 'A'
                              where id_invitacion = $invitado
                                and id_torneo = $usu_id_torneo");

                    $insert = pg_query("insert into participaciones values (".$_SESSION['id'].",$usu_id_torneo,2,0);");																
                }
                $noticia = pg_last_notice($con->url);
                echo str_replace("NOTICE: ","",$noticia);
            }
           
            msg_sesion("Ha iniciado sesion");
         
            llevame_a("../core/inicio.php");
        }else{
            msg_sesion("Contraseña incorrecta");
            llevame_a("../../index.php");
        }
   }else{
       msg_sesion("Nombre de usuario inexistente");
       llevame_a("../../index.php");
   }
 ?>
