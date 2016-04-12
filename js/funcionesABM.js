
function GuardarLocacion()
{
        var id = $("#id").val()
		var localidad = $("#localidad").val();
		var calle = $("#calle").val();
        var nrocasa = $("#nrocasa").val();        	
		var funcionAjax = $.ajax({
		url:"nexo.php",
		type:"POST",
		data:{
			queHacer:"GuardarLocacion",
			id:id,
			localidad:localidad,
            calle:calle,
            nrocasa:nrocasa,			
		}
	});
	funcionAjax.done(function(retorno){
		alert(retorno);
		//	deslogear();
		$("#informe").html("cantidad de agregados "+ retorno);	
		Mostrar('GrillaLocacion');
		
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);
		$("#informe").html(retorno.responseText);	
	});	
}

function BorrarLocacion($id)
 {
 	var id = $id;
 	var funcionAjax = $.ajax({
 		url:"nexo.php",
		type:"POST",
		data:{
			queHacer:"BorrarLocacion",
			id:id,
		}
	});
	funcionAjax.done(function(retorno){
		//alert(retorno);
		//	deslogear();
		$("#informe").html("cantidad de agregados "+ retorno);
		Mostrar('GrillaLocacion');		
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);
		$("#informe").html(retorno.responseText);	
	});	

 }
 function GuardarUsuario()
{
        var id = $("#id").val()
		var nombre=$("#nombre").val();
        var foto=$("#imagen").attr('src');  

        var files = $("#fichero").get(0).files;
        if (files[0] != null)
        	{
        		foto = files[0].name;
        		var accionFoto = 'nueva';
            }
        else
            {
            	foto = foto.replace("Fotos/", "");
            	if (foto == "")
            	 {
            		var accionFoto = 'noesta';		
            	 }
            	else
            	 {
            	 	var accionFoto = 'existe';
            	 } 	
            }    	

		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"POST",
		data:{
				queHacer:"GuardarUsuario",
				id:id,
				nombre:nombre,
	            foto:foto,
	            queHacerConLaFoto:accionFoto,
			 }
	});
	funcionAjax.done(function(retorno){			
		//alert(retorno);
		Mostrar("GrillaLocacion");						
	});
	funcionAjax.fail(function(retorno){	
		alert(retorno);		
	});	
	funcionAjax.always(function(retorno){	
		//alert(retorno);		
	});	
}
