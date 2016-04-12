function validarLogin()
{
		var usuario=$("#usuario").val();
		var recordar=$("#recordarme").is(':checked');

	//$("#sidebar").html("<img src='imagenes/ajax-loader.gif' style='width: 30px;'/>");
	//$("#galletita").html("<?php  if (isset($_COOKIE['fechahoy'])) echo $_COOKIE['fechahoy']; ?>");
	
	var funcionAjax=$.ajax({
		url:"php/validarUsuario.php",
		type:"post",
		data:{
			usuario:usuario,
			recordarme:recordar,
		}
	});
	
	funcionAjax.done(function(retorno){
			//alert(retorno);
			if(retorno.trim()=="ingreso")
			{					
				Mostrar('Login');												
			}
        	else
        	{
				Mostrar('Login');
        	}        	
	});
	funcionAjax.fail(function(retorno){
		alert(retorno);
//		$("#botonesABM").html(":(");
//		$("#sidebar").html(retorno.responseText);	
	});
	
}
function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogearUsuario.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
			//MostarBotones();
			Mostrar('Login');
	});	
}
