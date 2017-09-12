<?php session_start(); header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
include_once('../verifyLogin.php');

$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];

$uid = OPERATOR::toSql(safeHTML(OPERATOR::getParam("uid")),'Number');
$reg = OPERATOR::toSql(safeHTML(OPERATOR::getParam("reg")),'Text');


$uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );
$sql = " UPDATE  frm2_bcap2_productos SET prod_delete = 1, prod_suv_uid = '".$uid_token."', prod_updatedate = NOW() WHERE prod_regi_uid = '".$regisroUID."' AND  prod_position = '".$uid."'";    
$db->query( $sql );
?>