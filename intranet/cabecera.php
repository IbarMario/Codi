<?php
//include_once("session.php");
include_once("db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="css/bootstrap3/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap3/sb-admin-2.css" rel="stylesheet">
    
    	<link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo1.css" />
        <link rel="stylesheet" type="text/css" href="css/style4.css" />
        <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
        
        <link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
</head>
<body>

    
    <table border="0" cellpadding="1" cellspacing="0" class="btn btn-primary btn-lg" style="margin-top:-10px;width:100%;">
		<tr>
			<td><a href="frmDirectorio.php" target="mainFrame"><img src="images/MDPyEP_LOGO3.jpg" width="242" height="93"/><br />
           <br /> <b><font face="Lucida Console, Monaco, monospace" color="#CCCCCC">INTRANET 2.0</font></b></a>
            </td>
			<td>
        <div class="container">
            <div class="content">
              <ul class="ca-menu">
              <li>
                        <a href="frmDocumentos.php" target="mainFrame">
                            <span class="ca-icon">F</span>
                            <div class="ca-content">
                                <h2 class="ca-main"><br /><br /><br /><br />Documentos &<br> Formularios</h2>
                                <h3 class="ca-sub"> </h3>
                            </div>
                        </a>
                </li>
              <li>
                        <a href="frmCirculares.php" target="mainFrame">
                            <span class="ca-icon">S</span>
                            <div class="ca-content">
                                <h2 class="ca-main"><br /><br /><br /><br />Circulares</h2>
                                <h3 class="ca-sub"> </h3>
                            </div>
                        </a>
                </li>                
                    <li>
                        <a href="frmComunicados.php" target="mainFrame">
                            <span class="ca-icon">H</span>
                            <div class="ca-content">
                                <h2 class="ca-main"><br /><br /><br /><br />Comunicados</h2>
                                <h3 class="ca-sub"> </h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="frmReglamentos.php" target="mainFrame">
                            <span class="ca-icon">K</span>
                            <div class="ca-content">
                                <h2 class="ca-main"><br /><br /><br /><br />Reglamentos</h2>
                                <h3 class="ca-sub"> </h3>
                        </div>
                      </a>
                </li>
                <li>
                        <a href="frmResoluciones.php" target="mainFrame">
                            <span class="ca-icon">A</span>
                            <div class="ca-content">
                                <h2 class="ca-main"><br /><br /><br /><br />Resoluciones</h2>
                                <h3 class="ca-sub"> </h3>
                        </div>
                      </a>
                </li>
                    <li>
                        <a href="frmOtros.php" target="mainFrame">
                            <span class="ca-icon">I</span>
                            <div class="ca-content">
                                <h2 class="ca-main"><br /><br /><br /><br />Otros</h2>
                              <h3 class="ca-sub"> </h3>
                        </div>
                      </a>
                </li>
                    <li>
                        <a href="frmDirectorio.php" target="mainFrame">
                            <span class="ca-icon">L</span>
                            <div class="ca-content">
                                <h2 class="ca-main"><br /><br /><br /><br />Directorio<br /> Telefónico</h2>
                                <h3 class="ca-sub"> </h3>
                            </div>
                        </a>
                    </li>
              </ul>
            </div><!-- content -->
        </div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
          </td>			
		</tr>
	</table> 
<br />                
<div align="center" id="estilo1">
<a href="http://produccion.gob.bo/" target="_blank" title="Sitio Web MDPyEP"><img src="img/MDPyEP.jpg" width="111" height="45" /></a> 
<a href="http://codice.produccion.gob.bo/" target="_blank" title="CODICE"><img src="img/codice.png" width="111" height="45" /></a> 
<a href="http://192.168.20.55/rrhh-asistencia/" target="_blank" title="Asistencia RRHH"><img src="img/asistencia.jpg" width="111" height="45" /></a> 
<a href="https://correo.produccion.gob.bo/" target="_blank" title="Correo Institucional"><img src="img/correo2.png" width="111" height="45" /></a>
<a href="http://codice.produccion.gob.bo/index" target="_blank" title="Soporte Técnico"><img src="img/soporte.jpg" width="111" height="45" /></a>
<!--<a href="frmCumple.php" title="Soporte Técnico"><img src="img/cumple.jpg" width="111" height="45" /></a>-->
</div>        
</body>
</html>
