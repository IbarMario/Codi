<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />
    <meta name="robots" content="all" />
    <meta name="copyright" content="MINISTERIO DE DESARROLLO PRODUCTIVO Y ECONOMIA PLURAL" />
    <meta name="category" content="General" />
    <meta name="rating" content="General" />
    <title>Ministerio de Desarrollo Productivo y Economía Plural</title>
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
            <span class="txtTit">Bienvenido a la Encuesta Anual de Unidades Productivas de la gestión 2014.</span><br>
            <br>
            <p>Si su empresa pertenece al sector de Comercio y Servicios, usted puede llenar la presente encuesta de una manera rápida y dinámica.<br>
Si es la primera vez que ingresa a esta página web, debe registrar sus datos haciendo clic en el botón verde REGISTRASE.<br>
Una vez que haya concluido este paso, deberá ingresar al correo electrónico declarado e ingresar a la encuesta electrónica a través del enlace que reciba en dicho correo.<br>
Llene la información requerida en los campos y podrá responder la encuesta.<br>
Si es un usuario ya registrado, puede acceder directamente la encuesta llenando los campos requeridos en el cuadro de la parte inferior derecha  y presionar el botón ingresar.</p><br>
<p class="bold">Recomendaciones</p>
            <br>
            <p>La presente encuesta electrónica fue diseñada para que  pueda responder a  la  información requerida de una manera ágil y rápida. Cada campo tiene cuadros de ayuda que le orientarán sobre la manera correcta de llenar los datos.<br>
Los campos marcados con asterisco rojo deben ser respondidos de manera obligatoria. Usted no podrá proseguir la encuesta si no llena los campos antes mencionados.<br>
Recuerde que la encuesta en un esfuerzo conjunto entre su empresa y el Estado Plurinacional de Bolivia para contar con información que ayude al país a diseñar políticas públicas que impulsen el desarrollo de los sectores productivos del país.<br>
Le agradecemos por este esfuerzo y le recordamos que toda la información será agregada a una base de datos y será utilizada sólo para fines estadísticos.
</p>
<br />
</div>
         <!--         
        <div class="contC">        
            <h2>Registro de usuario</h2>            
            <p>
           Si es la primera vez que accede a este formulario electrónico, le solicitamos que se registre como usuario por única vez haciendo clic en el botón REGISTRARSE. 
            </p>                   
            <a href="register/registerNew.php" class="lnkBtn1">Registrarse</a><br>                                
        </div>  
         -->
   <div class="contCb">
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
        </div>        
    </div>                
</div>
</body>
</html>
