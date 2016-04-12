<?php 
session_start();
$_SESSION['registrado']=null;
session_destroy();		
unset($_COOKIE['fechahoy']);
setcookie('fechahoy', null, -1, '/');
?>