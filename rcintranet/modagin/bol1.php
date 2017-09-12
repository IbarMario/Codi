<?php session_start(); ?>
<?php
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
?>
<?php include_once('../verifyLogin.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />    
    <title>Formulario de Encuesta Comercio y Servicios</title>
    <meta name="description" content="Inicio" />
    <meta name="keywords" content="Inicio" />    
    <link href="../css_3/layout.css" rel="stylesheet" type="text/css" />    
    <link rel="shortcut icon" href="lib/favicon.ico"   type="image/x-icon"/>    
    <script type="text/javascript" src="../js/jquery.min.js"></script>   
    <script type="text/javascript" src="js/bol1.js"></script>    
</head>
<body>
    <?php
    /* usuario */
    $usuario_uid = $_SESSION[SITE]["usr_uid"];
    $regisroUID = $_SESSION[SITE]["registro_uid"];
    $uidFormulario = $_SESSION[SITE]["uidtipoformulario"];
    $sql = "SELECT inge_razonsocial FROM cap1_informacion_general WHERE inge_regi_uid = '".$regisroUID."' AND inge_formulario = '".$uidFormulario."' ";
    $rzsocial = OPERATOR::getDbValue($sql);
    $sql = "SELECT inge_matriculadecomercio FROM cap1_informacion_general WHERE inge_regi_uid = '".$regisroUID."' AND inge_formulario = '".$uidFormulario."' ";
    $nromatricula = OPERATOR::getDbValue($sql);
    $sql = "SELECT * FROM par_boleta WHERE bole_regi_uid = '".$regisroUID."' ";
    $db->query( $sql );
    if( $db->numrows() == 0 ) {
        $uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );
        $codigovalido = true;
        do {
            $codigo = rand(10000, 99999);
            $sql = "SELECT * FROM par_boleta WHERE bole_codigo = '".$codigo."' AND bole_codigo <> '' AND bole_codigo <> 0 ";
            $db2->query( $sql );
            if( $db2->numrows() == 0 ) {
                $codigovalido = false;
            }
        } while ($codigovalido);
        $sql = "INSERT INTO par_boleta SET ";
        $sql .= "bole_regi_uid = '".$regisroUID."', ";              
        $sql .= "bole_codigo = '".$codigo."', "; 
        $sql .= "bole_suv_uid = '".$uid_token."', "; 
        $sql .= "bole_createdate = NOW(), "; 
        $sql .= "bole_updatedate = NOW() ";                          	 	
        $db3->query( $sql );
        //para registrar en la tabla de aprobaciones
        $sql = "INSERT INTO t_aprobacion SET ";
        $sql .= "aprobacion_regi_uid = '".$regisroUID."', ";
        $sql .= "aprobacion_codigo_control = '".$codigo."', ";
        $sql .= "aprobacion_matricula = '".$nromatricula."', ";
        $sql .= "aprobacion_nro_registro = '".($regisroUID+170712)."', ";
        $sql .= "bole_createdate = NOW(), ";
        $sql .= "bole_updatedate = NOW() ";                         	 	
        $db3->query( $sql );                 
    }
    $codigo = OPERATOR::getDbValue("SELECT bole_codigo FROM par_boleta WHERE bole_regi_uid = '".$regisroUID."'");
    //$sql = "SELECT inge_razonsocial, inge_ciiu, inge_nit, inge_matriculadecomercio FROM cap1_informacion_general WHERE inge_regi_uid = '".$regisroUID."' AND inge_formulario = '".$uidFormulario."' ";
    $sql = "SELECT * FROM cap1_informacion_general WHERE inge_regi_uid = '".$regisroUID."' AND inge_formulario = '".$uidFormulario."' ";    
    $db->query($sql);
    $aBoleta = $db->next_record();    
    
    $sql1 = "SELECT sys_registros.regi_uid,sys_registros.regi_user_uid,sys_registros.regi_gest_uid,sys_registros.regi_form_uid,sys_registros.regi_swmodifica_uid,sys_registros.regi_legal_name,sys_registros.regi_legal_ci,sys_registros.regi_movco,sys_registros.regi_createdate,
