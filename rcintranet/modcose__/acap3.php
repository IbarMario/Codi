<?php session_start(); ?>
<?php
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
?>
<?php include_once('../verifyLogin.php'); ?>
<?php include("header.php") ?>
<script type="text/javascript" src="js/acap3.js"></script>
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

//crear registros para sueldos
$sql = "SELECT * FROM cap3_suministros WHERE sumi_regi_uid = '".$regisroUID."' ";
$db->query( $sql );
if( $db->numrows() == 0 ) {
    // obtener el uid del token
    $uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );    
    $sql2 = "SELECT * FROM adm_definiciones WHERE defi_form_uid = '".$uidFormulario."' AND defi_modulo = 'a' AND  defi_capitulo = '3' ";       
    
    $db2->query( $sql2 );
    while( $aDefinicion =  $db2->next_record() ) {        
        $sql = "INSERT INTO  cap3_suministros SET ";
        $sql .= "sumi_regi_uid  = '".$regisroUID."', ";
        $sql .= "sumi_defi_uid 	 = '".$aDefinicion["defi_uid"]."', ";
        $sql .= "sumi_valor = 0, ";
        $sql .= "sumi_categoriatarifaria = '', ";        
        $sql .= "sumi_suv_uid = '".$uid_token."', "; 
        $sql .= "sumi_createdate = NOW(), "; 
        $sql .= "sumi_createupdate = NOW() ";                          	 	
        $db3->query( $sql );                
    }
}

//Tipo de personal

