<?php session_start();

include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
$bole = OPERATOR::getDbValue("SELECT bole_status FROM par_boleta WHERE bole_regi_uid = '".$_SESSION[SITE]["registro_uid"]."'");
if ($bole!=1) {
   $codigo = OPERATOR::getDbValue("SELECT bole_codigo FROM par_boleta WHERE bole_regi_uid = '".$_SESSION[SITE]["registro_uid"]."'");
$matri = OPERATOR::getDbValue("SELECT inge_matriculadecomercio FROM cap1_informacion_general WHERE inge_regi_uid=".$_SESSION[SITE]["registro_uid"]." and inge_delete<>1");
//$resultado = ldjdujerhrjhgnvbdybyrg($matri,$codigo,'http://200.105.134.19:10080/wsInfoBoletas/servdata.asmx?WSDL');
}

$clieUid = OPERATOR::getDbValue("select suv_cli_uid from sys_users_verify left join sys_users on usr_uid= suv_cli_uid  where suv_status=0 and suv_ip='".$_SERVER['REMOTE_ADDR']."' and suv_token='".$_SESSION[SITE]["TOKEN_FRONT"]."' and usr_delete=0 and usr_status='ACTIVE' ");

function checkEmpty($var) {
    if (strlen($var) >= 1) {
        return false; // !empty
    } else {
        return true; // empty
    }
}

