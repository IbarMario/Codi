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
$query="SELECT MAX(id) as id FROM tra_gasolina";
$reg_dat = $conn->Execute($query);
$cod = $reg_dat->fields["id"];
$codi = $cod + 1;
///////
$fecha = date('Y-m-d H:i');

if (isset($_POST["Enviar"])) {

var_dump($_POST['fini']);
$feci = explode('/', $_POST['fini']);
$fechai = "{$feci[2]}-{$feci[1]}-{$feci[0]}";

var_dump($_POST['fin']);
$fec = explode('/', $_POST['fin']);
$fechaf = "{$fec[2]}-{$fec[1]}-{$fec[0]}";

var_dump($_POST['ffactura']);
$fecf = explode('/', $_POST['ffactura']);
$fechafact = "{$fecf[2]}-{$fecf[1]}-{$fecf[0]}";
	
	$sql_insert = $conn->Execute("INSERT INTO tra_gasolina(
            form, 
            usuario,
            unidad_solicitante, 
            fecha_registro, 
            fecha_solicitud, 
            cantidad, 
            km_anterior,
            fecha_anterior, 
            km_actual, 
            tipo_vehiculo, 
            placa, 
            motivo,
            vales,
            factura,
            fecha_factura) 
	VALUES (
        '$_POST[form]','$user','$_POST[unidad]','$fecha','$fechai','$_POST[cantidad]','$_POST[kmanterior]','$fechaf','$_POST[kmactual]','$tipov','$placa','$_POST[motivo]','$_POST[vales]','$_POST[factura]','$fechafact')");
	echo '<script language="javascript">alert("Solicitud de gasolina registrado..."); </script>'; 
	echo "<script> var us = '$user'; var pla = '$placa';</script>";	
	echo '<script type="text/javascript">window.location.href="frmSolicitudGasolina2.php?user="+us+"&placa="+pla </script>';
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

    function justNumbers(e)
            {
            var keynum = window.event ? window.event.keyCode : e.which;
            if ((keynum == 8) || (keynum == 46))
            return true;
             
            return /\d/.test(String.fromCharCode(keynum));
            }
</script>

<script>


$(function() {
$( "#datepicker" ).datepicker();
});
</script>

<script>
$(function() {
$( "#datepicker2,#datepicker3" ).datepicker();
    $("#f1").validate();
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
	  <h2>SOLICITUD DE VALES DE GASOLINA</h2>  
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
		$tipov = $reg_codice1->fields["tipo"];
		
		?>                                          
<form name="f1" id="f1" action="" method="post">
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
<table border="0">
    <tr>
        <th width="109" align="right"><font color="#FF0000" size="4"> * </font>FECHA SOLICITUD:</th>
        <td width="220"><input type="text" id="datepicker" name="fini" required/></td>
        <th width="42" align="right">FORM:</th>
        <td width="309"><input name="form" type="text" id="form" size="8" maxlength="8" style="font-family: Arial; font-size: 15pt; background-color: #FFC; color:#F00;" value="VAL - <?php echo $codi;?>" readonly /></td>
    </tr>
    <tr>
        <th width="109" height="86" align="right"><font color="#FF0000" size="4"> * </font>UNIDAD SOLICITANTE</th>
        
        <td colspan="3"> <?php
                	$dat="SELECT * FROM tra_unidad";
					 $sql=mysql_query($dat);
  				?>
				<select name="unidad" id="unidad" required>
            <option> </option>
	            <?php   											 					  
		          while($lista=mysql_fetch_array($sql))
				  echo "<option  value='".$lista["id"]."'>".$lista["sigla"]."</option>";  
		          ?>
          </select>
         </td>
    </tr>    
    <tr>
        <th width="109" align="right">CANTIDAD (LITROS)</th>
        <td width="220">
            <!--<select name="cantidad" id="cantidad">
                <option value="20"> 20 </option>
                <option value="40"> 40 </option>
                <option value="60"> 60 </option>
                <option value="80"> 80 </option>
                <option value="100"> 100 </option>
                <option value="120"> 120 </option>
                <option value="140"> 140 </option>
                <option value="160"> 160 </option>
            </select>-->
            <input name="cantidad" type="text" id="cantidad" style="text-transform:uppercase;" onkeypress="return justNumbers(event);" value="" />
        </td>
        <th width="76" align="right">NRO. DE VALES</th>
        <td width="322"><input name="vales" type="text" id="vales" style="text-transform:uppercase;" value="" /></td>
    </tr>
    <tr>
        <th width="109" align="right">KILOMETRAJE ANTERIOR </th>

        <td width="220"><input name="kmanterior" type="text" id="kmanterior" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
        <th width="42" align="right">FECHA</th>
         <td width="309"><input type="text" id="datepicker2" name="fin" /></td>
    </tr>
        <tr>
            <th width="109" align="right">KILOMETRAJE ACTUAL</th>
            <td width="220"><input type="text" id="kmactual" name="kmactual" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/></td>
            <!--<th width="76" align="right"><font color="#FF0000">NRO. FACTURAS</font></th>
            <td width="322"><input name="factura" type="text" id="factura" style="text-transform:uppercase;" onkeypress="return justNumbers(event);" value=""/></td>-->
        </tr>
        <tr>
            <th width="118" align="right">NRO. FACTURA</th>
            <td width="216"><input name="factura" type="text" id="factura" value=""/></td>
            <th width="76" align="right">FECHA FACTURA</th>
            <td width="322"><input name="ffactura" type="text" id="datepicker3" value=""/></td>
        </tr>
        <tr>
            <th width="109" align="right">MOTIVO</th>
            <td colspan="3"><textarea name="motivo" cols="50" rows="7" id="motivo" style="text-transform:uppercase;" onKeyUp="javascript:this.value=this.value.toUpperCase();"></textarea></td>
        </tr>                                                   
        <tr style=" text-align: center;">
            <td colspan="4">
                <br />
                <a href="frmSolicitudGasolina2.php?placa=<?php echo $reg_codice1->fields["placa"];?> & user=<?php echo $user ?>"><input type="button" name="Cancelar" value="CANCELAR" class="btn btn-warning btn-cons" id="Cancelar" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;        
                <input type="submit" name="Enviar" value="REGISTRAR" class="btn btn-primary btn-cons" id="Enviar" />
            </td>
        </tr>
        <tr style=" text-align: center;">
            <td colspan="4">
                <font color="#FF0000" size="4"> * Campos obligatorios.</font>
            </td>
        </tr>
    </table>
<!--  FIN FORMULARIO  -->
    
    </div>
    </form>
	</div>
</section>							
</div></div>
</body>
</html>