sys_users.usr_uid, sys_users.usr_login, sys_users.usr_pass, sys_users.usr_email, sys_users.usr_nombres, sys_users.usr_paterno, sys_users.usr_materno, sys_users.usr_ci, sys_users.usr_ci_exp
FROM sys_users INNER JOIN sys_registros ON sys_users.usr_uid = sys_registros.regi_user_uid WHERE sys_registros.regi_uid = '".$regisroUID."'";
    //echo $sql1;    
    $db->query($sql1);
    $aPersona = $db->next_record();        
    ?>
    <!-- begin body -->
    <div id="wrpB">
        <div id="areaprint">
            <div class="headerB">
                <a href="#" class="logo"><img src="<?php echo $domain; ?>/lib/logo_b.jpg" alt="Ministerio" width="298" height="97" /></a>    </div>
                <div class="contentB">
                    <p>
                        Una vez que haya concluido de responder la presente encuesta, por favor imprima 2 ejemplares de la siguiente boleta y preséntelos en FUNDEMPRESA junto con los demás requisitos para la actualización de su Matrícula de Comercio .<br>
                        BOLETA DE CONSTANCIA DE PRESENTACI&Oacute;N DE LA ENCUESTA ANUAL DE UNIDADES PRODUCTIVAS - COMERCIO Y SERVICIOS DEL MINISTERIO DE DESARROLLO PRODUCTIVO Y ECONOM&Iacute;A PLURAL
                    </p>
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
                                        <label class="labB"><?php echo $aPersona["usr_ci"]." ".$aPersona["usr_ci_exp"];; ?></label></td>
                                        <tr>                        
                                    <td><span class="bold">Correo Eléctrónico:</span>
                                        <label class="labB"><?php echo $aPersona["usr_email"]; ?></label></td>
                               </tr>
                      </tbody>
             </table>
                    <!----
             <table class="fOpt">
                  <thead>
                     <tr>
                        <th colspan="2">ENTREGADO POR</th>
                  </tr>
                  </thead>
                    <tbody>
                        <tr>                        
                            <td colspan="2"><span class="bold">Nombre del Representante Legal:</span> 
                                <label class="labB"><?php echo $aBoleta["inge_razonsocial"]; ?></label></td>
                            </tr>
                            <tr>                        
                                <td><span class="bold">C&eacute;dula de Identidad:</span> 
                                    <label class="labB"><?php echo $aBoleta["inge_matriculadecomercio"]; ?></label></td>                                            
                                    </tr>
                    </tbody>
            </table>
                    -->
            <form class="formA validable" action="cofirmrecord.php" method="post" style="text-align: center;">
                    <fieldset>
                        <p class="bold">ENTREGADO POR</p>
                        <table class="fOpt">
                            <thead>
                                <tr>
                                    <th>NOMBRE REPRESENTANTE LEGAL<span class="color4">*</span>:</th>
                                    <th>CÉDULA DE IDENTIDAD<span class="color4">*</span>:</th>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>                        
                                <td>
                                    <input type="text" name="ai_nit" id="ai_nit" value="<?php echo OPERATOR::getDbValue("SELECT regi_legal_name FROM sys_registros WHERE regi_uid = '".$regisroUID."'") ?>" size="33" class="inpC" onfocus="$('#div_ai_nit').hide(); $(this).removeClass('req');" />
                                    <span id="div_ai_nit" class="bxEr" style="display:none" >requerido</span>
                                </td>
                                <td>
                                    <input type="text" name="ai_ci" id="ai_ci" value="<?php echo OPERATOR::getDbValue("SELECT regi_legal_ci FROM sys_registros WHERE regi_uid = '".$regisroUID."'") ?>" size="33" class="inpC" onfocus="$('#div_ai_ci').hide(); $(this).removeClass('req');" />
                                    <span id="div_ai_ci" class="bxEr" style="display:none" >requerido</span>
                                </td>
                            </tr>                            
                        </tbody>
                    </table>
                    <table class="fOpt">
                <tbody>
                    <tr>                        
                        <td class="tabB"><span class="bold">&nbsp;</span> 
                            <label class="labB">&nbsp;</label></td>
                            <td class="tabB"><span class="bold">&nbsp;</span>
                                <label class="labB">&nbsp;</label></td>
                            </tr>
                            <tr>                        
                                <td class="tabB">Fecha Actual: <?php echo date("Y-m-d H:i:s"); ?></td>
                                <td class="tabB"><span class="bold">Firma:</span>
                                    <label class="labB">____________</label></td>
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
                        <div class="bxMsj"><p>El suscrito REPRESENTANTE LEGAL certifica la veracidad de la información proporcionada en la presente encuesta, la misma que tiene condición de DECLARACIÓN JURADA ante el Estado Plurinacional de Bolivia.<br /> El Ministerio de Desarrollo Productivo y Economía Plural se reserva el derecho de verificar la autenticidad de la información proporcionada ante las instancias que correspondan.</p></div>
                        <p>
                            <span class="subT"></span>
                            <span class="clear"></span>                
                            <span id="div_ai_nit_2" class="bxEr" style="display:none" >inválido</span>
                        </p>
                        <p><span class="contChk">
                            <input type="checkbox" name="chkconforme" id="chkconforme" class="chk" />
                            <label class="labChkB2">Juro la autenticidad de la información contenida en la encuesta</label>
                        </span></p>
                        <span class="bxBt">                    	                        					                        
                            <input type="submit" value="  FINALIZAR  " id="sendData" style="display:none" name="continuarregistro" class="buttonB" />    
                            <?php 
                            if (OPERATOR::getDbValue("SELECT regi_movco FROM sys_registros WHERE regi_uid='".$regisroUID."'")=="YES") {?>   
                            <a href="dcap2.php" class="btnS">ANTERIOR</a>
                            <?php }else{?>
                            <a href="acap1.php" class="btnS">ANTERIOR</a>
                            <?php } ?>
                        </span>
                        <p>Antes de finalizar, debe jurar la autenticidad de la información contenida en la encuesta, marcando el campo señalado.</p>
                    </fieldset>
                </form>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</body>
</html>
