<?php session_start(); ?>
<?php
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
?>
<?php include_once('../verifyLogin.php'); ?>
<?php include("header.php") ?>
<script type="text/javascript" src="js/acap4.js"></script>
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
//crear registros para inventarios
$sql = "SELECT * FROM frm1_cap4_inventariomateriales WHERE inma_regi_uid = '".$regisroUID."' ";
//echo $sql;
$db->query( $sql );
if( $db->numrows() == 0 ) {
    // obtener el uid del token
    $uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );
    
    $sql2 = "SELECT * FROM adm_definiciones WHERE defi_form_uid = '".$uidFormulario."' AND defi_modulo = 'a' AND  defi_capitulo = '4' ";       
    $db2->query( $sql2 );
    while( $aDefinicion =  $db2->next_record() ) {        
        $sql = "INSERT INTO frm1_cap4_inventariomateriales SET ";
        $sql .= "inma_regi_uid = '".$regisroUID."', ";
        $sql .= "inma_defi_uid = '".$aDefinicion["defi_uid"]."', ";
        $sql .= "inma_inventario_inicial = 0, ";
        $sql .= "inma_inventario_final = 0, ";   
        $sql .= "inma_total_compras = 0, ";        
        $sql .= "inma_suv_uid = '".$uid_token."', "; 
        $sql .= "inma_createdate = NOW(), "; 
        $sql .= "inma_updatedate = NOW() ";                          	 	
        $db3->query( $sql );                
    }
}

//Tipo de personal

$sql = " SELECT frm1_cap4_inventariomateriales.*, adm_definiciones.defi_vinieta as vinieta "
      ." FROM frm1_cap4_inventariomateriales LEFT JOIN  adm_definiciones ON ( inma_defi_uid = defi_uid ) "
      ." WHERE inma_regi_uid = '".$regisroUID."' ORDER BY adm_definiciones.defi_vinieta ASC ";
