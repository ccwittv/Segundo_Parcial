<?php 
	require_once("clases/AccesoDatos.php");
	require_once("clases/ubicacion.php");
	require_once("clases/usuario.php");
	$arrayDeLocaciones=ubicacion::TraerTodasLasLocaciones();
    session_start();
 ?>
<script type="text/javascript">
$("#content").css("width", "900px");
</script>

<table class="table"  style=" background-color: beige;">
	<thead>
		<tr>
			<?php if (isset($_SESSION['registrado'])) echo '<th> Borrar </th>';?><th>Ver</th><th>Localidad</th><th>Calle</th><th>Número de casa</th><th>Usuario</th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDeLocaciones as $locacion) {
    $usuario=usuario::TraerUnUsuario($locacion->nombre_usuario);
    $coordenadas = explode(";",$locacion->coordenada);
    $ubicarmapa = '"'.$coordenadas[0]. '"'.',"'.$coordenadas[1]. '"'.',"'.$coordenadas[2].'"'.',"'.$locacion->id.'"';
	echo"<tr>";			
			  if (isset($_SESSION['registrado']))
			   {
					echo "<td><a onclick='BorrarLocacion($locacion->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>Borrar</a></td>"; 
			   }	
			echo "<td><a onclick='VerEnMapa($ubicarmapa)' class='btn btn-info'>Mapa</a></td>			
			<td>$coordenadas[0]</td>
			<td>$coordenadas[1]</td>
            <td>$coordenadas[2]</td>
            <td><img  class='fotoGrilla' style='width:70px;height:70px;' src='Fotos/".$usuario->foto."' /></td>                        
		</tr>   ";
}
		 ?>
	</tbody>
</table>
