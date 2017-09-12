<?php session_start(); ?>
<?php
//modecose actual
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
include_once('../verifyLogin.php'); ?>
<?php include("header.php") ?>
<script type="text/javascript" src="js/acap2.js"></script>
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
if (OPERATOR::getDbValue("SELECT regi_movco FROM sys_registros WHERE regi_uid='".$regisroUID."'")==="NO") {
    header("Location: ".$domain."/modcose/bol1.php");
}
//crear registros para sueldos
$sql = "SELECT * FROM cap2_personalsueldos WHERE pesu_regi_uid = '".$regisroUID."' ";
$db->query( $sql );
chkconformeye;
if( $db->numrows() == 0 ) {
    // obtener el uid del token
    $uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );

    $sql2 = "SELECT * FROM adm_definiciones WHERE defi_form_uid = '".$uidFormulario."'  AND defi_modulo = 'a' AND  defi_capitulo = '2' AND defi_vinieta BETWEEN '1' AND '5' ";
    $db2->query( $sql2 );
    while( $aDefinicion =  $db2->next_record() ) {        
        $sql = "INSERT INTO cap2_personalsueldos SET ";
        $sql .= "pesu_regi_uid  = '".$regisroUID."', ";
        $sql .= "pesu_defi_uid 	 = '".$aDefinicion["defi_uid"]."', ";
        $sql .= "pesu_numero_hombres = 0, ";
        $sql .= "pesu_numero_mujeres = 0, ";
        $sql .= "pesu_sueldos_salarios = 0, "; 
        $sql .= "pesu_suv_uid = '".$uid_token."', "; 
        $sql .= "pesu_date_create = NOW(), "; 
        $sql .= "pesu_date_update = NOW() ";                          	 	
        $db3->query( $sql );
    }
}
//Tipo de personal permanente
$db->query( "SELECT * FROM cap2_personalsueldos WHERE pesu_regi_uid = '".$regisroUID."' AND pesu_defi_uid = '1' " );
$aPermanente = $db->next_record();
//Tipo de personal eventual
$db->query("SELECT * FROM cap2_personalsueldos WHERE pesu_regi_uid = '".$regisroUID."' AND pesu_defi_uid = '2' ");
$aEventual = $db->next_record();
//suma totales de personas y sueldos y salarios
$db->query( "SELECT * FROM cap2_personalsueldos WHERE pesu_regi_uid = '".$regisroUID."' AND pesu_defi_uid = '3' ");
$aPTotal = $db->next_record();
//Tipo de personal de apoyo
$db->query( "SELECT * FROM cap2_personalsueldos WHERE pesu_regi_uid = '".$regisroUID."' AND pesu_defi_uid = '4' ");
$aApoyo = $db->next_record();
//Totales de todo
$db->query( "SELECT * FROM cap2_personalsueldos WHERE pesu_regi_uid = '".$regisroUID."' AND pesu_defi_uid = '5' ");
$aTotalGen = $db->next_record();
//echo "Salida";
//echo $aPTotal["pesu_estado"];
$salariominimonal = 1440;
//echo "SALARIO Minimo-..".$salariominimonal;
?>
<!-- begin body -->     
    <?php 
    if (OPERATOR::getDbValue("SELECT regi_movco FROM sys_registros WHERE regi_uid='".$regisroUID."'")=="NULL") {?>
    <div class="content">
    <span id="statusACAP1"></span>
    <table class="dInf">
        <thead>
            <tr>
                <th>Capitulo 2</th>            
            </tr>
        </thead>
    </table> 
    <form class="formA validable" action="acap2AddRegisMov.php" method="post" autocomplete="off" >
      <fieldset>
        <p><span class="contChk">
            <input type="radio" class="chk" id="chkconformeye" name="chkconforme" value="YES">
            <label class="labChkB2">La empresa registró movimiento comercial durante la gestión <?php echo $anio;?>.</label>
        </span></p>
        <p><span class="contChk">
            <input type="radio" class="chk" id="chkconformeno" name="chkconforme" value="NO">
            <label class="labChkB2">La empresa no registró movimiento comercial durante la gestión <?php echo $anio;?>.</label>
        </span></p>
        <span id="chkerror" class="bxEr" style="display:none" >requerido</span>
        <span class="bxBt">
            <input type="submit" value="SIGUIENTE" id="sendData2" name="continuarregistro" class="button" >
            <a href="acap1.php" class="btnS">ANTERIOR</a>                
        </span>
    </fieldset>
</form>
<?php }else{ 
    ?>
<div class="content">
    <span id="statusACAP1"></span>
    <span class="subT" >
        A PARTIR DE ESTE CAPITULO LLENE LA INFORMACION CORRESPONDIENTE A LA GESTION QUE REPORTA <?php echo $anio;?> (anote los valores en Bolivianos, sin centavos). 
    </span>
    <table class="dInf">
        <thead>
            <!--
            <tr>
                <th>MODULO B</th>
                <th>INFORMACI&Oacute;N FINANCIERA</th>
            </tr>  -->
        </thead>
    </table>
    <table class="dInf">
        <thead>
            <tr>
                <th>Cap&iacute;tulo 2</th>
                <th>PERSONAL OCUPADO, SUELDOS Y SALARIOS</th>
            </tr>
        </thead>
        <tbody>
            <tr>                        
                <td colspan="2">Registrar el número de personas que trabajaron en la empresa y los sueldos pagados durante la gestión.</td>                
            </tr>
            <tr>                        
                <td colspan="2"><b>Personal Permanente:</b> Es el personal que ocupa un cargo fijo en la empresa durante la gestión<br>
                <b>Personal Eventual:</b>Es el personal que trabajó en la empresa temporalmente y no tiene cargo fijo<br>
                <b>Personal de Apoyo:</b> Personas que apoyan en la empresa y que no reciben un pago, por ejemplo: propietarios, miembros de directorio, familiares, etc.</td>                
            </tr>
           
            <tr>                
                <td colspan="2"><b>Paso 1.-</b> Registre el Total en la Columna de Hombres. y presione Tab.<br>
                <b>Paso 2.-</b> Registre la cantidad de personal eventual en la columna Hombres y presionar Tab. la cantidad de Personal Permanente Hombres se calculará automáticamente<br>
                <b>Paso 3.-</b> Continuar bajo esta metodología para la columna que corresponde a Mujeres y Sueldos y Salarios.<br>
                <b>Paso 4.-</b> Registre la fila que corresponde a personal de Apoyo.<br>
            </tr>
        </tbody>
    </table>   
    <form class="formA validable" action="acap2Add.php" method="post" autocomplete="off" >
      <fieldset>                                                           
        <table width="100%" class="fOpt" >
            <thead>
                <tr>
                    <th align="center">PERSONAL OCUPADO</th>
                    <th colspan="2" align="center" >N&Uacute;MERO DE PERSONAS (Anual)</th>                    
                    <th align="center">SUELDOS Y SALARIOS (Bs/Anual)</th>
                </tr>                
            </thead>
            <tbody>
                <tr>
                    <td align="center" class="titR" >&nbsp;</td>
                    <td align="center" class="titR">Hombres</td>
                    <td align="center" class="titR">Mujeres</td>
                    <td align="center" class="titR">&nbsp;</td>
                </tr>
                <tr>
                    <td width="40%" class="titR" >1. Personal permanente:</td>                    
                    <td width="20%" align="right" >                  
                            <label class="labB" id="pepermanenteH"><?php if ($aPermanente["pesu_estado"] > 0){ 
                                echo number_format($aPermanente["pesu_numero_hombres"]);} else {echo ('');} ?></label>                        
                            <span id="div_pepermanenteH" class="bxEr" style="display:none" >requerido</span>
                            <span id="div_pepermanenteH_2" class="bxEr" style="display:none" >inválido</span>                        
                    </td>
                    <td width="20%" align="right" >                        
                        <label class="labB" id="pepermanenteM"><?php if ($aPermanente["pesu_estado"] > 0){
                            echo number_format($aPermanente["pesu_numero_mujeres"]);} else {echo ('');} ?></label>                                                
                        <span id="div_pepermanenteM" class="bxEr" style="display:none" >requerido</span>
                        <span id="div_pepermanenteM_2" class="bxEr" style="display:none" >inválido</span>
                  </td>
                  <td width="20%" align="right" >                        
                        <label class="labB" id="pepermanente"><?php if ($aPermanente["pesu_estado"] > 0){
                            echo number_format($aPermanente["pesu_sueldos_salarios"]);} else {echo ('');} ?></label>                        
                        <span id="div_pepermanente" class="bxEr" style="display:none" >requerido</span>
                        <span id="div_pepermanente_2" class="bxEr" style="display:none" >inválido</span>                     
                  </td>
                </tr>
              <tr>
                <td class="titR" >2. Personal eventual:</td>
                <td align="right"><input type="text" name="peventualH" id="peventualH"  value="<?php if ($aEventual["pesu_estado"] > 0){
                    echo $aEventual["pesu_numero_hombres"];} else {echo ('');} ?>" maxlength="5" size="20" class="inpB2 numeric required normalTip" title="Personal eventual: Es el personal que trabaj&oacute; en su empresa temporalmente durante la gesti&oacute;n <?php echo $anio; ?> y que no tuvo un cargo fijo.">
                    <span id="div_peventualH" class="bxEr" style="display:none" >requerido</span>
                    <span id="div_peventualH_2" class="bxEr" style="display:none" >inválido</span>
                </td>
                <td align="right"><input type="text" name="peventualM" id="peventualM"  value="<?php if ($aEventual["pesu_estado"] > 0){
                    echo $aEventual["pesu_numero_mujeres"];} else {echo ('');} ?>" maxlength="5" size="20" class="inpB2 numeric required normalTip" title="Personal eventual: Es el personal que trabaj&oacute; en su empresa temporalmente durante la gesti&oacute;n <?php echo $anio; ?> y que no tuvo un cargo fijo.">
                    <span id="div_peventualM" class="bxEr" style="display:none" >requerido</span>
                    <span id="div_peventualM_2" class="bxEr" style="display:none" >inválido</span>
                </td>
                <td align="right">
                    <input type="text" name="peventual" id="peventual"  onblur="javascript:saveUPD(2); return false;" value="<?php if ($aEventual["pesu_estado"] > 0){
                        echo number_format($aEventual["pesu_sueldos_salarios"],0, '.', ',' ) ;} else {echo ('');}?>" size="12" maxlength="14" class="inpB2 numeric required normalTip" title="Debe registrar el monto ANUAL de sueldos y salarios pagados en Bolivianos."><span class="prefM">Bs</span>
                    <span id="div_peventual" class="bxEr" style="display:none" >requerido</span>
                    <span id="div_peventual_2" class="bxEr" style="display:none" >inválido</span>
                </td>
            </tr>
            <tr>                
                <td class="titR" >3. TOTAL</td>                
                <td align="right">
                    <input type="hidden" name="salminal" id="salminal" value="1440" size="20" disabled >
                    <input type="text" name="totperH" id="totperH" onblur="javascript:saveUPD(2); return false;" value="<?php if ($aPTotal["pesu_estado"] > 0){
                        echo number_format($aPTotal["pesu_numero_hombres"],0, '.', ',' );} else {echo ('');} ?>" size="20" maxlength="5" class="inpB2 numeric required normalTip" title="Total de personal Permanente y Eventual Hombres">
                    <span id="div_peventual" class="bxEr" style="display:none" >requerido</span>
                    <span id="div_peventual_2" class="bxEr" style="display:none" >inválido</span>                    
                </td>
                <td align="right">
                    <input type="text" name="totperM" id="totperM" onblur="javascript:saveUPD(2); return false;" value="<?php if ($aPTotal["pesu_estado"] > 0){
                        echo number_format($aPTotal["pesu_numero_mujeres"],0, '.', ',' );} else {echo ('');} ?>" size="20" maxlength="5" class="inpB2 numeric required normalTip" title="Total de personal Permanente y Eventual Mujeres">
                    <span id="div_peventual" class="bxEr" style="display:none" >requerido</span>
                    <span id="div_peventual_2" class="bxEr" style="display:none" >inválido</span>                    
                </td>
                <td align="right">
                    <input type="text" name="totperHM" id="totperHM" onblur="javascript:saveUPD(2); return false;" value="<?php if ($aPTotal["pesu_estado"] > 0){
                        echo number_format($aPTotal["pesu_sueldos_salarios"],0, '.', ',' );} else {echo ('');} ?>" size="12" maxlength="14" class="inpB2 numeric required normalTip" title="Total de Sueldos y Salarios"><span class="prefM">Bs</span>
                    <span id="div_peventual" class="bxEr" style="display:none" >requerido</span>
                    <span id="div_peventual_2" class="bxEr" style="display:none" >inválido</span>                    
                </td>
            </tr>            
            <tr>
                <td class="titR" >4. Personal de apoyo:</td>
                <td align="right"><input type="text" name="nopagH" id="nopagH" value="<?php if ($aApoyo["pesu_estado"] > 0){
                    echo $aApoyo["pesu_numero_hombres"];} else {echo ('');}?>" size="20" class="inpB2 numeric required normalTip" title="Personal sin remuneraci&oacute;n: Personas que trabajaron en su empresa y no recibieron una remuneraci&oacute;n. Por ejemplo: propietarios, familiares del propietario, miembros del directorio, etc."  >
                    <span id="div_nopagH" class="bxEr" style="display:none" >requerido</span>
                    <span id="div_nopagH_2" class="bxEr" style="display:none" >inválido</span>
                </td>
                <td align="right"><input type="text" name="nopagM" id="nopagM" value="<?php if ($aApoyo["pesu_estado"] > 0){
                    echo $aApoyo["pesu_numero_mujeres"];} else {echo ('');} ?>" size="20" class="inpB2 numeric required normalTip" title="Personal sin remuneraci&oacute;n: Personas que trabajaron en su empresa y no recibieron una remuneraci&oacute;n. Por ejemplo: propietarios, familiares del propietario, miembros del directorio, etc."  >
                    <span id="div_nopagM" class="bxEr" style="display:none" >requerido</span>
                    <span id="div_nopagM_2" class="bxEr" style="display:none" >inválido</span>
                </td>
                <td align="right"></td>
            </tr>       
        </tbody>
    </table>
    <p>
        <span id="msg" style="display: none;" class="bxEr" >Para que exista una empresa, debe haber por lo menos una persona</span>
        <span id="msg2" style="display: none;" class="bxEr" >El personal permanente sumado al personal eventual no debe sobrepasar los 5.000 personas</span>
        <span id="msg3" style="display: none;" class="bxEr" >Debe introducir el salario para el personal</span>
        <span id="msg4" style="display: none;" class="bxEr" >Debe introducir el numero de personas para el salario especificado.</span>
        <span id="msg5" style="display: none;" class="bxEr" >Ahora debe llenar la casilla de Personal Eventual Hombres, la cantidad de Personal Permanente Hombres se calculará Automaticamente</span>
        <span id="msg5" style="display: none;" class="bxEr" >Ahora debe llenar la casilla de Personal Eventual Mujeres, la cantidad de Personal Permanente Mujeres se calculará Automaticamente</span>
    </p>                                    
    <span class="bxBt">
        <input type="submit" value="SIGUIENTE" id="sendData" name="continuarregistro" class="button" >
        <a href="acap1.php" class="btnS">ANTERIOR</a>                
    </span>
</fieldset>
</form>
    
    
    
<?php } ?>
<div class="clear"></div>      

</div>
<!-- end body -->
<?php include("footer.php") ?>
