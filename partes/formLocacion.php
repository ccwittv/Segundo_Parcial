
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

 
<?php 
 
session_start();
if(isset($_SESSION['registrado'])){  ?>
    <div class="container">

      <form  class="form-ingreso " onsubmit="GuardarLocacion(); return false;">
        <h2 class="form-ingreso-heading">Locación</h2>        
        <select id="localidad">
          <option value="Avellaneda">Avellaneda</option>
          <option value="Lanus">Lanus</option>
          <option value="Banfield">Banfield</option>
        </select>
        <label for="calle" class="sr-only" hidden>Calle</label>
                <input type="text" id="calle" class="form-control" placeholder="Calle" required="" autofocus="">        
        <label for="nrocasa" class="sr-only" hidden>Número de casa</label>
                <input type="number" id="nrocasa" class="form-control" placeholder="Número de casa" required="" autofocus="">
        <br>          
        <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
        <input type="hidden" name="id" id="id" readonly>
      </form>

    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted no esta logeado. </h3>"; }

  ?>
    
  
