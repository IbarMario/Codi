<?php
session_start();
include('../db.php');
$user=$_GET['user'];
//include('acceso_db.php');
if(isset($_POST['acceder'])) { // comprobamos que se hayan enviado los datos del formulario
    // comprobamos que los campos usuarios_nombre y usuario_clave no estén vacíos  
//$_SESSION['usuario_nombre'] = $row["usuario_nombre"]; // creamos la sesion "usuario_nombre" y le asignamos como valor el campo usuario_nombre
echo "<script>
var idUser = '$idusuario';
</script>";                      
    if(empty($_POST['usuario_nombre']) || empty($_POST['usuario_clave'])) {
        echo "El usuario o la contraseña no han sido ingresados. <a href='javascript:history.back();'>Reintentar</a>";
    } else {
        // "limpiamos" los campos del formulario de posibles códigos maliciosos
        $usuario_nombre = mysql_real_escape_string($_POST['usuario_nombre']);
        $usuario_clave = mysql_real_escape_string($_POST['usuario_clave']);           
        $usuario_clave = md5($usuario_clave);
        $usuario_clave = $usuario_clave;
        //echo $usuario_nombre;
        //echo $usuario_clave;
        //comprobamos que los datos ingresados en el formulario coincidan con los de la BD
        $sql = mysql_query("SELECT usr_login, usr_pass, usr_uid FROM t_usuarios WHERE (usr_login='".$usuario_nombre."' AND usr_pass='".$usuario_clave."' AND usr_status='ACTIVE' AND usr_tipo_usuario = 1); ");
        //echo $sql;
        if($row = mysql_fetch_array($sql)) {
            ////$_SESSION['usuario_id'] = $row['usuario_id'];        // creamos la sesion "usuario_id" y le asignamos como valor el campo usuario_id
            $_SESSION['usuario_nombre'] = $row["usuario_nombre"];    // creamos la sesion "usuario_nombre" y le asignamos como valor el campo usuario_nombre
            $idusuario = $row["usr_uid"];
            //echo ("INSERT into t_accesos (usuario_acceso, fecha_acceso, tarea_acceso, observ_acceso) values ('$idusuario',now(), 'APROBACION DE BOLETAS DE BOLETAS DE CONSTACIO DE PRESENTACION DE LA ENCUESTAS ANUAL DE UNIDADES PRODUCTIVAS', 'NINGUNA')");
            $sql = mysql_query("INSERT into t_accesos (usuario_acceso, fecha_acceso, tarea_acceso, observ_acceso) values ('$idusuario',now(), 'INSERTA DATOS DE LAS BOLETAS ENTREGADAS 2014 DE UNIDADES PRODUCTIVAS', 'INGRESO');");
            //echo $sql;            
            echo "<script>var idUser = '$idusuario';</script>";            
            echo '<script type="text/javascript">window.location.href="frm_matricula.php?$iMsXa09="+idUser </script>';
            //echo "dlkfjklasdfjaklsdf";
            //se llama al archivo donde se pide los datos
            ?>
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
    <link href="css/layout.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/validable3.js"></script>
    <script type="text/javascript">
        $(document).ready( function(){
            $("#user").click( function() {
                $("#message").hide();
            });
        } );
    </script>
  <script type="text/javascript" src="js/jquery.atooltip.js"></script>
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

<body>
<div align="center" id="wrpB">    
     <div align="center">
  <h3><img src="lib/logo_c.jpg"></h3>
    </div>    
  <div class="contH">
        <div class="bxCnt"><br/>
            Módulo que permite aprobar un formulario de Encuesta previamente llenado.<br/>
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
     <input type="text" id="idusuario" name="idusuario" size="50" value='<?php echo ($_GET['idusuario']);?>'  />
    <fieldset>
    <table width="392" border="1" cellspacing="1" cellpadding="1">
        <!--<tr>
          <td width="145" height="38">&nbsp;<label>N&ordm; de matr&iacute;cula:</label></td>
          <td width="234"><input type="text" id="matricula" name="matricula" size="20" class="textbox" title="Ingrese el Número de Matrícula."/></td>
        </tr>-->
        <tr>
          <td height="38">&nbsp;<label>N&ordm; de registro:</label></td>
          <td><input type="text" id="registro" name="registro" size="20" class="textbox" title="Ingrese el Número de Registro." /></td>
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
            
       ?> <?php
       
       } else {
?>				
           <script type="text/javascript">
              alert("Usuario y contraseña incorrecto..!!! \n Vuelva a intentarlo");
           </script>
           <script type="text/javascript">window.location.href="index.php";</script>
           <script type="text/javascript">window.close();</script>
           <!--Error, <a href="index.php">Reintentar</a>-->
<?php
       }
    }
} else {
    //header("Location: index.php");
        echo '<script type="text/javascript">window.location.href="index.php";</script>';
    }
?> 
<head>
    <title>MDPyEP</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
</head>0p3