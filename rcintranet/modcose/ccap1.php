<?php session_start(); ?>
<?php
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
?>
<?php include_once('../verifyLogin.php'); ?>
<?php include("header.php") ?>
<script type="text/javascript" src="js/ccap1.js"></script>
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

$sql = "SELECT * FROM frm1_ccap1_usoaccesotic WHERE usac_regi_uid = '".$regisroUID."' ";
$db->query( $sql );

if( $db->numrows() == 0 ) {

    $uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );
    
    $sql2 = "SELECT * FROM adm_definiciones WHERE defi_form_uid = '".$uidFormulario."' AND defi_modulo = 'c' AND  defi_capitulo = '1' AND defi_swactive = 'ACTIVE' ";       
    $db2->query( $sql2 );
    while( $aDefinicion =  $db2->next_record() ) {
        $sql = "INSERT INTO frm1_ccap1_usoaccesotic SET ";
        $sql .= "usac_regi_uid = '".$regisroUID."', ";
        $sql .= "usac_defi_uid = '".$aDefinicion["defi_uid"]."', ";         
        $sql .= "usac_description = '', "; 
        $sql .= "usac_suv_uid = '".$uid_token."', "; 
        $sql .= "usac_createdate = NOW(), "; 
        $sql .= "usac_updatedate = NOW() ";                          	 	
        $db3->query( $sql );              
    }        
}
?>

<?php      
    // verificar si esta vacia
