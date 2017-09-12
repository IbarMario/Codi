<?php
session_start();
include('db.php');
$user = $_GET['user'];
$desc = $_GET['desc'];
$eec = $_GET['eec'];
$resp = $_GET['resp'];

//echo $resp;

	switch($user){
		case 2:
			$tecnico = ' ';
		break;
		case 172:
			$tecnico = 'Edwin Herrera';
		break;
		case 231:
			$tecnico = 'Efrain Espinoza';
		break;
		case 230:
			$tecnico = 'Wilfredo Flores';
		break;
		case 232:
			$tecnico = 'Nancy Rodriguez';
		break;		
	}
echo $user;
//$fecha = date('Y-m-d');
//$fecha = date('Y-m-d H:i');
$fechas = date("Y-m-d h:i:s");


if (isset($_POST["Aceptar"])) {
		$sql_insert = $conn->Execute("UPDATE soporte_solicitud SET
									 respuesta = '$_POST[obs]'
									 WHERE id = '$eec';");
    
		$sql_insert = $conn->Execute("UPDATE soporte_respuesta SET
									 observaciones = '$_POST[obs]'
									 WHERE id_soporte = '$eec';");    
?>
<script> window.close();</script>
<?php 
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
<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    <div align="center">
  <h1><strong>EDITAR RESPUESTA</strong></h1>
  
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
 <form name="f1" method="post" action="" id="f1">
    <div align="center">
    
      <table class="table table-striped" id="example2">
      <tr>
      </tr>
      <tr>
      <?php 
	  	$oficina = $reg_codice1->fields["oficina"];
	    $nombre = $reg_codice1->fields["nombre"];
		$cargo = $reg_codice1->fields["cargo"];
		$email = $reg_codice1->fields["email"];
	  ?>
        <!--<th>
          <h2 class="subtitulo" align="left">Nombre:&nbsp; <?php echo $nombre;?></h2>
        </th>-->
        </tr>
        <tr>
        <th>
          <h3 class="subtitulo" align="left">Solicitud:&nbsp; <?php echo $desc;?></h3>
        </th>        
        </tr>
      <tr>
      <td >RESPUESTA:<br>
          <textarea name="obs" cols="70" rows="13" id="obs"><?php echo $resp ?></textarea></td>
      </tr>
       <tr>
       <th align="center"><input type="submit" name="Aceptar" value="Aceptar" class="btn btn-success btn-cons" id="Aceptar" /></th>
       </tr>
    </table>   
    </div>
</form>
	</div>
</section>							
</div></div></div>
<div align="center">
  <p><font size="1">Copyright  @ 2015<BR>
  Sistema Desarrollado por la Unidad de Sistemas - MDPyEP<br>
  </font></p>
</div>
</body>
</html>
