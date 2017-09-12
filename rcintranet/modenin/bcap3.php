<?php session_start(); ?>
<?php
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
?>
<?php include_once('../verifyLogin.php'); ?>
<?php include("header.php") ?>
<script type="text/javascript" src="js/bcap3.js"></script>

<?php
/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];

$sql = "SELECT * FROM  frm2_bcap3_responsocial WHERE reso_regi_uid = '".$regisroUID."' ";
$db->query( $sql );

if( $db->numrows() == 0 ) {

    $uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );
    
    $sql2 = "SELECT * FROM adm_definiciones WHERE defi_form_uid = '2' AND defi_modulo = 'b' AND defi_capitulo = '3' AND defi_swactive = 'ACTIVE' ";       
    $db2->query( $sql2 );
    while( $aDefinicion =  $db2->next_record() ) {
        $sql = "INSERT INTO  frm2_bcap3_responsocial SET ";
        $sql .= "reso_regi_uid = '".$regisroUID."', ";
        $sql .= "reso_defi_uid = '".$aDefinicion["defi_uid"]."', ";         
        $sql .= "reso_valor = '0', ";
        $sql .= "reso_description = '0', "; 
        $sql .= "reso_suv_uid = '".$uid_token."', "; 
        $sql .= "reso_createdate = NOW(), "; 
        $sql .= "reso_updatedate = NOW() ";                          	 	
        $db3->query( $sql );               
    }       
}
?>
<!-- begin body -->
<div class="content">    
    <table class="dInf">
    <thead>
    <tr>
        <th>CAP&Iacute;TULO 3</th>
        <th>RESPONSABILIDAD SOCIAL EMPRESARIAL</th>
    </tr>    
    </thead>    
    <tbody>
        <tr><td colspan="2"><?php echo OPERATOR::getDescTitles(2,'B',3,'0'); ?></td></tr>
        
    </tbody>
    </table>
    <form class="formA validable" action="bcap3Add.php" method="post" autocomplete="off" >
        <fieldset>
              <p><span class="subT">1. La empresa cuenta con una Pol&iacute;tica de Responsabilidad Social Empresarial? </span></p>
               <p>
                 <span class="clear"></span>
                        
                        <input <?php if (OPERATOR::getDbValue("SELECT  reso_valor  FROM  frm2_bcap3_responsocial  WHERE  reso_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  reso_defi_uid ='603'")==1){ echo "checked=\"checked\""; };  ?>   name="603" id="603" value="1" class="chk" type="checkbox">
                        <label class="labChkB">Si</label>
                 
                         <span class="clear"></span>
                        
                        <input <?php if (OPERATOR::getDbValue("SELECT  reso_valor  FROM  frm2_bcap3_responsocial  WHERE  reso_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  reso_defi_uid ='604'")==1){ echo "checked=\"checked\""; };  ?>  name="604" id="604" value="1" class="chk" type="checkbox">
                        <label class="labChkB">No</label>
                    
                         <span class="clear"></span>
                        
                        <input <?php if (OPERATOR::getDbValue("SELECT  reso_valor  FROM  frm2_bcap3_responsocial  WHERE  reso_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  reso_defi_uid ='605'")==1){ echo "checked=\"checked\""; };  ?>  name="605" id="605" value="1" class="chk" type="checkbox">
                        <label class="labChkB">En fase de dasarrollo</label>
                       
               </p>
               <br /><br />
                 <p><span class="subT">2. ¿Cuenta con personal permanente destinado al área de Responsabilidad Social Empresarial?</span></p>
               <p>
                 <span class="clear"></span>
                        
                        <input <?php if (OPERATOR::getDbValue("SELECT  reso_valor  FROM  frm2_bcap3_responsocial  WHERE  reso_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  reso_defi_uid ='606'")==1){ echo "checked=\"checked\""; };  ?>  name="606" id="606" value="1" class="chk" type="checkbox">
                        <label class="labChkB">Si</label>
                 
                         <span class="clear"></span>
                        
                        <input <?php if (OPERATOR::getDbValue("SELECT  reso_valor  FROM  frm2_bcap3_responsocial  WHERE  reso_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  reso_defi_uid ='607'")==1){ echo "checked=\"checked\""; };  ?>  name="607" value="1" id="607" class="chk" type="checkbox">
                        <label class="labChkB">No</label>
                        <span id="te_606" style="<?php if (OPERATOR::getDbValue("SELECT  reso_valor  FROM  frm2_bcap3_responsocial  WHERE  reso_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  reso_defi_uid ='606'")!=1){ echo "display:none"; };  ?>">
                         <span class="clear"></span>
                        <label class="labChk">Número de personas</label>
                       <input size="10" value="<?php echo OPERATOR::getDbValue("SELECT  reso_valor  FROM  frm2_bcap3_responsocial  WHERE  reso_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  reso_defi_uid ='608'"); ?>" class="inpC validar" id="608" name="608" type="text">
                        </span>
                       
               </p>
                         <br /><br />
                 <p><span class="subT">3. ¿Cuánto asignó en la última Gestión a Responsabilidad Social Empresarial?</span></p>
               <p>
                 <span class="clear"></span>
                        
                    <label class="labChk">Bs/Anual</label>
                         <input size="10" value="<?php echo OPERATOR::getDbValue("SELECT  reso_description  FROM  frm2_bcap3_responsocial  WHERE  reso_regi_uid ='".$_SESSION[SITE]["registro_uid"]."' AND  reso_defi_uid ='609'"); ?>" class="inpC validar" name="609" id="609" type="text">
                       
               </p>
                                              
            <span class="bxBt">
                <input type="submit" value="SIGUIENTE" id="sendData" name="continuarregistro" class="button" >
                <a href="bcap2.php" class="btnS">ANTERIOR</a>                
            </span>
                
        </fieldset>
    </form>
    <div class="clear"></div>      

</div>
<!-- end body -->

<?php include("footer.php") ?>