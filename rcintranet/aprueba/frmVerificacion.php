<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />
    <meta name="robots" content="all" />
    <meta name="copyright" content="MINISTERIO DE DESARROLLO PRODUCTIVO Y ECONOMIA PLURAL" />
    <meta name="category" content="General" />
    <meta name="rating" content="General" />
    <title>Ministerio de Desarrollo Productivo y Economía Plural</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="../css/layout.css" rel="stylesheet" type="text/css" />
    <script type="../text/javascript" src="js/jquery.min.js"></script>
    <script type="../text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="../text/javascript" src="js/validable3.js"></script>
    <script type="../text/javascript">
        $(document).ready( function(){
            $("#user").click( function() {
                $("#message").hide();
            });
        } );
    </script>
  <script type="text/javascript" src="../js/jquery.atooltip.js"></script>
  <script type="text/javascript">
        $(function(){ 
            $('.normalTip').aToolTip();       
        }); 
    </script>
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
</head>
<?php
include('db.php');
$idusuario = $_GET['$iMsXa09'];
echo $idusuario;
  $sql = mysql_query("SELECT * FROM t_usuarios WHERE usr_uid='".$idusuario."' AND usr_status='ACTIVE'");
        //echo $sql;
        if($row = mysql_fetch_array($sql)) {
            ////$_SESSION['usuario_id'] = $row['usuario_id'];        // creamos la sesion "usuario_id" y le asignamos como valor el campo usuario_id
            $usuario = $row["usr_login"];    // creamos la sesion "usuario_nombre" y le asignamos como valor el campo usuario_nombre
            $nombres = $row["usr_nombres"];
            $paterno = $row["usr_paterno"];
            $materno = $row["usr_materno"];
            $fechacrea = $row["usr_datecreate"];                                            
   ?>
<body>
<div align="center" id="wrpB">    
     <div align="center">
  <h3><img src="../lib/logo_c.jpg"></h3>
  </div>    
  <div class="contH">       
        <div class="bxCnt"><br/>
            <h2>Bienvenido <label name="nombre" ><?php echo $nombres;?></label>
            <label name="paterno" ><?php echo $paterno;?></label>
            <label name="materno" ><?php echo $materno;?></label><br/></h2>
            Este módulo permite aprobar un formulario de Encuesta previamente llenado.<br/>
            Escriba uno de los códigos de búsqueda, Número de Registro o Código de Control.<br/>            
    </div>
    <div  class="contC">            
<h2>Aprobación de Formulario</h2>
            <p>
            Ingrese registros de búsqueda:</p>
            <p><br />
            </p>            
            <!--<form class="formL validable" autocomplete="Off" method="post" action="buscador.php" >  -->                       
  <form  method="post" action="frmVerificacion01.php" > 
      <!-- 
      <input type="hidden" id="idusuario" name="idusuario" size="15" value='<?php echo ($idusuario);?>' />
      -->
            <fieldset>            
    <table width="450" border="1" cellspacing="1" cellpadding="1">
        <!-- <tr>
          <td width="145" height="38">&nbsp;<label>N&ordm; de matr&iacute;cula:</label></td>
          <td width="234"><input type="text" id="matricula" name="matricula" size="20" class="textbox" title="Ingrese el Número de Matrícula."/></td>
        </tr> -->
        <tr>
          <td height="38">&nbsp;<label>N&ordm; de registro:</label></td>
          <td><input type="text" id="registro" name="registro" size="20" class="textbox" title="Ingrese el Número de Registro." /></td>
        </tr>
        <tr>
          <td>&nbsp;<label>Codigo de control:</label></td>
          <td><input type="text" id="comercio" name="comercio" size="20" class="textbox" title="Ingrese el Número de Código de Control." /> </td>
          <input type="text" id="idusuario1" name="idusuario1" size="20" value="<?php echo $idusuario; ?>" />
        </tr>
        <tr>            
        </tr>
        <tr>
          <td height="38" colspan="2"><p>&nbsp;
            </p>
            <p>
              <div align="center"><input type="submit" value="BUSCAR" name="buscar" class="button"/></div>
          </p></td>
        </tr>
      </table>
<p>      
 </p>
     <p>
    </p>
      <p>                                                    
      </p>
        <p>
                <label>&nbsp;</label>
              </p>
            </fieldset>
            </form>         
    </div>
  </div>                
</div>
</body>    
</html>                        
   <?php                                                                        
        } else {
            echo "No puede cambiar los datos";            
        }
?>


