<?php session_start(); ?>
<?php
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
?>
<?php include_once('../verifyLogin.php'); ?>
<?php include("header.php") ?>
<script type="text/javascript" src="js/bcap2.js"></script>

<?php
/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];

$sql = "SELECT * FROM  frm3_bcap2_sistemagestion WHERE sige_regi_uid = '".$regisroUID."' ";
$db->query( $sql );

if( $db->numrows() == 0 ) {

    $uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );
    
    $sql2 = "SELECT * FROM adm_definiciones WHERE defi_form_uid = '2' AND defi_modulo = 'b' AND defi_capitulo = '2' AND defi_swactive = 'ACTIVE' ";       
    $db2->query( $sql2 );
    while( $aDefinicion =  $db2->next_record() ) {
        $sql = "INSERT INTO  frm3_bcap2_sistemagestion SET ";
        $sql .= "sige_regi_uid = '".$regisroUID."', ";
        $sql .= "sige_defi_uid = '".$aDefinicion["defi_uid"]."', ";         
        $sql .= "sige_description = '', "; 
        $sql .= "sige_suv_uid = '".$uid_token."', "; 
        $sql .= "sige_createdate = NOW(), "; 
        $sql .= "sige_updatedate = NOW() ";                                 
        $db3->query( $sql );               
    }       
}

