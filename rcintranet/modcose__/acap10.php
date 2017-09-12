<?php session_start(); ?>
<?php
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
?>
<?php include_once('../verifyLogin.php'); ?>
<?php include("header.php") ?>
<script type="text/javascript" src="js/acap10.js"></script>
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

$sql = "SELECT * FROM frm1_cap10_capitalpatrimonio WHERE capa_regi_uid = '".$regisroUID."' ";
$db->query( $sql );

if( $db->numrows() == 0 ) {

    $uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );
    
    $sql2 = "SELECT * FROM adm_definiciones WHERE defi_form_uid = '".$uidFormulario."' AND defi_modulo = 'a' AND  defi_capitulo = '10' ";       
    $db2->query( $sql2 );
    while( $aDefinicion =  $db2->next_record() ) {
        $sql = "INSERT INTO frm1_cap10_capitalpatrimonio SET ";
        $sql .= "capa_regi_uid = '".$regisroUID."', ";
        $sql .= "capa_defi_uid = '".$aDefinicion["defi_uid"]."', ";
        $sql .= "capa_valor = 0, ";        
        $sql .= "capa_suv_uid = '".$uid_token."', "; 
        $sql .= "capa_createdate = NOW(), "; 
        $sql .= "capa_updatedate = NOW() ";                          	 	
        $db3->query( $sql );               
    }        
}
?>
<!-- begin body -->
<div class="content"><span id="statusACAP1"></span>
    <table class="dInf">
    <thead>
    <tr>
        <th>Cap&iacute;tulo 10</th>
        <th>CAPITAL Y PATRIMONIO</th>
    </tr>
    </thead>
    <tbody>
        <tr>                        
            <td colspan="2"><?php echo OPERATOR::getDescTitles(1,'A',10,0); ?></td>
        </tr>
        <tr>                        
            <td colspan="2"><b>Paso 1.-</b> Registre el monto correspondiente al Total Capital, Este monto se le asigna automáticamente al Capital privado nacional, presionar Tab.<br>
                <b>Paso 2.-</b> Continúe con el registro de Capital privado Extranjero, el monto de Capital privado nacional se calcula automáticamente, presionar Tabulador<br>
                <b>Paso 3.-</b> Registre el monto correspondiente al Capital Estatal <br>
                <b>Paso 4.-</b> Regsitre el monto que corresponde al Patrimonio.</td>
        </tr>
    </tbody>
    </table>                    
    <form class="formA validable" action="acap10Add.php" method="post" autocomplete="off" >
        <fieldset>
          <table width="100%" class="fOpt">
                <thead>
                <tr>
                    <th align="center">DETALLE</th>
                    <th align="center" >VALOR (Bs./Anual)</th>
                </tr>
                </thead>
                <tbody>
                <?php                                                                                
                $sql = " SELECT frm1_cap10_capitalpatrimonio.*, adm_definiciones.defi_vinieta as vinieta, adm_definiciones.defi_indent as indent "
                      ." FROM frm1_cap10_capitalpatrimonio LEFT JOIN  adm_definiciones ON ( capa_defi_uid = defi_uid ) "
                      ." WHERE capa_regi_uid = '".$regisroUID."'  "
                      ." ORDER BY adm_definiciones.defi_indent ASC,  adm_definiciones.defi_vinieta ASC ";
                $db->query( $sql );
                //echo $sql;                             
                ?>
                <?php  
                    $tot1 = 0;
                    $tot2 = 0;
                    while( $aPatrimonio = $db->next_record() ) {
                        if( $aPatrimonio["vinieta"] == "1" ) {
                            $tot1 = $aPatrimonio["capa_valor"];
                        }                        
                        if( $aPatrimonio["vinieta"] == "2" ) {
                            $tot2 = $aPatrimonio["capa_valor"];
                        }  
                        $estado=$aPatrimonio["capa_estado"];
                ?>
                <?php if( $aPatrimonio["vinieta"] == "a" ) { ?>
                <tr>
                    <td width="40%" class="titR" >1.1  Capital privado Nacional</td>
                    <td width="20%" align="center"  >
                        <label class="labB" id="input-11" ><?php if ($estado > 0) {
                            echo number_format($aPatrimonio["capa_valor"], 0, '.', ',');  } else { echo ('');} ?></label><span class="prefM">Bs</span>                        
                    </td>
                </tr>
                <?php } ?>                
                <?php if( $aPatrimonio["vinieta"] == "b" ) { ?>
                <tr>
                    <td width="40%" class="titR" >1.2  Capital privado Extranjero</td>
                    <td align="center"  >
                    <input type="text" name="input-12" onblur="javascript:saveUPD(1); return false;"  id="input-12" value="<?php if ($estado > 0) {
                        echo number_format($aPatrimonio["capa_valor"], 0, '.', ',');   } else { echo ('');} ?>"  size="12"  maxlength="15" class="inpB2 numeric normalTip" title="Debe registrar el valor en  Bolivianos."/><span class="prefM">Bs</span>
                    <span id="div_input-12" class="bxEr" style="display:none" >requerido</span>
                    </td>
                </tr>
                <?php } ?>
                <?php if( $aPatrimonio["vinieta"] == "c" ) { ?>
                <tr>
                  <td class="titR" >1.3  Capital Estatal</td>
                  <td align="center"  >
                    <input type="text" name="input-13" id="input-13" onblur="javascript:saveUPD(1); return false;"  value="<?php if ($estado > 0) {
                        echo number_format($aPatrimonio["capa_valor"], 0, '.', ',');  } else { echo ('');} ?>" size="12"  maxlength="15" class="inpB2 numeric normalTip" title="Debe registrar el valor en  Bolivianos."/>
                    <span class="prefM">Bs</span>
                    <span id="div_input-13" class="bxEr" style="display:none" >requerido</span>
                  </td>
                </tr>
                <?php } ?>
                <?php } ?>                
                <tr>
                  <td class="titR"  >1.  Total Capital (1.1+1.2+1.3)</td>
                  <td align="right" >
                        <input type="text" name="capitaltotal" id="capitaltotal"   value="<?php if ($estado > 0) {
                            echo number_format($tot1, 0, '.', ','); } else { echo ('');} ?>" size="12"  maxlength="15" class="inpB2 numeric normalTip" title="Debe registrar el valor en  Bolivianos."/>
                        <span class="prefM">Bs</span>
                        <span id="div_input-13" class="bxEr" style="display:none" >requerido</span>                                       
                  </td>
                </tr>                
                <tr>
                  <td class="titR" >2.  Patrimonio</td>
                  <td align="center"  ><input type="text" name="input-15" id="input-15" onblur="javascript:saveUPD(1); return false;"  value="<?php if ($estado > 0) {
                      echo number_format($tot2, 0, '.', ',');  } else { echo ('');} ?>" size="12"  maxlength="15" class="inpB2 numeric normalTip" title="Debe registrar el valor en  Bolivianos."/>
                    <span class="prefM">Bs</span>
                  <span id="div_input-15" class="bxEr" style="display:none" >requerido</span></td>
                </tr>
                </tbody>
            </table>   
            <p>
                <span id="msg" style="display:none;" class="bxEr" >Debe registrar un valor en capital</span>
                <span id="msg2" style="display:none;" class="bxEr" >Debe registrar un valor para patrimonio</span>
            </p>           
           <span class="bxBt">
                <input type="submit" value="SIGUIENTE" id="sendData" name="continuarregistro" class="button" >
                <a href="acap9.php" class="btnS">ANTERIOR</a>                
          </span>
        </fieldset>
    </form>
    <div class="clear"></div>      
</div>
<?php include("footer.php") ?>
