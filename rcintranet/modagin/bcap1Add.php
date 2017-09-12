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


/*
$dato = array();

$in1 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("539")),'Text');
$dato[539] = preg_replace('/,/', '', $in1);

$in2 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("540")),'Text');
$dato[540] = preg_replace('/,/', '', $in2);

$in3 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("541")),'Text');
$dato[541] = preg_replace('/,/', '', $in3);

$in4 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("542")),'Text');
$dato[542] = preg_replace('/,/', '', $in4);

$in5 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("543")),'Text');
$dato[543] = preg_replace('/,/', '', $in5);

$in6 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("544")),'Text');
$dato[544] = preg_replace('/,/', '', $in6);

$in7 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("545")),'Text');
$dato[545] = preg_replace('/,/', '', $in7);

$in8 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("546")),'Text');
$dato[546] = preg_replace('/,/', '', $in8);

$in9 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("547")),'Text');
$dato[547] = preg_replace('/,/', '', $in9);

$in10 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("548")),'Text');
$dato[548] = preg_replace('/,/', '', $in10);

$in11 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("549")),'Text');
$dato[549] = preg_replace('/,/', '', $in11);

$in12 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("550")),'Text');
$dato[550] = preg_replace('/,/', '', $in12);

$in13 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("551")),'Text');
$dato[551] = preg_replace('/,/', '', $in13);

$in14 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("552")),'Text');
$dato[552] = preg_replace('/,/', '', $in14);

$in15 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("553")),'Text');
$dato[553] = preg_replace('/,/', '', $in15);

$in16 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("554")),'Text');
$dato[554] = preg_replace('/,/', '', $in16);

$in17 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("555")),'Text');
$dato[555] = preg_replace('/,/', '', $in17);

$in18 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("556")),'Text');
$dato[556] = preg_replace('/,/', '', $in18);

$in19 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("557")),'Text');
$dato[557] = preg_replace('/,/', '', $in19);

$in20 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("558")),'Text');
$dato[558] = preg_replace('/,/', '', $in20);

$in21 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("559")),'Text');
$dato[559] = preg_replace('/,/', '', $in21);

$in22 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("560")),'Text');
$dato[560] = preg_replace('/,/', '', $in22);

$in23 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("561")),'Text');
$dato[561] = preg_replace('/,/', '', $in23);

$in24 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("562")),'Text');
$dato[562] = preg_replace('/,/', '', $in24);

$in20 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("558")),'Text');
$dato[558] = preg_replace('/,/', '', $in20);

$in21 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("559")),'Text');
$dato[559] = preg_replace('/,/', '', $in21);

$in22 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("560")),'Text');
$dato[560] = preg_replace('/,/', '', $in22);

$in23 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("561")),'Text');
$dato[561] = preg_replace('/,/', '', $in23);

$in24 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("562")),'Text');
$dato[562] = preg_replace('/,/', '', $in24);*/


// obtener el uid del token
$uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );
    
if( !empty($regisroUID)  ) {   

    $sql = "SELECT * FROM frm3_bcap1_gestionambiental WHERE geam_regi_uid = '".$regisroUID."' ";
    $db->query($sql);
    //echo $sql;
    while ( $aGesAmb = $db->next_record() ) {         
        $sql  = "UPDATE frm3_bcap1_gestionambiental SET ";
        $sql .= "geam_valor = '".preg_replace('/,/', '',($_POST[$aGesAmb["geam_defi_uid"]]))."', ";
        $sql .= "geam_description = UPPER('".$_POST[$aGesAmb["geam_defi_uid"]]."'), ";
        $sql .= "geam_suv_uid	 = '".$uid_token."', ";
        $sql .= "geam_updatedate = NOW(), ";
        $sql .= "geam_estado = 1 ";
        $sql .= "WHERE geam_regi_uid = '".$regisroUID."' AND geam_defi_uid	 = '".$aGesAmb["geam_defi_uid"]."' ";  
        $db2->query($sql);
        //echo $sql."<br />";
        /*
        $sql  = "UPDATE frm3_bcap1_gestionambiental SET ";
        $sql .= "geam_valor = '".$_POST[$aGesAmb["geam_defi_uid"]]."', ";
        $sql .= "geam_description = UPPER('".$_POST[$aGesAmb["geam_defi_uid"]]."'), ";
        $sql .= "geam_suv_uid	 = '".$uid_token."', ";
        $sql .= "geam_updatedate = NOW(), ";
        $sql .= "geam_estado = 1 ";
        $sql .= "WHERE geam_regi_uid = '".$regisroUID."' AND geam_defi_uid	 = '".$aGesAmb["geam_defi_uid"]."' ";  
        $db2->query($sql);*/
        
        
    }      
    //echo $sql."<br />"; 
}
  
if( !empty( $btnsubmit ) ) {
  header("Location: bcap2.php");
}
?>