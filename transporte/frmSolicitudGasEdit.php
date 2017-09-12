<?php
session_start();
include('db.php');
$user=$_GET['user'];
$placa=$_GET['placa'];
$id=$_GET['id'];

$query="SELECT MAX(id) as id FROM tra_gasolina";
$reg_dat = $conn->Execute($query);
$cod = $reg_dat->fields["id"];
$codi = $cod + 1;
///////
$fecha = date('Y-m-d H:i');

if (isset($_POST["Enviar"])) {

$sql_insert = $conn->Execute("UPDATE tra_gasolina SET
            unidad_solicitante = '$_POST[unidad]',
            cantidad = '$_POST[cantidad]',
            km_anterior = '$_POST[kmanterior]',
                fecha_solicitud = '$_POST[fini]',
            fecha_anterior = '$_POST[fin]',
            fecha_factura = '$_POST[ffactura]',
            km_actual = '$_POST[kmactual]',
            motivo = '$_POST[motivo]',
            vales = '$_POST[vales]',
            factura = '$_POST[factura]'
            WHERE id = '$id';");			
			
   	echo "<script> var us = '$user'; var pla = '$placa';</script>";
	echo '<script type="text/javascript">window.location.href="frmSolicitudGasolina2.php?user="+us+"&placa="+pla </script>';
	}
	
        $sql_codice = "SELECT
            tra_gasolina.id,
            tra_gasolina.form,
            tra_gasolina.usuario,
            tra_gasolina.unidad_solicitante,
            tra_gasolina.fecha_registro,
            tra_gasolina.fecha_solicitud,
            tra_gasolina.cantidad,
            tra_gasolina.km_anterior,
            tra_gasolina.fecha_anterior,
            tra_gasolina.km_actual,
            tra_gasolina.placa,
            tra_gasolina.motivo,
            tra_gasolina.vales,
            tra_gasolina.factura,
            tra_gasolina.fecha_factura,
            users.nombre,
            tra_unidad.id AS id_u,
            tra_unidad.sigla
            FROM
            tra_gasolina
            INNER JOIN users ON tra_gasolina.usuario = users.id
            INNER JOIN tra_unidad ON tra_gasolina.unidad_solicitante = tra_unidad.id
            WHERE tra_gasolina.id = '$id'";	     
        $reg_codice = $conn->Execute($sql_codice) ;
        $fecha1 = $reg_codice->fields["fecha_solicitud"];
        $unidad = $reg_codice->fields["sigla"];
        $tunidad = $reg_codice->fields["id_u"];
        $cantidad = $reg_codice->fields["cantidad"];
        $km1 = $reg_codice->fields["km_anterior"];
        $fecha2 = $reg_codice->fields["fecha_anterior"];
        $km2 = $reg_codice->fields["km_actual"];
        $motivo = $reg_codice->fields["motivo"];	
        $vales = $reg_codice->fields["vales"];
        $facturas = $reg_codice->fields["factura"];
        $fecha3 = $reg_codice->fields["fecha_factura"];
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
<script src="js/bootstrap-datepicker2.js" type="text/javascript"></script>
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
    $( "#datepicker,#datepicker2,#datepicker3" ).datepicker();
    $("#f1").validate();
});
</script>
<!--   CALENDARIO EFRA   -->
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
  <script src="js/ui.datepicker-es-MX2.js"></script>
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
                                          
<form name="f1" id="f1" action="" method="post">
    <div align="center">

    <!--  FORMULARIO  -->        