function checkEmpty($var) {
    if (strlen($var) >= 1) {
            return false; // No esta vacia
        } else {
            return true; // Esta Vacia
        }
    }

    $sql = " SELECT frm1_ccap1_usoaccesotic.*, adm_definiciones.defi_vinieta as vinieta, adm_definiciones.defi_indent as indent "
    ." FROM frm1_ccap1_usoaccesotic LEFT JOIN  adm_definiciones ON ( usac_defi_uid = defi_uid ) "
    ." WHERE usac_regi_uid = '".$regisroUID."' ";
    $db->query( $sql );
    
    //echo $sql;
    $a_valor = "";
    $b_valor = "";
    $c_valor = "";
    
    $chk_inter = 0;
    $chk_intra = 0;
    
    while( $aTIC = $db->next_record() ) {

        if( $aTIC["indent"] == 1 && $aTIC["vinieta"] == "a" ) {
            $chk_inter = $aTIC["usac_valor"];                
        }
        
        if( $aTIC["indent"] == 1 && $aTIC["vinieta"] == "b" ) {
            $chk_intra = $aTIC["usac_valor"];                
        }
        
        if( $aTIC["indent"] == 1 && $aTIC["vinieta"] == "c" ) {
            $chk_nocuenta = $aTIC["usac_valor"];                
        }
        
        if( $aTIC["indent"] == 2 && $aTIC["vinieta"] == "1" ) {
            $txt_usapc = $aTIC["usac_description"];                
        }
        
        //utiliza internet
        if( $aTIC["indent"] == 3 && $aTIC["vinieta"] == "1" ) {
            $chk_usainter = $aTIC["usac_valor"];                        
        }

        if( $aTIC["indent"] == 4 ) {               
            switch( $aTIC["vinieta"] ){
                case "a": $chk_4a = $aTIC["usac_valor"]; break;
                case "b": $chk_4b = $aTIC["usac_valor"]; break;
                case "c": $chk_4c = $aTIC["usac_valor"]; break;
                case "d": $chk_4d = $aTIC["usac_valor"]; break;
                case "e": $chk_4e = $aTIC["usac_valor"]; break;
                case "f": $chk_4f = $aTIC["usac_valor"]; break;
                case "g": $chk_4g = $aTIC["usac_valor"]; break;
            }
        }
        
        if( $aTIC["indent"] == 5 ) {               
            switch( $aTIC["vinieta"] ){
                case "a": $chk_5a = $aTIC["usac_valor"]; break;
                case "b": $chk_5b = $aTIC["usac_valor"]; break;
                case "c": $chk_5c = $aTIC["usac_valor"]; break;
                case "d": $chk_5d = $aTIC["usac_valor"]; break;
                case "e": $chk_5e = $aTIC["usac_valor"]; $txt_5e = $aTIC["usac_description"]; break;                
            }
        }                       
    }     
    
    ?>
    <script type="text/javascript">
    $(document).ready(function (){
      $("#addcertificacion").click( function( event ){                    

        event.preventDefault();        
        var nextrow = formatinteger( $("#maxrow").val() ) + 1;        
        $("#maxrow").val( nextrow );      
        $("#tableaplications > tbody").append('<tr id="row_'+nextrow+'">'       
                            +'<td class="titR" >'
                                +'<select name="tapli_'+nextrow+'" id="tapli_'+nextrow+'" class="" >'
                                    +'<option value="" >Seleccionar</option>'
                                    <?php 
                                    $sql = "SELECT * FROM par_apli WHERE papli_delete<>1" ;
                                    $db->query( $sql );
                                    while( $aDepto = $db->next_record() ) {
                                        ?>
                                        +'<option value="<?php echo $aDepto["papli_uid"] ?>"><?php echo $aDepto["papli_descrip"] ?></option>'
                                        <?php } ?>
                                    +'</select>' 
                                +'</td>'
                                +'<td align="center">'
                                  +'<input name="napli_'+nextrow+'" type="text" id="napli_'+nextrow+'" size="30" value="" class="inpC2" onKeyUp="this.value = this.value.toUpperCase();" /><span id="div_napli_'+nextrow+'" class="bxEr" style="display:none" >requerido</span></td>'
                                  +'<td align="center"><input class="chk"  type="radio" name="oapli_'+nextrow+'" id="oapli_'+nextrow+'" value="1" />Nacional</td>'
                                  +'<td align="center"><input class="chk"  type="radio" name="oapli_'+nextrow+'" id="oaplix_'+nextrow+'" value="2" />Importado</td>'
                                  +'<td align="right"><a href="#" class="lnkCls" id="delcerti_<?php echo $pos; ?>" onclick="delRow('+nextrow+'); return false;" >eliminar</a></td>'
                              +'</tr>');        

hideMsg();
    }); 
  });
    </script>
    <!-- begin body -->
    <div class="content">

        <table class="dInf">

            <thead>
                <tr>
                    <th>M&Oacute;DULO C</th>
                    <th>USO Y ACCESO DE LAS TECNOLOG&Iacute;AS DE LA INFORMACI&Oacute;N Y COMUNICACI&Oacute;N (TIC)</th>
                </tr>
            </thead>   
         <tbody>
            <tr>                        
                <td colspan="2">Los campos marcados con asterisco son obligatorios<span class="color4">*</span>.</td>
            </tr>
        </tbody>
        </table>

        <form class="formA validable" action="ccap1Add.php" method="post" autocomplete="off" >
            <fieldset>
            
            <p>
                <span class="subT">1. La empresa cuenta con<span class="color4">*</span>:&nbsp;&nbsp;&nbsp;</span>
                
                <p>Puede marcar internet e intranet a la vez. En caso de que no cuente con ningún servicio debe necesariamente marcar la opción No cuenta.</p>
                <span class="clear"></span>
                <input class="chk" type="checkbox" name="internet" id="internet" <?php if( $chk_inter == 1 ) { echo "checked=\"checked\""; } ?> />        
                <label class="labChk" >Internet</label>
                <span class="clear"></span>

                <input class="chk" type="checkbox" name="intranet" id="intranet" <?php if( $chk_intra == 1 ) { echo "checked=\"checked\""; } ?> />
                <label class="labChk" >Intranet</label>
                <span class="clear"></span>

                <input class="chk" type="checkbox" name="nocuenta" id="nocuenta" <?php if( $chk_nocuenta == 1 ) { echo "checked=\"checked\""; } ?> />
                <label class="labChk" >No cuenta</label>
                <span class="clear"></span>
            </p>            
              <p>
                <span class="subT">2. &iquest;Cu&aacute;ntas personas utilizan un computador en su rutina de trabajo?:</span>
                <span class="clear"></span>
                <input type="text" name="uso_pc" style="text-align:right;" id="uso_pc" value="<?php echo $txt_usapc; ?>"  maxlength="4" class="numeric inpC" />
            </p>            
            <span id="deinternet" style="<?php if( $chk_inter == 0 ) { echo "display:none"; } ?>">
            <p>
                <span class="subT">2.1. &iquest;Cu&aacute;l es el tipo de conexi&oacute;n a Internet utilizado?<span class="color4">*</span>:</span>
                <p>En caso de haber marcar la opción internet, necesariamente debe especificar el tipo de conexión que su empresa utiliza. Puede marcar más de una opción. </p>
                <span class="clear"></span>

                <input class="chk" type="checkbox" name="coninter_1" id="coninter_1" <?php if( $chk_5a == 1 ) { echo "checked=\"checked\""; } ?>  />
                <label class="labChkB" >a)  Modem empresas telefonicas</label>
                <span class="clear"></span>

                <input class="chk"  type="checkbox" name="coninter_2" id="coninter_2" <?php if( $chk_5b == 1 ) { echo "checked=\"checked\""; } ?>  />
                <label class="labChkB" >b)  Conexi&oacute;n ADSL, RDSI (ISDN)</label>
                <span class="clear"></span>

                <input class="chk"  type="checkbox" name="coninter_3" id="coninter_3" <?php if( $chk_5c == 1 ) { echo "checked=\"checked\""; } ?>  />
                <label class="labChkB" >c)  L&iacute;nea dedicada (Cable/fibra &oacute;ptica)</label>
                <span class="clear"></span>

                <input class="chk" type="checkbox" name="coninter_4" id="coninter_4" <?php if( $chk_5d == 1 ) { echo "checked=\"checked\""; } ?>  />
                <label class="labChkB" >d) Redes inalambricas WiFi, WiMax, etc.</label>
                <span class="clear"></span>

                <input class="chk" type="checkbox" name="coninter_5" id="coninter_5" <?php if( $chk_5e == 1 ) { echo "checked=\"checked\""; } ?>  />
                <label class="labChkB" >e) Otros (especificar)</label>        

                <?php if( $chk_5e == 1 ) { $mostrar2 = "style=\"display:block;\"";  } else { $mostrar2 = "style=\"display:none;\""; }?>
                <input class="inpC" name="coninter_otro" type="text" onKeyUp="this.value = this.value.toUpperCase();" id="coninter_otro" size="60" <?php echo $mostrar2; ?> value="<?php echo $txt_5e; ?>"  />              
            </p>
            </span>
            <span id="msgcon" class="bxEr" style="display:none" >Debe seleccionar un item para el punto 2</span>
            <span id="msgotro" class="bxEr" style="display: none;">Debe introducir el dato para el &iacute;tem seleccionado </span>   
            <span id="pre1" class="bxEr" style="display: none;">requerido </span> 
            <p>
                <span class="subT">3. &iquest;La empresa utiliza internet para el desarrollo de sus actividades comerciales?<span class="color4">*</span>:</span>
                <p>En caso que la empresa no cuente con internet en sus instalaciones, puede utilizar internet a través de un café internet u otro tipo de acceso particular o público.</p>
                <span class="clear"></span>

                <span class="normalTip" title="En caso de marcar la opción SI, debe necesariamente especificar qué actividades realiza por internet."><input class="chk"  type="radio" name="rbtn_usointer" id="rbtn_usointer1" value="1" <?php if( $chk_usainter == 1 ) { echo "checked=\"checked\""; } ?> />
                <label class="labChk" >Si</label></span>
                <span class="clear"></span>

                <input class="chk"  type="radio" name="rbtn_usointer" id="rbtn_usointer2" value="0" <?php if( !checkEmpty($chk_usainter) && $chk_usainter == 0  ) { echo "checked=\"checked\""; $mostrar1 = "style=\"display: none;\"";  } else { $mostrar1 = "style=\"display: block;\""; } ?> />
                <label class="labChk" >No</label>
                <span id="div_rbtn_usointer1" class="bxEr" style="display: none;">requerido </span> 
            </p>
            <span id="opcionesinter" <?php echo $mostrar1;  ?> >
                <span class="subT"></span>
                <p>
                    <span class="subT">3.1. &iquest;Para cu&aacute;l de las siguientes actividades?<span class="color4">*</span>:</span>
                    <span class="clear"></span>

                    <input class="chk" type="checkbox" name="activity_1" id="activity_1" <?php if( $chk_4a == 1 ) { echo "checked=\"checked\""; } ?> />
                    <label class="labChkB" >a)   Realizar operaciones bancarias o acceder a otros servicios financieros</label>
                    <span class="clear"></span>

                    <input class="chk" type="checkbox" name="activity_2" id="activity_2" <?php if( $chk_4b == 1 ) { echo "checked=\"checked\""; } ?> />
                    <label class="labChkB" >b)   Recibir &oacute; realizar pedidos de bienes o servicios</label>
                    <span class="clear"></span>
                    
                    <input class="chk" type="checkbox" name="activity_3" id="activity_3" <?php if( $chk_4c == 1 ) { echo "checked=\"checked\""; } ?> />
                    <label class="labChkB" >c)   Realizar compra/venta de bienes o servicios (niveles transaccionales de comercio electr&oacute;nico)</label>
                    <span class="clear"></span>

                    <input class="chk" type="checkbox" name="activity_4" id="activity_4" <?php if( $chk_4d == 1 ) { echo "checked=\"checked\""; } ?> />
                    <label class="labChkB" >d)   Realizar publicidad de bienes o servicios</label>
                    <span class="clear"></span>

                    <input class="chk" type="checkbox" name="activity_5" id="activity_5" <?php if( $chk_4e == 1 ) { echo "checked=\"checked\""; } ?> />
                    <label class="labChkB" >e)   Proporcionar otros servicios a los clientes</label>
                    <span class="clear"></span>

                    <input class="chk" type="checkbox" name="activity_6" id="activity_6" <?php if( $chk_4f == 1 ) { echo "checked=\"checked\""; } ?> />
                    <label class="labChkB" >f)    Enviar o recibir correo electr&oacute;nico</label>
                    <span class="clear"></span>

                    <input class="chk" type="checkbox" name="activity_7" id="activity_7" <?php if( $chk_4g == 1 ) { echo "checked=\"checked\""; } ?> />
                    <label class="labChkB" >g)   Otras b&uacute;squedas de informaci&oacute;n</label>
                    <span class="clear"></span>    
                </p>
                       <span id="msgacti" class="bxEr" style="display:none" >Debe seleccionar un item para el punto 3</span>
            </span>
            <span class="subT">4. La empresa utiliza alg&uacute;n(os) programa(s) o paquete(s) de software para realizar:</span>
            <table width="100%"  class="fOpt" id="tableaplications" >
              <thead>
                  <tr>
                    <th width="23%">&nbsp;</th>

                    <th width="23%">NOMBRE DEL SOFTWARE (PROGRAMA)</th>
                    <th width="17%" colspan="2" align="center">Origen de software</th>
                    <th width="9%" align="center"></th>
                </tr>
            </thead>
            <tbody>
             <?php 
             $sql3 = "SELECT * FROM frm1_ccap1_2aplicaciones WHERE apli_regi_uid= '".$regisroUID."' and apli_delete<>1 ORDER BY apli_position ASC";
            //echo $sql3;
             $db3->query( $sql3 );
             if( $db3->numrows() > 0 ) {
                while( $aCert2 = $db3->next_record() ) {
                    $pos = $aCert2["apli_position"];
                    ?>
                    <tr id="row_<?php echo $pos; ?>">       
                        <td class="titR" >
                            <select name="tapli_<?php echo $pos; ?>" id="tapli_<?php echo $pos; ?>" class="" >
                                <option value="" >Seleccionar</option>
                                <?php 
                                $sql = "SELECT * FROM par_apli WHERE papli_delete<>1" ;
                                $db->query( $sql );
                                while( $aDepto = $db->next_record() ) {
                                    ?>
                                    <option value="<?php echo $aDepto["papli_uid"] ?>" <?php if($aCert2["apli_valor"] == $aDepto["papli_uid"] ){print("selected=\"selected\"");} ?> ><?php echo $aDepto["papli_descrip"] ?></option>                
                                    <?php } ?>
                                </select> 
                            </td>
                            <td align="center">
                              <input name="napli_<?php echo $pos; ?>" type="text" id="napli_<?php echo $pos; ?>" size="30" value="<?php echo $aCert2["apli_nombre"]; ?>" class="inpC2" onKeyUp="this.value = this.value.toUpperCase();" /><span id="div_napli_<?php echo $pos; ?>" class="bxEr" style="display:none" >requerido</span></td>
                              <td align="center"><input class="chk"  type="radio" name="oapli_<?php echo $pos; ?>" id="oapli_<?php echo $pos; ?>" value="1" <?php if( $aCert2["apli_origen"] == 1 ) { echo "checked=\"checked\""; } ?> />Nacional</td>
                              <td align="center"><input class="chk"  type="radio" name="oapli_<?php echo $pos; ?>" id="oaplix_<?php echo $pos; ?>" value="2" <?php if( $aCert2["apli_origen"] == 2 ) { echo "checked=\"checked\""; } ?> />Importado</td>
                              <td align="right"><a href="#" class="lnkCls" id="delcerti_<?php echo $pos; ?>" onclick="delRow('<?php echo $pos ?>'); return false;" >eliminar</a></td>
                          </tr>   
                          <?php }                            
                      } else { 
                        $pos = 1;
                        ?>
                        <tr id="row_<?php echo $pos; ?>">       
                            <td class="titR" >
                                <select name="tapli_<?php echo $pos; ?>" id="tapli_<?php echo $pos; ?>" class="" >
                                    <option value="" >Seleccionar</option>
                                    <?php 
                                    $sql = "SELECT * FROM par_apli WHERE papli_delete<>1" ;
                                    $db->query( $sql );
                                    while( $aDepto = $db->next_record() ) {
                                        ?>
                                        <option value="<?php echo $aDepto["papli_uid"] ?>"><?php echo $aDepto["papli_descrip"] ?></option>                
                                        <?php } ?>
                                    </select> 
                                </td>
                                <td align="center">
                                  <input name="napli_<?php echo $pos; ?>" type="text" id="napli_<?php echo $pos; ?>" size="30" value="" class="inpC2" onKeyUp="this.value = this.value.toUpperCase();" /><span id="div_napli_<?php echo $pos; ?>" class="bxEr" style="display:none" >requerido</span></td>
                                  <td align="center"><input class="chk"  type="radio" name="oapli_<?php echo $pos; ?>" id="oapli_<?php echo $pos; ?>" value="1" />Nacional</td>
                                  <td align="center"><input class="chk"  type="radio" name="oapli_<?php echo $pos; ?>" id="oaplix_<?php echo $pos; ?>" value="2" />Importado</td>
                                  <td align="right"></td>
                              </tr>   
                              <?php } ?>
                          </tbody>
                      </table> 
             <span id="apps_msg" class="bxEr" style="display: none;" >campo requerido</span>

                      <input type="hidden" name="maxrow" id="maxrow" value="<?php echo $pos; ?>" />
                      <a href="#" id="addcertificacion" class="btnAdd"  >Agregar campos</a>

                      <span id="msg3" class="bxEr" style="display: none;" >Debe registrar el valor para el dato introducido</span>
                      <span id="msg6" class="bxEr" style="display: none;" >Debe registrar el detalle para el valor introducido</span>

<!--
<p>NOMBRE Y FIRMA DEL REPRESENTANTE LEGAL DE LA EMPRESA </p>
<p>Nombre Representante Legal</p>
<p>
  <label for="representante"></label>
  <input name="representante" type="text" id="representante" size="60" />
</p>
<p>FUNDEMPRESA</p>
<p>Nombre Verificador FUNDEMPRESA</p>
<p>
  <input name="verificador" type="text" id="verificador" size="60" />
</p>
-->                              
<span class="bxBt">
    <input type="submit" value="SIGUIENTE" id="sendData" name="continuarregistro" class="button" >
    <a href="bcap3.php" class="btnS">ANTERIOR</a>                
</span>

</fieldset>
</form>
<div class="clear"></div>      

</div>
<!-- end body -->        

<?php include("footer.php") ?>
