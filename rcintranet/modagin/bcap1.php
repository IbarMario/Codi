<?php session_start(); ?>
<?php
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
?>
<?php include_once('../verifyLogin.php'); ?>
<?php include("header.php") ?>
<script type="text/javascript" src="js/bcap1.js"></script>
<?php
/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];

$sql = "SELECT * FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid = '".$regisroUID."' ";
$db->query( $sql );

if( $db->numrows() == 0 ) {

    $uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );
    
    $sql2 = "SELECT * FROM adm_definiciones WHERE defi_form_uid = '2' AND defi_modulo = 'b' AND defi_capitulo = '1' AND defi_swactive = 'ACTIVE' ";       
    $db2->query( $sql2 );
    while( $aDefinicion =  $db2->next_record() ) {
        $sql = "INSERT INTO frm3_bcap1_gestionambiental SET ";
        $sql .= "geam_regi_uid = '".$regisroUID."', ";
        $sql .= "geam_defi_uid = '".$aDefinicion["defi_uid"]."', ";         
        $sql .= "geam_description = '', "; 
        $sql .= "geam_suv_uid = '".$uid_token."', "; 
        $sql .= "geam_createdate = NOW(), "; 
        $sql .= "geam_updatedate = NOW() ";                          	 	
        $db3->query( $sql );               
    }       
} else {
    $aDefinicion =  $db->next_record();
    $estado = $aDefinicion["geam_estado"];
    //echo "Estado". $estado;
}
?>
<!-- begin body -->
<div class="content">
    <span id="statusACAP1" style="display:none" ><div class="bxS"><img alt="Guardado" src="../lib/ico_chk.gif">guardado</div></span>    
    <table class="dInf">
    <thead>
    <tr>
        <th> MODULO B</th>
        <th> ENCUESTA DE GESTION INTEGRADA </th>
    </tr>
    </thead>    
    </table>    
    <table class="dInf">
    <thead>
    <tr>
        <th> CAPITULO 1</th>
        <th> GESTI&Oacute;N AMBIENTAL</th>
    </tr>
    </thead>    
    </table>
    <form class="formA validable" action="bcap1Add.php" method="post" autocomplete="off" >
        <fieldset>
            <p><span class="subT">1. GASTOS CORRIENTES EN GESTIÓN AMBIENTAL</span></p>
    <p><b>Pago por servicios de protección ambiental</b>: Anote el valor anual de los gastos realizados por el pago de servicios, ya sean públicos o privados para proteger el medio ambiente.
