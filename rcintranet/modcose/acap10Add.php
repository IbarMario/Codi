<?php session_start(); header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
include_once('../verifyLogin.php');

$dat = array();

$tot = OPERATOR::toSql(safeHTML(OPERATOR::getParam("capitaltotal")),'Text');
$dat[54] = preg_replace('/,/', '', $tot);

$v2 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-12")),'Text');
$dat[56] = preg_replace('/,/', '', $v2);

$v3 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-13")),'Text');
$dat[57] = preg_replace('/,/', '', $v3);

$dat[55] = $dat[54] - $dat[56] - $dat[57];

$v5 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-15")),'Text');
$dat[58] = preg_replace('/,/', '', $v5);

$control=0;
$observ='Ninguna';

if ($dat[54] == 0 and $dat[58] == 0) {
    $control=1;
    $observ =" Módulo A Cap 10 Capital y Patrimonio, El Total Capital y el Patrimonio son igual a Cero ";
} else {
    if ($dat[54] == 0){
        $control=1;
        $observ =" Módulo A Cap 10 Capital y Patrimonio, El Total Capital es igual a cero  ";
    } else {
        $control=1;
        $observ =" Módulo A Cap 10 Capital y Patrimonio, El Patrimonio es igual a cero  ";
    }
}

/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];

$btnsubmit = OPERATOR::toSql(safeHTML(OPERATOR::getParam("continuarregistro")),'Text');
// obtener el uid del token
$uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );
    
if( !empty($regisroUID)  ) {   

    $sql = "SELECT * FROM frm1_cap10_capitalpatrimonio WHERE capa_regi_uid = '".$regisroUID."' ";
    $db->query($sql);

    //echo $sql;
    while ( $aPatrimonio = $db->next_record() ) {         
        $sql  = "UPDATE frm1_cap10_capitalpatrimonio SET ";
        $sql .= "capa_valor = '".$dat[$aPatrimonio["capa_defi_uid"]]."', ";
        $sql .= "capa_suv_uid	 = '".$uid_token."', ";
        $sql .= "capa_updatedate = NOW(), ";
        $sql .= "capa_estado = 1, ";
        $sql .= "capa_control = '".$control."', ";
        $sql .= "capa_observacion = '".$observ."' ";
        $sql .= "WHERE capa_regi_uid = '".$regisroUID."' AND capa_defi_uid	 = '".$aPatrimonio["capa_defi_uid"]."' ";  
        $db2->query($sql);
        //echo $sql."<br />";
    }      
    //echo $sql."<br />";
}
  
if( !empty( $btnsubmit ) ) {
    header("Location: bcap1.php");
}
?>