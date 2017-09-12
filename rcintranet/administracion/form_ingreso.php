<?php
session_start();
//include('db.php');
$user=$_GET['user'];
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
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="../css/layer.css" rel="stylesheet" type="text/css" />     
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />    
    <title>Formulario de Encuesta Comercio y Servicios</title>
    <meta name="description" content="Inicio" />
    <meta name="keywords" content="Inicio" />
    <link href="../css/layout.css" rel="stylesheet" type="text/css" />    
    <link rel="shortcut icon" href="lib/favicon.ico"   type="image/x-icon"/>    
    <script type="text/javascript" src="../js/jquery.min.js"></script>   
    <script type="text/javascript" src="js/bol1.js"></script>    
        
    
<style>
  .textbox
  {
  border: 1px solid #DBE1EB;
  font-size: 18px;
  font-family: Arial, Verdana;
  padding-left: 7px;
  padding-right: 7px;
  padding-top: 10px;
  padding-bottom: 10px;
  border-radius: 4px;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  -o-border-radius: 4px;
  background: #FFFFFF;
  background: linear-gradient(left, #FFFFFF, #F7F9FA);
  background: -moz-linear-gradient(left, #FFFFFF, #F7F9FA);
  background: -webkit-linear-gradient(left, #FFFFFF, #F7F9FA);
  background: -o-linear-gradient(left, #FFFFFF, #F7F9FA);
  color: #2E3133;
  }
  
  .textbox:focus
  {
  color: #2E3133;
  border-color: #2E3133;
  }
</style>        
<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>   
</head>
<body>
<div class="container">
    <div class="grid simple ">
	<div class="grid-body ">
    <div align="center">
  <h3><img src="../lib/logo_c.jpg"></h3>
  <h3><span>INGRESE USUARIO Y CONTRASEÑA</span>
  </h3>
  <h4>Antes de realizar este procedimiento debe obtener un backup de la Base de Datos por seguridad.<br><br></h4>
  <p>&nbsp;</p>
    </div>
<?php
                 //if(empty($_SESSION['usuario_nombre'])) { // comprobamos que las variables de sesión estén vacías        
    ?>                                     
  <form action="controlador.php" method="post">
    <div align="center">
      <table class="table table-striped" id="example2">
      <tr>
        <td height="49"><strong>Usuario:</strong></td>
        <td>&nbsp;&nbsp;<input type="text" name="usuario_nombre" class="textbox"/></td>
       </tr>
      <tr>
        <td height="62"><strong>Contraseña:</strong></td>
        <td>&nbsp;&nbsp;<input type="password" name="usuario_clave" class="textbox"/></td>
       </tr>
       <tr>
        <td colspan="2" align="center"><input type="submit" name="acceder" value="Continuar" class="button"/></td>
       </tr>
    </table>
    </div>
    <p><br>
<p align="center">&nbsp;</p>
      </form>
</div>
</section>
</div></div></div>
<div align="center">
<font size="1">MDPyEP  @ 2015<br>
</font>
</div>
</body>
</html>