</p>
                 <table class="fOpt">                        
                        <thead>
                            <tr>
                                <th>1. PAGO POR SERVICIOS DE PROTECCIÓN AMBIENTAL</th>
                                <th>VALOR  (Bs/Anual)</th>                             
                          </tr>
                        </thead>                        
                        <tbody>
                          <tr>                        
                              <td class="titR">1. Tasas o cuotas de alcantarillado industrial (no incluye el alcantarillado doméstico)</td>
                              <td><input type="text" size="16" maxlength="11" name="539" id="539" onblur="suma1();" value="<?php if ($estado > 0){echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='539'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                               <tr>                        
                              <td class="titR">2. Recojo y tratamiento de residuos por gestores autorizados (no incluye recojo de basura)</td>
                              <td><input type="text" size="16"  maxlength="11"  id="540" onblur="suma1();" name="540" value="<?php if ($estado > 0){echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='540'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                               <tr>                        
                              <td class="titR">3. Limpieza de fosas sépticas</td>
                              <td><input type="text" size="16" maxlength="11"   id="541" onblur="suma1();" name="541" value="<?php if ($estado > 0){ echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='541'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                               <tr>                        
                              <td class="titR">4. Tratamiento de aguas residuales</td>
                              <td><input type="text" size="16" maxlength="11"  id="542" onblur="suma1();" name="542" value="<?php if ($estado > 0){ echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='542'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                               <tr>                        
                              <td class="titR">5. Mediciones y tratamientos de emisiones de contaminantes atmosféricos</td>
                              <td><input type="text" size="16"  maxlength="11"  id="543" onblur="suma1();" name="543" value="<?php if ($estado > 0){ echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='543'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                               <tr>                        
                              <td class="titR">6. Mediciones de ruidos y vibraciones (incluye mediciones industriales y perimetrales)</td>
                              <td><input type="text" size="16"  maxlength="11"  id="544" onblur="suma1();" name="544" value="<?php  if ($estado > 0){echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='544'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                               <tr>                        
                              <td class="titR">7. Tratamiento de suelos</td>
                              <td><input type="text" size="16"  maxlength="11" id="545" onblur="suma1();" name="545" value="<?php  if ($estado > 0){echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='545'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                               <tr>                        
                              <td class="titR">8. Laboratorios Ambientales</td>
                              <td><input type="text" size="16"  maxlength="11"  id="546" onblur="suma1();" name="546" value="<?php if ($estado > 0){ echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='546'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                              <tr>                        
                              <td class="titR">9. Asesoramiento ambiental técnico o jurídico, certificaciones ambientales</td>
                              <td><input type="text" size="16"  maxlength="11" id="547" onblur="suma1();" name="547" value="<?php  if ($estado > 0){echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='547'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                          <tr>                                                     
                              <td><label class="labB">TOTAL</label></td>
                               <td><label class="labB numeric" id="r_548">0</label></td>
                              <input type="hidden" name="548" class="labB2 numeric" id="548" value="<?php echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='548'"); ?>">
                                 </tr>                            
                        </tbody>                        
                   </table>
                   <br /><br /><p>
          <b>Gastos asociados a equipos de protección ambiental</b>. Anote los gastos de reparación de equipos y el consumo de materiales y combustibles de protección ambiental.
             </p><table class="fOpt">                        
                        <thead>
                            <tr>
                                <th>1.2 GASTOS ASOCIADOS A EQUIPOS DE PROTECCIÓN AMBIENTAL</th>
                                <th>VALOR  (Bs/Anual)</th>                             
                          </tr>
                        </thead>                        
                        <tbody>
                          <tr>                        
                              <td class="titR">1. Reparación y mantenimiento de equipos de protección ambiental</td>
                              <td><input type="text" size="16" name="549" id="549" onblur="suma2();" value="<?php  if ($estado > 0){echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='549'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                               <tr>                        
                              <td class="titR">2. Consumo de materias primas en equipos de protección ambiental</td>
                              <td><input type="text" size="16" name="550" id="550" onblur="suma2();" value="<?php  if ($estado > 0){echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='550'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>               
                              <td><label class="labB">TOTAL</label></td>
                            <td><label class="labB numeric" id="r_551">0</label></td>
                              <input type="hidden" name="551" class="labB2 numeric" id="551" value="<?php echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='551'"); ?>"> 
                          </tr>                            
                        </tbody>                        
                   </table>