$sql = " SELECT cap3_suministros.*, adm_definiciones.defi_vinieta as vinieta FROM cap3_suministros LEFT JOIN  adm_definiciones ON ( sumi_defi_uid = defi_uid ) "
." WHERE sumi_regi_uid = '".$regisroUID."' ORDER BY adm_definiciones.defi_vinieta ASC ";
$db->query( $sql );
//echo $sql;
?>
<style type="text/css"> .mark{ boder: 1px solid red !important; } </style>
<!-- begin body -->
<div class="content ">                
    <span id="statusACAP1"></span>    
    <table class="dInf">
        <thead>
            <tr>
                <th>Cap&iacute;tulo 3</th>
                <th>SUMINISTROS</th>
            </tr>            
        </thead>
         <tbody>
            <tr>                        
                <td colspan="2">Los campos marcados con asterisco son obligatorios<span class="color4">*</span>.</td>
            </tr>
            <tr>                        
                <td colspan="2"><b>Registrar el valor total anual</b> por concepto de compra o consumo de energía electrica, agua, gas y otros combustibles.<br>
                    <b>Otros combustibles y lubricantes</b>, anotar el valor pagado por la compra de aceites, grasas, leña y otros que la empresa habría comprado en el año.<br>
                    <b>Categoría tarifaria</b>, anotar si la tarifa es domiciliaria, industrial o comercial.<br>
                </td>
            </tr>
        </tbody>
    </table>    
    <table class="dInf">
        <thead>
            <!--
            <tr>
                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th align="center" >GASTOS EN SUMINISTROS DE ENERG&Iacute;A Y LUBRICANTES  </th>
            </tr>
            -->
        </thead>
    </table>
    
    <form class="formA validable" action="acap3Add.php" method="post" autocomplete="off" >
        <fieldset>          
          <table width="100%" class="fOpt" >
              <thead>
               <tr>
                <th>DETALLE</th>
                <th align="center" >VALOR TOTAL (Bs/Anual)</th>                    
                <th align="center">CATEGOR&Iacute;A TARIFARIA</th>
            </tr>
        </thead>
        <tbody>
           <?php 
           $cc = 0;               
           while( $aSuministro = $db->next_record() ) {
               $estado = $aSuministro["sumi_estado"];
               $cc = $cc + 1;                   
               ?>
               <?php if( $aSuministro["vinieta"] == 1 ) { ?>
               <tr>
                <td width="30%" class="titR" >1. Energ&iacute;a el&eacute;ctrica consumida</td>
                <td width="19%" align="right" >
                    <input type="text" name="input-1" id="input-1" onblur="javascript:saveUPD(1); return false;" value="<?php if ($estado > 0){
                        echo number_format($aSuministro["sumi_valor"], 0, '.', ',');} else {echo ('');} ?>" size="12" maxlength="11" class="inpB2 numeric normalTip" title="Registre el monto ANUAL en Bolivianos de consumo de Energ&iacute;a el&eacute;ctrica y seleccione una de las opciones de categor&iacute;a tarifaria de la lista  desplegable.">
                    <span class="prefM">Bs</span>
                    <span id="div_input-1" class="inpB" style="display:none" >requerido</span>
                    <span id="div_input-1_2" class="inpB" style="display:none" >inv&aacute;lido</span>
                </td>
                <td width="51%" align="center" >                    
                    <?php
                    $sqlTarifa = "SELECT cata_descripcion FROM par_categorias_tarifarias ORDER BY cata_descripcion ASC ";
                    $db2->query( $sqlTarifa );                        
                    ?>
                    <select name="input-11" id="input-11" onblur="javascript:saveUPD(1); return false;" onchange="showInputOtro('electricidad'); return false;" >
                        <option selected value="">Seleccionar</option>
                        <?php $sw1 = 0; $tipo = ""; while( $aTarifa = $db2->next_record() ) { ?>
                        <option value="<?php echo $aTarifa["cata_descripcion"] ?>" 
                            <?php  if( $aSuministro["sumi_categoriatarifaria"] == $aTarifa["cata_descripcion"] ){ print("selected=\"selected\""); $sw1 = 1; $tipo = $aTarifa["cata_descripcion"]; } ?>   
                            ><?php echo $aTarifa["cata_descripcion"] ?></option>
                            <?php } ?>
                        </select>

                        <?php 
                        $mostrar1 = "style=\"display: none\"";                                 
                        $tipotarifamostrar = "";
                        if( $sw1 == 0 ) {                              
                            if( !empty( $aSuministro["sumi_categoriatarifaria"] ) ) { 
                                $mostrar1 = "style=\"display: block\""; 
                                echo "<script> $(\"#input-11 option[value='OTRAS']\").attr(\"selected\", \"selected\");  </script>";   
                                $tipotarifamostrar = $aSuministro["sumi_categoriatarifaria"];
                            } 
                        }
                        if( $tipo == 'OTRAS' ) {
                            $mostrar1 = "style=\"display: block\""; 
                            $tipotarifamostrar = $aSuministro["sumi_categoriatarifaria"];
                        }
                        ?>
                        <span id="div_input-11" class="bxEr" style="display:none" >requerido</span>
                        <span id="div_input-11_2" class="inpB" style="display:none" >inv&aacute;lido</span>
                    </td>
                </td>
            </tr>
            <?php } ?>
            <?php if( $aSuministro["vinieta"] == 2 ) { ?>
            <tr>
                <td width="30%" class="titR" >2. Agua</td>
                <td align="right"  ><input type="text" onblur="javascript:saveUPD(2); return false;" name="input-2" id="input-2" value="<?php  if ($estado > 0){
                    echo number_format($aSuministro["sumi_valor"], 0, '.', ',');} else {echo ('');}  ?>" size="12" maxlength="11" class="inpB2 numeric normalTip" title="Registre el monto ANUAL en Bolivianos de consumo de Agua y seleccione una de las opciones de categor&iacute;a tarifaria de la lista  desplegable."><span class="prefM">Bs</span>
                    <span id="div_input-2" class="inpB" style="display:none" >requerido</span>
                    <span id="div_input-2_2" class="inpB" style="display:none" >inv&aacute;lido</span>
                </td>
                <td align="center">                    
                    <?php
                    $sqlTarifa = "SELECT cata_descripcion FROM par_categorias_tarifarias ORDER BY cata_descripcion ASC ";
                    $db2->query( $sqlTarifa );                    
                    ?>
                    <select name="input-12" onblur="javascript:saveUPD(2); return false;" id="input-12" onchange="showInputOtro('agua');" >
                        <option selected value="">Seleccionar</option>
                        <?php $sw1 = 0; $tipo = ""; while( $aTarifa = $db2->next_record() ) { ?>
                        <option value="<?php echo $aTarifa["cata_descripcion"] ?>" <?php if( $aSuministro["sumi_categoriatarifaria"] == $aTarifa["cata_descripcion"] ){ print("selected=\"selected\""); $sw1 = 1; $tipo = $aTarifa["cata_descripcion"]; } ?>   ><?php echo $aTarifa["cata_descripcion"] ?></option>
                        <?php } ?>
                    </select>
                    <?php
                    $tipotarifamostrar = "";
                    $mostrar1 = "style=\"display: none\"";
                    if ($sw1 == 0) {
                        if (!empty($aSuministro["sumi_categoriatarifaria"])) {
                            $mostrar1 = "style=\"display: block\"";
                            echo "<script> $(\"#input-12 option[value='OTRAS']\").attr(\"selected\", \"selected\"); </script>";
                            $tipotarifamostrar = $aSuministro["sumi_categoriatarifaria"];
                        }
                    }
                    if( $tipo == 'OTRAS' ) {
                        $mostrar1 = "style=\"display: block\""; 
                        $tipotarifamostrar = $aSuministro["sumi_categoriatarifaria"];
                    }
                    ?>
                    <span id="div_input-12" class="bxEr" style="display:none" >requerido</span>
                    <span id="div_input-12_2" class="inpB" style="display:none" >inv&aacute;lido</span>
                </td>
            </tr>
            <?php } ?>
            <?php if( $aSuministro["vinieta"] == 3 ) { ?>
            <tr>
                <td width="30%" class="titR" >3. Gas natural</td>
                <td align="right"  ><input type="text" onblur="javascript:saveUPD(3); return false;" name="input-3" id="input-3" value="<?php  if ($estado > 0){
                    echo number_format($aSuministro["sumi_valor"], 0, '.', ',');} else {echo ('');}  ?>" size="12" maxlength="11" class="inpB2 numeric normalTip" title="Registre el monto ANUAL en Bolivianos de consumo de Gas natural y seleccione una de las opciones de categor&iacute;a tarifaria de la lista  desplegable."><span class="prefM">Bs</span>
                    <span id="div_input-3" class="inpB" style="display:none" >requerido</span>
                    <span id="div_input-3_2" class="inpB" style="display:none" >inv&aacute;lido</span>
                </td>
                <td align="center"  >                                               
                    <?php
                    $sqlTarifa = "SELECT cata_descripcion FROM par_categorias_tarifarias ORDER BY cata_descripcion ASC ";
                    $db2->query( $sqlTarifa );                        
                    ?>
                    <select name="input-13" id="input-13" onblur="javascript:saveUPD(3); return false;" onchange="showInputOtro('gas');" >       
                        <option selected value="">Seleccionar</option>
                        <?php $sw1 = 0; $tipo = ""; while( $aTarifa = $db2->next_record() ) { ?>
                        <option value="<?php echo $aTarifa["cata_descripcion"] ?>" <?php if( $aSuministro["sumi_categoriatarifaria"] == $aTarifa["cata_descripcion"] ){ print("selected=\"selected\""); $sw1 = 1; $tipo = $aTarifa["cata_descripcion"]; } ?>   ><?php echo $aTarifa["cata_descripcion"] ?></option>
                        <?php } ?>
                    </select>
                    <?php 
                    $mostrar1 = "style=\"display: none\"";
                    $tipotarifamostrar = "";
                    if( $sw1 == 0 ) {  
                        if( !empty( $aSuministro["sumi_categoriatarifaria"] ) ) { 
                            $mostrar1 = "style=\"display: block\""; 
                            echo "<script> $(\"#input-13 option[value='OTRAS']\").attr(\"selected\", \"selected\"); </script>";
                            $tipotarifamostrar = $aSuministro["sumi_categoriatarifaria"];
                        }
                    } 
                    if( $tipo == 'OTRAS' ) {
                        $mostrar1 = "style=\"display: block\"";
                        $tipotarifamostrar = $aSuministro["sumi_categoriatarifaria"];
                    }
                    ?>
                    <span id="div_input-13" class="bxEr" style="display:none" >requerido</span>
                    <span id="div_input-13_2" class="inpB" style="display:none" >inv&aacute;lido</span>
                </td>

            </tr>
            <?php } ?>
            <?php if( $aSuministro["vinieta"] == 4 ) { ?>
            <tr>
                <td width="30%" class="titR" >4. Diesel oil</td>
                <td align="right"  >
                    <input type="text" name="input-4" id="input-4" value="<?php  if ($estado > 0){
                        echo number_format($aSuministro["sumi_valor"], 0, '.', ',');} else {echo ('');}  ?>" size="12" maxlength="11" class="inpB2 numeric normalTip" title="Registre el monto ANUAL en Bolivianos de consumo de Diesel oil."><span class="prefM">Bs</span>
                    <span id="div_input-4" class="inpB" style="display:none" >requerido</span>
                    <span id="div_input-4_2" class="inpB" style="display:none" >inv&aacute;lido</span>
                </td>
                <td  >&nbsp;</td>
            </tr>
            <?php } ?>
            <?php if( $aSuministro["vinieta"] == 5 ) { ?>
            <tr>
                <td width="30%" class="titR" >5. Gasolina</td>
                <td align="right"  >
                    <input type="text" name="input-5" id="input-5" value="<?php if ($estado > 0){
                        echo number_format($aSuministro["sumi_valor"], 0, '.', ',');} else {echo ('');}  ?>" size="12" maxlength="11" class="inpB2 numeric normalTip" title="Registre el monto ANUAL en Bolivianos de consumo de Gasolina."><span class="prefM">Bs</span>
                    
                    <span id="div_input-5" class="inpB" style="display:none" >requerido</span>
                    <span id="div_input-5_2" class="inpB" style="display:none" >inv&aacute;lido</span>
                </td>
                <td  >&nbsp;</td>
            </tr>
            <?php } ?>           
            <?php if( $aSuministro["vinieta"] == 6 ) { ?>
            <tr>
                <td class="titR" >6. Gas licuado</td>
                <td align="right">
                    <input type="text" name="input-6" id="input-6" value="<?php  if ($estado > 0){
                        echo number_format($aSuministro["sumi_valor"], 0, '.', ',');} else {echo ('');}  ?>" size="12"  maxlength="11" class="inpB2 numeric normalTip" title="Registre el monto ANUAL en Bolivianos de consumo de Gas licuado." ><span class="prefM">Bs</span>
                    <span id="div_input-6" class="inpB" style="display:none" >requerido</span>
                    <span id="div_input-6_2" class="inpB" style="display:none" >inv&aacute;lido</span>
                </td>
                <td>&nbsp;</td>
            </tr>
            <?php } ?>

            <?php if( $aSuministro["vinieta"] == 7 ) { ?>
            <tr>
                <td class="titR" >7. Otros combustibles y lubricantes<br />

                </td>
                <td align="right" >
                    <input type="text" name="input-7" id="input-7" value="<?php if ($estado > 0){
                        echo number_format($aSuministro["sumi_valor"], 0, '.', ',');} else {echo ('');}  ?>" size="12"  maxlength="11"  class="inpB2 numeric normalTip" title="Registre el monto ANUAL en Bolivianos de consumo de otros combustibles y lubricantes." ><span class="prefM">Bs</span>                                                            
                    <span id="div_input-7" class="inpB" style="display:none" >requerido</span>
                    <span id="div_input-7_2" class="inpB" style="display:none" >inv&aacute;lido</span>
                </td>

                <td> 
                    <?php 
                    $mostrar = "style=\"display:none\"";
                    if( !empty($aSuministro["sumi_valor"]) ) {
                        $mostrar = "style=\"display:block\"";
                    }                    
                    ?>
                    <input type="text" name="input-8" id="input-8" value="<?php if ($estado > 0){ 
                        echo $aSuministro["sumi_categoriatarifaria"];} else {echo ('');}  ?>" <?php echo $mostrar; ?>  size="30"  maxlength="11" class="inpC2"  onKeyUp="this.value = this.value.toUpperCase();" required pattern="[A-Z ]*">                    
                    <span id="div_input-9_2" class="inpB" style="display:none" >inv&aacute;lido</span>
                </td>
            </tr>
            <?php } ?>

            <?php if( $aSuministro["vinieta"] == 8 ){ ?>
            <tr>
              <td class="titR" >8. TOTAL</td>
              
              <td align="right"><input type="text" name="ai_totsuministros" id="ai_totsuministros" value="<?php  if ($estado > 0) {echo number_format($aSuministro["sumi_valor"], 0, '.', ',');} else {echo '';} ?>" size="12"  maxlength="13" class="inpB2 numeric normalTip" /><span class="prefM">Bs</span> </td>
              <!--
              <td align="right"><label class="labB" name="ai_totsuministros" id="ai_totsuministros"><?php  if ($estado > 0){ echo number_format($aSuministro["sumi_valor"], 0, '.', ',');} else {echo ('');} ?></label></td>
              -->
              <td></td>                                  
          </tr>
          <?php } ?>

          <?php }// end While   ?>
      </tbody>
  </table>
  <p>
      <span id="msg" style="display: none;" class="bxEr" >Debe introducir el detalle para la categor&iacute;a tarifaria otras</span>
      <span id="msg2" style="display: none;" class="bxEr" >Debe introducir un valor para cualquiera de los conceptos detallados</span>
      <span id="msg3" style="display: none;" class="bxEr" >Debe selecionar la categor&iacute;a tarifaria para el valor introducido</span>
      <span id="msg4" style="display: none;" class="bxEr" >Debe introducir la descripci&oacute;n para el detalle Otros combustibles</span>
      <span id="msg2ik" style="display: none;" class="bxEr" >Debe completar los datos de agua y energia el&eacute;ctrica</span>
  </p> 

<span class="bxBt">
    <input type="submit" value="SIGUIENTE" id="sendData" name="continuarregistro" class="button" >
    <a href="acap2.php" class="btnS">ANTERIOR</a>                
</span>
</fieldset>
</form>
<div class="clear"></div>      
</div>
<?php include("footer.php") ?>