if( $_SESSION[SITE]["authenticated"]===true && $clieUid === $_SESSION[SITE]["usr_uid"] && !checkEmpty($_SESSION[SITE]["val_regi_swmodifica_uid"]) &&  $_SESSION[SITE]["val_regi_swmodifica_uid"] == 0 ) {
       $newToken = sha1(PREFIX.uniqid( rand(), TRUE ));
       $sqlDat ="update sys_users_verify set suv_token = '".$newToken."' where suv_token='".$_SESSION[SITE]["TOKEN_FRONT"]."' and suv_ip='".$_SERVER['REMOTE_ADDR']."'";
       //echo $_SERVER['REMOTE_ADDR'];
       $db->query($sqlDat);
	   $_SESSION[SITE]["TOKEN_FRONT"] = $newToken;        
	     
} else { 
    header("Location: logout.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />    
    <title>Formulario de Encuesta Comercio y Servicios</title>
    <meta name="description" content="Inicio" />
    <meta name="keywords" content="Inicio" />    
    <link href="../css_1/layoutb.css" rel="stylesheet" type="text/css" />    
    <link rel="shortcut icon" href="lib/favicon.ico"   type="image/x-icon"/>    
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.printarea.js"></script>
    <script type="text/javascript" src="js/bol.js"></script>
</head>
<body>
<?php

/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];

$sql = "SELECT inge_razonsocial FROM cap1_informacion_general WHERE inge_regi_uid = '".$regisroUID."' AND inge_formulario = '".$uidFormulario."' ";
$rzsocial = OPERATOR::getDbValue($sql);

$codigo = OPERATOR::getDbValue("SELECT bole_codigo FROM par_boleta WHERE bole_regi_uid = '".$regisroUID."'");

$sql = "SELECT aprobacion_incidencia, aprobacion_usuario_id FROM t_aprobacion WHERE aprobacion_regi_uid = '".$regisroUID."' AND aprobacion_codigo_control = '".$codigo."' ";
//echo $sql;
$db->query($sql);
$aCodigos = $db->next_record();
$incidencia = $aCodigos["aprobacion_incidencia"];
$usuarioid = $aCodigos["aprobacion_usuario_id"];
//echo $incidencia;
//echo $usuarioid;
$sql = "SELECT inge_razonsocial, inge_ciiu, inge_nit, inge_matriculadecomercio FROM cap1_informacion_general WHERE inge_regi_uid = '".$regisroUID."' AND inge_formulario = '".$uidFormulario."' ";
$db->query($sql);
$aBoleta = $db->next_record();

    $sql1 = "SELECT sys_registros.regi_uid,sys_registros.regi_user_uid,sys_registros.regi_gest_uid,sys_registros.regi_form_uid,sys_registros.regi_swmodifica_uid,sys_registros.regi_legal_name,sys_registros.regi_legal_ci,sys_registros.regi_movco,sys_registros.regi_createdate,
sys_users.usr_uid, sys_users.usr_login, sys_users.usr_pass, sys_users.usr_email, sys_users.usr_nombres, sys_users.usr_paterno, sys_users.usr_materno, sys_users.usr_ci, sys_users.usr_ci_exp
FROM sys_users INNER JOIN sys_registros ON sys_users.usr_uid = sys_registros.regi_user_uid WHERE sys_registros.regi_uid = '".$regisroUID."'";
    $sql1 = "SELECT sys_registros.regi_uid,sys_registros.regi_user_uid,sys_registros.regi_gest_uid,sys_registros.regi_form_uid,sys_registros.regi_swmodifica_uid,sys_registros.regi_legal_name,sys_registros.regi_legal_ci,sys_registros.regi_movco,sys_registros.regi_createdate,
sys_users.usr_uid, sys_users.usr_login, sys_users.usr_pass, sys_users.usr_email, sys_users.usr_nombres, sys_users.usr_paterno, sys_users.usr_materno, sys_users.usr_ci, sys_users.usr_ci_exp, sys_users.usr_usuario_id
FROM sys_users INNER JOIN sys_registros ON sys_users.usr_uid = sys_registros.regi_user_uid WHERE sys_registros.regi_uid = '".$regisroUID."'";
    //echo $sql1;    
    $db->query($sql1);
    $aPersona = $db->next_record(); 
    
    //observaciones
    //se tiene el codigo del transcriptor    
    //OBSERVACIONES
    $idtranscriptor = $aPersona["usr_usuario_id"];
    
    $control1 = 0;
    $observ1='';
    $sql = "SELECT pesu_observacion FROM cap2_personalsueldos WHERE pesu_regi_uid = '".$regisroUID."' AND pesu_control = '1' ";
    $db->query($sql);
    $observa1 = $db->next_record();
    //echo $observa1["pesu_observacion"];
    if ($observa1["pesu_observacion"] == ''){
        $control1=0;
        $observ1='';
    } else {
        $control1=1;
        $observ1 = $observa1["pesu_observacion"];
    }
    
    $control2 = 0;
    $observ2='';
    $sql = "SELECT inma_observacion FROM frm1_cap4_inventariomateriales WHERE inma_regi_uid = '".$regisroUID."' AND inma_control = '1' ";
    $db->query($sql);
    $observa2 = $db->next_record();
    //echo $observa2["inma_observacion"];
    if ($observa2["inma_observacion"] == ''){
        $control2=0;
        $observ2 = '';
    } else {
        $control2=1;
        $observ2 = $observa2["inma_observacion"];
    }
    
    $control3 = 0;
    $observ3='';
    $sql = "SELECT otga_observacion FROM frm1_cap5_otrosgastosoperativos WHERE otga_regi_uid = '".$regisroUID."' AND otga_control = '1' ";
    $db->query($sql);
    $observa3 = $db->next_record();
    //echo $observa3["otga_observacion"];
    if ($observa3["otga_observacion"] == ''){
        $control3=0;
        $observ3 = '';
    } else {
        $control3=1;
        $observ3 = $observa3["otga_observacion"];
    }

    $contro4 = 0;
    $observ4='';
    $sql = "SELECT core_observacion FROM frm1_cap6_comprareventa WHERE core_regi_uid = '".$regisroUID."' AND core_control = '1' ";
    $db->query($sql);
    $observa4 = $db->next_record();
    //echo $observa4["core_observacion"];
    if ($observa4["core_observacion"] == ''){
        $control4=0;
        $observ4 = '';
    } else {
        $control4=1;
        $observ4 = $observa4["core_observacion"];
    }
    
    $contro5 = 0;
    $observ5='';
    $sql = "SELECT vese_observacion FROM frm1_cap7_ventaservicios WHERE vese_regi_uid = '".$regisroUID."' AND vese_control = '1' ";
    $db->query($sql);
    $observa5 = $db->next_record();
    //echo $observa5["vese_observacion"];
    if ($observa5["vese_observacion"] == ''){
        $control5=0;
        $observ5 = '';
    } else {
        $control5=1;
        $observ5 = $observa5["vese_observacion"];
    }
    
    $contro6 = 0;
    $observ6='';
    $sql = "SELECT rege_observacion FROM frm1_cap8_resultadosgestion WHERE rege_regi_uid = '".$regisroUID."' AND rege_control = '1' ";
    $db->query($sql);
    $observa6 = $db->next_record();
    //echo $observa6["rege_observacion"];
    if ($observa6["rege_observacion"] == ''){
        $control6=0;
        $observ6 = '';
    } else {
        $control6=1;
        $observ6 = $observa6["rege_observacion"];
    }    
    
    $contro7 = 0;
    $observ7='';
    $sql = "SELECT foaf_observacion FROM frm1_cap9_formacionactivosfijos WHERE foaf_regi_uid = '".$regisroUID."' AND foaf_control = '1' ";
    $db->query($sql);
    $observa7 = $db->next_record();
    //echo $observa7["foaf_observacion"];
    if ($observa7["foaf_observacion"] == ''){
        $control7=0;
        $observ7 = '';
    } else {
        $control7=1;
        $observ7 = $observa7["foaf_observacion"];
    }
    
    $contro8 = 0;
    $observ8='';
    $sql = "SELECT capa_observacion FROM frm1_cap10_capitalpatrimonio WHERE capa_regi_uid = '".$regisroUID."' AND capa_control = '1' ";    
    $db->query($sql);
    $observa8 = $db->next_record();
    //echo $observa8["foaf_observacion"];
    if ($observa8["foaf_observacion"] == ''){
        $control8=0;
        $observ8 = '';
    } else {
        $control8=1;
        $observ8 = $observa8["foaf_observacion"];
    }                                 
    
    //observaciones

?>
<!-- begin body -->
<div id="wrpB">
    

<div class="contCl">
    <a href="../logout.php" class="btnCls">Cerrar sesi&oacute;n</a>
    <a href="#" class="btnPrint" id="sendData" >Imprimir</a>
    <a href="../frmMatricula.php?$iMsXa09=<?php echo $usuarioid;?>" class="btnCls">Continuar</a>
    <?php 
     //echo "<script>var idUser = '$idusuario';</script>";            
     //echo '<script type="text/javascript">window.location.href="frmMatricula.php?$iMsXa09="+idUser </script>';
    ?>
    
</div>
<div id="areaprint" class="print" >

<div class="headerB">

<a href="#" class="logo"><img src="<?php echo $domain; ?>/lib/logo_b.jpg" alt="Ministerio" width="298" height="97" /></a>    </div>
<div class="contentB">

    <p>BOLETA DE CONSTANCIA DE PRESENTACI&Oacute;N DE LA ENCUESTA ANUAL DE UNIDADES PRODUCTIVAS, COMERCIO Y SERVICIOS DEL MINISTERIO DE DESARROLLO PRODUCTIVO Y ECONOM&Iacute;A PLURAL</p>
    <?php 
        if (OPERATOR::getDbValue("SELECT regi_movco FROM sys_registros WHERE regi_uid='".$regisroUID."'")=="NO") {
    ?>
            <b>SIN MOVIMIENTO</b>
    <?php } ?>
<table class="fOpt">
        <thead>
            <tr>
                <th colspan="2">DATOS GENERALES DE LA EMPRESA</th>
            </tr>
        </thead>
        <tbody>
            <tr>                        
                <td colspan="2"><span class="bold">Raz&oacute;n social o denominaci&oacute;n:</span> 
                <label class="labB"><?php echo $aBoleta["inge_razonsocial"]; ?></label></td>
            </tr>
            <tr>                        
                <td><span class="bold">N&ordm; de Matr&iacute;cula de Comercio:</span> 
                    <label class="labB"><?php echo $aBoleta["inge_matriculadecomercio"]; ?></label>
                </td>
                <td><span class="bold">CIIU:</span>
                    <label class="labB"><?php echo $aBoleta["inge_ciiu"]; ?></label>
                </td>
            </tr>
            <tr>                        
                <td><span class="bold">NIT:</span>
                    <label class="labB"><?php echo $aBoleta["inge_nit"]; ?></label>
                </td>
                <td><span class="bold">C&oacute;digo de Control:</span>
                    <label class="labB"><?php echo $codigo; ?></label>
                </td>
            </tr>
             <tr>                        
                <td><span class="bold">Número de registro:</span>
                    <label class="labB"><?php echo ($regisroUID+170712); ?></label>
                </td>
                <td><span class="bold"></span>
                    <label class="labB"></label>
                </td>
            </tr>
         </tbody>
    </table>            
    <table class="fOpt">
        <thead>
            <tr>
                <th colspan="2">DATOS GENERALES DE LA PERSONA QUE REGISTRO LOS DATOS DE LA ENCUESTA</th>
            </tr>
        </thead>
        <tbody>
            <tr>                        
                <td colspan="2"><span class="bold">Nombres y Apellidos:</span> 
                    <label class="labB"><?php echo $aPersona["usr_nombres"]." ".$aPersona["usr_paterno"]." ".$aPersona["usr_materno"];?></label></td>
                </tr>
                <tr>                        
                    <td><span class="bold">C&eacute;dula de Identidad:</span> 
                        <label class="labB"><?php echo $aPersona["usr_ci"]." ".$aPersona["usr_ci_exp"]; ?></label></td>
                    <tr>                        
                    <td><span class="bold">Correo Eléctrónico:</span>
                        <label class="labB"><?php echo $aPersona["usr_email"]; ?></label></td>
                    </tr>
      </tbody>
</table>
            
            <table class="fOpt">
                            <thead>
                                <tr>
                                     
                                    <th>INCIDENCIA<span class="color4">*</span>:</th>                                                
                                     
                                </tr>
                            </thead>
                            <tbody>                                
                              <tr>                        
                                  <?php if ($incidencia == 1) {?>
                                    <td> Completo</td>                                  
                                  <?php } ?>                                                                   
                                  <?php if ($incidencia == 2) {?>
                                  <td>Incompleto </td>                                  
                                  <?php } ?>                                                                                                     
                                  <?php if ($incidencia == 3) {?>
                                  <td> Información Básica</td>                                  
                                  <?php } ?>                                                                                                                                      
                                  
                            </tr>                            
                        </tbody>
                    </table>
<p class="bold">REPRESENTANTE LEGAL</p>

<table class="fOpt">
        <tbody>
        <tr>                        
            <td class="tabB"><span class="bold">Nombre y apellido:</span> 
                <label class="labB"><?php echo OPERATOR::getDbValue("SELECT regi_legal_name FROM sys_registros WHERE regi_uid = '".$regisroUID."'") ?></label></td>
            <td class="tabB"><span class="bold">Firma:</span>
                <label class="labB">_______________</label></td>                                                
        </tr>

        <tr>                        
            <td class="tabB"></td>
            <td class="tabB"><span class="bold">C. I.:</span>
                <label class="labB"><?php echo OPERATOR::getDbValue("SELECT regi_legal_ci FROM sys_registros WHERE regi_uid = '".$regisroUID."'") ?></label></td>
                 <td class="tabB"><span class="bold">Fecha Actual: <?php echo date("Y-m-d H:i:s"); ?></span>
                </td>
        </tr>
    </tbody>
</table>
<p class="small">
    <br />    
    <br />    
    <br />    
    <br />    
    SELLO RECEPCI&Oacute;N
</p>
<p class="small">..................................</p>
<div class="clear"></div>
</div>
</div>        
</div>
</body>
</html>