<br /><br /><p><b>Gastos de personal ocupado en actividades de protección ambiental</b>: Son los pagos realizados al personal de la empresa ocupado exclusivamente o parcialmente en actividades de protección ambiental.<br/><b>Gastos en productos que protegen el medio ambiente</b>: Es el valor de los productos cuyo principal objetivo es la protección del medio ambiente.</p>
 <table class="fOpt">                        
                        <thead>
                            <tr>
                                <th>1.3 OTROS GASTOS CORRIENTES ASOCIADOS A LA GESTIÓN AMBIENTAL</th>
                                <th>VALOR  (Bs/Anual)</th>                             
                          </tr>
                        </thead>                        
                        <tbody>
                          <tr>                        
                              <td class="titR">1. Gastos de personal ocupado en actividades de protección ambiental (incluye sueldos y salarios)</td>
                              <td><input type="text" size="16"  maxlength="11" name="553" id="553" onblur="suma3();" value="<?php  if ($estado > 0){echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='553'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                              <tr>                        
                              <td class="titR">2. Gestión y capacitación ambiental</td>
                              <td><input type="text" size="16"  maxlength="11" name="554" id="554" onblur="suma3();" value="<?php  if ($estado > 0){echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='554'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>               
                              <tr>                        
                              <td class="titR">3. Gastos en productos que protegen el medio ambiente (contenedores de residuos, doble acristalamiento, bolsas de basura y otros)</td>
                              <td><input type="text" size="16"   maxlength="11" name="555" id="555" onblur="suma3();" value="<?php if ($estado > 0){ echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='555'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                               <tr>                        
                              <td class="titR">4. Gastos extras por la implementación de producción más limpia</td>
                              <td><input type="text" size="16" maxlength="11"  name="556" id="556" onblur="suma3();" value="<?php  if ($estado > 0){echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='556'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>               
                              <tr>                        
                              <td class="titR">5. Otros gastos corrientes<span id="re610" style="<?php if(OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='557'")!=0){ echo ""; }else{ echo "display:none"; } ?>" ><input type="text" size="16"  name="610" id="610"  value="<?php echo OPERATOR::getDbValue("SELECT geam_description FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid='610'"); ?>" class="inpC2"/></span></td>
                              <td><input type="text" size="16" maxlength="11"  name="557" id="557" onblur="suma3();" value="<?php if ($estado > 0){echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='557'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                              <td><label class="labB">TOTAL</label></td>
                              <td><label class="labB" id="r_558">0</label></td>
                              <input type="hidden" name="558" class="labB2 numeric" id="558" value="<?php echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='558'"); ?>">
                          </tr>                            
                        </tbody>                        
                   </table>
                   <br /><br />
   <p><span class="subT">2. INVERSIONES EN GESTIÓN AMBIENTAL</span></p>
    <table class="fOpt">                        
                        <thead>
                            <tr>
                                <th>2.1 PROYECTOS Y PROGRAMAS  ENMARCADOS EN LA GESTIÓN AMBIENTAL</th>
                                <th>VALOR  (Bs/Anual)</th>                             
                          </tr>
                        </thead>
                        <tbody>
                          <tr>                        
                              <td class="titR">1. Proyectos y programas de prevención, preservación y protección ambiental</td>
                              <td><input type="text" size="16"  maxlength="11"  name="559" value="<?php echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='559'"); ?>" class="inpB2 numeric"/></td>
                              </tr>
                        </tbody>
                   </table>
                   <br/><br/><p><b>Equipos e Instalaciones</b>.  Se deben considerar los equipos e instalaciones de propiedad de la empresa que previenen y tratan la contaminación del medio ambiente, ya sea que su uso sea exclusivo para este objetivo o que se lo utilice además para la actividad principal de la empresa</p>
                       <table class="fOpt">                        
                        <thead>
                            <tr>
                                <th>2.2 COMPRA DE EQUIPOS E INSTALACIONES (Equipos que prevengan y traten la contaminación ambiental)</th>
                                <th>VALOR  (Bs/Anual)</th>                             
                          </tr>
                        </thead>
                        <tbody>
                          <tr>                        
                              <td class="titR">1. Equipos e instalaciones para reducir las emisiones de contaminantes atmosféricos</td>
                              <td><input type="text" size="16"  maxlength="11"  name="560" id="560" onblur="suma4();"  value="<?php  if ($estado > 0){echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='560'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                                <tr>                        
                              <td class="titR">2. Equipos e instalaciones para el manejo de las aguas residuales, como también el ahorro y reutilización del agua</td>
                              <td><input type="text" size="16"  maxlength="11"  name="561" id="561" onblur="suma4();"  value="<?php  if ($estado > 0){echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='561'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                                <tr>                        
                              <td class="titR">3. Equipos e instalaciones que reducen la generación de residuos sólidos</td>
                              <td><input type="text" size="16"  maxlength="11"  name="562" id="562" onblur="suma4();"  value="<?php  if ($estado > 0){echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='562'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                                <tr>                        
                              <td class="titR">4. Equipos e instalaciones para prevenir o mitigar la contaminación de suelos y aguas</td>
                              <td><input type="text" size="16"  maxlength="11"  name="563" id="563" onblur="suma4();"  value="<?php  if ($estado > 0){echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='563'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                                <tr>                        
                              <td class="titR">5. Equipos e instalaciones para reducir ruidos y vibraciones</td>
                              <td><input type="text" size="16"  maxlength="11"  name="564" id="564" onblur="suma4();"  value="<?php  if ($estado > 0){echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='564'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                                <tr>                        
                              <td class="titR">6. Otros equipos e instalaciones (por ejemplo, para uso de materias primas contaminantes)</td>
                              <td><input type="text" size="16"  maxlength="11"  name="566" id="566" onblur="suma4();"  value="<?php if ($estado > 0){ echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='566'");} else {echo ('');} ?>" class="inpB2 numeric"/></td>
                              </tr>
                                <tr>                        
                              <td><label class="labB">TOTAL</td>
                                 <td><label class="labB numeric" id="r_565">0</label></td>
                              <input type="hidden" name="565" class="labB2 numeric" id="565" value="<?php echo OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='565'"); ?>">
                             </tr>
                        </tbody>
                   </table>
                   <br /><br />
                   <table class="fOpt">                        
                        <thead>
                            <tr>
                                <th>2.3 Si la empresa no realizó ningún gasto o inversión en gestión ambiental, señale los motivos y/o especifique. (Se acepta respuesta múltiple)</th>
                                                        
                          </tr>
                        </thead>
                      </table>                     
                      <p>
                         <input  <?php if (OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='567'")==1){ echo "checked=\"checked\""; };  ?>   name="567" value="1" class="chk" type="checkbox">
                        <label class="labChkB">a) Falta de conocimiento</label>
                             <span class="clear"></span>
                         <input <?php if (OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='568'")==1){ echo "checked=\"checked\""; };  ?>   name="568" value="1" class="chk" type="checkbox">
                        <label class="labChkB">b) Falta de presupuesto</label>
                              <span class="clear"></span>
                         <input id="569_in" <?php if (OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='569'")==1){ echo "checked=\"checked\""; };  ?>   name="569" value="1" class="chk" type="checkbox">
                        <label class="labChk">c) Otros motivos (especificar)</label>
                        <span id="569_out" style="<?php if (OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='569'")!=1){ echo "display:none"; };  ?>">
                        <input size="40" id="input7069" class="inpC" type="text" name="570" value="<?php echo OPERATOR::getDbValue("SELECT geam_description FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='570'"); ?>"/>
                      </span>
                      </p>
                         <br /><br />
                      <p><span class="subT">3. APROVECHAMIENTO Y TRATAMIENTO DE RESIDUOS  </span></p>
                      <p><b>Aprovechamiento de residuos sólidos</b>: Proceso industrial y/o manual cuyo objetivo es la recuperación o transformación de los recursos contenidos en los residuos.<br/>
