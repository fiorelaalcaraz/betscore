
<?php
require "../config/conexion.php";
require '../config/funciones.php';
require 'sesion.php';

    $usu = isset($_POST["usu"])?$_POST["usu"]:"";
    $pass = isset($_POST["pass"])?$_POST["pass"]:"";


    if(empty($usu) || empty($pass)){
        msg_sesion("Todos los campos son necesarios");
        llevame_a("../../index.php");
    }

   $con= new conexion();
   $con->conectar();
   $sql="select * from usuarios where usuario='$usu'";
    $num = $con->contar($sql);



   if($num == 1){
        $res = $con->select_array($sql);
        if($res["pass"]==$pass){
            $_SESSION["email"] = $usu;
            $_SESSION["pass"] = $pass;
            $_SESSION["id"] = $res["id_usuario"];
            $_SESSION["usu"] = $res["id_usuario"];
            $_SESSION["nombre"] = $res["nombre"];
            $_SESSION["apell"] = $res["apellido"];
           
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
