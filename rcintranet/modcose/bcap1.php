<?php session_start(); ?>
<?php
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
?>
<?php include_once('../verifyLogin.php'); ?>
<?php include("header.php") ?>
<script type="text/javascript" src="js/bcap1.js"></script>
  <script type="text/javascript" src="../js/jquery.atooltip.js"></script>
  <script type="text/javascript">
        $(function(){ 
            $('.normalTip').aToolTip();       
        }); 
  </script>
<?php
/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];

$sql = "SELECT * FROM frm1_bcap1_gestionambiental WHERE geam_regi_uid = '".$regisroUID."' ";

$db->query( $sql );
//echo $sql."<br>";
if( $db->numrows() == 0 ) {
    $uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );
    
    $sql2 = "SELECT * FROM adm_definiciones WHERE defi_form_uid = '".$uidFormulario."' AND defi_modulo = 'b' AND  defi_capitulo = '1' AND defi_swactive = 'ACTIVE' ";
    $db2->query( $sql2 );
    //echo $sql2;
    while( $aDefinicion =  $db2->next_record() ) {
        $sql = "INSERT INTO frm1_bcap1_gestionambiental SET ";
        $sql .= "geam_regi_uid = '".$regisroUID."', ";
        $sql .= "geam_defi_uid = '".$aDefinicion["defi_uid"]."', ";         
        $sql .= "geam_description = '', "; 
        $sql .= "geam_suv_uid = '".$uid_token."', "; 
        $sql .= "geam_createdate = NOW(), "; 
        $sql .= "geam_updatedate = NOW() ";                                 
        $db3->query( $sql );               
    }        
}
?>

<?php            

    $sql = " SELECT frm1_bcap1_gestionambiental.*, adm_definiciones.defi_vinieta as vinieta, adm_definiciones.defi_indent as indent "
          ." FROM frm1_bcap1_gestionambiental LEFT JOIN  adm_definiciones ON ( geam_defi_uid = defi_uid ) "
          ." WHERE geam_regi_uid = '".$regisroUID."' AND geam_defi_uid IN (60, 61, 62)  "
          ." ORDER BY adm_definiciones.defi_indent ASC,  adm_definiciones.defi_vinieta ASC ";
    $db->query( $sql );    
    //echo $sql."<br>";
    $a_valor = "";
    $b_valor = "";
    $c_valor = "";
    while( $aAmbiental = $db->next_record() ) { 
        if( $aAmbiental["vinieta"] == "a" ) {
            $a_valor = $aAmbiental["geam_valor"];                
        }

        if( $aAmbiental["vinieta"] == "b" ) {
            $b_valor = $aAmbiental["geam_valor"];
        }

        if( $aAmbiental["vinieta"] == "c" ) {
            $c_valor = $aAmbiental["geam_valor"];
            $c_descrip = $aAmbiental["geam_description"];
        }
    }
    
    $sql = " SELECT frm1_bcap1_gestionambiental.*, adm_definiciones.defi_vinieta as vinieta, adm_definiciones.defi_indent as indent "
          ." FROM frm1_bcap1_gestionambiental LEFT JOIN  adm_definiciones ON ( geam_defi_uid = defi_uid ) "
          ." WHERE geam_regi_uid = '".$regisroUID."'  "
          ." ORDER BY adm_definiciones.defi_indent ASC,  adm_definiciones.defi_vinieta ASC ";
    $db->query( $sql );
    //echo $sql."<br>";    
    // verificar si esta vacia
    function checkEmpty($var) {
        if (strlen($var) >= 1) {
            return false; // No esta vacia
        } else {
            return true; // Esta Vacia
        }
    }