$db->query( $sql );
//echo $sql;
?>
<!-- begin body -->
<div class="content">       <span id="statusACAP1"></span> 

    <table class="dInf">
    <thead>
    <tr>
        <th>Cap&iacute;tulo 4</th>
        <th>INVENTARIO DE MATERIALES</th>
        </tr>
    </thead>
    <tbody>
        <tr>                        
            <td colspan="2"><?php echo OPERATOR::getDescTitles(1,'A',4,0); ?></td>
        </tr>
        <tr>                        
            <td colspan="2">Paso 1.- Llenar el monto correspondiente al Total en la columna de Inventario Inicial, luego presionar Tabulador<br>
                Paso 2.- Llenar el monto correspondiente a Materiales indirectos en la misma columna, el monto de materiales Directos se calcula automaticamente.<br>
                Paso 3.- Con la misma metodología continuar con los datos de la columna de inventario Final.<br>
            </td>
        </tr>        
    </tbody>
    </table>

    <form class="formA validable" action="acap4Add.php" method="post" autocomplete="off" >
        <fieldset>          
          <table width="100%" class="fOpt" >
                <thead>
                <tr>
                    <th align="center">DETALLE</th>
                    <th align="center" >INVENTARIO INICIAL (Bs.)</th>
                    <th align="center" >INVENTARIO FINAL (Bs.)</th>
                    <th align="center" >TOTAL COMPRAS (Bs./Anual)</th>                    
                </tr>
                </thead>                
                <tbody>
                <?php                
                while( $aInventario = $db->next_record() ) {                   
                ?>
                <?php if( $aInventario["vinieta"] == 1 ) { ?>
                <tr>
                    <td width="40%" class="titR" >1. Materiales directos<em></em></td>                    
                    <td align="right"><label class="labB" id="input-11"><?php echo number_format($aInventario["inma_inventario_inicial"], 2, '.', ','); ?></label></td>
                    <td align="right"><label class="labB" id="input-21"><?php echo number_format($aInventario["inma_inventario_final"], 2, '.', ','); ?></label></td>
                    <td align="right"><label class="labB" id="input-31"><?php echo number_format($aInventario["inma_total_compras"], 2, '.', ','); ?></label></td>                                      
                </tr>
                <?php } ?>
                
                <?php if( $aInventario["vinieta"] == 2 ) { ?>
                <tr>
                    <td width="40%" class="titR" >2. Materiales indirectos<em></em></td>
                    <td align="right"  ><input type="text" name="input-12" id="input-12" value="<?php echo number_format($aInventario["inma_inventario_inicial"], 2, '.', ','); ?>" size="12" maxlength="9" class="inpB2 numericDec normalTip" title="Debe registrar el inventario al 31/12/<?php echo $nuevafecha;?> en Bolivianos.">
                    <span class="prefM">Bs</span>
                    <span id="div_input-12" class="bxEr" style="display:none" >requerido</span>
                    <span id="div_input-12_2" class="bxEr" style="display:none" >inválido</span>
                    </td>
                    <td align="right"  ><input type="text" name="input-22" id="input-22" value="<?php echo number_format($aInventario["inma_inventario_final"], 2, '.', ','); ?>" size="12" maxlength="9" class="inpB2 numericDec normalTip" title="Debe registrar el inventario al 31/12/<?php echo $anio;?> en Bolivianos." />
                        <span class="prefM">Bs</span>
                    <span id="div_input-22" class="bxEr" style="display:none" >requerido</span></td>
                    <td align="right"  ><input type="text"  onblur="javascript:saveUPD(1); return false;" name="input-32" id="input-32" value="<?php echo number_format($aInventario["inma_total_compras"], 2, '.', ','); ?>" size="12" maxlength="9" class="inpB2 numericDec normalTip" title="Debe registrar el total de compras realizadas desde el 01/01/<?php echo $anio;?> hasta el 31/12/<?php echo $anio;?> en Bolivianos." />
                    <span class="prefM">Bs</span>
                    <span id="div_input-32" class="bxEr" style="display:none" >requerido</span></td>
                </tr>
                <?php } ?>
                
                <?php if( $aInventario["vinieta"] == 3 ) { ?>
                <tr>
                  <td class="titR" >3. TOTAL</td>                  
                    <td width="20%" align="right" >
                        <input type="text" name="totalA" id="totalA" value="<?php echo number_format($aInventario["inma_inventario_inicial"], 2, '.', ','); ?>" size="12" maxlength="9" class="inpB2 numericDec normalTip" title="Debe registrar el inventario al 31/12/<?php echo $nuevafecha;?> en Bolivianos."><span class="prefM">Bs</span>
                        <span id="div_input-11" class="bxEr" style="display:none" >requerido</span>
                        <span id="div_input-11_2" class="bxEr" style="display:none" >inválido</span>
                    </td>
                    <td width="20%" align="right" >
                        <input type="text" name="totalB" id="totalB" size="12"  maxlength="9"  value="<?php echo number_format($aInventario["inma_inventario_final"], 2, '.', ','); ?>" class="inpB2 numericDec normalTip" title="Debe registrar el inventario al 31/12/<?php echo $anio;?> en Bolivianos." />
                        <span class="prefM">Bs</span>
                        <span id="div_input-21" class="bxEr" style="display:none" >requerido</span>
                    </td>
                    <td width="20%" align="right" >
                        <input type="text"  name="totalC" id="totalC" size="12" maxlength="9" value="<?php echo number_format($aInventario["inma_total_compras"], 2, '.', ','); ?>" class="inpB2 numericDec normalTip" title="Debe registrar el total de compras realizadas desde el 01/01/<?php echo $anio;?> hasta el 31/12/<?php echo $anio;?> en Bolivianos." />
                        <span class="prefM">Bs</span>
                        <span id="div_input-31" class="bxEr" style="display:none" >requerido</span>
                    </td>                    
                    <!-----
                  <td align="right"><label class="labB" id="totalA"><?php echo number_format($aInventario["inma_inventario_inicial"], 2, '.', ','); ?></label></td>
                  <td align="right"><label class="labB" id="totalB"><?php echo number_format($aInventario["inma_inventario_final"], 2, '.', ','); ?></label></td>
                  <td align="right"><label class="labB" id="totalC"><?php echo number_format($aInventario["inma_total_compras"], 2, '.', ','); ?></label></td>
                    -->
                </tr>
                <?php } ?>
                <?php } // end while ?>
                </tbody>
        </table>   
        <span class="bxEr" id="camdfgrgegregr" style="display:none" >todos los campos son requeridos</span>       
        <span class="bxEr" id="msg1" style="display:none" >Este dato no puede ser mayor que la cifra declarada en el Total</span>
        <span class="bxEr" id="msg2" style="display:none" >Este dato no puede ser mayor que la cifra declarada en el Total</span>
        <span class="bxEr" id="msg3" style="display:none" >Este dato no puede ser mayor que la cifra declarada en el Total</span>
        <span class="bxBt">
            <input type="submit" value="SIGUIENTE" id="sendData" name="continuarregistro" class="button" >            
            <a href="acap3.php" class="btnS">ANTERIOR</a>                
        </span>

        </fieldset>
    </form>
    <div class="clear"></div>      

</div>
<!-- end body -->

<?php include("footer.php") ?>
