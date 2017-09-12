<?php session_start(); ?>
<?php
include_once("connection/database/connection.php");
include_once("connection/core/operator.php");
?>
<?php include_once('verifyLogin.php');
if ($_SESSION[SITE]["uidtipoformulario"]==1) { 
    $sql = "SELECT * FROM adm_gestion WHERE gest_uid NOT IN (SELECT regi_gest_uid FROM sys_registros WHERE regi_swmodifica_uid = '0' and regi_user_uid='".$_SESSION[SITE]["usr_uid"]."') and gest_sw_active='1'";
    //echo $sql;
    $db->query($sql);
    if ($db->numrows() == 0) {
        header("Location: modcose/bol.php");
    }
        $sqml ="SELECT gest_gestion FROM sys_registros, adm_gestion WHERE regi_uid='".$_SESSION[SITE]["registro_uid"]."' and regi_gest_uid=gest_uid and gest_sw_active='1'";        
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />
    <title>Formularios</title>
    <meta name="description" content="Inicio" />
    <meta name="keywords" content="Inicio" />
    <link href="css/layout.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="lib/favicon.ico"   type="image/x-icon"/>    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function(){
            $("#user").click( function() {
                $("#message").hide();
            }); 
        } );
    </script>
</head>
<body>    
<?php
/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];
//echo $usuario_uid."-";
//echo $regisroUID."-";
//echo $uidFormulario;
$permeDit= $_SESSION[SITE]["typeusrform"];
$sql = "SELECT inge_razonsocial FROM cap1_informacion_general WHERE inge_regi_uid = '".$regisroUID."' AND inge_formulario = '".$uidFormulario."' ";
$rzsocial = OPERATOR::getDbValue($sql);
//echo $sql;
$sql = "SELECT gest_gestion FROM adm_gestion WHERE gest_sw_active = '1'";
$gestion1 = OPERATOR::getDbValue($sql);
//$gestion1 = "gesti&oacute;n ".OPERATOR::getDbValue($sqml);
switch( $uidFormulario ){
    case 1: 
        //echo "es uno";
        $title1 = "ENCUESTA ANUAL DE UNIDADES PRODUCTIVAS<br /> COMERCIO Y SERVICIOS<br />";
        //$gestion1 = "gesti&oacute;n 2013";
        //echo $gestion1;
        $module = "M&oacute;dulo A";
        $titlemodule = "Encuesta anual de unidades productivas comercio y servicios <br /> Informaci&oacute;n general y financiera";
        $descriptionmodule = OPERATOR::getDescTitles(1,'A',0,0);
        $gotourl = "modcose"; //modcose
    break;
    case 2: 
        //echo "es dos";
        $title1 = "ENCUESTA ANUAL DE UNIDADES PRODUCTIVAS<br />INDUSTRIA MANUFACTURERA <br />";
        //$gestion1 = "gesti&oacute;n ".OPERATOR::getDbValue($sqml);        
        //$gestion1 = "gesti&oacute;n 2013";
        //echo $gestion1;        
        $module = "M&oacute;dulo A";
        $titlemodule = "Encuesta anual de unidades productivas <br /> Industria manufacturera";
        $descriptionmodule = OPERATOR::getDescTitles(2,'A',0,0);
        //echo $descriptionmodule;
        $gotourl = "modenin";  //modenin        
    break;
    case 3: 
        //echo "es tres";
        $title1 = "ENCUESTA ANUAL DE UNIDADES PRODUCTIVAS<br />PARA EL SECTOR AGROINDUSTRIA<br />";
        //$gestion1 = "gesti&oacute;n ".OPERATOR::getDbValue($sqml);
        //$gestion1 = "gesti&oacute;n 2013";
        //echo $gestion1;
        $module = "M&oacute;dulo A";
        $titlemodule = "INFORMACI&Oacute;N GENERAL Y FINANCIERA";
        $descriptionmodule = OPERATOR::getDescTitles(3,'A',0,0);
        $gotourl = "modagin";   //modagin        
    break;    
}  
?>
<div id="wrpB">    
    <div class="header">          
        <a href="<?php $domain ?>/intranet/option.php" class="logo">Ministerio</a>
        <div class="bxTit">
            <?php echo $title1; echo $gestion1;?>
        </div>
        <div class="infUP">
            <div class="usInf">
                <a href="logout.php" class="lnkS2">cerrar sesi&oacute;n</a>
                <?php echo $rzsocial ?>
            </div>
        </div>
    </div>
<!-- begin body -->
<div class="content">       
    <table class="dInf">
        <thead>
            <tr>
                <th><?php echo $module; ?></th>
                <th><?php echo $titlemodule; ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>                        
                <td colspan="2">
                    <p><?php echo $descriptionmodule; ?></p>
                </td>
            </tr>
        </tbody>
    </table>     
    <?php if( $uidFormulario == 4 ) { ?>
    <p>
        <h1 style="color:red; font-size: 20px;">Por el momento este formulario a&uacute;n no esta disponible para su llenado</h1>
    </p>
    <?php } else if($permeDit=='0' &&  $uidFormulario !=1 ){ ?>
    <!----
    <div class="bxMsj">IMPORTANTE<br />Cada vez que ingrese a este formulario, se le enviar&aacute; a la primera p&aacute;gina para que pueda realizar la revisi&oacute;n respectiva de sus datos.</div>
    --->
    <?php } ?> 
    <?php if( $_SESSION[SITE]["authenticated"] && ($uidFormulario == 1 || $uidFormulario == 2 || $uidFormulario == 3 ) ) { 
        if ($permeDit=='0') {
        ?>
    <form class="formA" action="<?php echo $domain; ?>/<?php echo $gotourl; ?>/acap1.php" method="POST" >
    <fieldset>
    <span class="bxBt">        
        <input type="submit" value="INICIAR" id="sendData" class="button">
    </span>
    </fieldset>
    </form>
    <?php }else{
                $sqml ="SELECT gest_gestion FROM sys_registros, adm_gestion WHERE regi_uid='".$regisroUID."' and regi_gest_uid=gest_uid and gest_sw_active='1'";
                $anio=OPERATOR::getDbValue($sqml);
        ?>
          <form class="formA" action="<?php echo $domain; ?>/<?php echo $gotourl; ?>/acap1.php" method="POST" >
    <fieldset>
    <?php if(!$anio){ ?>
    <p style="display:none">
          <span class="subT">Seleccionar Gesti&oacute;n:</span>
          <span class="clear"></span>             
          <select name="gestion" id="ai_societario" >
          <?php
             $sql = "SELECT * FROM adm_gestion WHERE gest_uid NOT IN (SELECT regi_gest_uid FROM sys_registros WHERE regi_swmodifica_uid = '0' and regi_user_uid='".$usuario_uid."') and gest_sw_active='1' ORDER BY gest_gestion DESC";
             $db->query($sql);
             while ($aSocietario = $db->next_record()) {
                   ?>
                   <option value="<?php echo $aSocietario["gest_uid"] ?>" ><?php echo $aSocietario["gest_gestion"] ?></option>                
                  <?php } ?>
            </select>            
    </p>
    <?php }?>
    <span class="bxBt">        
        <input type="submit" value="INICIAR" id="sendData" class="button">
    </span>
    </fieldset>
    </form>
    <?php } } ?> 
    <div class="clear"></div>      
</div>
<!-- end body -->
</div>
</body>
</html>