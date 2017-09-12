<?php session_start(); ?>
<?php
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
?>
<?php include_once('../verifyLogin.php'); ?>
<?php include("header.php") ?>
<script type="text/javascript" src="js/acap9.js"></script>  
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

$sql = "SELECT * FROM frm1_cap9_formacionactivosfijos WHERE foaf_regi_uid = '".$regisroUID."' ";
$db->query( $sql );

if( $db->numrows() == 0 ) {
    $uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );    
    $sql2 = "SELECT * FROM adm_definiciones WHERE defi_form_uid = '".$uidFormulario."' AND defi_modulo = 'a' AND  defi_capitulo = '9' ";    
    // echo $sql2;   
    $db2->query( $sql2 );
    $sql="";    
    while( $aDefinicion =  $db2->next_record() ) {
        $sql = "INSERT INTO frm1_cap9_formacionactivosfijos SET ";
        $sql .= "foaf_regi_uid = '".$regisroUID."', ";
        $sql .= "foaf_defi_uid = '".$aDefinicion["defi_uid"]."', ";
        $sql .= "foaf_valor = 0, ";  
        $sql .= "foaf_description = '', ";          
        $sql .= "foaf_suv_uid = '".$uid_token."', "; 
        $sql .= "foaf_createdate = NOW(), "; 
        $sql .= "foaf_updatedate = NOW() ";                          	 	
        $db3->query( $sql );     
        // echo $sql."<br>";                  
    }        
}

function result($vi, $inden, $da){
  global $regisroUID;
   $sql = "SELECT frm1_cap9_formacionactivosfijos.".$da                      
                      ." FROM frm1_cap9_formacionactivosfijos LEFT JOIN  adm_definiciones ON ( foaf_defi_uid = defi_uid ) "
                      ." WHERE foaf_regi_uid = '".$regisroUID."' and adm_definiciones.defi_vinieta='".$vi."' and adm_definiciones.defi_indent='".$inden."' "
                      ." ORDER BY adm_definiciones.defi_indent ASC,  adm_definiciones.defi_vinieta ASC ";
   //echo $sql;
  return OPERATOR::getDbValue($sql);
}

function result2($vi, $inden, $da2){
  global $regisroUID;
   $sql = "SELECT frm1_cap9_formacionactivosfijos.".$da2                      
                      ." FROM frm1_cap9_formacionactivosfijos LEFT JOIN  adm_definiciones ON ( foaf_defi_uid = defi_uid ) "
                      ." WHERE foaf_regi_uid = '".$regisroUID."' and adm_definiciones.defi_vinieta='".$vi."' and adm_definiciones.defi_indent='".$inden."' "
                      ." ORDER BY adm_definiciones.defi_indent ASC,  adm_definiciones.defi_vinieta ASC ";
   //echo $sql."<br>";
  return OPERATOR::getDbValue($sql);
}
?>

