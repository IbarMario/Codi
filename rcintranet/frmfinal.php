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
    <link href="css/layout.css" rel="stylesheet" type="text/css" />
<!--    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/validable3.js"></script>
-->
  <!--<script type="text/javascript" src="js/jquery.atooltip.js"></script>-->
</head>
<?php 
include('db.php');
$nromatricula = $_POST['nromatricula']; 
$nroregistro = $_POST['nroregistro']; 
$codcontrol = $_POST['codcontrol']; 
$idusuario = $_POST['idusuario'];      
$fechaactual = date("Y-m-d H:i:s");
//echo $nromatricula."<br>"; 
//echo $nroregistro."<br>"; 
//echo $codcontrol."<br>"; 
//echo $idusuario."<br>";
//echo $fechaactual."<br>";
//$vari= "UPDATE t_aprobacion SET aprobacion_estado = '1', aprobacion_fecha_aprobacion = '$fechaactual', aprobacion_usuario_id = '$idusuario' WHERE (aprobacion_codigo_control ='$codcontrol' and aprobacion_nro_registro ='$nroregistro');";
//echo $vari;
$sql_insert = $conn->Execute("UPDATE t_aprobacion SET aprobacion_estado = '1', aprobacion_fecha_aprobacion = NOW(), aprobacion_usuario_id = '$idusuario' WHERE (aprobacion_codigo_control ='$codcontrol' and aprobacion_nro_registro ='$nroregistro');");
?>		
    <body>
    <div id="wrpB">    
      <div class="contH">
          <div align="center">
      <h3><img src="lib/logo_c.jpg"></h3>
        </div>
            <div class="bxCnt"><br />
                Actualización Realizada<br />
        </div>
        <div class="contC">        
                <h2>Datos registrados</h2>
                <p>
                    <a href="login2.php">Continuar</a>
                </p>	
<!-- class="formL validable" -->	
    </div>
  </div>                
</div>
</body>
</html>
