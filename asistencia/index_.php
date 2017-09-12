<?php
session_start();
include('db.php');
$user=$_GET['user'];
//echo $user;
//echo 'Hola';
//$fecha = date('Y-m-d');
$fecha = date('Y-m-d H:i');
$ip = $REMOTE_ADDR; 

if (isset($_POST["Enviar"])) {
	
	$sql_insert = $conn->Execute("INSERT INTO soporte_solicitud(id_usuer, telefono, descripcion, fecha, a1, a2, a3, a4, a5, a6,ip) 
			VALUES ('$user','$_POST[telefono]','$_POST[descripcion]','$fecha','$_POST[a1]','$_POST[a2]','$_POST[a3]','$_POST[a4]','$_POST[a5]','$_POST[a6]','$ip')");
	echo '<script language="javascript">alert("Su solicitud fue registrada..."); </script>'; 
	}
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
<title>Soporte Tecnico - MDPyEP</title>
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

</script>  
</head>
	<body>
<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    <div align="center">
  <h3><img src="images/baner_soporte.jpg" width="818" height="165" align="middle"></h3>
  
    </div>
<?php
	   $sql_codice1 = "SELECT
						oficinas.oficina,
						users.nombre,
						users.username,
						users.cargo,
						users.email
						FROM
						users
						INNER JOIN oficinas ON users.id_oficina = oficinas.id
						WHERE users.id = '$user'";
						
        $reg_codice1 = $conn->Execute($sql_codice1) ;
		$estado = $reg_codice1->fields["estado"];
		?>                                   
<form name="f1" action="" method="post">
    <div align="center">
    
      <table width="756" class="table table-striped" id="example2">
     <tr>
      <td align="center"><font size="2"><a href="frmSeguimientoUser.php?user=<?php echo $user;?>"><img src="images/lupa.gif" width="53" height="48"><br>
        Ver Seguimiento</a></font></td>
      <td align="right"><a href="documentos/PROCEDIMIENTO SOPORTE TECNICO.pdf" target="_blank"><img src="images/pdf.png" width="49" height="48"><br>Manual de Usuario </a></td>
      <td align="right"><font size="2"><a href="login.php?user=<?php echo $user;?>">Sistemas</a> &nbsp; | &nbsp; <a href="" onClick="window.close()">Salir</a></font></td>
      </tr>
      <tr>
      <td colspan="3" align="center"></td>
      </tr>
      <tr>
      <?php 
	  	$oficina = $reg_codice1->fields["oficina"];
	    $nombre = $reg_codice1->fields["nombre"];
		$cargo = $reg_codice1->fields["cargo"];
		$email = $reg_codice1->fields["email"];
	  ?>
        <td colspan="3">
          <h2 class="subtitulo" align="right"><b>Usuario: </b><?php echo $reg_codice1->fields["username"];?><br/></h2>                                                
          <ul class="info">    
            <li><b>Oficina: </b><?php echo $oficina;?></li>
            <li><b>Nombre: </b><?php echo $nombre;?></li>
            <li><b>Cargo: </b><?php echo $cargo;?></li>    
            <li><b>Email: </b><?php echo $email;?></li>
        </ul></td>
        </tr>
      <tr>
        <td width="236" align="right"><font color="#FF0000"><strong>TELÉFONO INTERNO (*):</strong></font></td>
       <!-- <td width="291"><input name="telefono" type="text" maxlength="10" onKeyPress="javascript:return validarNro(event)" /></td>-->
	<td width="291"><input name="telefono" type="text" maxlength="17"  /></td>
        <td width="213">&nbsp;</td>
       </tr>
      <tr>
        <td>
          <p align="center"><font color="#FF0000"><strong>SELECCIONE  ASISTENCIA (*)</strong></font></p>
          <p>
            <input type="checkbox" name="a1" value="Computadora" /> Computadora</p>
          <p>
          <input type="checkbox" name="a2" value="Internet/Red" /> Internet/ Red</p>
          <p>
            <input type="checkbox" name="a3" value="Impresora" /> Impresora</p>                                              
          <p>
            <input type="checkbox" name="a4" value="Scanner" /> Scanner</p>
          <p>
          <input type="checkbox" name="a5" value="Codice" /> CODICE</p>
          <p>
            <input type="checkbox" name="a6" value="Otro" /> Otro</p>
        </td>
        <td colspan="2"><font color="#FF0000"><strong>DETALLE (*):</strong></font><br>
        <textarea name="descripcion" cols="50" rows="13"></textarea></td>
        </tr>
       <tr>
       <th colspan="4" align="center"><input type="submit" name="Cancelar" value="Cancelar" class="btn btn-warning btn-cons" id="Cancelar" onClick="window.close();"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;        <input type="submit" name="Enviar" value="Enviar" class="btn btn-success btn-cons" id="Enviar" /></th>
       </tr>
    </table>
    


</form>
	</div>
</section>							
</div></div></div>
<div align="center">
  <p><font size="1">Copyright  @ 2015<BR>
  Sistema Desarrollado por la Unidad de Sistemas - MDPyEP<br>
    Consultas: Int. 318</font></p>
</div>
</body>
</html>
