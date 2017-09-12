<?php
session_start();
include('db.php');
$user=$_GET['user'];
$fecha = date('Y-m-d H:i');
?>

<!DOCTYPE HTML>
<html>
	<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Ing. Efrain Espinoza Callisaya - 2015">
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="css/demo.css">
<link href="css/style.css" rel="stylesheet" type="text/css"/>  
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script> 
 
</head>
	<body>
<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    <div align="center">
  <h1><img src="images/banner11.jpg" width="688" height="169"></h1>  
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
    
      <table align="center">
      <tr>
      <td align="center"><font size="2"><a href="frmSeguimientoUser.php?user=<?php echo $user;?>"><img src="images/seguimiento.png" width="61" height="61"><br>
        Ver Seguimiento</a></font></td>
      <td align="right">
      <?php 
	  	if($user == 218 OR $user == 228 OR $user == 231 OR $user == 243){
		?>	
      <font size="3"><a href="frmSeguimientoAdmin.php?user=<?php echo $user;?>"><img src="images/solicitud2.jpg" width="51" height="51"></a>&nbsp;  &nbsp; &nbsp;&nbsp;<a href="" onClick="window.close()"><img src="images/salir.png" width="51" height="51"></a><br><a href="frmSeguimientoAdmin.php?user=<?php echo $user;?>">Ingresar</a> &nbsp; | &nbsp; <a href="" onClick="window.close()">Salir</a></font>
      <?php
		} else{
		?>
        <a href="" onClick="window.close()"><font size="3"><img src="images/salir.png" width="51" height="51"><br>Salir</font></a></font>
        <?php
        } ?>
      </td>
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
          <ul class="info">    
            <li></li>
            <li><font color="#000099" size="3"><b>Nombre: </b><?php echo $nombre;?></font></li>
            <li><font color="#000099" size="3"><b>Área: </b><?php echo $oficina;?></font></li>
          </ul></td>
        </tr>
      <tr>
        <td width="291" align="center" colspan="3"><p><font color="#990000" size="3"><b>FORMULARIO DE CONTROL DE INGRESO Y SALIDA DE BIENES</b></font></p>
        <a href="FrmSolicitud.php?user=<?php echo $user ?>" target="_blank" onClick="window.open(this.href,this.target,'width=800,height=580,top=100,left=300,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes');return false;"> <img src="images/solicitud.jpg" width="203" height="196"></a>
          </td>
       </tr>
      <tr>
        <td width="236" align="center" colspan="2"><font color="#000099" size="3">Área de Activos Fijos: Int. 320 - 321</font></td>
      </tr>              
    </table>
    


</form>
	</div>
</section>							
</div></div>
<div align="center">
  <p><font size="1">Copyright  @ 2015<BR>
  Desarrollo y Mantenimiento de Sistemas - MDPyEP<br>
    Consultas: Int. 318</font></p>
</div>
</body>
</html>