?>
<div class="content">
<span id="statusACAP1" style="display:none" ><div class="bxS"><img alt="Guardado" src="../lib/ico_chk.gif">guardado</div></span>
    
    <table class="dInf">
    <thead>
    <tr>
        <th>CAP&Iacute;TULO 2</th>
        <th>SISTEMAS DE GESTI&Oacute;N</th>
    </tr>
    </thead>    
    </table>
    <form class="formA validable" action="bcap2Add.php" method="post" autocomplete="off" >
        <fieldset>
         <p><span class="subT">1. ¿La empresa contó con un Sistema de Gestión Certificado en la última gestión?</span></p>
         <p><b>Sistema de Gestión Certificado</b>: Es un sistema de gestión que ha sido evaluado y certificado bajo norma específica por una organización acreditada para ese efecto, por ejemplo ISO 9001.<br>(Si respondió Si, marque las opciones con las que
cuenta, en la siguiente tabla y pase a la pregunta 2)</p>
         <p><span class="clear"></span> <input  <?php if (OPERATOR::getDbValue("SELECT sige_valor FROM frm3_bcap2_sistemagestion WHERE sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='575'")==1){ echo "checked=\"checked\""; };  ?> name="575" id="575_si" value="1" class="chk" type="radio" ><label class="labChk">Si</label>   <span class="clear"></span>   <input  <?php if (OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='575'")==2){ echo "checked=\"checked\""; };  ?> name="575" id="575_no" value="2" class="chk" type="radio" ><label class="labChk">No</label></p>
         <span id="575_div_no"  style=" <?php if (OPERATOR::getDbValue("SELECT sige_valor FROM frm3_bcap2_sistemagestion WHERE sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='575'")!=2){ echo "display:none"; };  ?>">
            <table class="fOpt">
                        
                        <thead>
                            <tr>
                                <th>¿Por qué?</th>
                                                        
                          </tr>
                        </thead>
                      </table>
                       <p>
                         <input   <?php if (OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='577'")==1){ echo "checked=\"checked\""; };  ?>   name="577" id="577" value="1" class="chk" type="checkbox">
                        <label class="labChkB">a) Falta de presupuesto</label>
                             <span class="clear"></span>
                         <input  <?php if (OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='578'")==1){ echo "checked=\"checked\""; };  ?>   name="578" value="1" id="578" class="chk" type="checkbox">
                        <label class="labChkB">b) Falta de conocimiento</label>
                              <span class="clear"></span>
                         <input id="579_in"  <?php if (OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='579'")==1){ echo "checked=\"checked\""; };  ?>   name="579" value="1" class="chk" type="checkbox">
                        <label class="labChk">c) Otros motivos (especificar)</label>
                        <span id="579_out" style=" <?php if (OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='579'")!=1){ echo "display:none"; };  ?>">
                        <input size="40" id="input8079" class="inpC" type="text" name="580" value="<?php echo OPERATOR::getDbValue("SELECT  sige_description  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='580'"); ?>"/>
                      </span>
                      </p>
                     
         </span>
 <span id="575_div_si"  style=" <?php if (OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='575'")!=1){ echo "display:none"; };  ?>">
    
                      <table class="fOpt">
                        
                        <thead>
                            <tr>
                                <th>CERTIFICACIÓN</th>
                                <th>ORGANISMO DE CERTIFICACIÓN</th>
                                <th>AÑO DE OBTENCIÓN</th>
                                <th>ÚLTIMO AÑO DE ACTUALIZACIÓN</th>
                             
                          </tr>
                        </thead>
                        
                        <tbody>
                          <tr>                        
                              <td class="titR">1. ISO 9001: Certificación de Sistema de Gestión de la Calidad </td>
                              <td><input type="text" size="16" class="inpC2" name="581" id="A_1" value="<?php echo OPERATOR::getDbValue("SELECT  sige_description  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='581'"); ?>"/></td>
                              <td><input type="text" size="16" maxlength="4" class="inpB2 validar" name="582" id="B_1" value="<?php echo OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='582'"); ?>"/></td>
                              <td><input type="text" size="16" maxlength="4" class="inpB2 validar" name="583" id="C_1" value="<?php echo OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='583'"); ?>"/></td>
                          </tr>
                            
                             <tr>                        
                              <td class="titR">2. ISO 14001: Certificación de Sistema de Gestión Ambiental </td>
                              <td><input type="text" size="16" class="inpC2" name="584" id="A_2" value="<?php echo OPERATOR::getDbValue("SELECT  sige_description  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='584'"); ?>"/></td>
                              <td><input type="text" size="16"  maxlength="4" class="inpB2 validar" name="585" id="B_2" value="<?php echo OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='585'"); ?>"/></td>
                              <td><input type="text" size="16"  maxlength="4" class="inpB2 validar" name="586" id="C_2" value="<?php echo OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='586'"); ?>"/></td>
                          </tr>
                        <tr>                        
                              <td class="titR">3. OHSAS 18001: Certificación de Sistema de Gestión en Seguridad y Salud Ocupacional </td>
                              <td><input type="text" size="16" class="inpC2" name="587" id="A_3" value="<?php echo OPERATOR::getDbValue("SELECT  sige_description  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='587'"); ?>"/></td>
                              <td><input type="text" size="16"  maxlength="4" class="inpB2 validar" name="588" id="B_3" value="<?php echo OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='588'"); ?>"/></td>
                              <td><input type="text" size="16"  maxlength="4" class="inpB2 validar" name="589" id="C_3" value="<?php echo OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='589'"); ?>"/></td>
                          </tr>
                            <tr>                        
                              <td class="titR">4. MYPE'S- NB 12009 –: Certificación de Sistemas de Gestión para micro y pequena empresa</td>
                              <td><input type="text" size="16" class="inpC2" name="590" id="A_4" value="<?php echo OPERATOR::getDbValue("SELECT  sige_description  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='590'"); ?>"/></td>
                              <td><input type="text" size="16"  maxlength="4" class="inpB2 validar" name="591" id="B_4" value="<?php echo OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='591'"); ?>"/></td>
                              <td><input type="text" size="16"  maxlength="4" class="inpB2 validar" name="592" id="C_4" value="<?php echo OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='592'"); ?>"/></td>
                          </tr>
                                <tr>                        
                              <td class="titR">5. ISO/IEC 27001 - ISO/IEC 20000-1: Certificación de Sistema de Gestión de Seguridad y/o Tecnologías de la Información </td>
                              <td><input type="text" size="16" class="inpC2" name="593" id="A_5" value="<?php echo OPERATOR::getDbValue("SELECT  sige_description  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='593'"); ?>"/></td>
                              <td><input type="text" size="16"  maxlength="4" class="inpB2 validar" name="594" id="B_5" value="<?php echo OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='594'"); ?>"/></td>
                              <td><input type="text" size="16"  maxlength="4" class="inpB2 validar" name="595" id="C_5" value="<?php echo OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='595'"); ?>"/></td>
                          </tr>
                              <tr>                        
                              <td class="titR">6. ISO 22000: Certificación de Sistema de Gestión de Inocuidad para Alimentos </td>
                              <td><input type="text" size="16" class="inpC2" name="596" id="A_6" value="<?php echo OPERATOR::getDbValue("SELECT  sige_description  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='596'"); ?>"/></td>
                              <td><input type="text" size="16"  maxlength="4" class="inpB2 validar" name="597" id="B_6" value="<?php echo OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='597'"); ?>"/></td>
                              <td><input type="text" size="16"  maxlength="4" class="inpB2 validar" name="598" id="C_6" value="<?php echo OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='598'"); ?>"/></td>
                          </tr>
                             <tr>                        
                              <td class="titR">7. HACCP: Certificacion del Sistema de Análisis de Peligros y Puntos de Control Criticos</td>
                              <td><input type="text" size="16" class="inpC2" name="599" id="A_7" value="<?php echo OPERATOR::getDbValue("SELECT  sige_description  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='599'"); ?>"/></td>
                              <td><input type="text" size="16"  maxlength="4" class="inpB2 validar" name="600" id="B_7" value="<?php echo OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='600'"); ?>"/></td>
                              <td><input type="text" size="16"  maxlength="4" class="inpB2 validar" name="601" id="C_7" value="<?php echo OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='601'"); ?>"/></td>
                          </tr>
                        </tbody>
                        
                   </table>
    <p>
              <span id="msge2" style="display: none;" class="bxEr" >Debe llenar el ÚLTIMO AÑO DE ACTUALIZACIÓN</span>
              <span id="msge1" style="display: none;" class="bxEr" >Debe llenar el AÑO DE OBTENCIÓN</span>
              <span id="msge3" style="display: none;" class="bxEr" >Debe llenar el campo ORGANISMO DE CERTIFICACIÓN</span>
          </p>        
          
 </span>
 <br /><br />
 <p><span class="subT">2. ¿Sus productos y/o servicios tenian algún tipo de certificación de calidad en la última gestión (no incluya Registro Sanitario del SENASAG)?</span></p>
 <p>La certificación de producto es un proceso que confirma que su <b>producto o servicio</b> cumple con los estándares necesarios y relevantes para el mercado, por ejemplo: Certificación Orgánica.<br>
     (Si respondió Si, indique los productos certificados en la siguiente tabla) <br> (Si respondió No, pase al siguiente capítulo)
 </p>            
