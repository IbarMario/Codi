<?php session_start(); header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
include_once('../verifyLogin.php');
/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];


$btnsubmit = OPERATOR::toSql(safeHTML(OPERATOR::getParam("continuarregistro")),'Text');

// obtener el uid del token
$uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );
    
if( !empty($regisroUID)  ) { 

    $sql = "SELECT * FROM  frm3_bcap3_responsocial WHERE reso_regi_uid = '".$regisroUID."' ";
    $db->query($sql);

    //echo $sql;
    while ( $aGesAmb = $db->next_record() ) {         
        $sql  = "UPDATE  frm3_bcap3_responsocial SET ";
        $sql .= "reso_valor = '".$_POST[$aGesAmb["reso_defi_uid"]]."', ";
        $sql .= "reso_description = UPPER('".$_POST[$aGesAmb["reso_defi_uid"]]."'), ";
        $sql .= "reso_suv_uid	 = '".$uid_token."', ";
        $sql .= "reso_updatedate = NOW() ";
        $sql .= "WHERE reso_regi_uid = '".$regisroUID."' AND reso_defi_uid = '".$aGesAmb["reso_defi_uid"]."' ";  
        $db2->query($sql);        
    }
    
}
  
if( !empty( $btnsubmit ) ) {
    header("Location: ccap1.php");
}
?>