<?php
session_start();
include('db.php');
$user=$_GET['user'];
$placa=$_GET['placa'];
//echo $user;
//echo 'Hola';
//$fecha = date('Y-m-d');
//$fecha = date('Y-m-d H:i');

///////
$query="SELECT MAX(id) as id FROM tra_solicitud_mant_prev";
$reg_dat = $conn->Execute($query);
$cod = $reg_dat->fields["id"];
$codi = $cod + 1;
///////
$fecha = date('Y-m-d H:i');

if (isset($_POST["Enviar"])) {
	
	$sql_insert = $conn->Execute("INSERT INTO tra_solicitud_mant_prev(form, solicitante, unidad, placa, fecha_reg, fecha_mant, fecha_ultimo_mant, detalle01, detalle02, detalle03, detalle04, detalle05, detalle06, detalle07, detalle08, detalle09, detalle10) 
			VALUES ('$_POST[form]','$user','$_POST[unidad]','$placa','$fecha','$_POST[fini]','$_POST[fin]','$_POST[d1]','$_POST[d2]','$_POST[d3]','$_POST[d4]','$_POST[d5]','$_POST[d6]','$_POST[d7]','$_POST[d8]','$_POST[d9]','$_POST[d10]')");
	echo '<script language="javascript">alert("Solicitud de mantenimiento preventivo y/o correctivo registrado..."); </script>'; 
	echo "<script> var us = '$user'; var pla = '$placa';</script>";	
	echo '<script type="text/javascript">window.location.href="frmSolicitudMantPrev2.php?user="+us+"&placa="+pla </script>';
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Ing. Efrain Espinoza Callisaya - 2015">
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="css/demo.css">
<link href="css/style.css" rel="stylesheet" type="text/css"/> 
<link href="css/efra.css" rel="stylesheet" type="text/css"/>  
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script> 
<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
<script>

function format(input)
{
	var num = input.value.replace(/\./g,'');
	if(!isNaN(num)){
		num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
		num = num.split('').reverse().join('').replace(/^[\.]/,'');
		input.value = num;
	} 
	else{ alert('Solo se permiten numeros');
		input.value = input.value.replace(/[^\d\.]*/g,'');
	}
}

function validarNro(e) {
var key;
if(window.event) // IE
	{
	key = e.keyCode;
	}
else if(e.which) // Netscape/Firefox/Opera
	{
	key = e.which;
	}

if (key < 48 || key > 57)
    {
    if(key == 46 || key == 8) // Detectar . (punto) y backspace (retroceso)
        { return true; }
    else 
        { return false; }
    }
return true;
}

</script>

<script>


$(function() {
$( "#datepicker" ).datepicker();
});
</script>

<script>
$(function() {
$( "#datepicker2" ).datepicker();
});
</script> 
<!--   CALENDARIO EFRA   -->
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
  <script src="js/ui.datepicker-es-MX.js"></script>
  <script>
  $(function() {
    $.datepicker.setDefaults($.datepicker.regional['es-MX']);
  });
  </script>
<!-- FIN CALEMDARIO  -->
</head>
	<body>
<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    <div align="center">
    <h3><img src="images/banner.jpg" width="629" height="166"></h3>    
	  <h2>CONTROL DE MANTENIMIENTO DE MOVILIDADES</h2>  
    </div>
  
<div id="stylized" class="myform">
<?php
	   $sql_codice1 = "SELECT
						tra_vehiculo.placa,
						tra_vehiculo.marca,
						tra_vehiculo.tipo,
						tra_vehiculo.color,
						tra_vehiculo.anio,
						tra_vehiculo.asignado,
						tra_vehiculo.conductor,
						tra_vehiculo.estado,
						tra_vehiculo.poliza,
						tra_vehiculo.id
						FROM
						tra_vehiculo
						WHERE tra_vehiculo.placa = '$placa'";
						
        $reg_codice1 = $conn->Execute($sql_codice1) ;
		$estado = $reg_codice1->fields["estado"];
		$solicitante = $reg_codice1->fields["conductor"];
		//$placa = $reg_codice1->fields["placa"];
		
		?>                                          
<form name="f1" action="" method="post">
    <div align="center">
  <table align="center">
  <tr><h1 align="center">Placa: <strong><?php echo $placa;?></strong><br/></h1> 	
     <td>                                                 
          <ul>    
            <li><font color="#000099" size="2">Marca: <strong><?php echo $reg_codice1->fields["marca"];?></strong></font></li>
            <li><font color="#000099" size="2">Tipo: <strong><?php echo $reg_codice1->fields["tipo"];?></strong></font></li>
            <li><font color="#000099" size="2">Color: <strong><?php echo $reg_codice1->fields["color"];?></strong></font></li>    
            <li><font color="#000099" size="2">Año: <strong><?php echo $reg_codice1->fields["anio"];?></strong></font></li>
        </ul>
      </td>
     <td>
    	<ul>    
            <li><font color="#000099" size="2">Asignado a: <strong><?php echo $reg_codice1->fields["asignado"];?></strong></font></li>
            <li><font color="#000099" size="2">Solicitante: <strong><?php echo $reg_codice1->fields["conductor"];?></strong></font></li>
            <li><font color="#000099" size="2">Estado funcionamiento:<strong> <?php echo $estado;?></strong></font></li>    
            <li><font color="#000099" size="2">Poliza de seguro: <strong><?php echo $reg_codice1->fields["poliza"];?></strong></font></li>
        </ul>
    </td>
  </tr>
</table>   

<!--  FORMULARIO  -->        
<table>
      <tr>
        <th width="118" align="right">FECHA DE MANTENIMIENTO:</th>

        <td width="216"><input type="text" id="datepicker" name="fini" /></td>
        <th width="76" align="right">FORM:</th>
         <td width="322"><input name="form" type="text" id="form" size="8" maxlength="8" style="font-family: Arial; font-size: 15pt; background-color: #FFC; color:#F00;" value="MANT - <?php echo $codi;?>" readonly  /></td>
       </tr>
      <tr>
        <th width="118" height="86" align="right">UNIDAD SOLICITANTE:</th>
        
        <td colspan="3"> <?php
                	$dat="SELECT * FROM tra_unidad";
					 $sql=mysql_query($dat);
  				?>
				<select name="unidad" id="unidad">
            <option> </option>
	            <?php   											 					  
		          while($lista=mysql_fetch_array($sql))
				  echo "<option  value='".$lista["id"]."'>".$lista["sigla"]."</option>";  
		          ?>
          </select>
         </td>
      </tr> 
      <tr>
        <th width="118" align="right">FECHA ÚLTIMO MANTENIMIENTO:</th>

        <td width="216"><input type="text" id="datepicker2" name="fin" /></td>
        <th width="76" align="right">&nbsp;</th>
         <td width="322">&nbsp;</td>
       </tr> 
       <tr>
       	<th colspan="4" align="center"><b>DETALLAR LOS TRABAJOS A REALIZAR</b></th>
       </tr>   
      <tr>
        <th width="118" align="right">1.</th>

        <td width="216"><input type="text" id="d1" name="d1" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/></td>
        <th width="76" align="right">2.</th>
         <td width="322"><input type="text" id="d2" name="d2"style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" /></td>
       </tr>
      <tr>
        <th width="118" align="right">3.</th>

        <td width="216"><input name="d3" type="text" id="d3" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
        <th width="76" align="right">4.</th>
         <td width="322"><input name="d4" type="text" id="d4" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
       </tr>
             <tr>
        <th width="118" align="right">5.</th>

        <td width="216"><input type="text" id="d5" name="d5" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/></td>
        <th width="76" align="right">6.</th>
         <td width="322"><input type="text" id="d6" name="d6" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/></td>
       </tr>
      <tr>
        <th width="118" align="right">7.</th>

        <td width="216"><input name="d7" type="text" id="d7" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
        <th width="76" align="right">8.</th>
         <td width="322"><input name="d8" type="text" id="d8" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
       </tr>
             <tr>
        <th width="118" align="right">9.</th>

        <td width="216"><input type="text" id="d9" name="d9" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/></td>
        <th width="76" align="right">10.</th>
         <td width="322"><input type="text" id="d10" name="d10" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/></td>
       </tr>                                                   
       <tr>
       <td colspan="4"><br><div align="center">
       <a href="frmSolicitudMantPrev2.php?placa=<?php echo $reg_codice1->fields["placa"];?> & user=<?php echo $user ?>"><input type="button" name="Cancelar" value="CANCELAR" class="btn btn-warning btn-cons" id="Cancelar" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;        
       <input type="submit" name="Enviar" value="REGISTRAR" class="btn btn-primary btn-cons" id="Enviar" /></div></td>
       </tr>       
  </table>
<!--  FIN FORMULARIO  -->        

        </td>
        </tr>
    </table>
    


</form>
</div>
	</div>
</section>							
</div></div>
</body>
</html>
