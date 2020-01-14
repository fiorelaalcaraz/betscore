
<?php
require "../config/conexion.php";
require '../config/funciones.php';
require 'sesion.php';

    $nom = isset($_POST["nom"])?$_POST["nom"]:"";
    $apel = isset($_POST["ape"])?$_POST["ape"]:"";
    $usu = isset($_POST["usu"])?$_POST["usu"]:"";
    $correo = isset($_POST["correo"])?$_POST["correo"]:"";
    $pass = isset($_POST["pass"])?$_POST["pass"]:"";
    $pass2 = isset($_POST["pass2"])?$_POST["pass2"]:"";
    $l_id_torneo = isset($_POST["id_torneo_"])?$_POST["id_torneo_"]:"";

    if ($l_id_torneo > 0) {
        $ope = 'insert_acept';
    }else{
        $ope = 'insercion';
    }

    if(empty($usu) || empty($pass) || empty($correo)||  empty($pass2) || empty($nom) || empty($apel)){
        msg_sesion("Todos los campos son necesarios");
        llevame_a("../core/reg_usu/reg_usu.php");
    }

    if($pass !== $pass2){
        msg_sesion("Las contraseñas no son iguales");
        llevame_a("../core/reg_usu/reg_usu.php");
    }

   $con= new conexion();
   $con->conectar();

   $sql = pg_query("select sp_reg_usu(0,'$nom','$apel','$correo','$usu','$pass',$l_id_torneo,'$ope')");
   $noticia = pg_last_notice($con->url);
   //echo str_replace("NOTICE: ","",$noticia);
   
   if ($noticia == "Tu usuario ha sido registrado."){

   $sql1="select * from usuarios where usuario=upper('$usu')";
   $num = $con->contar($sql1);
   echo $num;
   }

   if($num == 1){
        $res = $con->select_array($sql1);
        if($res["pass"]==md5($pass)){
            $_SESSION["email"] = $usu;
            $_SESSION["pass"] = $pass;
            $_SESSION["id"] = $res["id_usuario"];
            $_SESSION["usu"] = $res["usuario"];
            $_SESSION["nombre"] = $res["nombre"];
            $_SESSION["apell"] = $res["apellido"];
           
            msg_sesion("Ha iniciado sesion");
         
            llevame_a("../core/inicio.php");
        }else{
            msg_sesion("Ha ocurrido un error, vuelva intentar");
           llevame_a("../../index.php");
        }
   }else{
       
       msg_sesion("$noticia");
       llevame_a("../core/reg_usu/reg_usu.php");
   }
 ?>
