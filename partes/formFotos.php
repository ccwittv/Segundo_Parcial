<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">
<script type="text/javascript">  
</script>

<?php  
session_start();
if(isset($_SESSION['registrado'])){ ?>
      <div class="container">
        <form  class="form-ingreso " onsubmit="GuardarUsuario(); return false;" id="formProducto" enctype="multipart/form-data">
           <h2 class="form-ingreso-heading"> Usuario </h2>
            <label for="nombre" class="sr-only" hidden>Nombre</label>
                 <input type="text" readonly id="nombre" class="form-control" placeholder="Nombre" required="" autofocus="" value="<?php echo $_SESSION['registrado'] ?>" > 
          
            <input type="file" name="foto"  id="fichero" onchange="CargarFoto()" autofocus="" />
            <img  src="Fotos/no_image_for_this_product.gif" class="fotoform" id="imagen" autofocus="" />
            <p style="color: black;">*La foto se actualiza al guardar.</p>
            <span id="error" class='error1' style="display: none;"></span>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
            <input type="hidden" name="id" id="id" readonly>
        </form>
      </div> <!-- /container -->
    <?php 
  }
else
  {    
    echo"<h3>usted no esta logeado. </h3>"; 
  }

?>
