<?php
session_start();
include('db.php');
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
  <h3><img src="images/logo_mdp.jpg" width="347" height="133" align="middle"></h3>
  <h3><span>INGRESE USUARIO Y CONTRASEÑA</span>
  </h3></div>
							 <?php
                                //if(empty($_SESSION['usuario_nombre'])) { // comprobamos que las variables de sesión estén vacías        
                            ?>                                     
                                      <form action="comprobar.php" method="post">
                                        <div align="center">
                                          <table class="table table-striped" id="example2">
                                          <tr>
                                            <td><strong>Usuario:</strong></td>
                                            <td><input type="text" name="usuario_nombre" /></td>
                                           </tr>
                                          <tr>
                                            <td><strong>Contraseña:</strong></td>
                                            <td><input type="password" name="usuario_clave" /></td>
                                           </tr>
                                           <tr>
                                            <td colspan="2" align="center"><input type="submit" name="acceder" value="Acceder" class="btn btn-danger btn-cons"/></td>
                                           </tr>
                                        </table>
                                        </div>
                                        <p><br>
<p align="center">
    <font size="2"><b><a href="index.php?user=<?php echo $user;?>">Atrás</a> &nbsp;| &nbsp;
    <a href="" onClick="window.close()">Salir</a></b></font></p>                                        
                                        </p>
</form>
                             <?php
								//}else {
							?>
                            <?php
								//}
							?>  
								  </div>
								</section>
</div></div></div>
<div align="center">
<font size="1">MDPyEP  @ 2015<br>
</font>
</div>
</body>
</html>
