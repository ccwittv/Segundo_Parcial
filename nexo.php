<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/ubicacion.php");
require_once("clases/usuario.php");
$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'Login':
		include("partes/formLogin.php");
		break;
	case 'CargarLocacion':
		include("partes/formLocacion.php");
		break;
	case 'GrillaLocacion':
		include("partes/formGrilla.php");
		break;	
	case 'GuardarLocacion':
            session_start();
			$ubicacion = new ubicacion();
			$ubicacion->id=$_POST['id'];			
			$ubicacion->localidad=$_POST['localidad'];
			$ubicacion->calle=$_POST['calle'];
            $ubicacion->nrocasa=$_POST['nrocasa'];    
            $ubicacion->nombre_usuario=$_SESSION['registrado'];            			
			$cantidad=$ubicacion->GuardarLocacion();
			echo $cantidad;
			var_dump($_SESSION);
		break;
	case 'CargarLocacion':
		include("partes/formLocacion.php");
		break;	
	case 'BorrarLocacion':
            session_start();
			$ubicacion = new ubicacion();
			$ubicacion->id=$_POST['id'];						
			$cantidad=$ubicacion->BorrarLocacion();
			echo $cantidad;
		break;	
	case 'CargarFotos':
		include("partes/formFotos.php");
		break;
	case 'GuardarUsuario':
		session_start();
		$usuario = new usuario();
		$usuario->id=$_POST['id'];
		$usuario->nombre=$_POST['nombre'];
        $foto = $_POST['foto'];
        $queHagoConLaFoto = $_POST['queHacerConLaFoto']; 
		
		if ($queHagoConLaFoto == 'nueva')
		  {        
			$ruta=getcwd();  //ruta directorio actual
	        $rutaDestino=$ruta."/Fotos/";
	    	//$NOMEXT=explode(".", $_FILES['fichero0']['name']);
	    	$NOMEXT=explode(".", $foto);
	        $EXT=end($NOMEXT);
	        $nomarch=$NOMEXT[0].".".$EXT;  // no olvidar el "." separador de nombre/ext
	        $rutaActual = $ruta."/FotosTemp/".$nomarch;

	        $nuevoNombreDeFoto = str_replace(' ', '', $usuario->nombre);
	        $nuevoNombreDeFoto = $nuevoNombreDeFoto.date("Y").date("m").date("d").date("H").date("i").date("s").".".$EXT;
	        $nuevoNombreDeFoto = str_replace(' ', '', $nuevoNombreDeFoto); 

	        rename ($ruta."/FotosTemp/".$nomarch,$ruta."/FotosTemp/".$nuevoNombreDeFoto);
	        $rutaActual = $ruta."/FotosTemp/".$nuevoNombreDeFoto;
	        echo $nomarch;
	        echo "	</br>";
	        echo $rutaActual;
	         echo "	</br>";
	        echo $rutaDestino.$nuevoNombreDeFoto;
	         echo "	</br>";
	        //Muevo a carpeta Fotos
			rename($rutaActual,$rutaDestino.$nuevoNombreDeFoto);
			$usuario->foto=$nuevoNombreDeFoto;	
		  }	
		 
		if 	($queHagoConLaFoto == 'existe')
		  {
		  	$usuario->foto = $foto;
		  }					
  	
		  
		if 	($queHagoConLaFoto == 'noesta')
		  {
		  	$usuario->foto = 'no_image_for_this_product.gif';
		  }					

		$idInsertado=$usuario->GuardarUsuario($usuario->id,
											 $usuario->nombre,
											 $usuario->foto);
		echo $idInsertado;
		break;					
	case 'VerEnMapa':        
        include("partes/formMapa.php");
		break;
	case 'guardarMarcadores':
        session_start();
        if(isset($_POST["marcadores"]))
        {
            $filename = "ArchivosTxt/marcadores" . getdate()[0] . ".txt";

            $_SESSION['file'] = $filename;
            $puntos = $_POST["marcadores"];

            $file = fopen($filename, "w");

            foreach ($puntos as $valor)
            {
                $lat =  $valor["lat"];
                $lng =  $valor["lng"];
                $nombre =  $valor["nombre"];
                fwrite($file, $lat.">".$lng.">".$nombre . PHP_EOL);
            }
        fclose($file);

        echo "Marcadores guardados con exito";
        }
        else
            echo "No ingreso marcador/es a guardar";
        break;		  	
	default:
		# code...
		break;
}

 ?>