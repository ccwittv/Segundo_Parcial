<?php
class usuario
  { 
   	 public $id;
     public $nombre;
     public $foto;

	public function GuardarUsuario($id,$nombre,$foto)
	 {

	 	if($id>0)
	 		{
	 			$this->ModificarUsuario($id,$nombre,$foto);
	 		}else {
	 			$this->InsertarUsuario($nombre,$foto);
	 		}

	 }

	public function ModificarUsuario($id,$nombre,$foto)
	 {

			/*$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE producto set nombre = :pnombre, descripcion = :pdescripcion, preciounitario = :ppreciounitario, foto = :pfoto 
															WHERE id = :pid");
			$consulta->bindValue(':pid',$id,PDO::PARAM_INT);
			$consulta->bindValue(':pnombre',$nombre,PDO::PARAM_STR);
			$consulta->bindValue(':pdescripcion',$descripcion,PDO::PARAM_STR);
			$consulta->bindValue(':ppreciounitario',$preciounitario,PDO::PARAM_STR);
			$consulta->bindValue(':pfoto',$foto,PDO::PARAM_STR);
			return $consulta->execute();*/
	 }
	
  
	 public function InsertarUsuario($nombre,$foto)
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario (nombre,foto) values (:pnombre,:pfoto)");
				$consulta->bindValue(':pnombre',$nombre,PDO::PARAM_STR);
				$consulta->bindValue(':pfoto',$foto,PDO::PARAM_STR);
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();			
	 }

	 public static function TraerUnUsuario($nombre)
	  {
	  	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario where nombre = :pnombre");
		$consulta->bindValue(':pnombre',$nombre, PDO::PARAM_INT);
		$consulta->execute();			
		$productoBuscado= $consulta->fetchObject('usuario');
		return $productoBuscado;	
	  }

  }

?>  