<p><span class="clear"></span> <input  <?php if (OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='602'")==1){ echo "checked=\"checked\""; };  ?> name="602" id="602_si" value="1" class="chk" type="radio" ><label class="labChk">Si</label>   <span class="clear"></span>   <input  <?php if (OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='602'")==2){ echo "checked=\"checked\""; };  ?> name="602" id="602_no" value="2" class="chk" type="radio" ><label class="labChk">No</label></p>
<span id="602_div_si"  style=" <?php if (OPERATOR::getDbValue("SELECT  sige_valor  FROM  frm3_bcap2_sistemagestion  WHERE  sige_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  sige_defi_uid ='602'")!=1){ echo "display:none"; };  ?>">



<table width="100%" class="fOpt" id="table_a" >
                <thead>
                <tr>
                  <th align="center" >PRODUCTO</th>
                  <th align="center" >CERTIFICACI&Oacute;N</th>
                  <th align="center" >AÑO DE OBTENCI&Oacute;N</th>
                  <th align="center" >&nbsp;</th>
                </tr>
                </thead>
                    
                <tbody>
                <?php
                $posmax = OPERATOR::getDbValue("SELECT MAX(prod_position) + 1 as pos FROM  frm2_bcap2_productos  WHERE  prod_regi_uid ='".$regisroUID."' AND  prod_position <> 0");                
                if( empty($posmax) ) { $posmax = 1; }
                $sql3 = "SELECT * FROM  frm2_bcap2_productos  WHERE  prod_regi_uid ='".$regisroUID."' AND  prod_position <> 0 AND  prod_delete  <> 1  ORDER BY prod_position ASC ";
                
                $sum = 0;
                $db3->query( $sql3 );
                if( $db3->numrows() > 0 ) {
                while( $aDat = $db3->next_record() ) {
                    $pos = $aDat["prod_position"];
                    $sum = $sum + $aDat["capa_valor"];
                ?>
                <tr id="rowa_<?php echo $pos; ?>" >
                    <td width="13%"><input type="text" name="A_<?php echo $pos ?>" id="A_<?php echo $pos ?>" value="<?php echo $aDat["prod_product"] ?>"   size="40" class="inpC2" /></td>
                    <td width="6%" ><input type="text" name="C_<?php echo $pos ?>" id="C_<?php echo $pos ?>" value="<?php echo $aDat["prod_crt"] ?>"  size="40" class="inpC2" /></td>
                    <td width="12%"><input type="text" name="B_<?php echo $pos ?>" id="B_<?php echo $pos ?>" value="<?php echo $aDat["prod_year"] ?>"   size="10" class="inpB2 validar" /></td>
                    
                    <td width="5%" ><a href="#" class="lnkCls" id="delplan_<?php echo $aDat["prod_position"] ?>" onclick="delRow('<?php echo $pos ?>',1,'a'); return false;" >eliminar</a></td>                    
                </tr>
                <?php }
                } else {
                ?>
                <tr id="rowa_<?php echo $posmax; ?>" >
                    <td width="13%"><input type="text" name="A_<?php echo $posmax; ?>" id="A_<?php echo $posmax; ?>" size="40" class="inpC2" /></td>
                    <td width="6%" ><input type="text" name="C_<?php echo $posmax; ?>" id="C_<?php echo $posmax; ?>" size="40" class="inpC2" /></td>
                    <td width="12%"><input type="text" name="B_<?php echo $posmax; ?>" id="B_<?php echo $posmax; ?>" size="10" class="inpB2 validar"   /></td>
                    
                    <td width="5%" >&nbsp;</td>                    
                </tr>
                <?php 
                $posmax = $posmax + 1;
                } ?>
                </tbody>                                
            </table>
            <input type="hidden" name="maxrow_a" id="maxrow_a" value="<?php echo $posmax ?>">
            <a href="#" id="addrow_a" class="btnAdd">Agregar campos</a>
            <p>
                <span id="msg" style="display: none;" class="bxEr" >Debe introducir movimiento para invetarios</span>
                <span id="msg2" style="display: none;" class="bxEr" >Debe introducir el detalle para otros inventarios</span>               
            </p>




</span>
            <span class="bxBt">
                <input type="submit" value="SIGUIENTE" id="sendData" name="continuarregistro" class="button" >
                <a href="bcap1.php" class="btnS">ANTERIOR</a>                
            </span>
                
        </fieldset>
    </form>
    <div class="clear"></div>      

</div>
<!-- end body -->

<?php include("footer.php") ?>