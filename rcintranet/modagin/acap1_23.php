<?php session_start(); ?>
<?php
//----------------------------------------------------------------
//--modificado por wilfredo mendoza - MDPYEP/VPIMGE - ABRIL 2015 -
//   agroindustria
//----------------------------------------------------------------
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
// && OPERATOR::getDbValue("SELECT usr_count FROM sys_users WHERE usr_delete and usr_uid=".$_SESSION[SITE]["usr_uid"]) == 0
if ($_POST['gestion'] && OPERATOR::getDbValue("SELECT regi_gest_uid FROM sys_registros WHERE regi_uid=".$_SESSION[SITE]["registro_uid"])==0 ) {
    $befuid = OPERATOR::getDbValue("select regi_uid from sys_registros where regi_gest_uid!=0 and regi_user_uid='".$_SESSION[SITE]["usr_uid"]."' ORDER BY regi_uid DESC LIMIT 1 ");
    $sql = "UPDATE sys_registros SET regi_gest_uid=".$_POST['gestion']." WHERE regi_uid=".$_SESSION[SITE]["registro_uid"];
    $db -> query($sql);
    $sqli = "UPDATE sys_users SET usr_sw_ref='0' WHERE usr_uid=".$_SESSION[SITE]["usr_uid"];
    $db -> query($sqli);
    $_SESSION[SITE]["registro_gesti_uid"]=$_POST['gestion'];
    if (OPERATOR::getDbValue("SELECT count(*) FROM sys_registros WHERE regi_user_uid=".$_SESSION[SITE]["usr_uid"]) > 1) {
        $sqle="INSERT INTO cap1_informacion_general(inge_regi_uid, inge_formulario, inge_ciiu, inge_razonsocial, inge_tiso_uid, inge_nombrecomercial, inge_nit, inge_matriculadecomercio, inge_depa_uid, inge_provi_uid, inge_muni_uid, inge_ciudad, inge_type_via, inge_zona, inge_calle, inge_numcalle, inge_referenciacalle, inge_telefono, inge_telefono2, inge_celular, inge_celular2, inge_fax, inge_pagweb, inge_email, inge_afiliacion_camara, inge_afiliacion_federacion, inge_afiliacion_asociacion, inge_afiliacion_otros, inge_afilia_ninguno, inge_actividad_principal, inge_actividad_secundaria1, inge_actividad_secundaria2, inge_datecreate, inge_dateupdate, inge_delete, inge_suv_uid, inge_rai, inge_afiliacion_sindicato) SELECT ".$_SESSION[SITE]["registro_uid"].", inge_formulario, inge_ciiu, inge_razonsocial, inge_tiso_uid, inge_nombrecomercial, inge_nit, inge_matriculadecomercio, inge_depa_uid, inge_provi_uid, inge_muni_uid, inge_ciudad, inge_type_via, inge_zona, inge_calle, inge_numcalle, inge_referenciacalle, inge_telefono, inge_telefono2, inge_celular, inge_celular2, inge_fax, inge_pagweb, inge_email, inge_afiliacion_camara, inge_afiliacion_federacion, inge_afiliacion_asociacion, inge_afiliacion_otros, inge_afilia_ninguno, inge_actividad_principal, inge_actividad_secundaria1, inge_actividad_secundaria2, inge_datecreate, inge_dateupdate, inge_delete, inge_suv_uid, inge_rai, inge_afiliacion_sindicato FROM cap1_informacion_general WHERE inge_regi_uid=".$befuid;
        $db3->query($sqle);
        $sqlo="INSERT INTO cap2_personalsueldos(pesu_regi_uid, pesu_defi_uid, pesu_numero_hombres, pesu_numero_mujeres, pesu_sueldos_salarios, pesu_suv_uid, pesu_date_create, pesu_date_update) SELECT ".$_SESSION[SITE]["registro_uid"].", pesu_defi_uid, pesu_numero_hombres, pesu_numero_mujeres, pesu_sueldos_salarios, pesu_suv_uid, pesu_date_create, pesu_date_update FROM cap2_personalsueldos WHERE pesu_regi_uid=".$befuid;
        $db->query($sqlo);
        $sqlr="INSERT INTO cap2_presta_sociales(prso_regi_uid, prso_defi_uid, prso_valor, prso_descripcion, prso_suv_uid, prso_date_create, prso_date_update) SELECT ".$_SESSION[SITE]["registro_uid"].", prso_defi_uid, prso_valor, prso_descripcion, prso_suv_uid, prso_date_create, prso_date_update FROM cap2_presta_sociales WHERE prso_regi_uid=".$befuid;
        $db->query($sqlr);
        $sqlt="INSERT INTO cap3_suministros(sumi_regi_uid, sumi_defi_uid, sumi_valor, sumi_categoriatarifaria, sumi_suv_uid, sumi_createdate, sumi_createupdate) SELECT ".$_SESSION[SITE]["registro_uid"].", sumi_defi_uid, sumi_valor, sumi_categoriatarifaria, sumi_suv_uid, sumi_createdate, sumi_createupdate FROM cap3_suministros WHERE sumi_regi_uid=".$befuid;
        $db->query($sqlt);
        $sqln="INSERT INTO frm1_bcap1_certificados(cert_regi_uid, cert_descrip, cert_position, cert_delete) SELECT ".$_SESSION[SITE]["registro_uid"].", cert_descrip, cert_position, cert_delete FROM frm1_bcap1_certificados WHERE cert_regi_uid=".$befuid;
        $db->query($sqln);
        $sqlb="INSERT INTO frm1_bcap1_gestionambiental(geam_regi_uid, geam_defi_uid, geam_valor, geam_description, geam_suv_uid, geam_createdate, geam_updatedate) SELECT ".$_SESSION[SITE]["registro_uid"].", geam_defi_uid, geam_valor, geam_description, geam_suv_uid, geam_createdate, geam_updatedate FROM frm1_bcap1_gestionambiental WHERE geam_regi_uid=".$befuid;
        $db->query($sqlb);
        $sqlw="INSERT INTO frm1_bcap2_2certificados(cert_regi_uid, cert_certificacion, cert_ultimoanioobtencion, cert_organismocertificacion, certi_position, cert_delete) SELECT ".$_SESSION[SITE]["registro_uid"].", cert_certificacion, cert_ultimoanioobtencion, cert_organismocertificacion, certi_position, cert_delete FROM frm1_bcap2_2certificados WHERE cert_regi_uid=".$befuid;
        $db->query($sqlw);
        $sqli="INSERT INTO frm1_bcap2_gestioncertificados(gece_regi_uid, gece_defi_uid, gece_valor, gece_description, gece_suv_uid, gece_createdate, gece_updatedate) SELECT ".$_SESSION[SITE]["registro_uid"].", gece_defi_uid, gece_valor, gece_description, gece_suv_uid, gece_createdate, gece_updatedate FROM frm1_bcap2_gestioncertificados WHERE gece_regi_uid=".$befuid;
        $db->query($sqli);
        $sqlv="INSERT INTO frm1_bcap3_responsabilidadsocial(gece_regi_uid, gece_defi_uid, gece_valor, gece_monto, gece_suv_uid, gece_createdate, gece_updatedate) SELECT ".$_SESSION[SITE]["registro_uid"].", gece_defi_uid, gece_valor, gece_monto, gece_suv_uid, gece_createdate, gece_updatedate FROM frm1_bcap3_responsabilidadsocial WHERE gece_regi_uid=".$befuid;
        $db->query($sqlv);
        $sqlz="INSERT INTO frm1_cap4_inventariomateriales(inma_regi_uid, inma_defi_uid, inma_inventario_inicial, inma_inventario_final, inma_total_compras, inma_suv_uid, inma_createdate, inma_updatedate) SELECT ".$_SESSION[SITE]["registro_uid"].", inma_defi_uid, inma_inventario_inicial, inma_inventario_final, inma_total_compras, inma_suv_uid, inma_createdate, inma_updatedate FROM frm1_cap4_inventariomateriales WHERE inma_regi_uid=".$befuid;
        $db->query($sqlz);
        $sqdl="INSERT INTO frm1_cap5_otrosgastosoperativos(otga_regi_uid, otga_defi_uid, otga_valor, otga_suv_uid, otga_createdate, otga_updatedate) SELECT ".$_SESSION[SITE]["registro_uid"].", otga_defi_uid, otga_valor, otga_suv_uid, otga_createdate, otga_updatedate FROM frm1_cap5_otrosgastosoperativos WHERE otga_regi_uid=".$befuid;
        $db->query($sqdl);
        $sqlri="INSERT INTO frm1_cap6_comprareventa(core_regi_uid, core_defi_uid, core_valor, core_suv_uid, core_createdate, core_updatedate) SELECT ".$_SESSION[SITE]["registro_uid"].", core_defi_uid, core_valor, core_suv_uid, core_createdate, core_updatedate FROM frm1_cap6_comprareventa WHERE core_regi_uid=".$befuid;
        $db->query($sqlri);
        $recsql="INSERT INTO frm1_cap7_ventaservicios(vese_regi_uid, vese_defi_uid, vese_valor, vese_suv_uid, vese_createdate, vese_updatedate) SELECT ".$_SESSION[SITE]["registro_uid"].", vese_defi_uid, vese_valor, vese_suv_uid, vese_createdate, vese_updatedate FROM frm1_cap7_ventaservicios WHERE vese_regi_uid=".$befuid;
        $db->query($recsql);
        $casqo="INSERT INTO frm1_cap8_resultadosgestion(rege_regi_uid, rege_defi_uid, rege_valor, rege_suv_uid, rege_createdate, rege_updatedate) SELECT ".$_SESSION[SITE]["registro_uid"].", rege_defi_uid, rege_valor, rege_suv_uid, rege_createdate, rege_updatedate FROM frm1_cap8_resultadosgestion WHERE rege_regi_uid=".$befuid;
        $db->query($casqo);
        $twre="INSERT INTO frm1_cap9_formacionactivosfijos(foaf_regi_uid, foaf_defi_uid, foaf_valor, foaf_description, foaf_suv_uid, foaf_createdate, foaf_updatedate) SELECT ".$_SESSION[SITE]["registro_uid"].", foaf_defi_uid, foaf_valor, foaf_description, foaf_suv_uid, foaf_createdate, foaf_updatedate FROM frm1_cap9_formacionactivosfijos WHERE foaf_regi_uid=".$befuid;
        $db->query($twre);
        $aql2="INSERT INTO frm1_cap10_capitalpatrimonio(capa_regi_uid, capa_defi_uid, capa_valor, capa_suv_uid, capa_createdate, capa_updatedate) SELECT ".$_SESSION[SITE]["registro_uid"].", capa_defi_uid, capa_valor, capa_suv_uid, capa_createdate, capa_updatedate FROM frm1_cap10_capitalpatrimonio WHERE capa_regi_uid=".$befuid;
        $db->query($aql2);
        $sqdwe="INSERT INTO frm1_ccap1_2aplicaciones(apli_regi_uid, apli_valor, apli_nombre, apli_origen, apli_position, apli_suv_uid, apli_createdate, apli_updatedate) SELECT ".$_SESSION[SITE]["registro_uid"].", apli_valor, apli_nombre, apli_origen, apli_position, apli_suv_uid, apli_createdate, apli_updatedate FROM frm1_ccap1_2aplicaciones WHERE apli_regi_uid=".$befuid;
        $db->query($sqdwe);
        $swdic="INSERT INTO frm1_ccap1_usoaccesotic(usac_regi_uid, usac_defi_uid, usac_valor, usac_description, usac_suv_uid, usac_createdate, usac_updatedate) SELECT ".$_SESSION[SITE]["registro_uid"].", usac_defi_uid, usac_valor, usac_description, usac_suv_uid, usac_createdate, usac_updatedate FROM frm1_ccap1_usoaccesotic WHERE usac_regi_uid=".$befuid;
        $db->query($swdic);
    }
}
?>
<?php include_once('../verifyLogin.php'); ?>
<?php include("header.php") ?>
<script type="text/javascript" src="js/acap1.js"></script>
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
$sql = "SELECT * FROM cap1_informacion_general WHERE inge_regi_uid = '".$regisroUID."' AND inge_formulario = '".$uidFormulario."' AND inge_delete <> 1 ";
$db->query( $sql );
$aInfoGen = $db->next_record();
?>
<?php include("../menu.php"); ?>
<!-- begin body -->
<div class="content">           
<span id="statusACAP1"></span>
    <table class="dInf">        
         <thead>
            <tr>
                <th>MODULO A</th>
                <th>INFORMACI&Oacute;N GENERAL Y FINANCIERA</th>
            </tr>
            <tr>
                <th>CAP&Iacute;TULO 111111</th>
                <th>IDENTIFICACI&Oacute;N Y UBICACI&Oacute;N DE LA EMPRESA</th>
            </tr>
        </thead>
        <tbody>
            <tr>                        
                <td colspan="2">Verifique que la siguiente información contenida en los campos de 1 a 6 sea correcta. En caso contrario, realice las modificaciones correspondientes.<br>
                Los campos marcados con asterisco son obligatorios<span class="color4">*</span>.</td>
            </tr>
        </tbody>        
    </table>
    <form class="formA validable" action="acap1Add.php" method="post" autocomplete="off" >
        <fieldset>
            <p>
              <span class="subT">1. Raz&oacute;n social:</span>
              <span class="clear"></span>            
              <input type="text" name="ai_rs" id="ai_rs" onblur="javascript:saveUPD(1); return false;" value="<?php echo $aInfoGen["inge_razonsocial"] ?>"  size="40" class="inpC alphanum required">
              <span id="div_ai_rs" class="bxEr" style="display:none" >requerido</span>
              <span id="div_ai_rs_2" class="bxEr" style="display:none" >inválido</span>
              <span id="msg_ai_rs"><?php echo OPERATOR::getDescTitles(3,'A',1,1); ?></span>
            </p>
                       
            <p>
                <span class="subT">2. Tipo Societario:</span>
                <span class="clear"></span>                            
                    <?php
                    $sql = "SELECT tiso_uid, tiso_description FROM par_tipos_societarios WHERE tiso_sw_active = 'ACTIVE' AND tiso_delete = 0 ORDER BY tiso_description ASC";
                    $db->query($sql);
                    while ($aSocietario = $db->next_record()) {
                        ?>                
                        <?php if ($aInfoGen["inge_tiso_uid"] == $aSocietario["tiso_uid"]) {?>
                          <input type="text" name="ai_societario" id="ai_tiso"  disabled="disabled" onblur="javascript:saveUPD(5); return false;" value="<?php echo $aSocietario["tiso_description"] ?>" size="40" class="inpC alphanum"   >                          
                        <?php    
                        }  } ?>
                          
                    <span id="div_ai_societario" class="bxEr" style="display:none" >requerido</span>              
            </p>

            <p>
                <span class="subT">3. Nombre Comercial:</span>
                <span class="clear"></span>               
                <input type="text" name="ai_tradename"  disabled="disabled"  id="ai_tradename" value="<?php echo $aInfoGen["inge_nombrecomercial"] ?>" size="40" class="inpC alphanum">
                <span id="msg_ai_tradename"><?php echo OPERATOR::getDescTitles(1,'A',1,3); ?></span>
            </p>
            
             <p>
                <span class="subT">CIIU:</span>
                <span class="clear"></span>             
                <input type="text" disabled="disabled" name="ai_ciiu" id="ai_ciiu"  value="<?php echo $aInfoGen["inge_ciiu"] ?>"  size="40" class="inpC alphanum">
                <span id="div_ai_ciiu" class="bxEr" style="display:none" >requerido</span>
            </p>
            <p>
                <span class="subT">Clasificación según CIIU:</span>
                <!-- incorporado --->
                <span class="clear"></span>             
                <input type="text" disabled="disabled" name="ai_clase_ciiu" id="ai_clase_ciiu" value="<?php echo $aInfoGen["inge_seccion_ciiu"] ?>"  size="70" class="inpC alphanum">
                <span id="div_ai_ciiu" class="bxEr" style="display:none" >requerido</span>
            </p>

            <p>
                <span class="subT">4. NIT:</span>
                <span class="clear"></span>                
                <input type="text" name="ai_nit" onblur="javascript:saveUPD(2); return false;" id="ai_nit" value="<?php echo $aInfoGen["inge_nit"] ?>" size="40" class="inpC required integer" maxlength="12">
                <span id="div_ai_nit" class="bxEr" style="display:none" >requerido</span>
                <span id="div_ai_nit_2" class="bxEr" style="display:none" >inválido</span>
                <span>(Verifique que su NIT sea el correcto)</span>
            </p>           
            <p>
                <span class="subT">5. N&uacute;mero de Matr&iacute;cula de Comercio:</span>
                <span class="clear"></span>                
                <input type="text" disabled="disabled" name="ai_traderegis" onblur="javascript:saveUPD(2); return false;" id="ai_traderegis" value="<?php echo $aInfoGen["inge_matriculadecomercio"] ?>" size="40" class="inpC required integer" maxlength="8" >
                <span id="div_ai_traderegis" class="bxEr" style="display:none" >requerido</span>
                <span id="div_ai_traderegis_2" class="bxEr" style="display:none" >inválido</span>
            </p>              
            
            <p>
                <span class="subT">6. RAI - Registro Ambiental Industrial:</span>
                <span class="clear"></span>                
                <input type="text" name="ai_rai" id="ai_rai" value="<?php echo $aInfoGen["inge_rai"] ?>" size="40" class="inpC required" maxlength="50" >
                <span id="div_ai_rai" class="bxEr" style="display:none" >requerido</span>                
            </p>

         <p>
                <span class="subT">7. Localizaci&oacute;n y Direcci&oacute;n de la Empresa:</span>
                <span class="clear"></span> 
            </p>
            <p>
                <span class="subT">Departamento:</span>
                <span class="clear"></span>
                <select name="ai_depto" id="ai_depto" onblur="javascript:saveUPD(2); return false;" onchange="showProvin();"  class="required" >
                 <option value="" >Seleccionar</option>
                 <?php 
                 $sql = "SELECT dept_uid, dept_description FROM  par_departamentos WHERE delete_status = 'ACTIVE' AND dept_delete = 0 ORDER BY dept_description ASC" ;
                 $db->query( $sql );
                 while( $aDepto = $db->next_record() ) {
                    ?>
                    <option value="<?php echo $aDepto["dept_uid"] ?>" <?php if($aInfoGen["inge_depa_uid"] == $aDepto["dept_uid"] ){print("selected=\"selected\"");} ?> ><?php echo $aDepto["dept_description"] ?></option>                
                    <?php } ?>
                </select>
                <span id="div_ai_depto" class="bxEr" style="display:none" >requerido</span>
            </p>
            <p>
                <span class="subT">Provincia:</span>
                <span class="clear"></span>                 
                <span id="areaprovincia" >
                  <?php
                  $sqli = "SELECT * FROM par_provincias WHERE prov_dept_uid= '".$aInfoGen["inge_depa_uid"]."' and prov_delete<>1 and prov_swactive='ACTIVE' ";
                  $db->query( $sqli );
