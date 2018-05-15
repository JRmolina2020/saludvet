<?php 
if($_SESSION['nivel'] != 'ADMIN'){
header("location:../controller/login/bloqueoautomatico.php");
}
?>