<?php session_start(); header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
include_once('../verifyLogin.php');
/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];
$btnsubmit = OPERATOR::toSql(safeHTML(OPERATOR::getParam("continuarregistro")),'Text');
$v6 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-53")),'Text');
$v6 = preg_replace('/,/', '', $v6);
//echo $v6;
$control=0;
$observ='Ninguna';
if ($v6 == 0){
    $control=1;
    $observ =" Módulo A Cap 9 Formación de Activos Fijos, El Total es igual a cero  ";
}
// obtener el uid del token
$uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );
//echo $uid_token;
if( !empty($regisroUID)  ) {
    $sql = "SELECT * FROM frm1_cap9_formacionactivosfijos WHERE foaf_regi_uid = '".$regisroUID."' ";
    $db->query($sql);
    //echo $sql;
    while ( $aActivos = $db->next_record() ) {         
        $v6 = "";
        $v7 = "DESCRIPCION";
        $v6 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-".$aActivos["foaf_defi_uid"])),'Text');
        $v6 = preg_replace('/,/', '', $v6);
        if ($aActivos["foaf_defi_uid"] == 52){ $v7 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input_".$aActivos["foaf_defi_uid"])),'Text'); }
        //echo $aActivos["foaf_defi_uid"];                
        //echo $v6."<br>";
        $sql  = "UPDATE frm1_cap9_formacionactivosfijos SET ";
        $sql .= "foaf_valor = '".$v6."', "; 
        $sql .= "foaf_description =  UPPER('".$v7."'), ";
        $sql .= "foaf_suv_uid = '".$uid_token."', ";
        $sql .= "foaf_updatedate = NOW(), ";
        $sql .= "foaf_estado = 1, ";
        $sql .= "foaf_control = '".$control."', ";
        $sql .= "foaf_observacion =  UPPER('".$observ."') ";
        $sql .= "WHERE foaf_regi_uid = '".$regisroUID."' AND foaf_defi_uid = '".$aActivos["foaf_defi_uid"]."' ";
        $db2->query($sql);
        //echo $sql."<br />";
    }
}
// die();
if( !empty( $btnsubmit ) ) {
    header("Location: acap10.php");
}
?>