// echo $sql;
                  $sSelect = "<select name=\"ai_provin\" id=\"ai_provin\" class=\"\" onchange=\"showMunicipios();\"  ><option value=\"\" >Seleccionar</option>";                      
                  while( $aMunicipios = $db->next_record() ) {
                    $retVal = ($aInfoGen["inge_provi_uid"] == $aMunicipios["prov_uid"] ) ? 'selected="selected"' : '' ;
                    $sSelect = $sSelect."<option value=\"".utf8_encode($aMunicipios["prov_uid"])."\" ".$retVal." >".$aMunicipios["prov_description"]."</option>";
                }
                $sSelect = $sSelect."</select>";
                echo $sSelect;
                ?>
                </span>
            <span id="div_ai_provin" class="bxEr" style="display:none" >requerido</span>
            </p>       
            <p>
                <span class="subT">Municipio:</span>
                <span class="clear"></span>                 
                <span id="areamunicipio" >
                    <?php 
                    $sql = "SELECT * FROM  par_municipios  WHERE  muni_prov_uid = '".$aInfoGen["inge_provi_uid"]."' and  muni_swactive ='ACTIVE' and muni_delete <> 1";
                    $db->query( $sql );
                    $sSelect = "<select name=\"ai_municipio\" id=\"ai_municipio\" class=\"\"  ><option value=\"\">Seleccionar</option>";
                    while( $aMunicipios = $db->next_record() ) {
                      $retVal = ($aInfoGen["inge_muni_uid"] == $aMunicipios["muni_uid"] ) ? 'selected="selected"' : '' ;
                      $sSelect = $sSelect."<option value=\"".utf8_encode($aMunicipios["muni_uid"])."\" ".$retVal." >".$aMunicipios["muni_description"]."</option>";
                  }
                  $sSelect = $sSelect."</select>";
                  echo $sSelect;
                  ?>
              </span>
              <span id="div_ai_municipio" class="bxEr" style="display:none" >requerido</span>
          </p>
          <p>
            <span class="subT">Ciudad:<span class="color4">*</span>:</span>
            <span class="clear"></span>                
            <input type="text" name="ai_city" id="ai_city" onblur="javascript:saveUPD(2); return false;" value="<?php echo $aInfoGen["inge_ciudad"] ?>" size="40" class="inpC required alphanum" >
            <span id="div_ai_city" class="bxEr" style="display:none" >requerido</span>
            <span id="div_ai_city_2" class="bxEr" style="display:none" >inválido</span>
        </p>
        <p>
            <span class="subT">Direcci&oacute;n</span>
            <span class="clear"></span> 
        </p>
        <table class="fOpt">
            <thead>
                <tr>
                    <th>Tipo de v&iacute;a:</th>
                    <th>Nombre<span class="color4">*</span>:</th>
                    <th>N&uacute;mero<span class="color4">*</span>:</th>
                    <th>Zona/Barrio<span class="color4">*</span>:</th>
                </tr>
            </thead>
            <tbody> 
              <tr>                        
                  <td><?php 
                  $sql = "SELECT * FROM par_via WHERE pavi_delete<>1";
                  $db->query( $sql );
                  //echo $sql;`pavi_descrip``pavi_uid
                  $sSelect = "<select name=\"ai_via\" id=\"ai_via\" class=\"required normalTip\" title=\"Seleccione un tipo de vía de la lista desplegable.\"  />";
                  while( $aMunicipios = $db->next_record()) {
                      $retVal = ($aInfoGen["inge_type_via"] == $aMunicipios["pavi_uid"] ) ? 'selected="selected"' : '' ;
                      $sSelect = $sSelect."<option value=\"".utf8_encode($aMunicipios["pavi_uid"])."\" ".$retVal." >".$aMunicipios["pavi_descrip"]."</option>";
                  }
                  $sSelect = $sSelect."</select>";
                  echo $sSelect;
                  ?></td>
                  <td>  
                      <input type="text" name="ai_address" onblur="javascript:saveUPD(3); return false;" value="<?php echo $aInfoGen["inge_calle"] ?>" size="40" class="inpC required alphanum normalTip" title="Registre el nombre de la calle, avenida, pasaje, etc. de ubicación de su empresa. En caso que se encuentre en carretera o camino, señale el nombre de la carretera o camino y el kilómetro de ubicación. Por ejemplo: carretera a Cotoca, km 8." id="ai_address">
                      <span id="div_ai_address" class="bxEr" style="display:none" >requerido</span>
                      <span id="div_ai_address_2" class="bxEr" style="display:none" >inválido</span>
                  </td>
                  <td>
                      <input type="text" name="ai_numerocalle" id="ai_numerocalle" onblur="javascript:saveUPD(3); return false;" value="<?php echo $aInfoGen["inge_numcalle"] ?>" size="40" class="inpC required alphanum normalTip" title="Registre el número de dirección de su empresa. En caso que no tenga número anote SN. "  />
                      <span id="div_ai_numerocalle" class="bxEr" style="display:none" >requerido</span>
                      <span id="div_ai_numerocalle_2" class="bxEr" style="display:none" >inválido</span>
                  </td>
                  <td>
                    <input type="text" name="ai_zona" id="ai_zona" onblur="javascript:saveUPD(3); return false;" value="<?php echo $aInfoGen["inge_zona"] ?>" size="40" class="inpC required alphanum normalTip" title="Registre el nombre de la zona o barrio de ubicación de su empresa." />
                    <span id="div_ai_zona" class="bxEr" style="display:none" >requerido</span>
                    <span id="div_ai_zona_2" class="bxEr" style="display:none" >inválido</span>
                </td>
            </tr>
        </tbody>
    </table>
    <p>
        <span class="subT">Referencia (Entre qué calles):</span>
        <span class="clear"></span>               
        <textarea name="ai_reference" cols="60" rows="3" style="height:80px;" onblur="javascript:saveUPD(3); return false;" class="inpC normalTip" title="Registre algún tipo de referencia que facilite la ubicación de su empresa. Por ejemplo: esquina calle Sucre;  entre calles 1 y 2; frente al monumento a Sim&oacute;n Bol&iacute;var; detrás del surtidor de gasolina." id="ai_reference"><?php echo $aInfoGen["inge_referenciacalle"] ?></textarea>
        <span id="div_ai_reference" class="bxEr" style="display:none" >requerido</span>
        <span id="div_ai_reference_2" class="bxEr" style="display:none" >inválido</span>
    </p>   
            
     
            
            <!-------------------------------------------------------------------------------------->
            
            <p>
                <span class="subT">8. Tel&eacute;fono:</span>
                <span class="clear"></span>                  
                <input type="text" name="ai_phone1" id="ai_phone1" value="<?php echo $aInfoGen["inge_telefono"] ?>" size="40" class="inpC integer">
                <span id="div_ai_phone1" class="bxEr" style="display:none" >requerido</span>
                <span id="div_ai_phone1_2" class="bxEr" style="display:none" >inválido</span>
                 <span>Debe registrar al menos un número de teléfono fijo o celular.</span> 
            </p>

            <p>
                <span class="subT">9. Celular (Representante legal o prop.):</span>
                <span class="clear"></span>                 
                <input type="text" name="ai_phone2" id="ai_phone2" value="<?php echo $aInfoGen["inge_celular"] ?>" size="40" class="inpC integer">
                <span id="div_ai_phone2" class="bxEr" style="display:none" >requerido</span>
                <span id="div_ai_phone2_2" class="bxEr" style="display:none" >inválido</span>
            </p>
            
            <p>
                <span class="subT">10. Fax:</span>
                <span class="clear"></span>                  
                <input type="text" name="ai_fax" id="ai_fax" value="<?php echo $aInfoGen["inge_fax"] ?>" size="40" class="inpC integer">
                <span id="div_ai_fax" class="bxEr" style="display:none" >requerido</span>
                <span id="div_ai_fax_2" class="bxEr" style="display:none" >inválido</span>
            </p>
            
            <p>
                <span class="subT">11. P&aacute;gina Web:</span>
                <span class="clear"></span>                  
                <input type="text" name="ai_pagweb" id="ai_pagweb" value="<?php echo $aInfoGen["inge_pagweb"] ?>" size="40" class="inpC alphanum">
                <span id="div_ai_pagweb" class="bxEr" style="display:none" >requerido</span>
                <span id="div_ai_pagweb_2" class="bxEr" style="display:none" >inválido</span>
            </p>
            
            <p>
        <span class="subT">12. Correo electr&oacute;nico<span class="color4">*</span>:</span>
        <span class="clear"></span>                 
        <input type="text" name="ai_email" id="ai_email" onblur="javascript:saveUPD(4); return false;" value="<?php echo $aInfoGen["inge_email"] ?>" size="40" class="inpC email">
        <span>Debe registrar el correo electrónico que utiliza la empresa con fines comerciales</span>
        <span id="div_ai_email" class="bxEr" style="display:none" >requerido</span>
        <span id="div_ai_email_2" class="bxEr" style="display:none" >inválido</span>
    </p>
            
            
            <!-- add -->
            <span class="subT">13. Direcciones de las Plantas, Granjas o F&aacute;bricas (se refiere a las plantas productivas que se sit&aacute;an en direcciones diferentes a la ubicaci&oacute;n de la oficina central):</span>
            <table width="100%" border="0" id="tablecertificacion" class="fOpt">
            <thead>
              <tr>
              <th width="50%" align="center">Direcci&oacute;n</th>
              <th width="40%" align="center">Municipio</th>              
              <th width="10%" align="center">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $posmax = OPERATOR::getDbValue("SELECT MAX(plan_position) + 1 as pos FROM frm1_plantas WHERE plan_regi_uid = '".$regisroUID."' AND plan_position <> 0");
            if( empty($posmax) ) { $posmax = 1; }
                
            $sql3 = "SELECT * FROM frm1_plantas WHERE plan_regi_uid = '".$regisroUID."' AND plan_delete = 0 ORDER BY plan_position ASC  ";
            //echo $sql3;
            $db3->query( $sql3 );
            if( $db3->numrows() > 0 ) {
            while( $aCert2 = $db3->next_record() ) {
                $pos = $aCert2["plan_position"];
            ?>
            <tr id="row_<?php echo $pos; ?>" >
              <td align="center"><input name="inputA_<?php echo $pos ?>" type="text" id="inputA_<?php echo $pos ?>" size="50" value="<?php echo $aCert2["plan_direccion"] ?>" class="inpC2" /></td>
              <td align="center"><input name="inputB_<?php echo $pos ?>" type="text" id="inputB_<?php echo $pos ?>" size="40" value="<?php echo $aCert2["plan_municipio"] ?>" onblur="saveUPD(6);" class="inpC2" /></td>              
              <td align="center"><a href="#" class="lnkCls" id="delplan_<?php echo $aCert2["plan_position"] ?>" onclick="delRow('<?php echo $pos ?>'); return false;" >eliminar</a></td>
            </tr>            
            <?php }                            
            } else {                
            ?>
            <tr id="row_<?php echo $posmax; ?>" >
              <td align="center"><input name="inputA_<?php echo $posmax; ?>" type="text" id="inputA_<?php echo $posmax; ?>" size="50" class="inpC2"  /></td>
              <td align="center"><input name="inputB_<?php echo $posmax; ?>" type="text" id="inputB_<?php echo $posmax; ?>" size="40" class="inpC2" onblur="saveUPD(6);"  /></td>              
              <td align="center">&nbsp;</td>
            </tr>    
            <?php 
            $posmax = $posmax + 1;
            } ?>

            </tbody>            

            </table>
            <input type="hidden" name="maxrow" id="maxrow" value="<?php echo $posmax; ?>" />
            <a href="#" id="addcertificacion" class="btnAdd"  >Agregar campos</a>
            <!-- end add -->
            
            <p>
                <span class="subT">14. Afiliaci&oacute;n de la empresa:</span>
                <span class="clear"></span>   
                <input type="checkbox" class="chk" name="afil_1" id="afil_1"  onclick="showAfilCamara();" <?php $show1 = "style=\"display: none\""; if( !empty($aInfoGen["inge_afiliacion_camara"] ) ) { print("checked=\"checked\""); $show1 = "style=\"display: block\"";  } ?> />
                <label class="labChk">a) C&aacute;mara</label>
                <input type="text" class="inpC" size="40"  name="afil_camara" id="afil_camara"  value="<?php echo $aInfoGen["inge_afiliacion_camara"] ?>"  <?php echo $show1;  ?>   />
                <span class="clear"></span>
                <input type="checkbox" class="chk" name="afil_2" id="afil_2"  onclick="showAfilFederacion();" <?php $show2 = "style=\"display: none\"";  if( !empty($aInfoGen["inge_afiliacion_federacion"] ) ) { print("checked=\"checked\""); $show2 = "style=\"display: block\""; } ?> />
                <label class="labChk">b) Federaci&oacute;n</label>
                <input type="text" class="inpC" size="40" name="afil_federacion" id="afil_federacion"  value="<?php echo $aInfoGen["inge_afiliacion_federacion"] ?>"  <?php echo $show2;  ?>  />
                <span class="clear"></span>
                <input type="checkbox" class="chk" name="afil_3" id="afil_3"  onclick="showAfilAsociacion();" <?php $show2 = "style=\"display: none\"";  if( !empty($aInfoGen["inge_afiliacion_asociacion"] ) ) { print("checked=\"checked\""); $show2 = "style=\"display: block\""; } ?> />
                <label class="labChk">c) Asociaci&oacute;n</label>
                <input type="text" class="inpC" size="40" name="afil_asociacion"  id="afil_asociacion" value="<?php echo $aInfoGen["inge_afiliacion_asociacion"] ?>"  <?php echo $show2;  ?>  />
                <span class="clear"></span>
                <input type="checkbox" class="chk" name="afil_6" id="afil_6" onclick="showSindicato();" <?php $show4 = "style=\"display: none\""; if( !empty($aInfoGen["inge_afiliacion_sindicato"] ) ) { print("checked=\"checked\""); $show4 = "style=\"display: block\""; }  ?> />
                <label class="labChk">d) Sindicato</label>
                <input type="text" class="inpC" size="40" name="afil_sindicato" id="afil_sindicato" value="<?php echo $aInfoGen["inge_afiliacion_sindicato"] ?>" <?php echo $show4;  ?>  >
                <span class="clear"></span>                
                <input type="checkbox" class="chk" name="afil_4" id="afil_4" onclick="showAfilOtros();" <?php $show3 = "style=\"display: none\""; if( !empty($aInfoGen["inge_afiliacion_otros"] ) ) { print("checked=\"checked\""); $show3 = "style=\"display: block\""; }  ?> />
                <label class="labChk">e) Otros</label>
                <input type="text" class="inpC" size="40" name="afil_otros" id="afil_otros"  value="<?php echo $aInfoGen["inge_afiliacion_otros"] ?>"  <?php echo $show3;  ?>  >
                <span class="clear"></span>
                <input type="checkbox" class="chk" name="afil_5" id="afil_5" onclick="showAfilNinguno();" <?php if( !empty($aInfoGen["inge_afilia_ninguno"] ) ) { print("checked=\"checked\""); } ?> />
                <label class="labChk">f) Ninguno</label>
                <span style="display:none;" class="bxEr" id="div_ai_afil1" >Debe selecionar un &iacute;tem</span>
                 <span id="div_ai_afil1" class="bxEr" style="display:none" >requerido</span>
                <span id="div_ai_afil_2" class="bxEr" style="display:none" >inválido</span>                
            </p>                    

            <p>
                <span class="subT">15. Actividad Principal y Secundaria de la empresa (especificar):</span>
                <span class="clear"></span>              
            </p>
            <p>
            <span id="msg_actividades"><?php echo OPERATOR::getDescTitles(3,'A',1,13); ?></span>
            </p>
                              
            <p>
                <span class="subT">a) Actividad Principal:</span>
                <span class="clear"></span>               
                <input type="text" name="ai_actprin" onblur="javascript:saveUPD(1); return false;" id="ai_actprin" value="<?php echo $aInfoGen["inge_actividad_principal"] ?>" size="40" class="inpC alphanum required">
                <span id="div_ai_actprin" class="bxEr" style="display:none" >requerido</span>
                <span id="div_ai_actprin_2" class="bxEr" style="display:none" >inválido</span>
            </p>
            
            <p>
        <span class="subT">b) Actividad Secundaria 1:</span>
        <span class="clear"></span>                  
        <input type="text" name="ai_actsec1" id="ai_actsec1" onblur="javascript:saveUPD(5); return false;" value="<?php echo $aInfoGen["inge_actividad_secundaria1"] ?>" size="80" class="inpC alphanum">
        <span id="div_ai_actprin" class="bxEr" style="display:none" >requerido</span>
        <span id="div_ai_actprin_2" class="bxEr" style="display:none" >inválido</span>       
    </p>
            
            <p>
                <span class="subT">c) Actividad Secundaria 2:</span>
                <span class="clear"></span>                 
                <input type="text" name="ai_actsec2" id="ai_actsec2" value="<?php echo $aInfoGen["inge_actividad_secundaria2"] ?>" size="40" class="inpC alphanum">
                <span id="div_ai_actsec2" class="bxEr" style="display:none" >requerido</span>
                  <span id="div_ai_actsec2_2" class="bxEr" style="display:none" >inválido</span></p>
            </p>
            
            <p>&nbsp;
              
            </p>
                        
            <span class="bxBt">
            <input type="submit" value="SIGUIENTE" id="sendData" name="continuarregistro" class="button" >
            <a href="../option.php" class="btnS">ANTERIOR</a>                
            </span>

        </fieldset>
    </form>
    <div class="clear"></div>      

</div>
<!-- end body -->        
<?php include("footer.php") ?>