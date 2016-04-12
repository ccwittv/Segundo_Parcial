//function VerEnMapa(prov, dire, loc, id)
function VerEnMapa(localidad,calle,nrocasa,id)
{
    //alert(prov + dire +  loc);
    var prov = 'Buenos Aires';    
    var punto = nrocasa + ", " + calle + ", " +  localidad  +", " +  prov +", Argentina";
    console.log(punto);
    var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"VerEnMapa"
		}
	});
    funcionAjax.done(function(retorno){
    	//alert(retorno);
		$("#principal").html(retorno);
        $("#punto").val(punto);
        $("#id").val(id);
	Geolocalizacion.Marcador.iniciar();
	Geolocalizacion.Marcador.verMarcador();	
	});
}