<!-- begin body -->
<div class="content"> <span id="statusACAP1"></span>
    <table class="dInf">
    <thead>
    <tr>
        <th>Cap&iacute;tulo 9</th>
        <th>FORMACI&Oacute;N  DE  ACTIVOS  FIJOS</th>
    </tr>
    </thead>
    <tbody>       
        <tr>                        
            <td colspan="2">Debe registrar el valor en Bolivianos de sus activos  al 31/12/<?php echo $anio; ?>.Al menos debe registrar un ítem de los señalados.</td>
        </tr>
    </tbody>   
    </table>

    <form class="formA validable" action="acap9Add.php" method="post" autocomplete="off" >
        <fieldset>
          <table width="100%" class="fOpt" >
                <thead>
                <tr>
                    <th align="center">TIPO DE ACTIVO FIJO  (DETALLE)</th>
                    <th align="center" >VALOR TOTAL (Bs./Anual)</th>
                </tr>
                </thead>
                <tbody>
                <?php                                                
               
                $db->query( $sql );
                //echo $sql;
                $estado = result(1, 1, 'foaf_estado');
                //echo $estado;
                ?>
                <tr>
                    <td width="40%" class="titR" >1.  Edificios y construcciones (incluye instalaciones t&eacute;cnicas)</td>
                    <td width="30%" align="right" >
                    <input type="text" name="input-45" onblur="javascript:saveUPD(1); return false;" id="input-45" value="<?php if ($estado > 0) { echo number_format(result(1, 1, 'foaf_valor'), 0, '.', ',');} else {echo '';} ?>" size="12" maxlength="15" class="inpB2 numeric normalTip" title="Debe registrar el valor en  Bolivianos." /><span class="prefM">Bs</span>
                    <span id="div_input-45" class="bxEr" style="display:none" >requerido</span>
                    </td>      
                </tr>               
                <tr>
                    <td width="40%" class="titR" >2.  Maquinaria y equipo</td>

                    <td width="30%" align="right"  >
                    <input type="text" name="input-46" onblur="javascript:saveUPD(1); return false;" id="input-46" value="<?php  if ($estado > 0) {echo number_format(result(2, 1, 'foaf_valor'), 0, '.', ',');} else {echo '';} ?>" size="12" maxlength="15"  class="inpB2 numeric normalTip" title="Debe registrar el valor en  Bolivianos." /><span class="prefM">Bs</span>
                    <span id="div_input-46" class="bxEr" style="display:none" >requerido</span>
                    </td>    
                </tr>
            

                <tr>
                  <td class="titR" >3.  Veh&iacute;culos y equipo de transporte</td>

                    <td width="30%" align="right"  >
                    <input type="text" name="input-47" onblur="javascript:saveUPD(1); return false;" id="input-47" value="<?php  if ($estado > 0) {echo number_format(result(3, 1, 'foaf_valor'), 0, '.', ',');} else {echo '';} ?>" size="12"  maxlength="15"  class="inpB2 numeric normalTip" title="Debe registrar el valor en  Bolivianos." /><span class="prefM">Bs</span>
                    <span id="div_input-47" class="bxEr" style="display:none" >requerido</span>
                    </td>   
                </tr>

                
       
                <tr>
                  <td class="titR" >4.  Muebles y enseres</td>

                    <td width="30%" align="right"  >
                    <input type="text" name="input-48" onblur="javascript:saveUPD(1); return false;" id="input-48" value="<?php  if ($estado > 0) {echo number_format(result(4, 1, 'foaf_valor'), 0, '.', ',');} else {echo '';} ?>" size="12"  maxlength="15" class="inpB2 numeric normalTip" title="Debe registrar el valor en  Bolivianos." /><span class="prefM">Bs</span>
                    <span id="div_input-48" class="bxEr" style="display:none" >requerido</span>
                    </td>   
                </tr>                          
                <tr>
                  <td class="titR" >5.  Herramientas</td>

                    <td width="30%" align="right"  >
                    <input type="text" name="input-49" onblur="javascript:saveUPD(1); return false;" id="input-49" value="<?php  if ($estado > 0) {echo number_format(result(5, 1, 'foaf_valor'), 0, '.', ',');} else {echo '';} ?>" size="12"  maxlength="15" class="inpB2 numeric normalTip" title="Debe registrar el valor en  Bolivianos." /><span class="prefM">Bs</span>
                    <span id="div_input-49" class="bxEr" style="display:none" >requerido</span>
                    </td>   
                </tr>

                <tr>
                  <td class="titR" >6.  Equipo de computaci&oacute;n</td>
                    <td width="30%" align="right"  >
                    <input type="text" name="input-50" onblur="javascript:saveUPD(1); return false;" id="input-50" value="<?php  if ($estado > 0) {echo number_format(result(6, 1, 'foaf_valor'), 0, '.', ',');} else {echo '';} ?>" size="12"  maxlength="15" class="inpB2 numeric normalTip" title="Debe registrar el valor en  Bolivianos." /><span class="prefM">Bs</span>
                    <span id="div_input-50" class="bxEr" style="display:none" >requerido</span>
                    </td>   
                </tr>

                <tr>
                  <td class="titR" >7.  Terrenos</td>
                    <td width="30%" align="right"  >
                    <input type="text" name="input-51" onblur="javascript:saveUPD(1); return false;" id="input-51" value="<?php  if ($estado > 0) {echo number_format(result(7, 1, 'foaf_valor'), 0, '.', ',');} else {echo '';} ?>" size="12"  maxlength="15" class="inpB2 numeric normalTip" title="Debe registrar el valor en  Bolivianos." /><span class="prefM">Bs</span> 
                    <span id="div_input-51" class="bxEr" style="display:none" >requerido</span>
                    </td>   
                </tr>
                
                <!-----MEJORADO ---->                                
                <tr>
                  <td class="titR" >8.  Otros activos fijos  
                    <?php 
                    $mostrar = "style=\"display:none\"";
                    if( result(8, 1, 'foaf_valor') != 0) {
                        $mostrar = "style=\"display:block\"";
                    } ?>
                    <input type="text" name="input_52" id="input_52" value="<?php if ($estado > 0){ echo result2(8, 1, 'foaf_description');} else {echo ('');}  ?>" <?php echo $mostrar; ?>  size="60" class="inpC2"  onKeyUp="this.value = this.value.toUpperCase();"  pattern="[A-Z ]*"  > 
                    <span id="div_input-9_2" class="inpB" style="display:none" >inv&aacute;lido</span>
                  </td>
                  <td width="30%" align="right" >
                    <input type="text" name="input-52" onblur="javascript:saveUPD(1); return false;" id="input-52" value="<?php  if ($estado > 0) {echo number_format(result(8, 1, 'foaf_valor'), 0, '.', ',');} else {echo '';} ?>" size="12"  maxlength="15" class="inpB2 numeric normalTip" title="Debe registrar el valor en  Bolivianos." /><span class="prefM">Bs</span>
                    <span id="div_input-52" class="bxEr" style="display:none" >requerido</span>                                                                      
                  </td>  
                <!-----MEJORADO ---->
                
                    
                </tr>
                
                       <tr>
                  <td class="titR" >9. TOTAL</td>
                    <td width="30%" align="right"  >
                        <!--
                  <span id="input-53_divs" class="labB" ><?php if ($estado > 0) { echo number_format(result(9, 1, 'foaf_valor'), 0, '.', ',');} else {echo '';} ?></span>
                        -->
                    <input type="text" name="input-53" id="input-53" value="<?php  if ($estado > 0) {echo number_format(result(9, 1, 'foaf_valor'), 0, '.', ',');} else {echo '';} ?>" size="13" maxlength="15"  class="inpB2 numeric normalTip" /><span class="prefM">Bs</span>
                  
                    </td> 
                </tr>    
                </tbody>
            </table>
          
            <span id="msg" style="display: none" class="bxEr" >Debe introducir el detalle para el item Otros activos fijos</span>
            <span id="msg2" style="display: none" class="bxEr" >Debe introducir el valor para el tipo de activo fijo</span>
                                              
           <span class="bxBt">
                <input type="submit" value="SIGUIENTE" id="sendData" name="continuarregistro" class="button" >
                <a href="acap8.php" class="btnS">ANTERIOR</a>                
           </span>

        </fieldset>'foat_description'
    </form>
    <div class="clear"></div>      

</div>
<!-- end body -->               

<?php include("footer.php") ?>
