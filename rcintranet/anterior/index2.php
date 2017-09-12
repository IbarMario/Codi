<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="es" />
  <meta name="robots" content="all" />
  <meta name="copyright" content="Derechos reservados a nombre de MINISTERIO" />
  <meta name="category" content="General" />
  <meta name="rating" content="General" />
  <title>Ministerio</title>
  <link rel="shortcut icon" href="favicon.ico" />
  <link href="css30/layout.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
  <script type="text/javascript" src="js/validable3.js"></script>
  <script type="text/javascript">
  $(document).ready( function(){
    $("#user").click( function() {
      $("#message").hide();
    });
  } );
  </script>
  <script type="text/javascript" src="js/jquery.atooltip.js"></script>
  <script type="text/javascript">
  $(function(){ 
    $('.normalTip').aToolTip();       
  }); 
  </script>
</head>

<body>

  <div id="wrpB">

    
    <div class="contH">    
      
      <div class="bxCnt">
        
        <img src="lib/logo_c.jpg" alt="Ministerio" />
        <br />
        <br />
        <br />

        <span class="bold">Bienvenido a la Encuesta Anual de Unidades Productivas.</span><br />
          <br />    
          </div>
                  <div class="contC">
           <h2>Ingrese sus datos</h2>
           <p>
            Si es un usuario ya registrado, puede acceder directamente a la encuesta electrónica llenando los siguientes datos:
          </p>
          
          <form class="formL validable" autocomplete="Off" method="post" action="login.php" >  
            <fieldset>
              <p>
                <label>N&ordm; de matr&iacute;cula:</label>
                <input type="text" id="matric" name="matric" size="40" class="inpA required normalTip" title="Ingrese el Número de Matrícula de Comercio de su empresa." />
                <span id="div_matric" class="bxEr2" style="display: none;">campo requerido</span>
              </p>
              <p>
                <label>Correo electr&oacute;nico:</label>
                <input type="text" id="email" name="email" size="40" class="inpA required email normalTip" title="Ingrese su correo electrónico personal." />
                <span id="div_email" class="bxEr2" style="display: none;">campo requerido</span>
                <span id="div_email_2" class="bxEr2" style="display: none;">invalido</span>
              </p>
              <p>
                <label>Contrase&ntilde;a:</label>
                <input type="password" id="passwd" name="passwd" size="40" class="inpA required password normalTip" title="Ingrese la contraseña que registró para este sistema" />
                <span id="div_passwd" class="bxEr2" style="display: none;">campo requerido</span>
              </p>
              <?php if( !empty($_GET["message"]) ){ 
                
                $status = $_GET["st"];
                if( $status == 1 ) {
                  ?>
                  <p style="display: block;" id="message">
                   <label>&nbsp;</label>
                   <span class="txtR">Su cuenta se encuentra desactivada.</span>
                 </p>
                 <?php } else { ?>
                 <p style="display: block;" id="message">
                   <label>&nbsp;</label>
                   <span class="txtR">Algunos datos son incorrectos, o no esta activa su cuenta</span>
                 </p>
                 <?php } }?> 
                 
                 <?php if( !empty($_GET["act"]) ){ 
                  
                  $status = $_GET["act"];
                  
                  switch ( $status ) {
                    case 1: $messg = "<span class=\"txtC\">Su cuenta acaba de ser activada, puede proseguir con el ingreso.</span>"; break;
                    case 3: $messg = "<span class=\"txtR\">Existi&oacute; un problema en la comunicaci&oacute; por favor intente mas tarde.</span>"; break;
                    default: $messg = "<span class=\"txtC\">Puede ser que su cuenta est&eacute; activa o a&uacute;n no se haya registrado.</span>"; break;
                  }
                  if( isset( $status ) ) {
                    ?>
                    <p style="display: block;" id="message" >
                     <label>&nbsp;</label>
                     <?php echo $messg; ?>
                   </p>
                   <?php } } ?>                        
                   <p>
                    <label>&nbsp;</label>
                    <input type="submit" value="INGRESAR" id="sendform" name="sendform" class="button"/>
                    <input type="hidden" name="message" value="<?php echo $_GET["message"]; ?>" />
                  </p>
                </fieldset>
              </form>
              <div class="clear"></div>
            </div>
          
        </div>
      </body>
      </html>