<table>
      <tr>
        <th width="118" align="right"><font color="#FF0000" size="4"> * </font>FECHA SOLICITUD:</th>

        <td width="216">
            <input name="fini" type="text" readonly id="datepicker" value="<?php echo $fecha1 ?>"/>
        </td>
        <th width="76" align="right">&nbsp;</th>
         <td width="322">&nbsp;</td>
       </tr>
      <tr>
        <th width="118" height="86" align="right"><font color="#FF0000" size="4"> * </font>UNIDAD SOLICITANTE</th>
        
        <td colspan="3"> <?php
                	$dat="SELECT * FROM tra_unidad";
                            $sql=mysql_query($dat); ?>
            <select name="unidad" id="unidad" required>
	            <?php   											 					
                    while($lista=mysql_fetch_array($sql)){
                        if($tunidad == $lista["id"]){
                            echo "<option value='".$lista["id"]."' selected>".$lista["sigla"]."</option>";
                        } else{
                            echo "<option value='".$lista["id"]."'>".$lista["sigla"]."</option>";
                        }
                    }
                    ?>
            </select><font color="#FF0000">Verifique unidad solicitante</font>
         </td>
      </tr>    
      <tr>
        <th width="118" align="right">CANTIDAD (LITROS)</th>

        <td width="216">
            <!--<select name="cantidad" id="cantidad">
                <option value="<?php echo $cantidad ?>"> <?php echo $cantidad ?> </option>        	
                <option value="20"> 20 </option>
                <option value="40"> 40 </option>
                <option value="60"> 60 </option>
                <option value="80"> 80 </option>
                <option value="100"> 100 </option>
                <option value="120"> 120 </option>
                <option value="140"> 140 </option>
                <option value="160"> 160 </option>
            </select>-->
            <input name="cantidad" type="text" id="cantidad" style="text-transform:uppercase;" onkeypress="return justNumbers(event);" value="<?php echo $cantidad ?>" />
        </td>
        <th width="76" align="right"><font color="#FF0000">NRO. DE VALES</font></th>
         <td width="322"><input name="vales" type="text" id="vales" value="<?php echo $vales ?>" /></td>
       </tr>
      <tr>
        <th width="118" align="right">KILOMETRAJE ANTERIOR</th>

        <td width="216"><input name="kmanterior" type="text" id="kmanterior" value="<?php echo $km1 ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
        <th width="76" align="right">FECHA</th>
         <td width="322"><input name="fin" type="text" id="datepicker2" value="<?php echo $fecha2 ?>"/></td>
       </tr>
      <tr>
        <th width="118" align="right">KILOMETRAJE ACTUAL</th>

        <td width="216"><input type="text" id="kmactual" name="kmactual" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $km2 ?>"/></td>
        <th width="76" align="right">&nbsp;</th>
         <td width="322">&nbsp;</td>
       </tr>
       <tr>
        <th width="118" align="right"><font color="#FF0000">NRO. FACTURA</font></th>

        <td width="216"><input name="factura" type="text" id="factura" value="<?php echo $facturas ?>"/></td>
        <th width="76" align="right"><font color="#FF0000">FECHA FACTURA</font></th>
         <td width="322"><input name="ffactura" type="text" id="datepicker3" value="<?php echo $fecha3 ?>"/></td>
       </tr>
      <tr>
        <th width="118" align="right">MOTIVO</th>

        <td colspan="3"><textarea name="motivo" cols="50" rows="7" id="motivo" style="text-transform:uppercase;" onKeyUp="javascript:this.value=this.value.toUpperCase();"><?php echo $motivo ?></textarea></td>
        </tr>                                                   
       <tr>
         <td colspan="4"><br><div align="center">
           <a href="frmSolicitudGasolina2.php?placa=<?php echo $placa?> & user=<?php echo $user ?>"><input type="button" name="Cancelar" value="CANCELAR" class="btn btn-warning btn-cons" id="Cancelar" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;        
           <input type="submit" name="Enviar" value="ACTUALIZAR" class="btn btn-primary btn-cons" id="Enviar" />
             </div>
         </td>
       </tr>
       <tr style=" text-align: center;">
            <td colspan="4">
                <font color="#FF0000" size="4"> * Campos obligatorios.</font>
            </td>
        </tr>
    </table>
    </div>
    </form>
	</div>
</section>							
</div></div>
</body>
</html>
