<?php
    require "../config/conexion.php";
    require '../config/funciones.php';
    require 'sesion.php';
    $con = new conexion();
    $con->conectar();
    $usu_cod = $_SESSION["id"];
    $con->query("UPDATE usuarios SET estado_web = 'OFFLINE' WHERE cod_usuario = $usu_cod;");
    $_SESSION=array();
    session_destroy();
    llevame_a("../../index.php");
?>