<b>Tratamiento de aguas residuales</b>: Proceso a que se someten las aguas residuales para que puedan cumplir las normas ambientales de calidad.<br />
<b>Extracción de aguas subterraneas</b>: Proceso en el cual se obtiene el agua por debajo de la superficie de la tierra. </p>
  <table class="fOpt">                        
                        <thead>
                            <tr>
                                <th>1. ¿Su empresa realizó el aprovechamiento de sus residuos sólidos?</th>                                                        
                          </tr>
                        </thead>
                      </table>                     
<p><span class="clear"></span> <input <?php if (OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='571'")==1){ echo "checked=\"checked\""; };  ?> name="571" value="1" class="chk" type="radio" ><label class="labChk">Si</label>   <span class="clear"></span>   <input <?php if (OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='571'")==0){ echo "checked=\"checked\""; };  ?> name="571" value="0" class="chk" type="radio" ><label class="labChk">No</label></p>
  <table class="fOpt">                        
                        <thead>
                            <tr>
                                <th>2. ¿Su empresa vendió a otras empresas sus residuos sólidos?</th>                                                        
                          </tr>
                        </thead>
                      </table>                     
<p><span class="clear"></span> <input <?php if (OPERATOR::getDbValue("SELECT geam_valor  FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='572'")==1){ echo "checked=\"checked\""; };  ?> name="572" value="1" class="chk" type="radio" ><label class="labChk">Si</label>   <span class="clear"></span>   <input <?php if (OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='572'")==0){ echo "checked=\"checked\""; };  ?> name="572" value="0" class="chk" type="radio" ><label class="labChk">No</label></p>
  <table class="fOpt">                        
                        <thead>
                            <tr>
                                <th>3. ¿Su empresa realizó tratamiento de aguas residuales?</th>                                                        
                          </tr>
                        </thead>
                      </table>                     
<p><span class="clear"></span> <input <?php if (OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='573'")==1){ echo "checked=\"checked\""; };  ?> name="573" value="1" class="chk" type="radio" ><label class="labChk">Si</label>   <span class="clear"></span>   <input <?php if (OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='573'")==0){ echo "checked=\"checked\""; };  ?> name="573" value="0" class="chk" type="radio" ><label class="labChk">No</label></p>
  <table class="fOpt">                        
                        <thead>
                            <tr>
                                <th>4. ¿Su empresa realizó extracción de aguas subterráneas?</th>                                                        
                          </tr>
                        </thead>
                      </table>                     
<p><span class="clear"></span> <input <?php if (OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='574'")==1){ echo "checked=\"checked\""; };  ?> name="574" value="1" class="chk" type="radio" ><label class="labChk">Si</label>   <span class="clear"></span>   <input <?php if (OPERATOR::getDbValue("SELECT geam_valor FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND geam_defi_uid ='574'")==0){ echo "checked=\"checked\""; };  ?> name="574" value="0" class="chk" type="radio" ><label class="labChk">No</label></p>
            <span class="bxBt">
                <input type="submit" value="SIGUIENTE" id="sendData" name="continuarregistro" class="button" >
                <a href="acap15a3.php" class="btnS">ANTERIOR</a>                
            </span>
                
        </fieldset>
    </form>
    <div class="clear"></div>      
</div>
<!-- end body -->
<?php include("footer.php") ?>