?>
<!-- begin body -->
<div class="content">
    
    <table class="dInf">
    <thead>
    <tr>
        <th> M&oacute;dulo B</th>
        <th> ENCUESTA DE GESTI&Oacute;N INTEGRADA </th>
    </tr>
    </thead>    
    </table>
    
    <table class="dInf">
    <thead>
    <tr>
        <th> Cap&iacute;tulo 1</th>
        <th> GESTI&Oacute;N AMBIENTAL</th>
    </tr>
    </thead>   
     <tbody>
            <tr>                        
                <td colspan="2">Los campos marcados con asterisco son obligatorios<span class="color4">*</span>.</td>
            </tr>
        </tbody> 
    </table>
    

    <form class="formA validable" action="bcap1Add.php" method="post" autocomplete="off" >
        <fieldset>       
            <?php           
            while( $aAmbiental = $db->next_record() ) { 
               
            ?>
            <?php  if( $aAmbiental["vinieta"] == "1" ) { ?>
            
            <p>
            <span class="subT">1. &iquest;La Empresa realiza gastos o inversi&oacute;n en gesti&oacute;n ambiental?<span class="color4">*</span>:</span>
            <span class="clear"></span>
            
            <input class="chk" type="radio" name="rbtn_inversion" id="rbtn_inversion1" value="1" <?php if( $aAmbiental["geam_valor"] == 1 ) { echo "checked=\"checked\""; } ?>  />            
            <label class="labChk" >Si</label>
            <span class="clear"></span>
            
            <input class="chk" type="radio" name="rbtn_inversion" id="rbtn_inversion2" value="0" <?php if( !checkEmpty($aAmbiental["geam_valor"]) && $aAmbiental["geam_valor"] == 0  ) { echo "checked=\"checked\""; $mostrar1 = "style=\"display: block;\"";  } else { $mostrar1 = "style=\"display: none;\""; } ?> />                        
            <label class="labChk" >No</label>
            </p>            
            <span id="noopcion" <?php echo $mostrar1; ?> >
            <p>Si respondió NO, ¿cuál fue la razón? (escoja una de las siguientes opciones y pase a la pregunta 2) </p>
            <p>
                <input class="chk" type="checkbox" name="chk_1" id="chk_1" <?php if( $a_valor == 1 ) { echo "checked=\"checked\""; } ?> />
                <label class="labChk" >a) Falta de conocimiento</label>
                <span class="clear"></span>

                <input class="chk" type="checkbox" name="chk_2" id="chk_2" <?php if( $b_valor == 1 ) { echo "checked=\"checked\""; } ?> />
                <label class="labChk" >b) Falta de presupuesto</label>
                <span class="clear"></span>
                
                <span class="normalTip" title="En caso de marcar la opción Otros, debe necesariamente especificar la razón."> <input class="chk" type="checkbox" name="chk_3" id="chk_3" <?php if( $c_valor == 1 ) { echo "checked=\"checked\""; } ?> />
                <label class="labChk" >c) Otros (especificar)</label></span>
                

                <?php $mostrar2 = "style=\"display: none;\"";  if( $c_valor == 1 ) { $mostrar2 = "style=\"display: block;\"";  } ?>
                <input name="inversionotros" class="inpC" type="text" id="inversionotros" value="<?php echo $c_descrip; ?>" size="60" <?php echo $mostrar2;  ?>  onKeyUp="this.value = this.value.toUpperCase();" pattern="[A-Z ]*" />
            </p>
            <span style="display:none" class="bxEr" id="div_chk_1">requerido</span>
            <span id="msg1" style="display: none;" class="bxEr">En caso de marcar la opción Otros, debe necesariamente especificar la razón</span>
            
            </span>
            <span id="div_rbtn_inversion1" style="display:none" class="bxEr" >requerido</span>
            <?php } ?>
                
            <?php if( $aAmbiental["vinieta"] == "2" ) { ?>
            <span class="subT">2. &iquest;Realiza tratamiento de aguas?<span class="color4">*</span>:</span>
            <p><?php echo OPERATOR::getDescTitles(1,'B',1,2); ?></p>
            <p> 
                <input class="chk" type="radio" name="rbtn_agua" id="rbtn_agua1" value="1" <?php if( $aAmbiental["geam_valor"] == 1 ) { echo "checked=\"checked\""; } ?> />
                <label class="labChk" >Si</label>
                <span class="clear"></span>
                
                <input class="chk" type="radio" name="rbtn_agua" id="rbtn_agua2" value="0" <?php if( !checkEmpty($aAmbiental["geam_valor"]) && $aAmbiental["geam_valor"] == 0  ) { echo "checked=\"checked\""; } ?> />
                <label class="labChk" >No</label>
                            <span id="div_rbtn_agua1" style="display:none" class="bxEr" >requerido</span>
            </p>
            
            <?php } ?>
                
            <?php if( $aAmbiental["vinieta"] == "3" ) { ?>
            <span class="subT">3. &iquest;Cuenta con certificaciones ambientales?<span class="color4">*</span>:</span>
            <p><?php echo OPERATOR::getDescTitles(1,'B',1,3); ?></p>
            <?php $mostrar3 = "style=\"display: none\""; if( $aAmbiental["geam_valor"] == 1 ) { $checked = "checked=\"checked\""; $mostrar3 = "style=\"display: block\""; } ?>
            <p id="sicertificacion_msg" <?php echo $mostrar3 ?>></p>
            <p> 
                <span class="normalTip" title="En caso de responder SI, debe necesariamente especificar el nombre de las certificaciones ambientales."><input class="chk" type="radio" name="rbtn_certi" id="rbtn_certi1" value="1" <?php echo $checked; ?>  />
                <label class="labChk" >Si</label></span>
                <span class="clear"></span>
                
                <input class="chk" type="radio" name="rbtn_certi" id="rbtn_certi2" value="0" <?php if( !checkEmpty($aAmbiental["geam_valor"]) && $aAmbiental["geam_valor"] == 0  ) { echo "checked=\"checked\""; } ?> />
                <label class="labChk" >No</label>
                <span id="div_rbtn_certi1" style="display:none" class="bxEr" >requerido</span>
            </p>
                        

            <p> <div id="sicertificacion" <?php echo $mostrar3 ?> >
            <table width="100%" border="0" id="sicertificacion2" class="fOpt" >
            <thead >
              <tr>
              <th width="40%" align="center">&iquest;Cu&aacute;les?</th>
              <th width="5%" align="center">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
                  <?php 
            $sql3 = "SELECT * FROM  frm1_bcap1_certificadosambientales WHERE ceam_regi_uid = '".$regisroUID."' AND ceam_delete = 0 ORDER BY  ceam_position ASC  ";
            //echo $sql3;
            $db3->query( $sql3 );
            if( $db3->numrows() > 0 ) {
            while( $aCert2 = $db3->next_record() ) {
                $pos = $aCert2["ceam_position"];
            ?>
              <tr id="row2_<?php echo $pos; ?>">
              <td width="40%" align="center"><input name="ceram_<?php echo $pos; ?>" class="inpC" type="text" id="otrasambiental" size="60" onKeyUp="this.value = this.value.toUpperCase();" pattern="[A-Z0-9 ]*" value="<?php echo $aCert2["ceam_description"] ?>" /></td>
              <td width="5%" align="center"><a href="#" class="lnkCls" id="delcerti_<?php echo $aCert2["ceam_position"] ?>" onclick="delRow2('<?php echo $pos ?>'); return false;" >eliminar</a>  </td>
              </tr>
            
                 
            <?php }                            
            } else { 
                $pos = 1;
            ?>
            <tr id="row2_<?php echo $pos; ?>">
              <td width="40%" align="center"><input name="ceram_<?php echo $pos; ?>" class="inpC" type="text" id="otrasambiental" size="60" value="" onKeyUp="this.value = this.value.toUpperCase();" pattern="[A-Z0-9 ]*" /></td>
              <td width="5%" align="center">&nbsp;</td>
              </tr>                                
            <?php } ?>
           
            </tbody>
            </table>
             <span id="msg4" class="bxEr" style="display: none;" >campo requerido</span>
             <a href="#" class="btnAdd"  id="addcertificacion2" >agregar</a>
              <input type="hidden" name="maxrow2" id="maxrow2" value="<?php echo $pos; ?>" />
                </div>
            </p>            
            <span id="msg2" style="display: none;" class="bxEr">Debe introducir el detalle para la certificaci&oacute;n</span>
            <?php } ?>
                
            <?php if( $aAmbiental["vinieta"] == "4" ) { ?>
            <span class="subT">4 &iquest;Realiza un aprovechamiento de sus residuos s&oacute;lidos?<span class="color4">*</span>:</span>
            <p><?php echo OPERATOR::getDescTitles(1,'B',1,4); ?></p>
            <p> 
                <input class="chk"  type="radio" name="rbtn_ars" id="rbtn_ars1" value="1" <?php if( $aAmbiental["geam_valor"] == 1 ) { echo "checked=\"checked\""; } ?> />            
                <label class="labChk" >Si</label>
                <span class="clear"></span>
                <input class="chk"  type="radio" name="rbtn_ars" id="rbtn_ars2" value="0" <?php if( !checkEmpty($aAmbiental["geam_valor"]) && $aAmbiental["geam_valor"] == 0  ) { echo "checked=\"checked\""; } ?> />
                <label class="labChk" >No</label>
                <span id="div_rbtn_ars1" style="display:none" class="bxEr" >requerido</span>
            </p>
            <?php } ?>
                
            <?php if( $aAmbiental["vinieta"] == "5" ) { ?>
            <span class="subT">5. &iquest;Capacita a su personal en temas relacionados a gesti&oacute;n ambiental?<span class="color4">*</span>:</span>
            <p> 
                <input class="chk"  type="radio" name="rbtn_cap" id="rbtn_cap1" value="1" <?php if( $aAmbiental["geam_valor"] == 1 ) { echo "checked=\"checked\""; } ?> />
                <label class="labChk" >Si</label>
                <span class="clear"></span>
                <input class="chk"  type="radio" name="rbtn_cap" id="rbtn_cap2" value="0" <?php if( !checkEmpty($aAmbiental["geam_valor"]) && $aAmbiental["geam_valor"] == 0  ) { echo "checked=\"checked\""; } ?> />
                <label class="labChk" >No</label>
                <span id="div_rbtn_cap1" style="display:none" class="bxEr" >requerido</span>
            </p>
            <?php } ?>
                
            <?php if( $aAmbiental["vinieta"] == "6" ) { ?>
            <span class="subT">6. &iquest;Realiza otras acciones de gesti&oacute;n ambiental?<span class="color4">*</span>:</span>
            <p><?php echo OPERATOR::getDescTitles(1,'B',1,6); ?></p>
            <?php $mostrar4 = "style=\"display: none\"";  if( $aAmbiental["geam_valor"] == 1 ) { $check6 = "checked=\"checked\""; $mostrar4 = "style=\"display: block\""; } ?>
            <p id="siotrasambiental_msg" <?php echo $mostrar4 ?>></p>
            <p> 
               <span class="normalTip" title="En caso de marcar la opción SI, debe necesariamente especificar qué acciones."> <input class="chk"  type="radio" name="rbtn_aga" id="rbtn_aga1" value="1" <?php echo $check6; ?> />
                <label class="labChk" >Si</label></span>
                <span class="clear"></span>
                <input  class="chk"  type="radio" name="rbtn_aga" id="rbtn_aga2" value="0" <?php if( !checkEmpty($aAmbiental["geam_valor"]) && $aAmbiental["geam_valor"] == 0  ) { echo "checked=\"checked\""; } ?> />
                <label class="labChk" >No</label>
                <span id="div_rbtn_aga1" style="display:none" class="bxEr" >requerido</span>
            </p>
            <p> <div id="siotrasambiental" <?php echo $mostrar4 ?> >
                 <table width="100%" border="0" id="siotrasambiental2" class="fOpt" >
            <thead >
              <tr>
              <th width="40%" align="center">&iquest;Cu&aacute;les?</th>
              <th width="5%" align="center">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
                  <?php 
            $sql3 = "SELECT * FROM frm1_bcap1_certificados WHERE cert_regi_uid = '".$regisroUID."' AND cert_delete = 0 ORDER BY  cert_position ASC  ";
            //echo $sql3;
            $db3->query( $sql3 );
            if( $db3->numrows() > 0 ) {
            while( $aCert2 = $db3->next_record() ) {
                $pos = $aCert2["cert_position"];
            ?>
              <tr id="row_<?php echo $pos; ?>">
              <td width="40%" align="center"><input name="otrasambiental_<?php echo $pos; ?>" class="inpC" type="text" id="otrasambiental" size="60" value="<?php echo $aCert2["cert_descrip"] ?>"  onKeyUp="this.value = this.value.toUpperCase();"  pattern="[A-Z0-9 ]*"/></td>
              <td width="5%" align="center"><a href="#" class="lnkCls" id="delcerti_<?php echo $aCert2["cert_position"] ?>" onclick="delRow('<?php echo $pos ?>'); return false;" >eliminar</a>  </td>
              </tr>            
                 
            <?php }                            
            } else { 
                $pos = 1;
            ?>
            <tr id="row_<?php echo $pos; ?>">
              <td width="40%" align="center"><input name="otrasambiental_<?php echo $pos; ?>" class="inpC" type="text" id="otrasambiental" size="60" value=""  onKeyUp="this.value = this.value.toUpperCase();" pattern="[A-Z0-9 ]*"/></td>
              <td width="5%" align="center">&nbsp;</td>
              </tr>                            
            <?php } ?>
           
            </tbody>
            </table>
            <span id="msg5" class="bxEr" style="display: none;" >campo requerido</span>
             <a href="#" class="btnAdd"  id="addcertificacion" >agregar</a>
              <input type="hidden" name="maxrow" id="maxrow" value="<?php echo $pos; ?>" />
                </div>
            </p>
            <span id="msg3" style="display: none;" class="bxEr">Debe introducir el detalle</span>
            <?php } ?>
            <?php } ?>
          
          <span class="bxBt">
                <input type="submit" value="SIGUIENTE" id="sendData" name="continuarregistro" class="button" >
                <a href="acap10.php" class="btnS">ANTERIOR</a>                
          </span>
                
        </fieldset>
    </form>
    <div class="clear"></div>      

</div>
<!-- end body -->

<?php include("footer.php") ?>
