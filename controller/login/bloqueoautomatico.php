<?php 
include '../../config/conexion.php';
$user = $_SESSION['correo'];
$up=$sql="UPDATE usuario SET bloqueo=0 WHERE correo='$user'";
return ejecutarConsulta($sql);
if($up){
$_SESSION =array();
session_destroy();
header('../../');
}
?>