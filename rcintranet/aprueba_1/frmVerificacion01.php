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
    <link href="../css/layout.css" rel="stylesheet" type="text/css" />
<!--    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/validable3.js"></script>
-->
<script language="JavaScript" type="text/javascript">
function comprobar(obj)
{   
    if (obj.checked)
        document.getElementById('boton').disabled = false;
    else
    document.getElementById('boton').disabled = true;
}
</script>
  <!--<script type="text/javascript" src="js/jquery.atooltip.js"></script>-->
</head>
<?php 
include('db.php');

$sw1=0;
$sw2=0;
	$buscar1 = $_POST['matricula']; 
	$buscar2 = $_POST['registro']; 
	$buscar3 = $_POST['comercio']; 
        $usuario_id = $POST['idusuario'];
        
if ($buscar2 <>''){
    $sw1 = 1;
}
if ($buscar3 <>''){
    $sw2 = 1;
}

if (isset($_POST["boton"])) {
$sql_insert = $conn->Execute("UPDATE t_aprobacion SET
                                 aprobacion_estado = '1', aprobacion_fecha_aprobacion = NOW(), aprobacion_usuario_id = 
                                 WHERE id_aprobacion = '$_POST[id]';");
}
?>		
<body>
<div id="wrpB">    
  <div class="contH">
      <div align="center">
  <h3><img src="../lib/logo_c.jpg"></h3>
    </div>
        <div class="bxCnt"><br />
            Resultado de la búsqueda<br />
    </div>
    <div class="contC">        
            <h2>Datos registrados</h2>
            <p>
                Se requiere aprobar el registro:
            </p>	
	<?php
        
        if ($sw1==1 AND $sw2==1){
            $sql_encuesta = "SELECT t_aprobacion.aprobacion_matricula,
            t_aprobacion.aprobacion_nro_matricula,
            t_aprobacion.aprobacion_nro_registro,
            t_aprobacion.aprobacion_fecha_registro,
            t_aprobacion.aprobacion_estado,
            t_aprobacion.aprobacion_codigo_control,
            t_aprobacion.id_aprobacion
FROM t_aprobacion 
WHERE ((aprobacion_nro_registro = '$buscar2') AND (aprobacion_codigo_control = '$buscar3'))";
            
        } else {
            $sql_encuesta = "SELECT t_aprobacion.aprobacion_matricula,
            t_aprobacion.aprobacion_nro_matricula,
            t_aprobacion.aprobacion_nro_registro,
            t_aprobacion.aprobacion_fecha_registro,
            t_aprobacion.aprobacion_estado,
            t_aprobacion.aprobacion_codigo_control,
            t_aprobacion.id_aprobacion
FROM t_aprobacion 
WHERE ((aprobacion_nro_registro = '$buscar2') OR (aprobacion_codigo_control = '$buscar3'))";            
        }	                                              
	  // echo $sql_encuesta;						
        $reg_encuesta = $conn->Execute($sql_encuesta);
        $resultado = $reg_encuesta;

	$id = $reg_encuesta->fields["id_aprobacion"];
        //echo $reg_encuesta."<br>";
        //echo $resultado."<br>";
        //echo $id."<br>";
	if ($id <> 0 ){
	  ?>                         
<!-- class="formL validable" -->
            <form class="formL validable" name="form1"  method="post" action="" >  
            
            <fieldset>
              <p>
                <label>N&ordm; de matr&iacute;cula:</label>
                <input name="matricula" type="text" class="inpA required normalTip" id="matricula" value="<?php echo $reg_encuesta->fields["aprobacion_nro_matricula"];?>" size="40" readonly="readonly" />
                <input name="id" type="hidden" id="id" value="<?php echo $id;?>" />                
              </p>
              <p>
                <label>N&ordm; de registro:</label>
                <input name="registro" type="text" class="inpA required normalTip" id="registro" value="<?php echo $reg_encuesta->fields["aprobacion_nro_registro"];?>" size="40" readonly="readonly" />
              </p>
              <p>
                <label>Código de control:</label>
                  <input name="control" type="text" class="inpA required email normalTip" id="control" value="<?php echo $reg_encuesta->fields["aprobacion_codigo_control"];?>" size="40" readonly="readonly"/>
              </p>
              <p>
                <label>Fecha de registro:</label>
                <input name="fecha" type="text" class="inpA required password normalTip" id="fecha" value="<?php echo $reg_encuesta->fields["aprobacion_fecha_registro"];?>" size="40" readonly="readonly" />
              </p>              
              <p>
              <p>
                <input name='chec' type='checkbox' id='chec' onChange='comprobar(this);'/>
    			<label for='chec'>Aprobar registro</label>
    
                        
              </p><div align="center">
                <!--<input type="submit" value="VALIDAR" id="validar" name="validar" class="button" disabled/>-->
                <input type='submit' name='boton' value='VALIDAR' id='boton' disabled />
                <p>
              </div>
            </fieldset>
            </form> 
	<?php
		} else { 
                if ($sw1==1){
                    echo "<H3>¡ No se ha encontrado ningún registro con Número de registro -> ".$buscar2."</H3>"; 
                }
		if ($sw2==1){
                    echo "<H3>¡ No se ha encontrado ningún registro con Código de Control -> ".$buscar3."</H3>"; 
                }
                echo "<a href='javascript:history.back();'>Reintentar</a>";
		}       
	?>
            
        </div>
  </div>                
</div>
</body>
</html>
