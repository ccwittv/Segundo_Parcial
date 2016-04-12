<?php
class ubicacion
{
	public $id;
 	public $localidad;
  	public $calle;
  	public $nrocasa;
  	public $nombre_usuario;

  	public function GuardarLocacion()
  	 {
  	 	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
  	 	//$coordenada = '"'.$this->localidad.'"'.',"'.$this->calle.'"'.',"'.$this->nrocasa.'"';
  	 	$coordenada = $this->localidad.';'.$this->calle.';'.$this->nrocasa;
		$consulta =$objetoAccesoDato->RetornarConsulta("CALL InsertarLocacion(:pcoordenada,:pnombre_usuario)");
		$consulta->bindValue(':pcoordenada',$coordenada,PDO::PARAM_STR);
		$consulta->bindValue(':pnombre_usuario',$this->nombre_usuario,PDO::PARAM_STR);
		$consulta->execute();
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
  	 }

  	 public static function TraerTodasLasLocaciones() 
		{	
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		    $consulta =$objetoAccesoDato->RetornarConsulta("CALL DameLasLocaciones()");
			$consulta->execute();
			return $consulta->fetchAll(PDO::FETCH_CLASS, "ubicacion");							
		}

	public function BorrarLocacion()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL BorrarLocacion(:pid)");
			$consulta->bindValue(':pid',$this->id, PDO::PARAM_INT);		
			$consulta->execute();
			return $consulta->rowCount();
	 }	   	

}

?>    