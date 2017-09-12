<?php session_start(); header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
include_once('../verifyLogin.php');
//print_r($_POST);
/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];

$btnsubmit = OPERATOR::toSql(safeHTML(OPERATOR::getParam("continuarregistro")),'Text');

// obtener el uid del token
$uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );
    
if( !empty($regisroUID)  ) {   

    $sql = "SELECT * FROM frm2_bcap1_gestionambiental WHERE geam_regi_uid = '".$regisroUID."' ";
    $db->query($sql);
    //echo $sql;
    while ( $aGesAmb = $db->next_record() ) {         
        $sql  = "UPDATE frm2_bcap1_gestionambiental SET ";
        $sql .= "geam_valor = '".$_POST[$aGesAmb["geam_defi_uid"]]."', ";
        $sql .= "geam_description = UPPER('".$_POST[$aGesAmb["geam_defi_uid"]]."'), ";
        $sql .= "geam_suv_uid = '".$uid_token."', ";
        $sql .= "geam_updatedate = NOW(), ";
        $sql .= "geam_estado = 1 ";
        $sql .= "WHERE geam_regi_uid = '".$regisroUID."' AND geam_defi_uid	 = '".$aGesAmb["geam_defi_uid"]."' ";  
        $db2->query($sql);
        //echo $sql."<br />";
    }      
    //echo $sql."<br />"; 
}
  
if( !empty( $btnsubmit ) ) {
  header("Location: bcap2.php");
}
?>