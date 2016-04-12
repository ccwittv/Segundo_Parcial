<?php 
session_start();
$usuario=$_POST['usuario'];
$recordar=$_POST['recordarme'];	

if ((strtolower($usuario) == 'jose') or (strtolower($usuario) == 'maria')) 
		{
	      if($recordar=="true")
			{
				setcookie("registro",$usuario,  time()+36000 , '/');		
			}
	      $_SESSION['registrado']=$usuario;
	      setcookie("fechahoy",date("d/m/y-h:m:s"),time()+36000,'/');		
		  $retorno="ingreso";      		
		}

echo $retorno;
?>