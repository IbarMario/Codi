<?php
session_start();
include('db.php');
$user=$_GET['user'];
$placa = $_GET['placa'];
//$fecha = date('Y-m-d');
$fecha = date('Y-m-d H:i');
$fechas = date("Y-m-d h:i:s");
?>

<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Ing. Efrain Espinoza Callisaya - 2015">
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="css/demo.css">
<link href="css/style.css" rel="stylesheet" type="text/css"/>  
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script> 
<script>
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

function reEnviaFormularioCero(){
document.f1.submit();
}
</script>  
</head>
	<body>
    <div align="center">
  <h3><img src="images/banner.jpg" width="629" height="166"></h3>
</div>
<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
<?php
	   $sql_codice1 = "SELECT *					
						FROM
						tra_vehiculo
						WHERE tra_vehiculo.placa = '$placa'";
						
        $reg_codice1 = $conn->Execute($sql_codice1) ;
		?>                                   
 <form name="f1" method="post" action="" id="f1">
    <div align="center">
    
      <table class="table table-striped" id="example2">
      <tr>
      </tr>
      <tr>
      <td >
          <table width="587" align="center">
            <tr>
              <h1 align="center">Placa: <strong><?php echo $placa;?></strong><br/>
              </h1>
              <td><ul>
                <li><font color="#000099" size="2">Marca: <strong><?php echo $reg_codice1->fields["marca"];?></strong></font></li>
                <li><font color="#000099" size="2">Tipo: <strong><?php echo $reg_codice1->fields["tipo"];?></strong></font></li>
                <li><font color="#000099" size="2">Color: <strong><?php echo $reg_codice1->fields["color"];?></strong></font></li>
                <li><font color="#000099" size="2">Año: <strong><?php echo $reg_codice1->fields["anio"];?></strong></font></li>
                <li><font color="#000099" size="2">Propietario: <strong><?php echo $reg_codice1->fields["propietario"];?></strong></font></li>
              </ul></td>
              <td><ul>
                <li><font color="#000099" size="2">Asignado a: <strong><?php echo $reg_codice1->fields["asignado"];?></strong></font></li>
                <li><font color="#000099" size="2">Conductor: <strong><?php echo $reg_codice1->fields["conductor"];?></strong></font></li>
                <li><font color="#000099" size="2">Poliza de seguro: <strong><?php echo $reg_codice1->fields["poliza"];?></strong></font></li>
                <li><font color="#000099" size="2">Estado funcionamiento: <strong><?php echo $reg_codice1->fields["estado"];?></strong></font></li>
                <li><font color="#000099" size="2">Observaciones: <strong><?php echo $reg_codice1->fields["observaciones"];?></strong></font></li>
              </ul></td>
            </tr>
          </table>
          <h3 align="left">&nbsp;</h3></td>
      </tr>
       <tr>
       <th align="center"><a href="frmVehiculos.php?user=<?php echo $user ?>"><input type="button" name="Aceptar" value="VOLVER" class="btn btn-primary btn-cons" id="Aceptar" title="Aprobar" /></a></th>
       </tr>
    </table>   
    </div>
</form>
	</div>
</section>							
</div></div></div>
</body>
</html>
